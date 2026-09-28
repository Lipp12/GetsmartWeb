<?php
/**
 * Plugin Name: Komunitas Online & Lokasi Tracker Pro (Map Edition)
 * Description: Widget untuk menampilkan anggota komunitas yang online beserta lokasi koordinat map mereka menggunakan OpenStreetMap.
 * Version: 2.0
 * Author: Komunitas Kreatif
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Catat status online user terakhir kali aktif
function kot_update_user_online_status() {
    if ( is_user_logged_in() ) {
        $user_id = get_current_user_id();
        update_user_meta( $user_id, 'kot_last_active', current_time( 'timestamp' ) );
    }
}
add_action( 'wp_footer', 'kot_update_user_online_status' );

// 2. Load Leaflet.js Assets (Hanya di halaman profil admin dan shortcode)
function kot_enqueue_map_assets($hook) {
    if ( 'profile.php' === $hook || 'user-edit.php' === $hook ) {
        wp_enqueue_style( 'leaflet-css', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css', array(), '1.9.4' );
        wp_enqueue_script( 'leaflet-js', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', array(), '1.9.4', true );
    }
}
add_action( 'admin_enqueue_scripts', 'kot_enqueue_map_assets' );

function kot_enqueue_frontend_assets() {
    wp_enqueue_style( 'leaflet-css', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css', array(), '1.9.4' );
    wp_enqueue_script( 'leaflet-js', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', array(), '1.9.4', true );
}
add_action( 'wp_enqueue_scripts', 'kot_enqueue_frontend_assets' );

// 3. Tambah Input Koordinat & Peta Mini di Profil User
function kot_add_map_user_profile_fields( $user ) {
    $lat = get_the_author_meta( 'kot_lat', $user->ID );
    $lng = get_the_author_meta( 'kot_lng', $user->ID );
    $place_name = get_the_author_meta( 'kot_place_name', $user->ID );
    
    // Default koordinat jika kosong (Jakarta Pusat sebagai contoh default)
    $default_lat = !empty($lat) ? $lat : '-6.2000';
    $default_lng = !empty($lng) ? $lng : '106.8166';
    ?>
    <h3>Lokasi Kopdar / Berkumpul</h3>
    <table class="form-table">
        <tr>
            <th><label for="kot_place_name">Nama Tempat</label></th>
            <td>
                <input type="text" name="kot_place_name" id="kot_place_name" value="<?php echo esc_attr( $place_name ); ?>" class="regular-text" placeholder="Contoh: Kopi Jago, Kantor Sekretariat" /><br />
            </td>
        </tr>
        <tr>
            <th><label>Pilih di Peta</label></th>
            <td>
                <div id="profile-map" style="height: 300px; max-width: 500px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;"></div>
                <input type="hidden" name="kot_lat" id="kot_lat" value="<?php echo esc_attr($lat); ?>" />
                <input type="hidden" name="kot_lng" id="kot_lng" value="<?php echo esc_attr($lng); ?>" />
                <span class="description">Klik pada peta untuk menandai lokasi berkumpul Anda saat ini. Koordinat otomatis tersimpan.</span>
            </td>
        </tr>
    </table>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var map = L.map('profile-map').setView([<?php echo $default_lat; ?>, <?php echo $default_lng; ?>], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker;
        <?php if (!empty($lat) && !empty($lng)) : ?>
            marker = L.marker([<?php echo $lat; ?>, <?php echo $lng; ?>]).addTo(map);
        <?php endif; ?>

        map.on('click', function(e) {
            var lat = e.latlng.lat.toFixed(6);
            var lng = e.latlng.lng.toFixed(6);
            
            document.getElementById('kot_lat').value = lat;
            document.getElementById('kot_lng').value = lng;

            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }
        });
    });
    </script>
    <?php
}
add_action( 'show_user_profile', 'kot_add_map_user_profile_fields' );
add_action( 'edit_user_profile', 'kot_add_map_user_profile_fields' );

// Simpan Data Koordinat
function kot_save_map_user_profile_fields( $user_id ) {
    if ( ! current_user_can( 'edit_user', $user_id ) ) return false;
    update_user_meta( $user_id, 'kot_place_name', sanitize_text_field($_POST['kot_place_name']) );
    update_user_meta( $user_id, 'kot_lat', sanitize_text_field($_POST['kot_lat']) );
    update_user_meta( $user_id, 'kot_lng', sanitize_text_field($_POST['kot_lng']) );
}
add_action( 'personal_options_update', 'kot_save_map_user_profile_fields' );
add_action( 'edit_user_profile_update', 'kot_save_map_user_profile_fields' );


// 4. Ambil Anggota Online dengan Koordinat Valid
function kot_get_online_users_map_data() {
    $current_time = current_time( 'timestamp' );
    $delay = 5 * 60; // 5 menit toleransi online
    $users = get_users();
    $locations = array();

    foreach ( $users as $user ) {
        $last_active = get_user_meta( $user->ID, 'kot_last_active', true );
        
        if ( $last_active && ( $current_time - $last_active < $delay ) ) {
            $lat = get_user_meta( $user->ID, 'kot_lat', true );
            $lng = get_user_meta( $user->ID, 'kot_lng', true );
            $place = get_user_meta( $user->ID, 'kot_place_name', true );

            // Pastikan user punya data koordinat map
            if ( !empty($lat) && !empty($lng) ) {
                $locations[] = array(
                    'name'       => $user->display_name,
                    'avatar'     => get_avatar_url( $user->ID, array( 'size' => 32 ) ),
                    'place_name' => !empty($place) ? $place : 'Tempat Tanpa Nama',
                    'lat'        => floatval($lat),
                    'lng'        => floatval($lng)
                );
            }
        }
    }
    return $locations;
}

// 5. Shortcode Tampilan Depan (Menampilkan Peta Bersama)
function kot_live_map_shortcode() {
    $online_members = kot_get_online_users_map_data();
    $map_id = 'kot_live_map_' . rand(10, 99);
    
    ob_start();
    ?>
    <div class="kot-map-widget" style="font-family: sans-serif; background: #fff; padding: 15px; border-radius: 8px; border: 1px solid #ddd; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
        <h4 style="margin-top: 0; color: #222; border-bottom: 2px solid #0073aa; padding-bottom: 8px; display: flex; align-items: center; gap: 8px;">
            <span>🟢</span> Live Peta Posisi Komunitas
        </h4>
        
        <div id="<?php echo $map_id; ?>" style="height: 400px; width: 100%; border-radius: 6px; z-index: 1;"></div>
        
        <div style="margin-top: 10px; font-size: 12px; color: #666; font-style: italic;">
            *Hanya menampilkan anggota online (aktif 5 menit terakhir) yang telah menyetel lokasi di profilnya.
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var locations = <?php echo json_encode($online_members); ?>;
        
        // Titik tengah default (jika tidak ada data, arahkan ke koordinat default Indonesia/Jakarta)
        var defaultCenter = [-6.2000, 106.8166];
        var defaultZoom = 11;
        
        if (locations.length > 0) {
            defaultCenter = [locations[0].lat, locations[0].lng];
        }

        var mainMap = L.map('<?php echo $map_id; ?>').setView(defaultCenter, defaultZoom);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(mainMap);

        var bounds = [];

        locations.forEach(function(member) {
            var popupContent = `
                <div style="display: flex; align-items: center; gap: 8px; min-width:150px;">
                    <img src="${member.avatar}" style="border-radius:50%; width:32px; height:32px;">
                    <div>
                        <strong style="color:#0073aa; display:block;">${member.name}</strong>
                        <span style="font-size:11px; color:#555;">📍 ${member.place_name}</span>
                    </div>
                </div>
            `;

            var marker = L.marker([member.lat, member.lng]).addTo(mainMap)
                .bindPopup(popupContent);
                
            bounds.push([member.lat, member.lng]);
        });

        // Fit map agar semua marker kelihatan otomatis
        if (bounds.length > 1) {
            mainMap.fitBounds(bounds, { padding: [40, 40] });
        }
    });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'komunitas_online', 'kot_live_map_shortcode' );