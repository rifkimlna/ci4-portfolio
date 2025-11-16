<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio <?= $site_info['name'] ?? 'Rifki Maulana' ?></title>
    <link rel="icon" type="image/svg+xml" href="/assets/icons/logoporto.svg">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Spline Runtime -->
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.11.2/build/spline-viewer.js"></script>

    <style>
        /* === SPLINE BACKGROUND STYLES === */
        #spline-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-color: #0a0a0a;
        }

        spline-viewer {
            width: 100%;
            height: 100%;
        }

        /* === STYLING AWAL ANDA - TIDAK DIUBAH === */
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
        
        .content-overlay {
            position: relative;
            z-index: 10;
            min-height: 100vh;
        }
        
        .bg-background-dark {
            background-color: #0A0A0A;
        }
        
        /* NAVBAR COMPACT STYLING DENGAN SPACING YANG DIPERBAIKI */
        .navbar-full {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            background: rgba(10, 10, 10, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            width: auto;
            max-width: 90%;
        }
        
        .navbar-full.scrolled {
            background: rgba(10, 10, 10, 0.95);
            border-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            top: 10px;
            padding: 0.5rem 1.25rem;
        }
        
        .nav-container {
            display: flex;
            align-items: center;
            gap: 10.5rem;
        }
        
        .logo-compact {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.25rem 0;
             flex-shrink: 0;
        }
        
        .logo-text {
            font-weight: 700;
            font-size: 1.2rem;
            background: linear-gradient(135deg, #ffffff, #a5b4fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-links {
            display: flex;
            align-items: center;
            gap: 0,3rem;
        }
        
        .nav-link {
            position: relative;
            padding: 0.6rem 1rem;
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
            font-weight: 500;
            border-radius: 25px;
            font-size: 0.95rem;
        }
        
        .nav-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
        }
        
        .cta-button {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
            padding: 0.6rem 1.5rem;
            border-radius: 25px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            white-space: nowrap;
            flex-shrink: 0;
        }
        
        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .cta-button:hover::before {
            left: 100%;
        }
        
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
        }
        
        .mobile-nav-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 10, 10, 0.98);
            z-index: 999;
            display: none;
            backdrop-filter: blur(20px);
        }
        
        .mobile-nav-overlay.active {
            display: block;
        }
        
        .mobile-nav-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }
        
        .mobile-nav-link {
            display: block;
            padding: 1rem 0;
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .mobile-nav-link:last-child {
            border-bottom: none;
        }
        
        .mobile-nav-link:hover {
            color: white;
            transform: translateX(10px);
        }
        
        .hamburger-menu {
            width: 30px;
            height: 20px;
            position: relative;
            cursor: pointer;
        }
        
        .hamburger-menu span {
            display: block;
            position: absolute;
            height: 2px;
            width: 100%;
            background: white;
            border-radius: 2px;
            transition: all 0.3s ease;
        }
        
        .hamburger-menu span:nth-child(1) { top: 0; }
        .hamburger-menu span:nth-child(2) { top: 9px; }
        .hamburger-menu span:nth-child(3) { top: 18px; }
        
        .hamburger-menu.active span:nth-child(1) {
            transform: rotate(45deg);
            top: 9px;
        }
        
        .hamburger-menu.active span:nth-child(2) {
            opacity: 0;
        }
        
        .hamburger-menu.active span:nth-child(3) {
            transform: rotate(-45deg);
            top: 9px;
        }

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
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        @media (max-width: 768px) {

            
            .hero-title {
                font-size: 2.5rem !important;
            }
            
            .section-title {
                font-size: 2rem !important;
            }
            
            .nav-links {
                display: none;
            }
            
            .cta-button {
                display: none;
            }
            
            .logo-text {
                font-size: 1rem;
            }
            
            .navbar-full {
                padding: 0.75rem 1.5rem;
            }
            
            .nav-container {
                gap: 1rem;
            }
        }

        @media (max-width: 640px) {
            .logo-text {
                display: none;
            }
        }

        .footer-gradient {
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.05) 0%, rgba(59, 130, 246, 0.05) 100%);
        }
        
        .social-icon {
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            color: #a855f7 !important;
            transform: translateY(-2px) scale(1.1);
        }
        
        .footer-link {
            transition: all 0.3s ease;
            position: relative;
        }
        
        .footer-link:hover {
            color: #a855f7 !important;
            transform: translateX(8px);
        }
        
        .footer-link.group {
            display: flex;
            align-items: center;
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
                    }
                },
            },
        }
    </script>
