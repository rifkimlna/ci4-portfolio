<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - <?= $site_info['name'] ?? 'Rifki Maulana' ?></title>
    <link rel="icon" type="image/svg+xml" href="assets/icons/logoporto.svg">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .glassmorphism {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        
        .glassmorphism-hover:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.15);
            transition: all 0.3s ease;
        }
        
        /* BACKGROUND SPLINE DARI KODE KEDUA */
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
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        /* Mobile Navigation */
        .mobile-nav {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 10, 10, 0.98);
            z-index: 100;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2rem;
        }
        
        .mobile-nav.active {
            display: flex;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }
        
        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        /* Text selection */
        ::selection {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem !important;
            }
            
            .section-title {
                font-size: 2rem !important;
            }
        }
    </style>
    
    <script>
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
                    borderRadius: {
                        "DEFAULT": "0.5rem", 
                        "lg": "0.75rem", 
                        "xl": "1rem", 
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    
    <!-- SPLINE SCRIPT DARI KODE KEDUA -->
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.10.95/build/spline-viewer.js"></script>
</head>
<body class="bg-background-dark font-display text-white antialiased">

    <!-- BACKGROUND SPLINE DARI KODE KEDUA -->
    <spline-viewer 
        url="https://prod.spline.design/lPtouUjIBDltsZ5Z/scene.splinecode"
        hide-watermark
        background="transparent">
    </spline-viewer>

    <!-- Content Overlay -->
    <div class="content-overlay">
        <!-- Mobile Navigation Menu -->
        <div class="mobile-nav" id="mobileNav">
            <span class="close-menu material-symbols-outlined absolute top-6 right-6 text-white text-2xl cursor-pointer" id="closeMenu">close</span>
            <a href="#proyek" class="text-white/70 hover:text-white text-xl font-medium transition-colors" onclick="closeMobileNav()">Proyek</a>
            <a href="#tentang" class="text-white/70 hover:text-white text-xl font-medium transition-colors" onclick="closeMobileNav()">Tentang</a>
            <a href="#kontak" class="text-white/70 hover:text-white text-xl font-medium transition-colors" onclick="closeMobileNav()">Kontak</a>
            <a href="/admin/login" class="text-white/70 hover:text-white text-xl font-medium transition-colors" onclick="closeMobileNav()">Login</a>
        </div>

        <div class="min-h-screen">
            <!-- Header Navigation -->
            <header class="fixed top-0 left-0 right-0 z-50 py-4 px-6">
                <div class="max-w-6xl mx-auto">
                    <div class="glassmorphism rounded-2xl px-6 py-3 flex items-center justify-between">
                        <!-- Logo -->
                        <div class="flex items-center gap-3">
                            <div class="size-8 text-white">
                                <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" d="M24 4H6V17.3333V30.6667H24V44H42V30.6667V17.3333H24V4Z" fill="currentColor" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="text-white font-semibold text-lg"><?= $site_info['name'] ?? 'Portfolio' ?></span>
                        </div>
                        
                        <!-- Desktop Navigation -->
                        <nav class="hidden md:flex items-center gap-8">
                            <a href="#proyek" class="text-white/70 hover:text-white transition-colors font-medium">Proyek</a>
                            <a href="#tentang" class="text-white/70 hover:text-white transition-colors font-medium">Tentang</a>
                            <a href="#kontak" class="text-white/70 hover:text-white transition-colors font-medium">Kontak</a>
                        </nav>
                        
                        <!-- Desktop Actions -->
                        <div class="hidden md:flex items-center gap-4">
                            <a href="/admin/login" class="text-white/70 hover:text-white transition-colors font-medium">Login</a>
                            <a href="#kontak" class="bg-white text-black px-6 py-2 rounded-lg font-medium hover:bg-white/90 transition-colors">
                                Hubungi
                            </a>
                        </div>
                        
                        <!-- Mobile Menu Button -->
                        <button class="md:hidden text-white/70 hover:text-white transition-colors" id="menuButton">
                            <span class="material-symbols-outlined">menu</span>
                        </button>
                    </div>
                </div>
            </header>

            <main>
                <!-- Hero Section -->
                <section class="min-h-screen flex items-center justify-center px-6 pt-20">
                    <div class="max-w-4xl mx-auto text-center">
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glassmorphism mb-8 animate-fade-in-up">
    <div class="size-2 bg-green-400 rounded-full animate-pulse"></div>
    <span class="text-white/70 text-sm font-medium">Available for projects</span>
</div>
                        
                        <!-- Main Title -->
                        <h1 class="hero-title text-5xl md:text-6xl lg:text-7xl font-light tracking-tight mb-6 animate-fade-in-up">
                            <span class="block text-white"><?= $site_info['name'] ?? 'Rifki Maulana' ?></span>
                        </h1>
                        
                        <!-- Subtitle -->
                        <h2 class="text-2xl md:text-3xl text-white/70 font-normal mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                            <?= $site_info['title'] ?? 'Full-Stack Developer' ?>
                        </h2>
                        
                        <!-- Description -->
                        <p class="text-lg text-white/60 max-w-2xl mx-auto mb-12 leading-relaxed animate-fade-in-up" style="animation-delay: 0.4s;">
                            <?= $site_info['bio'] ?? 'Membangun solusi digital yang elegan dan fungsional dengan teknologi modern.' ?>
                        </p>
                        
                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up" style="animation-delay: 0.6s;">
                            <a href="#proyek" class="bg-white text-black px-8 py-3 rounded-lg font-medium hover:bg-white/90 transition-colors">
                                Lihat Proyek
                            </a>
                            <a href="#kontak" class="border border-white/20 text-white px-8 py-3 rounded-lg font-medium hover:bg-white/10 transition-colors">
                                Mulai Percakapan
                            </a>
                        </div>
                    </div>
                </section>

                <!-- About Section -->
                <section id="tentang" class="py-20 px-6">
                    <div class="max-w-4xl mx-auto">
                        <div class="glassmorphism rounded-3xl p-8 md:p-12">
                            <h2 class="section-title text-3xl md:text-4xl font-light text-white mb-8 text-center">Tentang Saya</h2>
                            
                            <div class="space-y-6 text-white/60 text-lg leading-relaxed">
                                <p>
                                    <?= $site_info['about_description'] ?? 'Saya adalah pengembang web dengan fokus pada pembuatan pengalaman digital yang intuitif dan performan. Pendekatan saya menggabungkan estetika yang bersih dengan fungsionalitas yang solid.' ?>
                                </p>
                                
                                <p>
                                    <?= $site_info['about_experience'] ?? 'Spesialisasi utama saya mencakup pengembangan front-end dengan React dan Vue.js, serta back-end dengan Node.js dan berbagai teknologi database modern.' ?>
                                </p>
                            </div>
                            
                            <!-- Skills -->
                            <div class="mt-12">
                                <h3 class="text-xl font-medium text-white mb-6">Keahlian Teknis</h3>
                                <div class="flex flex-wrap gap-3">
                                    <?php if (!empty($skills)): ?>
                                        <?php foreach ($skills as $skill): ?>
                                            <span class="px-4 py-2 bg-white/10 rounded-lg text-white/80 font-medium border border-white/10 hover:border-white/20 transition-colors">
                                                <?= $skill['name'] ?>
                                            </span>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <span class="px-4 py-2 bg-white/10 rounded-lg text-white/80 font-medium border border-white/10 hover:border-white/20 transition-colors">React.js</span>
                                        <span class="px-4 py-2 bg-white/10 rounded-lg text-white/80 font-medium border border-white/10 hover:border-white/20 transition-colors">Vue.js</span>
                                        <span class="px-4 py-2 bg-white/10 rounded-lg text-white/80 font-medium border border-white/10 hover:border-white/20 transition-colors">Node.js</span>
                                        <span class="px-4 py-2 bg-white/10 rounded-lg text-white/80 font-medium border border-white/10 hover:border-white/20 transition-colors">TypeScript</span>
                                        <span class="px-4 py-2 bg-white/10 rounded-lg text-white/80 font-medium border border-white/10 hover:border-white/20 transition-colors">MongoDB</span>
                                        <span class="px-4 py-2 bg-white/10 rounded-lg text-white/80 font-medium border border-white/10 hover:border-white/20 transition-colors">PostgreSQL</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Projects Section -->
                <section id="proyek" class="py-20 px-6">
                    <div class="max-w-6xl mx-auto">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl md:text-4xl font-light text-white mb-4">Proyek Terpilih</h2>
                            <p class="text-white/60 text-lg max-w-2xl mx-auto">Koleksi karya yang merepresentasikan pendekatan dan keahlian saya</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <?php if (!empty($projects)): ?>
                                <?php foreach ($projects as $project): ?>
                                    <div class="group glassmorphism rounded-2xl overflow-hidden hover:glassmorphism-hover transition-all duration-300">
                                        <!-- Project Image -->
                                        <div class="aspect-video bg-white/5 relative overflow-hidden">
                                            <img src="<?= $project['image_url'] ?: 'https://placehold.co/600x400/1a1a1a/ffffff?text=' . urlencode($project['title']) ?>" 
                                                 alt="<?= $project['title'] ?>" 
                                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                                <div class="flex gap-4">
                                                    <?php if ($project['demo_url']): ?>
                                                        <a href="<?= $project['demo_url'] ?>" target="_blank" 
                                                           class="bg-white text-black px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/90 transition-colors">
                                                            Demo
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($project['source_code_url']): ?>
                                                        <a href="<?= $project['source_code_url'] ?>" target="_blank" 
                                                           class="border border-white text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/10 transition-colors">
                                                            Kode
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Project Info -->
                                        <div class="p-6">
                                            <h3 class="text-xl font-medium text-white mb-2"><?= $project['title'] ?></h3>
                                            <p class="text-white/60 text-sm mb-3"><?= $project['technologies'] ?></p>
                                            <p class="text-white/70 text-sm leading-relaxed"><?= $project['description'] ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <!-- Default Projects -->
                                <div class="group glassmorphism rounded-2xl overflow-hidden hover:glassmorphism-hover transition-all duration-300">
                                    <div class="aspect-video bg-gradient-to-br from-white/5 to-white/10 flex items-center justify-center">
                                        <span class="text-white/30 text-lg">Project Image</span>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-medium text-white mb-2">E-Commerce Platform</h3>
                                        <p class="text-white/60 text-sm mb-3">React, Node.js, MongoDB</p>
                                        <p class="text-white/70 text-sm leading-relaxed">Platform e-commerce modern dengan fitur real-time inventory dan payment gateway integration.</p>
                                    </div>
                                </div>
                                
                                <div class="group glassmorphism rounded-2xl overflow-hidden hover:glassmorphism-hover transition-all duration-300">
                                    <div class="aspect-video bg-gradient-to-br from-white/5 to-white/10 flex items-center justify-center">
                                        <span class="text-white/30 text-lg">Project Image</span>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-medium text-white mb-2">Task Management App</h3>
                                        <p class="text-white/60 text-sm mb-3">Vue.js, Firebase, TypeScript</p>
                                        <p class="text-white/70 text-sm leading-relaxed">Aplikasi manajemen tugas dengan kolaborasi real-time dan analytics dashboard.</p>
                                    </div>
                                </div>
                                
                                <div class="group glassmorphism rounded-2xl overflow-hidden hover:glassmorphism-hover transition-all duration-300">
                                    <div class="aspect-video bg-gradient-to-br from-white/5 to-white/10 flex items-center justify-center">
                                        <span class="text-white/30 text-lg">Project Image</span>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-medium text-white mb-2">Portfolio Website</h3>
                                        <p class="text-white/60 text-sm mb-3">Next.js, Tailwind CSS, CMS</h3>
                                        <p class="text-white/70 text-sm leading-relaxed">Website portfolio dengan performa optimal dan sistem manajemen konten yang mudah digunakan.</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

                <!-- Contact Section -->
                <section id="kontak" class="py-20 px-6">
                    <div class="max-w-4xl mx-auto">
                        <div class="glassmorphism rounded-3xl p-8 md:p-12">
                            <div class="text-center mb-12">
                                <h2 class="text-3xl md:text-4xl font-light text-white mb-4">Mari Berkolaborasi</h2>
                                <p class="text-white/60 text-lg">Saya tertarik mendengar tentang proyek Anda</p>
                            </div>

                            <!-- Contact Info -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                                <div class="text-center">
                                    <div class="size-12 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-envelope text-white/60"></i>
                                    </div>
                                    <h3 class="text-white font-medium mb-2">Email</h3>
                                    <p class="text-white/60"><?= $site_info['email'] ?? 'hello@example.com' ?></p>
                                </div>
                                
                                <div class="text-center">
                                    <div class="size-12 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-phone text-white/60"></i>
                                    </div>
                                    <h3 class="text-white font-medium mb-2">Telepon</h3>
                                    <p class="text-white/60"><?= $site_info['phone'] ?? '+62 812 3456 7890' ?></p>
                                </div>
                            </div>

                            <!-- Contact Form -->
                            <form class="space-y-6" action="/contact" method="POST">
                                <?= csrf_field() ?>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <input type="text" name="name" placeholder="Nama Anda" required
                                               class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                                               value="<?= old('name') ?>">
                                    </div>
                                    
                                    <div>
                                        <input type="email" name="email" placeholder="Email Anda" required
                                               class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                                               value="<?= old('email') ?>">
                                    </div>
                                </div>
                                
                                <div>
                                    <textarea name="message" rows="5" placeholder="Pesan Anda" required
                                              class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all resize-none"><?= old('message') ?></textarea>
                                </div>
                                
                                <button type="submit" 
                                        class="w-full bg-white text-black py-3 rounded-lg font-medium hover:bg-white/90 transition-colors">
                                    Kirim Pesan
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </main>

            <!-- FOOTER YANG DIPERBAIKI -->
            <footer class="footer-gradient mt-20 md:mt-24 lg:mt-32 pt-20 pb-8 px-6">
                <div class="max-w-6xl mx-auto">
                    <!-- Main Footer Content -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-12 mb-12">
                        <!-- Brand Section -->
                        <div class="md:col-span-2">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="size-8 text-white">
                                    <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                        <path clip-rule="evenodd" d="M24 4H6V17.3333V30.6667H24V44H42V30.6667V17.3333H24V4Z" fill="currentColor" fill-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h3 class="text-white text-xl font-bold"><?= $site_info['name'] ?? 'Portfolio' ?></h3>
                            </div>
                            <p class="text-[#A0A0A0] text-sm leading-relaxed max-w-md mb-6">
                                Membangun solusi digital yang inovatif dan berdampak dengan teknologi terkini.
                            </p>
                            <div class="flex gap-4">
                                <?php if (!empty($social_links)): ?>
                                    <?php foreach ($social_links as $link): ?>
                                        <a href="<?= $link['url'] ?>" target="_blank" 
                                           class="social-icon text-[#A0A0A0] hover:text-white text-lg"
                                           title="<?= $link['platform'] ?>">
                                            <?php if ($link['platform'] === 'LinkedIn'): ?>
                                                <i class="fab fa-linkedin-in"></i>
                                            <?php elseif ($link['platform'] === 'GitHub'): ?>
                                                <i class="fab fa-github"></i>
                                            <?php elseif ($link['platform'] === 'Twitter'): ?>
                                                <i class="fab fa-twitter"></i>
                                            <?php else: ?>
                                                <i class="fas fa-globe"></i>
                                            <?php endif; ?>
                                        </a>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <a href="#" class="social-icon text-[#A0A0A0] hover:text-white text-lg" title="LinkedIn">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#" class="social-icon text-[#A0A0A0] hover:text-white text-lg" title="GitHub">
                                        <i class="fab fa-github"></i>
                                    </a>
                                    <a href="#" class="social-icon text-[#A0A0A0] hover:text-white text-lg" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div>
                            <h4 class="text-white font-semibold mb-4 text-lg">Navigasi</h4>
                            <div class="space-y-3">
                                <a href="#proyek" class="footer-link block text-[#A0A0A0] hover:text-white text-sm">Proyek</a>
                                <a href="#tentang" class="footer-link block text-[#A0A0A0] hover:text-white text-sm">Tentang Saya</a>
                                <a href="#kontak" class="footer-link block text-[#A0A0A0] hover:text-white text-sm">Kontak</a>
                                <a href="/admin/login" class="footer-link block text-[#A0A0A0] hover:text-white text-sm">Login Admin</a>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div>
                            <h4 class="text-white font-semibold mb-4 text-lg">Kontak</h4>
                            <div class="space-y-3 text-sm">
                                <p class="text-[#A0A0A0]"><?= $site_info['email'] ?? 'hello@example.com' ?></p>
                                <p class="text-[#A0A0A0]"><?= $site_info['phone'] ?? '+62 812 3456 7890' ?></p>
                                <p class="text-[#A0A0A0]">Indonesia</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Footer -->
                    <div class="border-t border-white/10 pt-8">
                        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                            <p class="text-[#A0A0A0] text-sm text-center md:text-left">
                                © 2024 <?= $site_info['name'] ?? 'Rifki Maulana' ?>. All rights reserved.
                            </p>
                            <div class="flex items-center gap-6 text-sm">
                                <a href="/privacy" class="footer-link text-[#A0A0A0] hover:text-white">Privacy</a>
                                <a href="/terms" class="footer-link text-[#A0A0A0] hover:text-white">Terms</a>
                                <a href="/sitemap" class="footer-link text-[#A0A0A0] hover:text-white">Sitemap</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
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

        // Form submission loading state
        const contactForm = document.querySelector('form[action="/contact"]');
        if (contactForm) {
            contactForm.addEventListener('submit', function() {
                const submitButton = this.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.innerHTML = 'Mengirim...';
                    submitButton.disabled = true;
                }
            });
        }

        // Add scroll effect to header
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.backdropFilter = 'blur(20px)';
            } else {
                header.style.backdropFilter = 'blur(10px)';
            }
        });

        // Intersection Observer for animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1
        });

        // Observe elements for animation
        document.querySelectorAll('.glassmorphism').forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            setTimeout(() => {
                observer.observe(el);
            }, index * 100);
        });
    </script>
</body>
</html>