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
        
        .glassmorphism-hover:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.15);
            transition: all 0.3s ease;
        }

        /* NAVBAR STYLING YANG DISESUAIKAN */
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
            white-space: nowrap;
        }
        
        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
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

        /* STYLING UNTUK CONTENT */
        .project-card {
            transition: all 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-8px);
            border-color: rgba(168, 85, 247, 0.3);
        }

        .tech-badge {
            background: rgba(168, 85, 247, 0.1);
            border: 1px solid rgba(168, 85, 247, 0.3);
            color: #d8b4fe;
            transition: all 0.3s ease;
        }

        .tech-badge:hover {
            background: rgba(168, 85, 247, 0.2);
            border-color: rgba(168, 85, 247, 0.5);
        }

        .footer-gradient {
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.05) 0%, rgba(59, 130, 246, 0.05) 100%);
        }

        .social-icon {
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            color: #a855f7 !important;
            transform: translateY(-2px);
        }

        .footer-link {
            transition: all 0.3s ease;
        }

        .footer-link:hover {
            color: #a855f7 !important;
        }
    </style>
</head>
<body class="bg-[#0A0A0A] font-sans text-white antialiased">
    
    <!-- NAVBAR YANG DISESUAIKAN -->
    <nav class="navbar-full" id="navbar">
        <div class="nav-container">
            <!-- Logo -->
            <div class="logo-compact">
                <div class="logo-icon">
                    <img src="/assets/icons/logoporto.svg" alt="Logo Portfolio" class="w-6 h-6">
                </div>
                <span class="logo-text"></span>
            </div>
            
            <!-- Navigation Links -->
            <div class="nav-links">
                <a href="/" class="nav-link">Home</a>
                <a href="/#proyek" class="nav-link">Projects</a>
                <a href="/#tentang" class="nav-link">About</a>
                <a href="/#kontak" class="nav-link">Contact</a>
            </div>
            
            <!-- CTA Button -->
            <a href="/#kontak" class="cta-button">Get In Touch</a>
            
            <!-- Mobile Menu Button -->
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
            <a href="/#proyek" class="mobile-nav-link" onclick="closeMobileNav()">Projects</a>
            <a href="/#tentang" class="mobile-nav-link" onclick="closeMobileNav()">About</a>
            <a href="/#kontak" class="mobile-nav-link" onclick="closeMobileNav()">Contact</a>
            <a href="/#kontak" class="cta-button mt-8 inline-block" onclick="closeMobileNav()">Get In Touch</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="pt-20 min-h-screen">
        <!-- Hero Section -->
        <section class="py-20 px-6">
            <div class="max-w-6xl mx-auto text-center">
            
                
                <h1 class="text-4xl md:text-6xl font-light mb-6 bg-gradient-to-r from-white to-purple-400 bg-clip-text text-transparent">
                    My Projects
                </h1>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto leading-relaxed">
                    Collection of my recent work and creative solutions
                </p>
            </div>
        </section>

        <!-- Projects Grid -->
        <section class="pb-20 px-6">
            <div class="max-w-7xl mx-auto">
                <?php if (!empty($projects)): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php foreach ($projects as $project): ?>
                            <div class="project-card glassmorphism rounded-2xl overflow-hidden group border border-gray-800">
                                <!-- Project Image -->
                                <div class="aspect-video relative overflow-hidden">
                                    <img src="<?= $project['image_display_url'] ?>" 
                                         alt="<?= $project['title'] ?>" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    
                                    <!-- Overlay with Actions -->
                                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <div class="flex gap-3">
                                            <?php if ($project['demo_url']): ?>
                                                <a href="<?= $project['demo_url'] ?>" target="_blank" 
                                                   class="bg-white text-gray-900 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors flex items-center gap-2">
                                                    <i class="fas fa-external-link-alt"></i>
                                                    Demo
                                                </a>
                                            <?php endif; ?>
                                            
                                            <a href="/projects/<?= $project['id'] ?>" 
                                               class="bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-purple-700 transition-colors flex items-center gap-2">
                                                <i class="fas fa-eye"></i>
                                                Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Project Info -->
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-white mb-3 group-hover:text-purple-400 transition-colors">
                                        <?= $project['title'] ?>
                                    </h3>
                                    
                                    <!-- Technologies -->
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <?php foreach (array_slice($project['technologies_array'], 0, 3) as $tech): ?>
                                            <span class="tech-badge px-3 py-1 rounded-full text-xs font-medium">
                                                <?= $tech ?>
                                            </span>
                                        <?php endforeach; ?>
                                        <?php if (count($project['technologies_array']) > 3): ?>
                                            <span class="tech-badge px-3 py-1 rounded-full text-xs font-medium">
                                                +<?= count($project['technologies_array']) - 3 ?> more
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <p class="text-gray-400 text-sm leading-relaxed mb-4">
                                        <?= $project['short_description'] ?>
                                    </p>
                                    
                                    <!-- Meta Info -->
                                    <div class="flex items-center justify-between text-sm text-gray-500 pt-4 border-t border-gray-800">
                                        <span class="text-purple-400"><?= $project['formatted_date'] ?></span>
                                        <a href="/projects/<?= $project['id'] ?>" class="text-purple-400 hover:text-purple-300 transition-colors flex items-center gap-1">
                                            View Project
                                            <i class="fas fa-arrow-right text-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <!-- Empty State -->
                    <div class="text-center py-20">
                        <div class="glassmorphism rounded-2xl p-12 max-w-md mx-auto border border-gray-800">
                            <i class="fas fa-folder-open text-5xl text-purple-400 mb-4"></i>
                            <h3 class="text-xl font-semibold text-white mb-2">No Projects Yet</h3>
                            <p class="text-gray-400">Projects will be displayed here once they are added.</p>
                        </div>
                    </div>
                <?php endif; ?>
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
                        <!-- Fallback default social links -->
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

        // Project card hover effects
        document.addEventListener('DOMContentLoaded', function() {
            const projectCards = document.querySelectorAll('.project-card');
            
            projectCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>