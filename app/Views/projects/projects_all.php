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

        .nav-link {
            position: relative;
            padding: 0.5rem 1rem;
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .nav-link:hover {
            color: #a855f7;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #a855f7, #8b5cf6);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 80%;
        }

        .cta-button {
            background: linear-gradient(135deg, #a855f7, #6366f1);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(168, 85, 247, 0.4);
        }

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
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-[#0A0A0A]/90 backdrop-blur-xl border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center gap-3">
                        <img src="/assets/icons/logoporto.svg" alt="Logo" class="w-8 h-8">
                        <!-- <span class="text-xl font-bold bg-gradient-to-r from-white to-purple-400 bg-clip-text text-transparent">
                            <?= $site_info['name'] ?>
                        </span> -->
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="nav-link">Home</a>
                    <a href="/#proyek" class="nav-link">Projects</a>
                    <a href="/#tentang" class="nav-link">About</a>
                    <a href="/#kontak" class="nav-link">Contact</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden md:flex items-center">
                    <a href="/#kontak" class="cta-button">
                        Get In Touch
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button class="p-2 text-gray-400 hover:text-purple-400 transition-colors">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-20 min-h-screen">
        <!-- Hero Section -->
        <section class="py-20 px-6">
            <div class="max-w-6xl mx-auto text-center">
                <a href="/" class="inline-flex items-center gap-2 text-gray-400 hover:text-purple-400 mb-8 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Home</span>
                </a>
                
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
                        <h3 class="logo-text text-xl text-white"><?= $site_info['name'] ?? 'Portfolio' ?></h3>
                    </div>
                    <p class="text-[#A0A0A0] text-sm leading-relaxed max-w-md mb-6">
                        Membangun solusi digital yang inovatif dan berdampak dengan teknologi terkini.
                    </p>
                    <div class="flex gap-4">
                        <?php if (!empty($social_links)): ?>
                            <?php foreach ($social_links as $link): ?>
                                <a href="<?= $link['url'] ?>" target="_blank" 
                                   class="social-icon text-[#A0A0A0] text-lg"
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
                            <a href="#" class="social-icon text-[#A0A0A0] text-lg" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-icon text-[#A0A0A0] text-lg" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="social-icon text-[#A0A0A0] text-lg" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-semibold mb-4 text-lg">Navigasi</h4>
                    <div class="space-y-3">
                        <a href="/#proyek" class="footer-link block text-[#A0A0A0] text-sm">Proyek</a>
                        <a href="/#tentang" class="footer-link block text-[#A0A0A0] text-sm">Tentang Saya</a>
                        <a href="/#kontak" class="footer-link block text-[#A0A0A0] text-sm">Kontak</a>
                        <a href="/admin/login" class="footer-link block text-[#A0A0A0] text-sm">Login Admin</a>
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
                        <a href="/privacy" class="footer-link text-[#A0A0A0]">Privacy</a>
                        <a href="/terms" class="footer-link text-[#A0A0A0]">Terms</a>
                        <a href="/sitemap" class="footer-link text-[#A0A0A0]">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Simple hover effects
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