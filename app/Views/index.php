<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio</title>
    <link rel="icon" type="image/svg+xml" href="assets/icons/logoporto.svg">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .glassmorphism {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .glassmorphism-hover:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-4px);
            transition: all 0.3s ease;
        }
        spline-viewer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        
        .content-overlay {
            position: relative;
            z-index: 10;
            min-height: 100vh;
        }
        .bg-background-dark {
            background-color: #0A0A0A;
        }
        
        /* Mobile Navigation */
        .mobile-nav {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 10, 10, 0.95);
            z-index: 100;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2rem;
        }
        .mobile-nav.active {
            display: flex;
        }
        .mobile-nav a {
            font-size: 1.5rem;
            font-weight: 500;
            color: #A0A0A0;
            transition: color 0.3s ease;
        }
        .mobile-nav a:hover {
            color: white;
        }
        .close-menu {
            position: absolute;
            top: 2rem;
            right: 2rem;
            color: white;
            font-size: 2rem;
            cursor: pointer;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem !important;
            }
            .hero-subtitle {
                font-size: 1.75rem !important;
            }
            .section-title {
                font-size: 2rem !important;
            }
            .project-card {
                margin-bottom: 1rem;
            }
        }
        
        @media (max-width: 480px) {
            .hero-title {
                font-size: 2rem !important;
            }
            .hero-subtitle {
                font-size: 1.5rem !important;
            }
            .section-title {
                font-size: 1.75rem !important;
            }
            .skill-tag {
                font-size: 0.875rem;
                padding: 0.5rem 1rem;
            }
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary-accent": "#A0A0A0",
                        "background-dark": "#0A0A0A",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.5rem", "lg": "0.75rem", "xl": "1rem", "full": "9999px"},
                },
            },
        }
    </script>
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.10.95/build/spline-viewer.js"></script>
</head>
<body class="bg-background-dark font-display text-white antialiased">

    <!-- <spline-viewer url="https://prod.spline.design/lPtouUjIBDltsZ5Z/scene.splinecode"></spline-viewer> -->
     <spline-viewer 
    url="https://prod.spline.design/lPtouUjIBDltsZ5Z/scene.splinecode"
    hide-watermark
    background="transparent">
  </spline-viewer>

    <!-- Mobile Navigation Menu -->
    <div class="mobile-nav" id="mobileNav">
        <span class="close-menu material-symbols-outlined" id="closeMenu">close</span>
        <a href="#proyek" onclick="closeMobileNav()">Proyek</a>
        <a href="#tentang" onclick="closeMobileNav()">Tentang Saya</a>
        <a href="#kontak" onclick="closeMobileNav()">Kontak</a>
        <a href="/admin/login" onclick="closeMobileNav()">Login</a>
        <a href="/admin/register" onclick="closeMobileNav()">Daftar</a>
    </div>

    <div class="content-overlay">
        <div class="layout-container flex h-full grow flex-col">
            <div class="flex flex-1 justify-center px-4 sm:px-6 md:px-8 lg:px-16 xl:px-24 py-5">
                <div class="layout-content-container flex w-full max-w-[1100px] flex-1 flex-col">

                    <!-- Header / Navigasi (Sticky Glassmorphism) -->
                    <header class="sticky top-3 md:top-5 z-50 flex items-center justify-between whitespace-nowrap rounded-full px-4 md:px-6 py-3 glassmorphism shadow-xl mx-2 md:mx-0">
                        <div class="flex items-center gap-2 md:gap-4">
                            <!-- Logo Placeholder - Menggunakan warna putih -->
                            <div class="size-5 md:size-6 text-white">
                                <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M24 4H6V17.3333V30.6667H24V44H42V30.6667V17.3333H24V4Z" fill="currentColor" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h2 class="text-white text-base md:text-lg font-bold leading-tight tracking-[-0.015em]"></h2>
                        </div>
                        
                        <!-- Navigation Container (Centered Menu) -->
                        <nav class="hidden md:flex flex-1 items-center justify-center">
                            <div class="flex items-center gap-2 rounded-full p-1 glassmorphism">
                                <a class="text-[#A0A0A0] hover:text-white transition-colors text-sm font-medium leading-normal px-4 py-1.5 rounded-full" href="#proyek">Proyek</a>
                                <a class="text-[#A0A0A0] hover:text-white transition-colors text-sm font-medium leading-normal px-4 py-1.5 rounded-full" href="#tentang">Tentang Saya</a>
                                <a class="text-[#A0A0A0] hover:text-white transition-colors text-sm font-medium leading-normal px-4 py-1.5 rounded-full" href="#kontak">Kontak</a>
                            </div>
                        </nav>
                        
                        <div class="hidden md:flex items-center gap-4">
                            <!-- Tombol Hubungi Saya -->
                            <a class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-5 bg-white text-black text-sm font-bold leading-normal tracking-[0.015em] hover:bg-gray-200 transition-colors shadow-lg" href="#kontak">
                                <span class="truncate">Hubungi Saya</span>
                            </a>
                            
                            <!-- Tombol Login & Daftar -->
                            <a class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-5 glassmorphism text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-white/20 transition-colors" href="/admin/login">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                <span class="truncate">Login</span>
                            </a>
                            
                            <a class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-5 bg-blue-600 text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-blue-700 transition-colors" href="/admin/register">
                                <i class="fas fa-user-plus mr-2"></i>
                                <span class="truncate">Daftar</span>
                            </a>
                        </div>
                        
                        <div class="md:hidden flex items-center gap-2">
                            <!-- Tombol Login untuk mobile -->
                            <a class="flex cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 glassmorphism text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-white/20 transition-colors" href="/admin/login">
                                <i class="fas fa-sign-in-alt"></i>
                            </a>
                            <button class="text-white p-2 rounded-full glassmorphism" id="menuButton">
                                <span class="material-symbols-outlined">menu</span>
                            </button>
                        </div>
                    </header>

                    <main class="flex flex-col gap-12 md:gap-16 lg:gap-24 mt-12 md:mt-16 lg:mt-24">
                        
                        <section id="hero">
                            <div class="flex flex-col items-center gap-6 md:gap-8 px-4 py-8 md:py-10 text-center">
                                <div class="flex flex-col gap-4 md:gap-6 max-w-4xl">
                                    <div class="flex flex-col gap-3 md:gap-4">
                                        <p class="text-base md:text-lg lg:text-xl text-[#A0A0A0] font-medium">Halo, Saya <?= $site_info['name'] ?? 'Rifki Maulana' ?></p>
                                        <h1 class="hero-title text-2xl md:text-3xl lg:text-4xl font-black leading-tight tracking-[-0.033em]">
                                            <span class="block">Pengembang Web</span>
                                        </h1>
                                        <h1 class="hero-subtitle text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-black leading-tight tracking-[-0.033em]">
                                            <span class="block text-white"><?= $site_info['title'] ?? 'Kreatif & Full-Stack' ?></span>
                                        </h1>
                                        <h2 class="text-[#A0A0A0] text-sm md:text-base lg:text-lg font-normal leading-normal md:leading-relaxed max-w-2xl mx-auto">
                                            <?= $site_info['bio'] ?? 'Membangun pengalaman digital yang intuitif, responsif, dan performatif, didukung oleh keahlian dalam teknologi web modern.' ?>
                                        </h2>
                                    </div>
                                    <div class="flex-wrap gap-3 md:gap-4 flex justify-center">
                                        <a class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 md:h-12 px-4 md:px-5 bg-white/10 text-white text-sm md:text-base font-bold leading-normal tracking-[0.015em] hover:bg-white/20 transition-colors" href="#proyek">
                                            <span class="truncate">Lihat Proyek</span>
                                        </a>
                                        <a class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 md:h-12 px-4 md:px-5 text-white text-sm md:text-base font-bold leading-normal tracking-[0.015em] glassmorphism hover:bg-white/20 transition-colors" href="#kontak">
                                            <span class="truncate">Hubungi Saya</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="tentang" class="py-12 md:py-16">
                            <div class="p-4">
                                <div class="rounded-xl glassmorphism p-6 md:p-8 lg:p-12 flex flex-col items-center gap-6 md:gap-8 lg:gap-12">
                                    <h2 class="section-title text-white text-2xl md:text-3xl font-bold leading-tight tracking-[-0.015em]">Tentang Saya</h2>
                                    <div class="max-w-4xl mx-auto text-base md:text-lg lg:text-xl space-y-4 md:space-y-6 text-[#A0A0A0] text-center">
                                        <p>
                                            <?= $site_info['about_description'] ?? 'Saya adalah ' . ($site_info['name'] ?? 'Rifki Maulana') . ', seorang pengembang web yang bersemangat dalam mengubah ide-ide kompleks menjadi antarmuka yang elegan dan fungsional. Dengan pengalaman lebih dari 5 tahun, saya berspesialisasi dalam ekosistem JavaScript modern.' ?>
                                        </p>
                                        <p>
                                            <?= $site_info['about_experience'] ?? 'Fokus utama saya adalah pada pengembangan <em>front-end</em> menggunakan React dan Vue.js, memastikan pengalaman pengguna (<em>UX</em>) yang mulus. Di sisi <em>back-end</em>, saya terampil menggunakan Node.js dan Express, serta mengelola basis data NoSQL seperti MongoDB atau Firestore.' ?>
                                        </p>
                                        <div class="mt-8 md:mt-10 pt-4">
                                            <h3 class="text-xl md:text-2xl font-semibold mb-4 md:mb-6 text-white">Keahlian Utama:</h3>
                                            <div class="flex flex-wrap gap-2 md:gap-3 justify-center">
                                                <?php if (!empty($skills)): ?>
                                                    <?php foreach ($skills as $skill): ?>
                                                        <span class="skill-tag px-3 md:px-4 py-2 bg-white/10 rounded-lg text-sm md:text-base font-medium transition duration-200 hover:bg-white/20 border border-white/20">
                                                            <?= $skill['name'] ?>
                                                        </span>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <span class="skill-tag px-3 md:px-4 py-2 bg-white/10 rounded-lg text-sm md:text-base font-medium transition duration-200 hover:bg-white/20 border border-white/20">React.js</span>
                                                    <span class="skill-tag px-3 md:px-4 py-2 bg-white/10 rounded-lg text-sm md:text-base font-medium transition duration-200 hover:bg-white/20 border border-white/20">Vue.js</span>
                                                    <span class="skill-tag px-3 md:px-4 py-2 bg-white/10 rounded-lg text-sm md:text-base font-medium transition duration-200 hover:bg-white/20 border border-white/20">Tailwind CSS</span>
                                                    <span class="skill-tag px-3 md:px-4 py-2 bg-white/10 rounded-lg text-sm md:text-base font-medium transition duration-200 hover:bg-white/20 border border-white/20">Node.js / Express</span>
                                                    <span class="skill-tag px-3 md:px-4 py-2 bg-white/10 rounded-lg text-sm md:text-base font-medium transition duration-200 hover:bg-white/20 border border-white/20">Firebase / MongoDB</span>
                                                    <span class="skill-tag px-3 md:px-4 py-2 bg-white/10 rounded-lg text-sm md:text-base font-medium transition duration-200 hover:bg-white/20 border border-white/20">TypeScript</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        
                        <section id="proyek">
                            <h2 class="text-white text-2xl md:text-3xl font-bold leading-tight tracking-[-0.015em] px-4 pb-4 md:pb-6 pt-5">Proyek Pilihan</h2>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 p-4">
                                <?php if (!empty($projects)): ?>
                                    <?php foreach ($projects as $project): ?>
                                        <div class="project-card flex flex-col gap-3 md:gap-4 pb-3 rounded-xl glassmorphism glassmorphism-hover overflow-hidden transition duration-500 cursor-pointer">
                                            <div class="w-full h-32 md:h-40 bg-center bg-no-repeat bg-cover bg-white/5 flex items-center justify-center text-white/30 font-bold text-base md:text-lg rounded-t-xl" 
                                                 style="background-image: url('<?= $project['image_url'] ?: 'https://placehold.co/600x400/1C1C1E/ffffff?text=' . urlencode($project['title']) ?>');">
                                                <?php if (!$project['image_url']): ?>
                                                    <?= $project['title'] ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="px-3 md:px-4 pb-3 md:pb-4 flex flex-col gap-2">
                                                <h3 class="text-white text-base md:text-lg font-bold leading-normal"><?= $project['title'] ?></h3>
                                                <p class="text-xs font-normal leading-normal text-[#A0A0A0] pt-1"><?= $project['technologies'] ?></p>
                                                <p class="text-[#A0A0A0] text-xs md:text-sm font-normal leading-normal"><?= $project['description'] ?></p>
                                                <div class="flex space-x-3 md:space-x-4 pt-2">
                                                    <?php if ($project['demo_url']): ?>
                                                        <a href="<?= $project['demo_url'] ?>" target="_blank" class="text-white hover:text-[#A0A0A0] text-xs md:text-sm font-medium transition duration-200">Lihat Demo →</a>
                                                    <?php endif; ?>
                                                    <?php if ($project['source_code_url']): ?>
                                                        <a href="<?= $project['source_code_url'] ?>" target="_blank" class="text-[#A0A0A0] hover:text-white text-xs md:text-sm font-medium transition duration-200">Kode Sumber</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="project-card flex flex-col gap-3 md:gap-4 pb-3 rounded-xl glassmorphism glassmorphism-hover overflow-hidden transition duration-500 cursor-pointer">
                                        <div class="w-full h-32 md:h-40 bg-center bg-no-repeat bg-cover bg-white/5 flex items-center justify-center text-white/30 font-bold text-base md:text-lg rounded-t-xl" style="background-image: url('https://placehold.co/600x400/1C1C1E/ffffff?text=E-Learning+UI');"></div>
                                        <div class="px-3 md:px-4 pb-3 md:pb-4 flex flex-col gap-2">
                                            <h3 class="text-white text-base md:text-lg font-bold leading-normal">Platform E-Learning Interaktif</h3>
                                            <p class="text-xs font-normal leading-normal text-[#A0A0A0] pt-1">React, Node.js, MongoDB</p>
                                            <p class="text-[#A0A0A0] text-xs md:text-sm font-normal leading-normal">Mengembangkan platform pembelajaran mandiri yang mendukung video, kuis interaktif, dan pelacakan kemajuan pengguna secara real-time.</p>
                                            <div class="flex space-x-3 md:space-x-4 pt-2">
                                                <a href="#" target="_blank" class="text-white hover:text-[#A0A0A0] text-xs md:text-sm font-medium transition duration-200">Lihat Demo →</a>
                                                <a href="#" target="_blank" class="text-[#A0A0A0] hover:text-white text-xs md:text-sm font-medium transition duration-200">Kode Sumber</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="project-card flex flex-col gap-3 md:gap-4 pb-3 rounded-xl glassmorphism glassmorphism-hover overflow-hidden transition duration-500 cursor-pointer">
                                        <div class="w-full h-32 md:h-40 bg-center bg-no-repeat bg-cover bg-white/5 flex items-center justify-center text-white/30 font-bold text-base md:text-lg rounded-t-xl" style="background-image: url('https://placehold.co/600x400/1C1C1E/ffffff?text=Task+SaaS+UI');"></div>
                                        <div class="px-3 md:px-4 pb-3 md:pb-4 flex flex-col gap-2">
                                            <h3 class="text-white text-base md:text-lg font-bold leading-normal">Aplikasi Manajemen Tugas (SaaS)</h3>
                                            <p class="text-xs font-normal leading-normal text-[#A0A0A0] pt-1">Vue.js, Firebase, TypeScript</p>
                                            <p class="text-[#A0A0A0] text-xs md:text-sm font-normal leading-normal">Aplikasi berbasis langganan untuk tim kecil, menampilkan papan Kanban, notifikasi <em>push</em>, dan integrasi kalender yang kuat.</p>
                                            <div class="flex space-x-3 md:space-x-4 pt-2">
                                                <a href="#" target="_blank" class="text-white hover:text-[#A0A0A0] text-xs md:text-sm font-medium transition duration-200">Lihat Demo →</a>
                                                <a href="#" target="_blank" class="text-[#A0A0A0] hover:text-white text-xs md:text-sm font-medium transition duration-200">Kode Sumber</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="project-card flex flex-col gap-3 md:gap-4 pb-3 rounded-xl glassmorphism glassmorphism-hover overflow-hidden transition duration-500 cursor-pointer">
                                        <div class="w-full h-32 md:h-40 bg-center bg-no-repeat bg-cover bg-white/5 flex items-center justify-center text-white/30 font-bold text-base md:text-lg rounded-t-xl" style="background-image: url('https://placehold.co/600x400/1C1C1E/ffffff?text=Company+Website');"></div>
                                        <div class="px-3 md:px-4 pb-3 md:pb-4 flex flex-col gap-2">
                                            <h3 class="text-white text-base md:text-lg font-bold leading-normal">Website Perusahaan & CMS Kustom</h3>
                                            <p class="text-xs font-normal leading-normal text-[#A0A0A0] pt-1">Next.js, Tailwind CSS, Headless CMS</p>
                                            <p class="text-[#A0A0A0] text-xs md:text-sm font-normal leading-normal">Website perusahaan dengan skor Lighthouse yang tinggi dan sistem manajemen konten (CMS) kustom untuk pembaruan yang mudah oleh klien.</p>
                                            <div class="flex space-x-3 md:space-x-4 pt-2">
                                                <a href="#" target="_blank" class="text-white hover:text-[#A0A0A0] text-xs md:text-sm font-medium transition duration-200">Lihat Demo →</a>
                                                <a href="#" target="_blank" class="text-[#A0A0A0] hover:text-white text-xs md:text-sm font-medium transition duration-200">Kode Sumber</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </section>
                        
                        <section id="kontak" class="py-12 md:py-16">
                            <div class="flex flex-col items-center text-center gap-3 md:gap-4 p-4">
                                <h2 class="text-white text-2xl md:text-3xl font-bold leading-tight tracking-[-0.015em]">Mari Bekerja Sama</h2>
                                <p class="text-[#A0A0A0] text-sm md:text-base max-w-xl">Test Contact Form - Debug Mode</p>
                            </div>
                            
                            <div class="p-4 max-w-xl mx-auto">
                                <!-- Debug Info -->
                                <?php if (session()->getFlashdata('success')): ?>
                                    <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded mb-4 text-sm md:text-base">
                                        <?= session()->getFlashdata('success') ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (session()->getFlashdata('error')): ?>
                                    <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded mb-4 text-sm md:text-base">
                                        ❌ <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (session()->getFlashdata('errors')): ?>
                                    <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded mb-4 text-sm md:text-base">
                                        <strong>Validation Errors:</strong>
                                        <ul>
                                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                                <li>• <?= $error ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <form class="flex flex-col gap-3 md:gap-4 p-4 max-w-xl mx-auto" action="/contact" method="POST">
                                <?= csrf_field() ?>
                                
                                <input class="w-full h-10 md:h-12 px-4 rounded-lg glassmorphism text-white placeholder:text-[#A0A0A0] focus:ring-2 focus:ring-white/30 focus:outline-none transition-shadow border-none text-sm md:text-base" 
                                       placeholder="Nama Anda" type="text" name="name" value="<?= old('name') ?>" required/>
                                
                                <input class="w-full h-10 md:h-12 px-4 rounded-lg glassmorphism text-white placeholder:text-[#A0A0A0] focus:ring-2 focus:ring-white/30 focus:outline-none transition-shadow border-none text-sm md:text-base" 
                                       placeholder="Email Anda" type="email" name="email" value="<?= old('email') ?>" required/>
                                
                                <textarea class="w-full p-4 rounded-lg glassmorphism text-white placeholder:text-[#A0A0A0] focus:ring-2 focus:ring-white/30 focus:outline-none transition-shadow border-none resize-none text-sm md:text-base" 
                                          placeholder="Pesan Anda" rows="4 md:rows-5" name="message" required><?= old('message') ?></textarea>
                                
                                <button class="flex min-w-[84px] w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 md:h-12 px-5 bg-white/10 text-white text-sm md:text-base font-bold leading-normal tracking-[0.015em] hover:bg-white/20 transition-colors" type="submit">
                                    <span class="truncate">Kirim Pesan</span>
                                </button>
                            </form>
                        </section>
                    </main>
                    
                    <footer class="mt-16 md:mt-20 lg:mt-24 border-t border-solid border-white/10 text-center py-6 md:py-8">
                        <div class="flex flex-col gap-3 md:gap-4">
                            <div class="flex justify-center gap-4 md:gap-6">
                                <?php if (!empty($social_links)): ?>
                                    <?php foreach ($social_links as $link): ?>
                                        <a class="text-white hover:text-[#A0A0A0] transition-colors" 
                                           data-alt="<?= $link['platform'] ?> icon" 
                                           href="<?= $link['url'] ?>" 
                                           target="_blank">
                                            <?php if ($link['platform'] === 'LinkedIn'): ?>
                                                <svg aria-hidden="true" class="h-5 w-5 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"></path>
                                                </svg>
                                            <?php elseif ($link['platform'] === 'GitHub'): ?>
                                                <svg aria-hidden="true" class="h-5 w-5 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24">
                                                    <path clip-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.165 6.839 9.49.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.031-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.03 1.595 1.03 2.688 0 3.848-2.338 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0022 12c0-5.523-4.477-10-10-10z" fill-rule="evenodd"></path>
                                                </svg>
                                            <?php else: ?>
                                                <svg aria-hidden="true" class="h-5 w-5 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24">
                                                    <path clip-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271.15-1.504.417-3.235.77-5.045a8.527 8.527 0 013.243.002zM10.5 14.25c-1.666 0-3.223.39-4.341 1.025a8.548 8.548 0 01-1.854-3.525C5.46 11.23 7.85 10.5 10.5 10.5c.37 0 .73.018 1.08.05a10.45 10.45 0 00-1.08 3.7zM12 20.25a8.522 8.522 0 01-4.017-1.033c1.12-1.282 2.94-2.147 5.091-2.147.65 0 1.28.055 1.88.162a8.544 8.544 0 01-2.954 3.018zM14.681 12.19c.148-2.625.32-5.012.518-7.135a8.521 8.521 0 013.823 4.255c-2.001.55-3.628 1.93-4.341 2.88z" fill-rule="evenodd"></path>
                                                </svg>
                                            <?php endif; ?>
                                        </a>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <a class="text-white hover:text-[#A0A0A0] transition-colors" data-alt="LinkedIn icon" href="#">
                                        <svg aria-hidden="true" class="h-5 w-5 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"></path>
                                        </svg>
                                    </a>
                                    <a class="text-white hover:text-[#A0A0A0] transition-colors" data-alt="GitHub icon" href="https://github.com/rifki">
                                        <svg aria-hidden="true" class="h-5 w-5 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path clip-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.165 6.839 9.49.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.031-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.03 1.595 1.03 2.688 0 3.848-2.338 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0022 12c0-5.523-4.477-10-10-10z" fill-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <p class="text-[#A0A0A0] text-xs md:text-sm">© 2025 <?= $site_info['name'] ?? 'Rifki Maulana' ?>. Dibuat dengan ❤ dan teknologi modern.</p>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Form submission loading state
        const contactForm = document.querySelector('form[action="/contact"]');
        if (contactForm) {
            contactForm.addEventListener('submit', function() {
                const submitButton = this.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.innerHTML = '<span class="truncate">Mengirim...</span>';
                    submitButton.disabled = true;
                }
            });
        }

        // Mobile navigation
        const menuButton = document.getElementById('menuButton');
        const mobileNav = document.getElementById('mobileNav');
        const closeMenu = document.getElementById('closeMenu');
        
        function openMobileNav() {
            mobileNav.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeMobileNav() {
            mobileNav.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        if (menuButton) {
            menuButton.addEventListener('click', openMobileNav);
        }
        
        if (closeMenu) {
            closeMenu.addEventListener('click', closeMobileNav);
        }
        
        // Close mobile nav when clicking outside
        mobileNav.addEventListener('click', function(e) {
            if (e.target === mobileNav) {
                closeMobileNav();
            }
        });
    </script>
</body>
</html>