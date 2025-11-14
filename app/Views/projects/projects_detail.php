<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="icon" type="image/svg+xml" href="/assets/icons/logoporto.svg">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .glassmorphism {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        
        .tech-badge {
            background: rgba(168, 85, 247, 0.1);
            border: 1px solid rgba(168, 85, 247, 0.3);
            color: #d8b4fe;
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.05);
        }

        .gallery-image {
            transition: transform 0.3s ease;
            cursor: zoom-in;
        }

        .gallery-image:hover {
            transform: scale(1.02);
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

        /* NAVBAR YANG DISESUAIKAN */
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
            padding: 0.75rem 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            width: auto;
            max-width: 90%;
        }
        
        .navbar-full.scrolled {
            background: rgba(10, 10, 10, 0.95);
            border-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            top: 10px;
            padding: 0.6rem 1.8rem;
        }
        
        .nav-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            gap: 10rem;
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
            white-space: nowrap;
        }
        
        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex: 1;
            justify-content: center;
        }
        
        .nav-link {
            position: relative;
            padding: 0.6rem 1.2rem;
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
            font-weight: 500;
            border-radius: 25px;
            font-size: 0.95rem;
            white-space: nowrap;
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
            z-index: 1001;
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

        @media (max-width: 1024px) {
            .nav-links {
                gap: 0.3rem;
            }
            
            .nav-link {
                padding: 0.6rem 1rem;
            }
        }

        @media (max-width: 768px) {
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

        /* STYLING LAINNYA TETAP SAMA */
        .macbook-frame {
            background: #1a1a1a;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            margin: 40px auto;
            max-width: 1000px;
        }

        .macbook-screen {
            background: #000;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        .macbook-notch {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 6px;
            background: #333;
            border-radius: 0 0 4px 4px;
            z-index: 10;
        }

        .macbook-stand {
            position: relative;
            width: 100%;
            height: 20px;
            margin-top: -10px;
        }

        .macbook-stand::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 8px;
            background: linear-gradient(90deg, #333, #555, #333);
            border-radius: 0 0 4px 4px;
        }

        .macbook-base {
            width: 100%;
            height: 20px;
            background: linear-gradient(180deg, #333, #222);
            border-radius: 0 0 8px 8px;
            margin-top: -2px;
        }

        .project-image-full {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease;
        }

        .project-image-full:hover {
            transform: scale(1.01);
        }
    </style>
</head>
<body class="bg-[#0A0A0A] font-sans text-white antialiased">
    
    <!-- NAVBAR YANG DISESUAIKAN -->
    <nav class="navbar-full" id="navbar">
        <div class="nav-container">
            <!-- Logo di kiri -->
            <div class="logo-compact">
                <div class="logo-icon">
                    <img src="/assets/icons/logoporto.svg" alt="Logo Portfolio" class="w-6 h-6">
                </div>
                <span class="logo-text"></span>
            </div>
            
            <!-- Menu navigasi di tengah -->
            <div class="nav-links">
                <a href="/" class="nav-link">Home</a>
                <a href="/projects" class="nav-link active">All Projects</a>
            </div>
            
            <!-- CTA Button di kanan -->
            <a href="/#kontak" class="cta-button">Get In Touch</a>
            
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <div class="hamburger-menu" id="hamburgerMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Navigation Overlay -->
    <div class="mobile-nav-overlay" id="mobileNavOverlay">
        <div class="mobile-nav-content">
            <a href="/" class="mobile-nav-link" onclick="closeMobileNav()">Home</a>
            <a href="/projects" class="mobile-nav-link" onclick="closeMobileNav()">All Projects</a>
            <a href="/#kontak" class="mobile-nav-link" onclick="closeMobileNav()">Contact</a>
            <a href="/#kontak" class="cta-button mt-8 inline-block" onclick="closeMobileNav()">Get In Touch</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="pt-20 min-h-screen">
        <!-- Project Hero -->
        <section class="py-16 px-6">
            <div class="max-w-6xl mx-auto">
                <!-- Breadcrumb -->
                <div class="flex items-center gap-4 text-sm text-gray-400 mb-8">
                    <a href="/" class="hover:text-purple-400 transition-colors">Home</a>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <a href="/projects" class="hover:text-purple-400 transition-colors">Projects</a>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span class="text-purple-400"><?= $project['title'] ?></span>
                </div>

                <!-- Project Header -->
                <div class="glassmorphism rounded-2xl p-8 mb-8">
                    <h1 class="text-4xl md:text-5xl font-light mb-4 bg-gradient-to-r from-white to-purple-400 bg-clip-text text-transparent">
                        <?= $project['title'] ?>
                    </h1>
                    <p class="text-xl text-gray-400 leading-relaxed mb-6">
                        <?= $project['description'] ?>
                    </p>

                    <!-- Project Meta -->
                    <div class="flex flex-wrap items-center gap-6 mb-6">
                        <?php if ($project['demo_url']): ?>
                        <a href="<?= $project['demo_url'] ?>" target="_blank" 
                           class="border border-purple-600/50 text-purple-400 px-6 py-3 rounded-lg font-medium hover:border-purple-500 hover:text-purple-300 hover:bg-purple-600/10 transition-all flex items-center gap-2">
                            <i class="fas fa-external-link-alt"></i>
                            Live Demo
                        </a>
                        <?php endif; ?>

                        <?php if ($project['source_code_url']): ?>
                        <a href="<?= $project['source_code_url'] ?>" target="_blank" 
                           class="border border-purple-600/50 text-purple-400 px-6 py-3 rounded-lg font-medium hover:border-purple-500 hover:text-purple-300 hover:bg-purple-600/10 transition-all flex items-center gap-2">
                            <i class="fab fa-github"></i>
                            Source Code
                        </a>
                        <?php endif; ?>

                        <div class="flex items-center gap-2 text-purple-400">
                            <i class="far fa-calendar"></i>
                            <span><?= $project['formatted_date'] ?></span>
                        </div>
                    </div>

                    <!-- Technologies -->
                    <div class="flex flex-wrap gap-3">
                        <?php foreach ($project['technologies_array'] as $tech): ?>
                            <span class="tech-badge px-4 py-2 rounded-full text-sm font-medium">
                                <?= $tech ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- MacBook Style Project Preview -->
                <div class="macbook-frame">
                    <div class="macbook-notch"></div>
                    <div class="macbook-screen">
                        <img src="<?= $project['image_display_url'] ?>" 
                             alt="<?= $project['title'] ?>" 
                             class="project-image-full">
                    </div>
                    <div class="macbook-stand"></div>
                    <div class="macbook-base"></div>
                </div>
            </div>
        </section>

        <!-- Project Details -->
        <section class="py-12 px-6">
            <div class="max-w-4xl mx-auto">
                <div class="glassmorphism rounded-2xl p-8">
                    <h2 class="text-2xl font-semibold mb-6 bg-gradient-to-r from-white to-purple-400 bg-clip-text text-transparent">
                        About This Project
                    </h2>
                    <div class="prose prose-invert max-w-none">
                        <p class="text-gray-300 leading-relaxed mb-6">
                            <?= $project['description'] ?>
                        </p>
                        
                        <h3 class="text-xl font-semibold mb-4 text-purple-400">Key Features</h3>
                        <ul class="text-gray-300 space-y-2 mb-6">
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check text-purple-400"></i>
                                <span>Modern and responsive design</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check text-purple-400"></i>
                                <span>Clean and maintainable code structure</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check text-purple-400"></i>
                                <span>Optimized for performance</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check text-purple-400"></i>
                                <span>Cross-browser compatibility</span>
                            </li>
                        </ul>

                        <h3 class="text-xl font-semibold mb-4 text-purple-400">Technical Implementation</h3>
                        <p class="text-gray-300 leading-relaxed">
                            This project was built using a modern tech stack including 
                            <?= implode(', ', array_slice($project['technologies_array'], 0, 3)) ?> 
                            and follows best practices for web development.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Projects -->
        <?php if (!empty($related_projects)): ?>
        <section class="py-16 px-6">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-light text-center mb-12 bg-gradient-to-r from-white to-purple-400 bg-clip-text text-transparent">
                    Related Projects
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($related_projects as $related): ?>
                    <a href="/projects/<?= $related['id'] ?>" 
                       class="group glassmorphism rounded-xl overflow-hidden hover:bg-white/5 transition-all duration-300 border border-gray-800 hover:border-purple-600/50">
                        <div class="aspect-video bg-gray-800 relative overflow-hidden">
                            <img src="<?= $related['image_display_url'] ?>" 
                                 alt="<?= $related['title'] ?>" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-white mb-2 group-hover:text-purple-400 transition-colors">
                                <?= $related['title'] ?>
                            </h3>
                            <p class="text-gray-400 text-sm"><?= $related['short_description'] ?></p>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
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

        // Smooth scrolling untuk anchor links
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

        // Simple image zoom effect for MacBook preview
        document.addEventListener('DOMContentLoaded', function() {
            const projectImage = document.querySelector('.project-image-full');
            
            if (projectImage) {
                projectImage.addEventListener('click', function() {
                    this.classList.toggle('scale-110');
                });
            }
        });
    </script>
</body>
</html>