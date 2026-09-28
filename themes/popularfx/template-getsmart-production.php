<?php
/*
 * Template Name: Get Smart Production
 * Description: Template khusus halaman Get Smart Production (Dark Mode, Roadmap, Nilai Inti & Konsultasi)
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get Smart Production - Jejak Langkah & Sejarah Berdirinya</title>
    <meta name="description" content="Jejak Langkah & Sejarah Berdirinya Get Smart Production. Wadah pengembangan talenta muda, media kreatif, dan produksi audio visual interaktif di Indonesia.">

    <!-- Fonts: Inter & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'Inter', 'sans-serif'],
                    },
                    colors: {
                        dark: {
                            950: '#070b13',
                            900: '#0b101c',
                            850: '#0f1627',
                            800: '#141d33',
                            750: '#1a2540',
                            700: '#223052',
                        },
                        gs: {
                            blue: '#1d68f2',
                            'blue-glow': '#3b82f6',
                            cyan: '#06b6d4',
                            orange: '#f56500',
                            'orange-dark': '#d45000',
                            amber: '#f59e0b',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #070b13; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #1d68f2; }

        .glass-card {
            background: rgba(15, 22, 39, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.07);
        }
        .glass-card-hover {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .glass-card-hover:hover {
            background: rgba(20, 29, 51, 0.85);
            border-color: rgba(29, 104, 242, 0.35);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.5), 0 0 25px -5px rgba(29, 104, 242, 0.2);
        }

        .ambient-glow-blue {
            background: radial-gradient(circle at 50% 50%, rgba(29, 104, 242, 0.18) 0%, rgba(29, 104, 242, 0) 70%);
        }
        .ambient-glow-orange {
            background: radial-gradient(circle at 50% 50%, rgba(245, 101, 0, 0.15) 0%, rgba(245, 101, 0) 0 70%);
        }

        .timeline-line {
            background: linear-gradient(180deg, #1d68f2 0%, #06b6d4 50%, #f56500 100%);
        }
    </style>
</head>
<body class="bg-dark-950 text-slate-200 font-sans antialiased min-h-screen selection:bg-blue-600 selection:text-white"
      x-data="{
          mobileNav: false,
          activeFilter: 'semua',
          consultModal: false,
          consultSuccess: false,
          consultForm: { name: '', school: '', phone: '', service: 'Produksi Media Audio-Visual & Video', message: '' },
          lightboxOpen: false,
          lightboxData: { title: '', tag: '', desc: '', img: '', metric: '' },
          pillarModal: false,
          searchModal: false,
          searchQuery: '',
          openLightbox(title, tag, desc, img, metric) {
              this.lightboxData = { title, tag, desc, img, metric };
              this.lightboxOpen = true;
          },
          sendConsultation() {
              if(!this.consultForm.name) return;
              let waText = `Halo Get Smart Production, perkenalkan saya *${encodeURIComponent(this.consultForm.name)}* dari *${encodeURIComponent(this.consultForm.school || '-')}*. Ingin berkonsultasi mengenai *${encodeURIComponent(this.consultForm.service)}*. Pesan: ${encodeURIComponent(this.consultForm.message || '-')}`;
              window.open(`https://wa.me/6281234567890?text=${waText}`, '_blank');
              this.consultSuccess = true;
              setTimeout(() => { this.consultModal = false; this.consultSuccess = false; }, 2500);
          }
      }">

    <!-- Ambient background glows -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-40 -left-40 w-96 h-96 ambient-glow-blue rounded-full filter blur-3xl opacity-70"></div>
        <div class="absolute top-1/3 -right-40 w-[500px] h-[500px] ambient-glow-orange rounded-full filter blur-3xl opacity-50"></div>
        <div class="absolute bottom-10 left-1/4 w-[600px] h-[600px] ambient-glow-blue rounded-full filter blur-3xl opacity-40"></div>
    </div>

    <!-- =====================================================================
         NAVBAR
         ===================================================================== -->
    <header class="sticky top-0 z-50 bg-dark-950/85 backdrop-blur-xl border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <div class="flex items-center gap-3">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 group">
                        <span class="font-extrabold text-2xl tracking-tight text-white group-hover:text-blue-400 transition-colors">
                            GET<span class="text-blue-500">SMART</span>
                        </span>
                        <span class="bg-gradient-to-r from-orange-500 to-amber-500 text-white text-[10px] font-black tracking-widest px-2 py-0.5 rounded uppercase shadow-sm">
                            PRODUCTION
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden md:flex items-center gap-2 lg:gap-3 text-sm font-medium">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="px-3.5 py-2 text-slate-300 hover:text-white hover:bg-white/5 rounded-lg transition-colors">
                        Home
                    </a>
                    <a href="<?php echo esc_url(home_url('/event')); ?>" class="px-3.5 py-2 text-slate-300 hover:text-white hover:bg-white/5 rounded-lg transition-colors">
                        Event
                    </a>
                    <a href="<?php echo esc_url(home_url('/#program')); ?>" class="px-3.5 py-2 text-slate-300 hover:text-white hover:bg-white/5 rounded-lg transition-colors">
                        Program
                    </a>
                    
                    <!-- ACTIVE: Get Smart Production (Solid Blue Pill) -->
                    <a href="<?php echo esc_url(home_url('/getsmart-production')); ?>" class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-blue-600 text-white font-semibold shadow-lg shadow-blue-600/30 ring-2 ring-blue-400/40 hover:bg-blue-500 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span>Get Smart Production</span>
                    </a>

                    <a href="<?php echo esc_url(home_url('/elearning')); ?>" class="px-3.5 py-2 text-slate-300 hover:text-white hover:bg-white/5 rounded-lg transition-colors">
                        E-Learning
                    </a>
                </nav>

                <!-- Right Header Actions (Search & Account) -->
                <div class="hidden sm:flex items-center gap-3">
                    <button @click="searchModal = true" class="p-2 text-slate-400 hover:text-white hover:bg-white/5 rounded-full transition-colors" title="Pencarian">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>

                    <a href="<?php echo esc_url(home_url('/my-account')); ?>" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-dark-800 hover:bg-dark-750 text-slate-200 border border-white/10 hover:border-blue-500/40 text-xs font-semibold tracking-wide transition-all shadow-sm">
                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <span>Masuk / User</span>
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex items-center md:hidden">
                    <button @click="mobileNav = !mobileNav" class="p-2 text-slate-300 hover:text-white hover:bg-white/10 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path x-show="!mobileNav" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileNav" x-cloak stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileNav" x-cloak x-transition class="md:hidden bg-dark-900 border-b border-white/10 px-4 pt-3 pb-6 space-y-2">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="block px-3 py-2 text-base font-medium text-slate-200 hover:bg-white/5 rounded-lg">Home</a>
            <a href="<?php echo esc_url(home_url('/event')); ?>" class="block px-3 py-2 text-base font-medium text-slate-200 hover:bg-white/5 rounded-lg">Event</a>
            <a href="<?php echo esc_url(home_url('/#program')); ?>" class="block px-3 py-2 text-base font-medium text-slate-200 hover:bg-white/5 rounded-lg">Program</a>
            <a href="<?php echo esc_url(home_url('/getsmart-production')); ?>" class="block px-3 py-2 text-base font-medium bg-blue-600/30 text-blue-300 border border-blue-500/40 rounded-lg">Get Smart Production</a>
            <a href="<?php echo esc_url(home_url('/elearning')); ?>" class="block px-3 py-2 text-base font-medium text-slate-200 hover:bg-white/5 rounded-lg">E-Learning</a>
            <div class="pt-3 border-t border-white/10 flex gap-2">
                <a href="<?php echo esc_url(home_url('/my-account')); ?>" class="w-full text-center py-2.5 rounded-lg bg-blue-600 text-white font-medium text-sm">Masuk / Akun</a>
            </div>
        </div>
    </header>

    <main class="relative z-10">
        <!-- TOP BREADCRUMB & STATUS BAR -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-white/5">
                <div class="inline-flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase bg-orange-500/10 text-orange-400 border border-orange-500/25">
                        <span class="w-2 h-2 rounded-full bg-orange-500 animate-ping"></span>
                        GET SMART PRODUCTION / TENTANG KAMI
                    </span>
                </div>

                <div class="inline-flex items-center gap-2 text-xs text-slate-400 font-medium">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Basis Gerakan: Komunitas Pemuda, Kota & Seluruh Wilayah</span>
                </div>
            </div>
        </section>

        <!-- MAIN HERO: TITLE & SUBTITLE -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-12">
            <div class="max-w-4xl">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-[1.15]">
                    Jejak Langkah & <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-teal-300 bg-clip-text text-transparent">Sejarah Berdirinya</span> Get Smart
                </h1>
                <p class="mt-5 text-base sm:text-lg text-slate-400 max-w-3xl leading-relaxed">
                    Berawal dari semangat kebersamaan dan daya pemuda untuk masa depan pendidikan dan kreativitas yang lebih cerah di seantero Nusantara.
                </p>
            </div>

            <!-- Single Focused Showcase Card -->
            <div class="mt-10">
                <div class="glass-card glass-card-hover rounded-3xl p-8 sm:p-12 border border-white/10 relative overflow-hidden shadow-2xl">
                    <div class="absolute -top-24 -right-24 w-72 h-72 bg-blue-500/15 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-orange-500/10 rounded-full blur-3xl pointer-events-none"></div>

                    <div class="relative z-10">
                        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                            <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-blue-400">
                                <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                                PERSPEKTIF AWAL
                            </div>

                            <div class="flex flex-wrap items-center gap-2.5">
                                <div class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-dark-950/80 text-xs font-semibold text-slate-300 border border-white/10">
                                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.253 18.75m3-18.75h16.5a1.5 1.5 0 011.5 1.5v16.5a1.5 1.5 0 01-1.5 1.5H3.75A1.5 1.5 0 012.25 21V5.25A1.5 1.5 0 013.75 3.75z" />
                                    </svg>
                                    <span>Didirikan Sejak 2021</span>
                                </div>
                                <div class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-gradient-to-r from-orange-600 to-amber-600 text-white text-xs font-bold shadow-md shadow-orange-600/30">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Karya Inovasi Pemuda</span>
                                </div>
                            </div>
                        </div>

                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white leading-snug max-w-4xl">
                            Mendobrak Stigma Riset & Kreativitas Pemuda Menjadi Gerakan Nyata
                        </h2>

                        <p class="mt-5 text-slate-300 text-sm sm:text-base lg:text-lg leading-relaxed max-w-4xl">
                            Gerakan bermula dari sekelompok kecil talenta muda yang meyakini bahwa inovasi pendidikan, karya saintifik, dan riset media digital harus dapat diakses dan dimiliki oleh setiap generasi muda Indonesia tanpa batasan latar belakang dan wilayah.
                        </p>

                        <div class="mt-8 pt-6 border-t border-white/10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                            <div class="flex flex-wrap items-center gap-3">
                                <a href="#linimasa" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-sm shadow-lg shadow-blue-600/30 transition-all hover:scale-[1.02]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                                    </svg>
                                    <span>Ikuti Jejak Gerakan</span>
                                </a>

                                <a href="<?php echo esc_url(home_url('/elearning')); ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-500 hover:to-amber-500 text-white font-bold text-sm shadow-lg shadow-orange-600/25 transition-all hover:scale-[1.02]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                                    </svg>
                                    <span>E-Learning</span>
                                </a>

                                <button @click="consultModal = true" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-slate-200 border border-white/10 font-semibold text-sm transition-all">
                                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v5.998z" />
                                    </svg>
                                    <span>Konsultasi</span>
                                </button>
                            </div>

                            <div class="flex items-center gap-2.5 text-xs text-slate-400 font-mono">
                                <span class="px-3 py-1.5 rounded-lg bg-white/5 text-slate-300">#CreativeProduction</span>
                                <span class="px-3 py-1.5 rounded-lg bg-white/5 text-slate-300">#EducAction</span>
                                <span class="px-3 py-1.5 rounded-lg bg-white/5 text-slate-300">#PemudaKreatif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION: AWAL MULA SEBUAH GAGASAN -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 border-t border-white/5">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-blue-500/10 text-blue-400 border border-blue-500/25 mb-4">
                LATAR BELAKANG
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <div class="lg:col-span-7">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight">
                        Awal Mula Sebuah Gagasan
                    </h2>

                    <div class="mt-6 space-y-4 text-slate-300 text-sm sm:text-base leading-relaxed">
                        <p>
                            Pada pertengahan tahun 2021, di tengah keterbatasan interaksi fisik dunia pendidikan, ruang-ruang diskusi pembelajaran inovatif justru membara. Sekelompok pemuda berinisiatif mendokumentasikan pemikiran dan eksplorasi karya mereka dalam bentuk panduan visual dan bimbingan bersama; menggapai asa pemuda yang haus mencari wadah bebas bereksplorasi.
                        </p>
                        <p>
                            Dari sinilah <strong class="text-white">Get Smart</strong> lahir sebagai inisiatif independen. Kami memadukan metodologi karya yang teruji dengan kemasan produksi media digital masa kini. Gagasan yang rumit diolah menjadi narasi visual yang memikat, merangkul generasi sekarang melalui pelatihan interaktif serta wadah jejaring yang hangat bagi siapa saja yang ingin memulai langkah berkarya perdananya.
                        </p>
                    </div>

                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="p-4 rounded-2xl bg-dark-900/90 border border-white/5">
                            <span class="text-2xl font-black text-blue-400">100%</span>
                            <div class="text-xs font-bold text-white mt-1">Inisiatif Mandiri Pemuda</div>
                            <div class="text-[11px] text-slate-400 mt-0.5">Tumbuh dari Komunitas</div>
                        </div>

                        <div class="p-4 rounded-2xl bg-dark-900/90 border border-white/5">
                            <span class="text-2xl font-black text-cyan-400">Terpadu</span>
                            <div class="text-xs font-bold text-white mt-1">Edukasi & Publikasi IT</div>
                            <div class="text-[11px] text-slate-400 mt-0.5">Media Kreatif Terkini</div>
                        </div>

                        <div class="p-4 rounded-2xl bg-dark-900/90 border border-white/5">
                            <span class="text-2xl font-black text-orange-400">Nasional</span>
                            <div class="text-xs font-bold text-white mt-1">Sabang s/d Merauke</div>
                            <div class="text-[11px] text-slate-400 mt-0.5">Jejaring Luas Se-Indonesia</div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="glass-card rounded-3xl p-6 sm:p-8 border border-white/10 relative overflow-hidden shadow-2xl">
                        <div class="w-12 h-12 rounded-2xl bg-orange-500/15 border border-orange-500/30 flex items-center justify-center text-orange-400 text-2xl font-serif font-black mb-5 shadow-inner">
                            “
                        </div>

                        <blockquote class="text-xl sm:text-2xl font-bold text-white leading-snug">
                            "Tentukan Caramu, Raih Kebersamaan"
                        </blockquote>
                        <p class="mt-2 text-xs sm:text-sm text-slate-400">
                            Bersama, belajar, dan berkolaborasi untuk masa depan yang lebih baik.
                        </p>

                        <div class="my-6 border-t border-white/10"></div>

                        <div>
                            <div class="text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-4">
                                CAPAIAN RANGKUMAN KOMUNITAS
                            </div>

                            <div class="grid grid-cols-3 gap-3 text-center">
                                <div class="p-3 rounded-xl bg-dark-950/60 border border-white/5">
                                    <div class="text-xl sm:text-2xl font-black text-blue-400">5.000+</div>
                                    <div class="text-[10px] sm:text-xs text-slate-300 font-medium mt-1">Alumni Peserta</div>
                                </div>
                                <div class="p-3 rounded-xl bg-dark-950/60 border border-white/5">
                                    <div class="text-xl sm:text-2xl font-black text-cyan-400">120+</div>
                                    <div class="text-[10px] sm:text-xs text-slate-300 font-medium mt-1">Kota & Wilayah</div>
                                </div>
                                <div class="p-3 rounded-xl bg-dark-950/60 border border-white/5">
                                    <div class="text-xl sm:text-2xl font-black text-orange-400">24</div>
                                    <div class="text-[10px] sm:text-xs text-slate-300 font-medium mt-1">Provinsi</div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <div class="flex justify-between text-xs text-slate-400 font-medium mb-1.5">
                                    <span>Jangkauan Gerakan Indonesia</span>
                                    <span class="text-orange-400 font-bold">84% Target Tercapai</span>
                                </div>
                                <div class="w-full h-2 rounded-full bg-dark-950/80 overflow-hidden border border-white/5">
                                    <div class="h-full bg-gradient-to-r from-blue-500 via-cyan-400 to-orange-500 rounded-full transition-all duration-1000" style="width: 84%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION: LINI MASA PERJALANAN KAMI -->
        <section id="linimasa" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-t border-white/5">
            <div class="text-center max-w-3xl mx-auto">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-orange-500/10 text-orange-400 border border-orange-500/25 mb-4">
                    PERJALANAN BERKELANJUTAN
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                    Lini Masa Perjalanan Kami
                </h2>
                <p class="mt-4 text-slate-400 text-sm sm:text-base leading-relaxed">
                    Transformasi bertahap dari sebuah lingkaran riset dan kreativitas pemuda hingga menjadi ekosistem produksi konten dan pendidikan kreatif berskala nasional.
                </p>
            </div>

            <div class="mt-16 relative">
                <div class="hidden lg:block absolute left-1/2 top-4 bottom-4 w-0.5 -translate-x-1/2 timeline-line opacity-50"></div>
                <div class="lg:hidden absolute left-5 top-4 bottom-4 w-0.5 timeline-line opacity-50"></div>

                <div class="space-y-12">
                    <div class="relative flex flex-col lg:flex-row items-center">
                        <div class="w-full lg:w-1/2 lg:pr-12 pl-12 lg:pl-0">
                            <div class="glass-card glass-card-hover rounded-2xl p-6 border border-white/10 relative">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-black bg-blue-600 text-white mb-2">Tahun 2021</span>
                                <h3 class="text-xl font-bold text-white">Inisiasi & Gerakan Awal</h3>
                                <p class="mt-2 text-sm text-slate-300 leading-relaxed">
                                    Lahir dari ruang-ruang diskusi kelompok kreatif pemuda di tingkat sekolah dan kampus. Fokus awal menyatukan semangat dan menyelaraskan karya kreatif serta penelitian dasar berbasis pendidikan karakter di sekolah-sekolah di pelosok daerah.
                                </p>
                                <div class="mt-4 flex flex-wrap gap-2 text-xs">
                                    <span class="px-2 py-0.5 rounded bg-white/5 text-blue-400">#InkubasiKreatif</span>
                                    <span class="px-2 py-0.5 rounded bg-white/5 text-cyan-400">#InspirasiKelas</span>
                                    <span class="px-2 py-0.5 rounded bg-white/5 text-slate-300">#KomunitasMuda</span>
                                </div>
                            </div>
                        </div>

                        <div class="absolute left-5 lg:left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-dark-900 border-2 border-blue-500 flex items-center justify-center z-10 shadow-lg shadow-blue-500/40">
                            <span class="w-2.5 h-2.5 rounded-full bg-blue-400 animate-ping"></span>
                        </div>

                        <div class="w-full lg:w-1/2 lg:pl-12 pl-12 lg:pl-0 mt-4 lg:mt-0">
                            <div class="p-5 rounded-2xl bg-dark-900/60 border border-blue-500/20">
                                <div class="text-xs font-bold uppercase tracking-wider text-blue-400">MILESTONE AWAL</div>
                                <h4 class="text-base font-bold text-white mt-1">"10 Perwakilan Sekolah Lintas Tingkat Nasional"</h4>
                                <p class="text-xs text-slate-400 mt-1">Pada semester pertama diluncurkan, inisiatif Get Smart berhasil merangkul perwakilan dari 10 sekolah lintas provinsi dengan apresiasi positif.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative flex flex-col lg:flex-row-reverse items-center">
                        <div class="w-full lg:w-1/2 lg:pl-12 pl-12 lg:pl-0">
                            <div class="p-5 rounded-2xl bg-dark-900/60 border border-cyan-500/20">
                                <div class="text-xs font-bold uppercase tracking-wider text-cyan-400">MILESTONE MEDIA</div>
                                <h4 class="text-base font-bold text-white mt-1">"Studio Produksi Mandiri & Media Digital Pertama"</h4>
                                <p class="text-xs text-slate-400 mt-1">Rilis 15+ video tutorial karya kreatif berformat edukasi yang ditonton lebih dari 50.000 pelajar daring.</p>
                            </div>
                        </div>

                        <div class="absolute left-5 lg:left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-dark-900 border-2 border-cyan-500 flex items-center justify-center z-10 shadow-lg shadow-cyan-500/40">
                            <span class="w-2.5 h-2.5 rounded-full bg-cyan-400"></span>
                        </div>

                        <div class="w-full lg:w-1/2 lg:pr-12 pl-12 lg:pl-0 mt-4 lg:mt-0">
                            <div class="text-right text-xs text-slate-500 hidden lg:block">Pondasi Media Digital Kreatif</div>
                        </div>
                    </div>

                    <div class="relative flex flex-col lg:flex-row-reverse items-center">
                        <div class="w-full lg:w-1/2 lg:pl-12 pl-12 lg:pl-0">
                            <div class="glass-card glass-card-hover rounded-2xl p-6 border border-white/10 relative">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-black bg-cyan-600 text-white mb-2">Tahun 2022</span>
                                <h3 class="text-xl font-bold text-white">Peluncuran Get Smart Production</h3>
                                <p class="mt-2 text-sm text-slate-300 leading-relaxed">
                                    Merespons tingginya kebutuhan akan media yang menyajikan edukasi publik berkualitas, divisi mandiri resmi didirikan: <strong>Get Smart Production</strong>. Menghadirkan video panduan berkonten interaktif, dokumenter mini, perlombaan karya, dan e-learning interaktif.
                                </p>
                                <div class="mt-4 flex flex-wrap gap-2 text-xs">
                                    <span class="px-2 py-0.5 rounded bg-white/5 text-cyan-400">#CreativeStudio</span>
                                    <span class="px-2 py-0.5 rounded bg-white/5 text-blue-400">#AudioVisualKreatif</span>
                                    <span class="px-2 py-0.5 rounded bg-white/5 text-slate-300">#SmartLearning</span>
                                </div>
                            </div>
                        </div>

                        <div class="absolute left-5 lg:left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-dark-900 border-2 border-cyan-400 flex items-center justify-center z-10 shadow-lg shadow-cyan-400/40">
                            <span class="w-2.5 h-2.5 rounded-full bg-cyan-300 animate-ping"></span>
                        </div>

                        <div class="w-full lg:w-1/2 lg:pr-12 pl-12 lg:pl-0 mt-4 lg:mt-0">
                            <div class="p-5 rounded-2xl bg-dark-900/60 border border-white/5 text-left lg:text-right">
                                <div class="text-xs font-bold uppercase tracking-wider text-slate-400">STANDARISASI AUDIO-VISUAL</div>
                                <h4 class="text-base font-bold text-white mt-1">Eksplorasi Format Video Sinematik</h4>
                                <p class="text-xs text-slate-400 mt-1">Format infografis dan dokumenter kreatif siswa diapresiasi pembimbing tingkat nasional.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative flex flex-col lg:flex-row items-center">
                        <div class="w-full lg:w-1/2 lg:pr-12 pl-12 lg:pl-0">
                            <div class="glass-card glass-card-hover rounded-2xl p-6 border border-white/10 relative">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-black bg-orange-600 text-white mb-2">Tahun 2023</span>
                                <h3 class="text-xl font-bold text-white">Ekspansi Program & E-Learning</h3>
                                <p class="mt-2 text-sm text-slate-300 leading-relaxed">
                                    Jangkauan diperluas hingga ke 5 pulau besar di Indonesia. Membuka sistem pembelajaran mandiri berkonsep daring interaktif, pendampingan proposal karya/kreativitas remaja, dan webinar bersama praktisi unggul berbagai industri ternama.
                                </p>
                                <div class="mt-4 flex flex-wrap gap-2 text-xs">
                                    <span class="px-2 py-0.5 rounded bg-white/5 text-orange-400">#PlatformELearning</span>
                                    <span class="px-2 py-0.5 rounded bg-white/5 text-amber-400">#PendampinganOnline</span>
                                    <span class="px-2 py-0.5 rounded bg-white/5 text-slate-300">#MentorNasional</span>
                                </div>
                            </div>
                        </div>

                        <div class="absolute left-5 lg:left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-dark-900 border-2 border-orange-500 flex items-center justify-center z-10 shadow-lg shadow-orange-500/40">
                            <span class="w-2.5 h-2.5 rounded-full bg-orange-400"></span>
                        </div>

                        <div class="w-full lg:w-1/2 lg:pl-12 pl-12 lg:pl-0 mt-4 lg:mt-0">
                            <div class="p-5 rounded-2xl bg-dark-900/60 border border-orange-500/20">
                                <div class="text-xs font-bold uppercase tracking-wider text-orange-400">MILESTONE KUNCI</div>
                                <h4 class="text-base font-bold text-white mt-1">"2.500+ Pelajar Terakreditasi Mandiri"</h4>
                                <p class="text-xs text-slate-400 mt-1">Sistem manajemen belajar (LMS) Get Smart mencatatkan ribuan portofolio siswa yang lulus kurasi karya kreatif sekolah menengah.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative flex flex-col lg:flex-row-reverse items-center">
                        <div class="w-full lg:w-1/2 lg:pl-12 pl-12 lg:pl-0">
                            <div class="glass-card glass-card-hover rounded-2xl p-6 border border-white/10 relative">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-black bg-gradient-to-r from-blue-600 to-indigo-600 text-white mb-2">2024 - Sekarang</span>
                                <h3 class="text-xl font-bold text-white">Menuju Ekosistem Terpadu</h3>
                                <p class="mt-2 text-sm text-slate-300 leading-relaxed">
                                    Bertransformasi menjadi ekosistem pembelajaran dan talenta muda holistik: memadukan inkubasi karya aplikatif, rumah produksi audio-visual, hingga memvalidasi kreasi lokal untuk bersaing di kancah nasional maupun internasional.
                                </p>
                                <div class="mt-4 flex flex-wrap gap-2 text-xs">
                                    <span class="px-2 py-0.5 rounded bg-white/5 text-blue-400">#EkosistemKreatif</span>
                                    <span class="px-2 py-0.5 rounded bg-white/5 text-cyan-400">#KolaborasiNasional</span>
                                    <span class="px-2 py-0.5 rounded bg-white/5 text-slate-300">#InovasiMasaDepan</span>
                                </div>
                            </div>
                        </div>

                        <div class="absolute left-5 lg:left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-dark-900 border-2 border-indigo-400 flex items-center justify-center z-10 shadow-lg shadow-indigo-400/40">
                            <span class="w-2.5 h-2.5 rounded-full bg-indigo-300 animate-ping"></span>
                        </div>

                        <div class="w-full lg:w-1/2 lg:pr-12 pl-12 lg:pl-0 mt-4 lg:mt-0">
                            <div class="p-5 rounded-2xl bg-dark-900/60 border border-white/5 text-left lg:text-right">
                                <div class="text-xs font-bold uppercase tracking-wider text-indigo-400">VISI TERBUKA</div>
                                <h4 class="text-base font-bold text-white mt-1">"Hub Terintegrasi Pemuda & Inovasi Indonesia"</h4>
                                <p class="text-xs text-slate-400 mt-1">Penguatan kolaborasi berkelanjutan dengan komunitas, institusi pendidikan, dan jaringan industri kreatif nasional.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION: VISI & NILAI INTI GERAKAN -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-t border-white/5">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-12">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-blue-500/10 text-blue-400 border border-blue-500/25 mb-3">
                        PRINSIP NILAI
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-black text-white">Visi & Nilai Inti Gerakan</h2>
                    <p class="mt-2 text-slate-400 text-sm max-w-xl">
                        Prinsip-prinsip kokoh yang menjadi kompas penuntun setiap langkah pergerakan dan kreasi kami.
                    </p>
                </div>

                <button @click="pillarModal = true" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-400 hover:text-blue-300 transition-colors group">
                    <span>+ Simak Pilar Keberlanjutan</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="glass-card glass-card-hover rounded-2xl p-6 border border-white/10 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-blue-500/15 border border-blue-500/30 text-blue-400 flex items-center justify-center mb-5">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Inklusif & Kolaboratif</h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-300 leading-relaxed">
                            Membuka kesempatan seluas-luasnya bagi jejaring kreatif tanpa memandang sekat geografis, status ekonomi, maupun tingkat almamater. Setiap anak muda berhak belajar dan berkarya setara.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-white/5">
                        <button @click="openLightbox('Inklusif & Kolaboratif', 'Pilar 1', 'Membuka ruang kolaborasi seluas-luasnya bagi seluruh pemuda Indonesia.', 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=800', '120+ Kota')" class="text-xs font-semibold text-blue-400 hover:text-blue-300 inline-flex items-center gap-1 group">
                            <span>Baca Ekosistem</span>
                            <span class="group-hover:translate-x-1 transition-transform">→</span>
                        </button>
                    </div>
                </div>

                <div class="glass-card glass-card-hover rounded-2xl p-6 border border-white/10 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-orange-500/15 border border-orange-500/30 text-orange-400 flex items-center justify-center mb-5">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Karya & Inovasi</h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-300 leading-relaxed">
                            Mengedepankan orisinalitas riset dan karya aplikatif yang berdampak nyata bagi masyarakat, mampu memecahkan masalah lokal secara kreatif dan bertanggung jawab.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-white/5">
                        <button @click="openLightbox('Karya & Inovasi', 'Pilar 2', 'Karya kreatif dan riset aplikatif untuk memecahkan problematika nyata.', 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&q=80&w=800', '1.800+ Karya')" class="text-xs font-semibold text-orange-400 hover:text-orange-300 inline-flex items-center gap-1 group">
                            <span>Dampak Nyata</span>
                            <span class="group-hover:translate-x-1 transition-transform">→</span>
                        </button>
                    </div>
                </div>

                <div class="glass-card glass-card-hover rounded-2xl p-6 border border-white/10 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-cyan-500/15 border border-cyan-500/30 text-cyan-400 flex items-center justify-center mb-5">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.504-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.004 0V5.625c0-.621-.504-1.125-1.125-1.125H9.375c-.621 0-1.125.504-1.125 1.125v6.75" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Karakter Unggul</h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-300 leading-relaxed">
                            Menanamkan integritas kejujuran karya, ketangguhan mental menghadapi tantangan proses kreatif, serta etos disiplin berkarya sebagai fondasi generasi penerus masa depan.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-white/5">
                        <button @click="openLightbox('Karakter Unggul', 'Pilar 3', 'Membangun etos kerja keras dan kejujuran karya pemuda.', 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=800', '100% Integritas')" class="text-xs font-semibold text-cyan-400 hover:text-cyan-300 inline-flex items-center gap-1 group">
                            <span>Etika & Integritas</span>
                            <span class="group-hover:translate-x-1 transition-transform">→</span>
                        </button>
                    </div>
                </div>

                <div class="glass-card glass-card-hover rounded-2xl p-6 border border-white/10 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-indigo-500/15 border border-indigo-500/30 text-indigo-400 flex items-center justify-center mb-5">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Pemberdayaan</h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-300 leading-relaxed">
                            Membekali skill relevan di era digital: produksi konten, storytelling visual, publikasi ilmiah kreatif, serta fasilitasi komunikasi ide karya melalui ruang presentasi yang kredibel dan bermakna sosial.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-white/5">
                        <button @click="openLightbox('Pemberdayaan Pemuda', 'Pilar 4', 'Menumbuhkan kemandirian generasi muda lewat keahlian aplikatif.', 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&q=80&w=800', '2.500+ Terakreditasi')" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 inline-flex items-center gap-1 group">
                            <span>Mandiri Berdikari</span>
                            <span class="group-hover:translate-x-1 transition-transform">→</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION: JEJAK AKTIVITAS & PRODUKSI -->
        <section id="aktivitas" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-t border-white/5">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-orange-500/10 text-orange-400 border border-orange-500/25 mb-3">
                        DOKUMENTASI NYATA
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-black text-white">Jejak Aktivitas & Produksi</h2>
                    <p class="mt-2 text-slate-400 text-sm max-w-xl">
                        Momen nyata pergerakan kami di studio, ruang bimbingan kreatif, pameran inovasi, dan workshop daerah.
                    </p>
                </div>

                <a href="#hubungi" class="inline-flex items-center gap-2 text-sm font-semibold text-orange-400 hover:text-orange-300 transition-colors group">
                    <span>Lihat Portofolio Lengkap</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div class="flex flex-wrap gap-2 mb-8">
                <button @click="activeFilter = 'semua'" :class="activeFilter === 'semua' ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'bg-dark-800 text-slate-400 hover:text-white border border-white/5'" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all">
                    Semua Momen
                </button>
                <button @click="activeFilter = 'riset'" :class="activeFilter === 'riset' ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'bg-dark-800 text-slate-400 hover:text-white border border-white/5'" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all">
                    Bimbingan Kreatif
                </button>
                <button @click="activeFilter = 'studio'" :class="activeFilter === 'studio' ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'bg-dark-800 text-slate-400 hover:text-white border border-white/5'" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all">
                    Produksi Studio
                </button>
                <button @click="activeFilter = 'pameran'" :class="activeFilter === 'pameran' ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'bg-dark-800 text-slate-400 hover:text-white border border-white/5'" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all">
                    Pameran Inovasi
                </button>
                <button @click="activeFilter = 'workshop'" :class="activeFilter === 'workshop' ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'bg-dark-800 text-slate-400 hover:text-white border border-white/5'" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all">
                    Workshop & Pelatihan
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div x-show="activeFilter === 'semua' || activeFilter === 'riset'"
                     x-transition
                     @click="openLightbox('Diskusi & Bimbingan Kreatif', 'Bimbingan Kreatif', 'Mentoring intensif tim muda dalam merumuskan konsep kreatif, naskah, dan pengemasan konten.', 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&q=80&w=900', '3.000+ KONSULTASI')"
                     class="group cursor-pointer rounded-2xl overflow-hidden glass-card glass-card-hover border border-white/10 flex flex-col">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&q=80&w=900"
                             alt="Diskusi & Bimbingan Kreatif"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-dark-950 via-transparent to-transparent"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wide bg-blue-600/90 text-white shadow">
                            💡 BIMBINGAN KREATIF
                        </span>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-white text-base group-hover:text-blue-400 transition-colors">Diskusi & Bimbingan Kreatif</h3>
                            <p class="mt-2 text-xs text-slate-300 leading-relaxed">
                                Mentoring intensif tim muda dalam merumuskan konsep kreatif, naskah, dan pengemasan konten.
                            </p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-white/5 flex items-center justify-between text-[11px] font-bold text-blue-400">
                            <span>3.000+ KONSULTASI</span>
                            <span>↗</span>
                        </div>
                    </div>
                </div>

                <div x-show="activeFilter === 'semua' || activeFilter === 'studio'"
                     x-transition
                     @click="openLightbox('Produksi Media & Konten', 'Produksi Studio', 'Pembuatan video edukasi dan materi audio-visual berstandar sinematik yang informatif bagi publik.', 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&q=80&w=900', '1.800+ PRODUKSI VIDEO')"
                     class="group cursor-pointer rounded-2xl overflow-hidden glass-card glass-card-hover border border-white/10 flex flex-col">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&q=80&w=900"
                             alt="Produksi Media & Konten"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-dark-950 via-transparent to-transparent"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wide bg-cyan-600/90 text-white shadow">
                            🎬 PRODUKSI STUDIO
                        </span>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-white text-base group-hover:text-cyan-400 transition-colors">Produksi Media & Konten</h3>
                            <p class="mt-2 text-xs text-slate-300 leading-relaxed">
                                Pembuatan video edukasi dan materi audio-visual berstandar sinematik yang informatif bagi publik.
                            </p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-white/5 flex items-center justify-between text-[11px] font-bold text-cyan-400">
                            <span>1.800+ PRODUKSI VIDEO</span>
                            <span>↗</span>
                        </div>
                    </div>
                </div>

                <div x-show="activeFilter === 'semua' || activeFilter === 'pameran'"
                     x-transition
                     @click="openLightbox('Kompetisi & Gelar Karya', 'Pameran Inovasi', 'Pameran karya dan kreativitas pemuda terpilih di hadapan juri ahli dari praktisi dan industri kreatif.', 'https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&q=80&w=900', '12 FESTIVAL & PAMERAN')"
                     class="group cursor-pointer rounded-2xl overflow-hidden glass-card glass-card-hover border border-white/10 flex flex-col">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&q=80&w=900"
                             alt="Kompetisi & Gelar Karya"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-dark-950 via-transparent to-transparent"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wide bg-orange-600/90 text-white shadow">
                            🏆 PAMERAN INOVASI
                        </span>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-white text-base group-hover:text-orange-400 transition-colors">Kompetisi & Gelar Karya</h3>
                            <p class="mt-2 text-xs text-slate-300 leading-relaxed">
                                Pameran karya dan kreativitas pemuda terpilih di hadapan juri ahli dari praktisi dan industri kreatif.
                            </p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-white/5 flex items-center justify-between text-[11px] font-bold text-orange-400">
                            <span>12 FESTIVAL & PAMERAN</span>
                            <span>↗</span>
                        </div>
                    </div>
                </div>

                <div x-show="activeFilter === 'semua' || activeFilter === 'workshop'"
                     x-transition
                     @click="openLightbox('Workshop & Pelatihan', 'Pelatihan & Workshop', 'Pelatihan kepemimpinan, broadcasting, videografi, dan media digital di berbagai institusi.', 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&q=80&w=900', '75+ KELAS & WORKSHOP')"
                     class="group cursor-pointer rounded-2xl overflow-hidden glass-card glass-card-hover border border-white/10 flex flex-col">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&q=80&w=900"
                             alt="Workshop & Pelatihan"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-dark-950 via-transparent to-transparent"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wide bg-amber-600/90 text-white shadow">
                            💡 WORKSHOP
                        </span>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-white text-base group-hover:text-amber-400 transition-colors">Workshop & Pelatihan</h3>
                            <p class="mt-2 text-xs text-slate-300 leading-relaxed">
                                Pelatihan kepemimpinan, broadcasting, videografi, dan media digital di berbagai institusi.
                            </p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-white/5 flex items-center justify-between text-[11px] font-bold text-amber-400">
                            <span>75+ KELAS & WORKSHOP</span>
                            <span>↗</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION: INGIN JADI BAGIAN DARI CERITA INI? -->
        <section id="hubungi" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-dark-900 via-blue-950/60 to-dark-950 border border-blue-500/25 p-8 sm:p-14 shadow-2xl">
                <div class="absolute -top-32 -right-32 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-orange-500/20 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10 max-w-3xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-orange-500/10 text-orange-400 border border-orange-500/25 mb-4">
                        IKUTI JEJAK KEBERSAMAAN
                    </div>

                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight">
                        Ingin Jadi Bagian dari Cerita Ini?
                    </h2>

                    <p class="mt-4 text-slate-300 text-sm sm:text-base leading-relaxed">
                        Bergabunglah bersama ribuan pemuda lainnya dalam berbagai program workshop, kreasi aplikatif, dan produksi kreatif Get Smart Production. Mari bersama menata masa depan kebersamaan dan prestasi seantero Indonesia.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <button @click="consultModal = true" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-sm shadow-xl shadow-blue-600/35 transition-all hover:scale-[1.02]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                            </svg>
                            <span>Gabung Program</span>
                        </button>

                        <button @click="consultModal = true" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold text-sm border border-white/15 transition-all hover:scale-[1.02]">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v5.998z" />
                            </svg>
                            <span>Hubungi Tim & Konsultasi</span>
                        </button>
                    </div>

                    <div class="mt-10 p-4 rounded-2xl bg-dark-950/70 border border-white/5 text-xs text-slate-300 leading-relaxed">
                        <strong class="text-white">Apresiasi Sangat Terbuka:</strong> Untuk kolaborasi institusi maupun membimbing kegiatan kreatif anak-anak muda di seluruh pelosok tanah air Indonesia yang butuh pendampingan organisasi Get Smart Production secara berkala.
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark-950 border-t border-white/5 pt-16 pb-12 text-sm text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-white/5">
                <div class="lg:col-span-2">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center gap-2">
                        <span class="font-extrabold text-2xl tracking-tight text-white">GET<span class="text-blue-500">SMART</span></span>
                        <span class="bg-blue-600 text-white text-[10px] font-black tracking-widest px-2 py-0.5 rounded uppercase">PRODUCTION</span>
                    </a>
                    <p class="mt-4 text-xs sm:text-sm text-slate-400 max-w-sm leading-relaxed">
                        Eksplorasi wadah pengembangan riset kreatif terdepan untuk membimbing generasi muda Indonesia.
                    </p>
                </div>

                <div>
                    <h3 class="text-xs font-bold tracking-wider uppercase text-white mb-4">NAVIGASI</h3>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-blue-400 transition-colors">Home</a></li>
                        <li><a href="#home" class="hover:text-blue-400 transition-colors">Tentang Kami</a></li>
                        <li><a href="#aktivitas" class="hover:text-blue-400 transition-colors">Galeri Program</a></li>
                        <li><a href="<?php echo esc_url(home_url('/elearning')); ?>" class="hover:text-blue-400 transition-colors">E-Learning Hub</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-bold tracking-wider uppercase text-white mb-4">CREATIVE STUDIO</h3>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="#aktivitas" class="hover:text-blue-400 transition-colors">Produksi Video Riset</a></li>
                        <li><a href="#linimasa" class="hover:text-blue-400 transition-colors">Pelatihan Berbagi</a></li>
                        <li><a href="#aktivitas" class="hover:text-blue-400 transition-colors">Kelas Workshop</a></li>
                        <li><a href="#hubungi" class="hover:text-blue-400 transition-colors">Konsultasi Kreatif Pemuda</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-bold tracking-wider uppercase text-white mb-4">ACCOUNT & ACCESS</h3>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="<?php echo esc_url(home_url('/my-account')); ?>" class="hover:text-blue-400 transition-colors">My Account</a></li>
                        <li><a href="<?php echo esc_url(home_url('/my-account')); ?>" class="hover:text-blue-400 transition-colors">Sign In</a></li>
                        <li><a href="<?php echo esc_url(home_url('/event')); ?>" class="hover:text-blue-400 transition-colors">Media Portal</a></li>
                        <li><a href="https://wa.me/6281234567890" target="_blank" class="hover:text-blue-400 transition-colors">Support Center</a></li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>&copy; 2024 &ndash; 2026 PT Get Smart Production Indonesia. All rights reserved.</p>
                <div class="flex items-center gap-6">
                    <a href="#" class="hover:text-slate-300 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-slate-300 transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-slate-300 transition-colors">Contact & Conduct</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- MODAL: KONSULTASI / GABUNG PROGRAM -->
    <div x-show="consultModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-dark-950/80 backdrop-blur-md transition-opacity" @click="consultModal = false"></div>
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-3xl bg-dark-900 border border-white/10 p-6 sm:p-8 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <button @click="consultModal = false" class="absolute top-5 right-5 text-slate-400 hover:text-white p-1">✕</button>
                <div class="text-xs font-bold uppercase text-blue-400 tracking-wider mb-2">FORMULIR KONSULTASI</div>
                <h3 class="text-2xl font-black text-white" id="modal-title">Gabung / Konsultasi Program</h3>
                <p class="mt-1 text-xs text-slate-400">Tim Get Smart Production akan segera terhubung dengan Anda melalui WhatsApp.</p>

                <div x-show="consultSuccess" class="mt-4 p-4 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 text-xs font-medium">
                    ✓ Pesan konsultasi berhasil disiapkan! WhatsApp sedang terbuka...
                </div>

                <form @submit.prevent="sendConsultation" class="mt-5 space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">Nama Lengkap *</label>
                        <input type="text" x-model="consultForm.name" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-2.5 rounded-xl bg-dark-950 border border-white/10 text-white text-sm focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">Instansi / Komunitas</label>
                        <input type="text" x-model="consultForm.school" placeholder="Contoh: Komunitas Muda / Mandiri" class="w-full px-4 py-2.5 rounded-xl bg-dark-950 border border-white/10 text-white text-sm focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">Bidang Layanan</label>
                        <select x-model="consultForm.service" class="w-full px-4 py-2.5 rounded-xl bg-dark-950 border border-white/10 text-white text-sm focus:outline-none focus:border-blue-500">
                            <option value="Produksi Media Audio-Visual & Video">Produksi Media Audio-Visual & Video</option>
                            <option value="Bimbingan Kreatif & Karya Pemuda">Bimbingan Kreatif & Karya Pemuda</option>
                            <option value="Workshop & Pelatihan Sekolah">Workshop & Pelatihan Kelas Sekolah</option>
                            <option value="Kemitraan & Event Gelar Karya">Kemitraan Pameran & Gelar Karya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">Pesan / Topik Diskusi</label>
                        <textarea x-model="consultForm.message" rows="3" placeholder="Ceritakan kebutuhan atau pertanyaan Anda..." class="w-full px-4 py-2.5 rounded-xl bg-dark-950 border border-white/10 text-white text-sm focus:outline-none focus:border-blue-500"></textarea>
                    </div>
                    <div class="pt-2 flex items-center justify-end gap-3">
                        <button type="button" @click="consultModal = false" class="px-5 py-2.5 rounded-xl text-slate-400 hover:text-white text-xs font-bold">Batal</button>
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold shadow-lg shadow-blue-600/30">Kirim ke WhatsApp →</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL: PILAR KEBERLANJUTAN -->
    <div x-show="pillarModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto">
        <div class="fixed inset-0 bg-dark-950/80 backdrop-blur-md transition-opacity" @click="pillarModal = false"></div>
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="relative transform overflow-hidden rounded-3xl bg-dark-900 border border-white/10 p-6 sm:p-8 max-w-2xl w-full text-left shadow-2xl">
                <button @click="pillarModal = false" class="absolute top-5 right-5 text-slate-400 hover:text-white p-1">✕</button>
                <div class="text-xs font-bold uppercase text-blue-400 tracking-wider mb-2">4 PILAR KEBERLANJUTAN</div>
                <h3 class="text-2xl font-black text-white">Fondasi Ekosistem Get Smart Production</h3>
                <div class="mt-6 space-y-4 text-xs sm:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-dark-950 border border-white/5">
                        <strong class="text-blue-400">1. Aksesibilitas Terbuka:</strong> Menjangkau talenta muda di berbagai wilayah dengan materi pembelajaran kreatif yang mudah dicerna dan terjangkau.
                    </div>
                    <div class="p-4 rounded-xl bg-dark-950 border border-white/5">
                        <strong class="text-orange-400">2. Relevansi Industri Kreatif:</strong> Memastikan metodologi karya dipadukan dengan keterampilan desain, animasi, sinematografi, dan storytelling digital masa kini.
                    </div>
                    <div class="p-4 rounded-xl bg-dark-950 border border-white/5">
                        <strong class="text-cyan-400">3. Pendampingan Berkelanjutan:</strong> Menjamin setiap alumni program memiliki akses terhadap jejaring mentor, kompetisi, dan portofolio profesional.
                    </div>
                    <div class="p-4 rounded-xl bg-dark-950 border border-white/5">
                        <strong class="text-emerald-400">4. Dampak Sosial Terukur:</strong> Setiap produk kreasi dan karya diarahkan untuk memecahkan problematika lingkungan, sosial, dan edukasi lokal.
                    </div>
                </div>
                <div class="mt-6 text-right">
                    <button @click="pillarModal = false" class="px-5 py-2 rounded-xl bg-blue-600 text-white font-bold text-xs">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: LIGHTBOX -->
    <div x-show="lightboxOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto">
        <div class="fixed inset-0 bg-dark-950/90 backdrop-blur-md transition-opacity" @click="lightboxOpen = false"></div>
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="relative transform overflow-hidden rounded-3xl bg-dark-900 border border-white/10 max-w-2xl w-full text-left shadow-2xl">
                <button @click="lightboxOpen = false" class="absolute top-4 right-4 z-10 w-8 h-8 rounded-full bg-dark-950/80 text-white flex items-center justify-center hover:bg-red-600 transition-colors">✕</button>
                <div class="relative h-72 sm:h-80 overflow-hidden bg-black">
                    <img :src="lightboxData.img" :alt="lightboxData.title" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-dark-900 via-transparent to-transparent"></div>
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-black bg-blue-600 text-white" x-text="lightboxData.tag"></span>
                </div>
                <div class="p-6 sm:p-8">
                    <div class="flex items-center justify-between text-xs text-orange-400 font-bold mb-2">
                        <span x-text="lightboxData.metric"></span>
                        <span>DOKUMENTASI RESMI</span>
                    </div>
                    <h3 class="text-2xl font-black text-white" x-text="lightboxData.title"></h3>
                    <p class="mt-3 text-slate-300 text-sm leading-relaxed" x-text="lightboxData.desc"></p>
                    <div class="mt-6 pt-4 border-t border-white/5 flex items-center justify-between">
                        <button @click="consultModal = true; lightboxOpen = false;" class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold">
                            Konsultasikan Kegiatan Ini
                        </button>
                        <button @click="lightboxOpen = false" class="px-4 py-2.5 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 text-xs font-semibold">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: SEARCH -->
    <div x-show="searchModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto">
        <div class="fixed inset-0 bg-dark-950/80 backdrop-blur-md" @click="searchModal = false"></div>
        <div class="flex min-h-screen items-start justify-center pt-24 px-4">
            <div class="relative transform overflow-hidden rounded-2xl bg-dark-900 border border-white/10 p-5 max-w-xl w-full shadow-2xl">
                <div class="flex items-center gap-3 pb-3 border-b border-white/10">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    <input type="text" x-model="searchQuery" placeholder="Cari topik, program, atau sejarah..." class="w-full bg-transparent text-white placeholder-slate-500 text-sm focus:outline-none">
                    <button @click="searchModal = false" class="text-xs text-slate-400 hover:text-white">ESC</button>
                </div>
                <div class="mt-4 space-y-2 text-xs">
                    <div class="text-[10px] uppercase font-bold text-slate-500 tracking-wider">TAUTAN CEPAT</div>
                    <a href="#linimasa" @click="searchModal = false" class="block p-2.5 rounded-xl hover:bg-white/5 text-slate-200">🚩 Lini Masa Perjalanan Get Smart</a>
                    <a href="#aktivitas" @click="searchModal = false" class="block p-2.5 rounded-xl hover:bg-white/5 text-slate-200">📷 Galeri Jejak Aktivitas & Produksi</a>
                    <a href="#hubungi" @click="searchModal = false" class="block p-2.5 rounded-xl hover:bg-white/5 text-slate-200">🚀 Konsultasi & Gabung Program</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