</head>
<body class="bg-background-dark font-display text-white antialiased">

    <!-- === SPLINE BACKGROUND === -->
    <!-- <div id="spline-background">
        <spline-viewer url="https://prod.spline.design/RovNnRi129BxbO8P/scene.splinecode"></spline-viewer>
    </div> -->

    <!-- === KODE AWAL ANDA - TIDAK DIUBAH === -->
    <div class="content-overlay">
        <!-- COMPACT NAVBAR DENGAN SPACING YANG DIPERBAIKI -->
        <nav class="navbar-full" id="navbar">
            <div class="nav-container">
                <div class="logo-compact">
                    <div class="logo-icon">
                        <img src="/assets/icons/logoporto.svg" alt="Logo Portfolio" class="w-7 h-7">
                    </div>
                </div>
                
                <div class="nav-links">
                    <a href="/" class="nav-link active" data-section="home">Home</a>
                    <a href="#proyek" class="nav-link" data-section="proyek">Projects</a>
                    <a href="#tentang" class="nav-link" data-section="tentang">About</a>
                    <a href="#kontak" class="nav-link" data-section="kontak">Contacts</a>
                       <a href="#pendidikan" class="nav-link" data-section="kontak">Education</a>
                </div>
                
                <a href="#kontak" class="cta-button">Hubungi</a>
                
                <div class="md:hidden flex items-center">
                    <div class="hamburger-menu" id="hamburgerMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </nav>

        <div class="mobile-nav-overlay" id="mobileNavOverlay">
            <div class="mobile-nav-content">
                <a href="#" class="mobile-nav-link" onclick="closeMobileNav()">Home</a>
                <a href="#proyek" class="mobile-nav-link" onclick="closeMobileNav()">Projects</a>
                <a href="#tentang" class="mobile-nav-link" onclick="closeMobileNav()">About</a>
                <a href="#kontak" class="mobile-nav-link" onclick="closeMobileNav()">Contacts</a>
                 <a href="#pendidikan" class="mobile-nav-link" onclick="closeMobileNav()">Education</a>
                <a href="#kontak" class="cta-button mt-8 inline-block" onclick="closeMobileNav()">Hubungi Saya</a>
            </div>
        </div>

        <div class="min-h-screen pt-16">
            <section class="min-h-screen flex items-center justify-center px-6 pt-20">
                <div class="max-w-4xl mx-auto text-center">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glassmorphism mb-8 animate-fade-in-up">
                        <div class="size-2 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-white/70 text-sm font-medium">Available for projects</span>
                    </div>
                    
                    <h1 class="hero-title text-5xl md:text-6xl lg:text-7xl font-light tracking-tight mb-6 animate-fade-in-up">
                        <span class="block text-white"><?= $site_info['name'] ?? 'Rifki Maulana' ?></span>
                    </h1>
                    
                    <h2 class="text-2xl md:text-3xl text-white/70 font-normal mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                        <?= $site_info['title'] ?? 'Full-Stack Developer' ?>
                    </h2>
                    
                    <p class="text-lg text-white/60 max-w-2xl mx-auto mb-12 leading-relaxed animate-fade-in-up" style="animation-delay: 0.4s;">
                        <?= $site_info['bio'] ?? 'Membangun solusi digital yang elegan dan fungsional dengan teknologi modern.' ?>
                    </p>
                    
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

            <section id="tentang" class="py-20 px-6">
                <div class="max-w-4xl mx-auto">
                    <div class="glassmorphism rounded-3xl p-8 md:p-12">
                        <h2 class="section-title text-3xl md:text-4xl font-light text-white mb-8 text-center">Tentang Saya</h2>
                        
                        <div class="space-y-6 text-white/60 text-lg leading-relaxed">
                            <p><?= $site_info['about_description'] ?? 'Saya adalah pengembang web dengan fokus pada pembuatan pengalaman digital yang intuitif dan performan.' ?></p>
                            <p><?= $site_info['about_experience'] ?? 'Spesialisasi utama saya mencakup pengembangan front-end dengan React dan Vue.js, serta back-end dengan Node.js dan berbagai teknologi database modern.' ?></p>
                        </div>
                        
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
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<!-- Section Pendidikan -->
<section id="pendidikan" class="py-20 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-light text-white mb-4">Pendidikan</h2>
            <p class="text-white/60 text-lg">Perjalanan akademik dan pengembangan profesional</p>
        </div>

        <div class="glassmorphism rounded-3xl p-8 md:p-12">
            <div class="space-y-8">
                <?php if (!empty($educations)): ?>
                    <?php foreach ($educations as $education): ?>
                        <div class="flex gap-6 group">
                            <!-- Icon -->
                            <div class="flex-shrink-0">
                                <div class="size-14 bg-gradient-to-br from-purple-500/20 to-purple-600/30 rounded-2xl flex items-center justify-center border border-purple-500/30 group-hover:border-purple-400/50 transition-colors">
                                    <i class="fas fa-graduation-cap text-purple-400 text-lg"></i>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="flex-1">
                                <h3 class="text-xl font-medium text-white mb-2 group-hover:text-purple-300 transition-colors">
                                    <?= $education['degree'] ?>
                                </h3>
                                
                                <div class="flex items-center gap-4 text-sm text-white/60 mb-3">
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-university text-purple-400 mr-1"></i>
                                        <?= $education['institution'] ?>
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-calendar text-purple-400 mr-1"></i>
                                        <?= $education['start_year'] ?>
                                        <?= $education['end_year'] ? ' - ' . $education['end_year'] : ($education['is_current'] ? ' - Sekarang' : '') ?>
                                    </span>
                                </div>

                                <?php if ($education['field_of_study']): ?>
                                    <p class="text-white/70 mb-3"><?= $education['field_of_study'] ?></p>
                                <?php endif; ?>

                                <?php if ($education['description']): ?>
                                    <p class="text-white/60 leading-relaxed mb-3"><?= $education['description'] ?></p>
                                <?php endif; ?>

                                <?php if ($education['grade']): ?>
                                    <div class="flex items-center gap-2 text-sm text-white/60 mb-2">
                                        <i class="fas fa-star text-purple-400"></i>
                                        <span>Nilai: <?= $education['grade'] ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if ($education['activities']): ?>
                                    <div class="text-sm text-white/50">
                                        <i class="fas fa-trophy text-purple-400 mr-2"></i>
                                        <?= $education['activities'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center py-12">
                        <div class="glassmorphism rounded-full size-20 flex items-center justify-center mx-auto mb-4 border border-purple-500/30">
                            <i class="fas fa-graduation-cap text-2xl text-purple-400"></i>
                        </div>
                        <p class="text-white/60">Riwayat pendidikan akan ditampilkan di sini.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

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
                                    <div class="aspect-video bg-white/5 relative overflow-hidden">
                                        <img src="<?= base_url($project['image_url'] ?? 'uploads/projects/' . $project['image']) ?: 'https://placehold.co/600x400/1a1a1a/ffffff?text=' . urlencode($project['title']) ?>" 
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
                                                <a href="/projects/<?= $project['id'] ?>" 
                                                   class="bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-purple-700 transition-colors">
                                                    Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="p-6">
                                        <h3 class="text-xl font-medium text-white mb-2"><?= $project['title'] ?></h3>
                                        <p class="text-white/60 text-sm mb-3"><?= $project['technologies'] ?></p>
                                        <p class="text-white/70 text-sm leading-relaxed"><?= $project['description'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="group glassmorphism rounded-2xl overflow-hidden hover:glassmorphism-hover transition-all duration-300">
                                <div class="aspect-video bg-gradient-to-br from-white/5 to-white/10 flex items-center justify-center">
                                    <span class="text-white/30 text-lg">Project Image</span>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-medium text-white mb-2">E-Commerce Platform</h3>
                                    <p class="text-white/60 text-sm mb-3">React, Node.js, MongoDB</p>
                                    <p class="text-white/70 text-sm leading-relaxed">Platform e-commerce modern dengan fitur real-time inventory.</p>
                                </div>
                            </div>
                            
                            <div class="group glassmorphism rounded-2xl overflow-hidden hover:glassmorphism-hover transition-all duration-300">
                                <div class="aspect-video bg-gradient-to-br from-white/5 to-white/10 flex items-center justify-center">
                                    <span class="text-white/30 text-lg">Project Image</span>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-medium text-white mb-2">Task Management App</h3>
                                    <p class="text-white/60 text-sm mb-3">Vue.js, Express, PostgreSQL</p>
                                    <p class="text-white/70 text-sm leading-relaxed">Aplikasi manajemen tugas dengan kolaborasi tim real-time.</p>
                                </div>
                            </div>
                            
                            <div class="group glassmorphism rounded-2xl overflow-hidden hover:glassmorphism-hover transition-all duration-300">
                                <div class="aspect-video bg-gradient-to-br from-white/5 to-white/10 flex items-center justify-center">
                                    <span class="text-white/30 text-lg">Project Image</span>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-medium text-white mb-2">Analytics Dashboard</h3>
                                    <p class="text-white/60 text-sm mb-3">React, D3.js, Firebase</p>
                                    <p class="text-white/70 text-sm leading-relaxed">Dashboard analitik dengan visualisasi data interaktif.</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <section id="kontak" class="py-20 px-6">
                <div class="max-w-4xl mx-auto">
                    <div class="glassmorphism rounded-3xl p-8 md:p-12">
                        <div class="text-center mb-12">
                            <h2 class="text-3xl md:text-4xl font-light text-white mb-4">Mari Berkolaborasi</h2>
                            <p class="text-white/60 text-lg">Saya tertarik mendengar tentang proyek Anda</p>
                        </div>

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

                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="bg-green-500/20 border border-green-500/50 text-green-300 px-4 py-3 rounded-lg mb-6 text-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="bg-red-500/20 border border-red-500/50 text-red-300 px-4 py-3 rounded-lg mb-6 text-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <form class="space-y-6" action="<?= base_url('/contact') ?>" method="POST">
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
                                    class="w-full bg-white text-black py-3 rounded-lg font-medium hover:bg-white/90 transition-colors duration-300">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <!-- FOOTER -->
        <footer class="footer-gradient mt-20 md:mt-24 lg:mt-32 pt-20 pb-8 px-6">
            <div class="max-w-6xl mx-auto">
                <!-- Main Footer Content -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-12 mb-12">
                    <!-- Brand Section -->
                    <div class="md:col-span-2">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="logo-icon">
                                <img src="/assets/icons/logoporto.svg" alt="Logo Portfolio" class="w-8 h-8">
                            </div>
                        </div>
                        <p class="text-[#A0A0A0] text-sm leading-relaxed max-w-md mb-6">
                            <?= $site_info['short_description'] ?? 'Membangun solusi digital yang inovatif dan berdampak dengan teknologi terkini.' ?>
                        </p>
                        <div class="flex gap-4">
                            <?php if (!empty($social_links)): ?>
                                <?php foreach ($social_links as $link): ?>
                                    <?php if ($link['is_active'] && !empty($link['url'])): ?>
                                        <a href="<?= $link['url'] ?>" target="_blank" 
                                           class="social-icon text-[#A0A0A0] text-lg transition-all duration-300 hover:text-purple-400 hover:scale-110"
                                           title="<?= $link['platform'] ?>">
                                            <?php if ($link['platform'] === 'LinkedIn'): ?>
                                                <i class="fab fa-linkedin-in"></i>
                                            <?php elseif ($link['platform'] === 'GitHub'): ?>
                                                <i class="fab fa-github"></i>
                                            <?php elseif ($link['platform'] === 'Twitter'): ?>
                                                <i class="fab fa-twitter"></i>
                                            <?php elseif ($link['platform'] === 'Instagram'): ?>
                                                <i class="fab fa-instagram"></i>
                                            <?php elseif ($link['platform'] === 'Facebook'): ?>
                                                <i class="fab fa-facebook"></i>
                                            <?php elseif ($link['platform'] === 'YouTube'): ?>
                                                <i class="fab fa-youtube"></i>
                                            <?php elseif ($link['platform'] === 'Dribbble'): ?>
                                                <i class="fab fa-dribbble"></i>
                                            <?php elseif ($link['platform'] === 'Behance'): ?>
                                                <i class="fab fa-behance"></i>
                                            <?php else: ?>
                                                <i class="fas fa-globe"></i>
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <!-- Fallback default social links dengan Instagram dan Twitter -->
                                <a href="#" class="social-icon text-[#A0A0A0] text-lg transition-all duration-300 hover:text-purple-400 hover:scale-110" title="GitHub">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="#" class="social-icon text-[#A0A0A0] text-lg transition-all duration-300 hover:text-purple-400 hover:scale-110" title="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="social-icon text-[#A0A0A0] text-lg transition-all duration-300 hover:text-purple-400 hover:scale-110" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-icon text-[#A0A0A0] text-lg transition-all duration-300 hover:text-purple-400 hover:scale-110" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-white font-semibold mb-4 text-lg">Navigasi</h4>
                        <div class="space-y-3">
                            <a href="/#proyek" class="footer-link block text-[#A0A0A0] text-sm transition-all duration-300 hover:text-purple-400 hover:translate-x-1 flex items-center gap-2">
                                <i class="fas fa-arrow-right text-xs opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Proyek
                            </a>
                            <a href="/#tentang" class="footer-link block text-[#A0A0A0] text-sm transition-all duration-300 hover:text-purple-400 hover:translate-x-1 flex items-center gap-2">
                                <i class="fas fa-arrow-right text-xs opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Tentang Saya
                            </a>
                            <a href="/#kontak" class="footer-link block text-[#A0A0A0] text-sm transition-all duration-300 hover:text-purple-400 hover:translate-x-1 flex items-center gap-2">
                                <i class="fas fa-arrow-right text-xs opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Kontak
                            </a>
                            <a href="/admin/login" class="footer-link block text-[#A0A0A0] text-sm transition-all duration-300 hover:text-purple-400 hover:translate-x-1 flex items-center gap-2">
                                <i class="fas fa-arrow-right text-xs opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Login Admin
                            </a>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h4 class="text-white font-semibold mb-4 text-lg">Kontak</h4>
                        <div class="space-y-3 text-sm">
                            <p class="text-[#A0A0A0] transition-all duration-300 hover:text-purple-400 group">
                                <i class="fas fa-envelope mr-2 text-purple-400"></i>
                                <span class="group-hover:text-purple-400 transition-colors">
                                    <?= $site_info['email'] ?? 'hello@example.com' ?>
                                </span>
                            </p>
                            <p class="text-[#A0A0A0] transition-all duration-300 hover:text-purple-400 group">
                                <i class="fas fa-phone mr-2 text-purple-400"></i>
                                <span class="group-hover:text-purple-400 transition-colors">
                                    <?= $site_info['phone'] ?? '+62 812 3456 7890' ?>
                                </span>
                            </p>
                            <p class="text-[#A0A0A0] transition-all duration-300 hover:text-purple-400 group">
                                <i class="fas fa-map-marker-alt mr-2 text-purple-400"></i>
                                <span class="group-hover:text-purple-400 transition-colors">
                                    <?= $site_info['location'] ?? 'Indonesia' ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Bottom Footer -->
                <div class="border-t border-purple-500/20 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <p class="text-[#A0A0A0] text-sm text-center md:text-left">
                            © <?= date('Y') ?> <?= $site_info['name'] ?? 'Rifki Maulana' ?>. All rights reserved.
                        </p>
                        <div class="flex items-center gap-6 text-sm">
                            <a href="/privacy" class="footer-link text-[#A0A0A0] transition-all duration-300 hover:text-purple-400 hover:underline">Privacy</a>
                            <a href="/terms" class="footer-link text-[#A0A0A0] transition-all duration-300 hover:text-purple-400 hover:underline">Terms</a>
                            <a href="/sitemap" class="footer-link text-[#A0A0A0] transition-all duration-300 hover:text-purple-400 hover:underline">Sitemap</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // === NAVBAR SCROLL EFFECT ===
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        const hamburgerMenu = document.getElementById('hamburgerMenu');
        const mobileNavOverlay = document.getElementById('mobileNavOverlay');
        
        function openMobileNav() {
            hamburgerMenu.classList.add('active');
            mobileNavOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeMobileNav() {
            hamburgerMenu.classList.remove('active');
            mobileNavOverlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        if (hamburgerMenu) {
            hamburgerMenu.addEventListener('click', openMobileNav);
        }
        
        mobileNavOverlay.addEventListener('click', function(e) {
            if (e.target === mobileNavOverlay) {
                closeMobileNav();
            }
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    closeMobileNav();
                }
            });
        });

        // Active nav link highlighting
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>