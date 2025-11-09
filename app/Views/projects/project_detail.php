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
                        
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-400 hover:text-purple-400 transition-colors">Home</a>
                    <a href="/projects" class="text-gray-400 hover:text-purple-400 transition-colors">All Projects</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden md:flex items-center">
                    <a href="/#kontak" class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:from-purple-700 hover:to-blue-700 transition-all">
                        Get In Touch
                    </a>
                </div>
            </div>
        </div>
    </nav>

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
                           class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:from-purple-700 hover:to-blue-700 transition-all flex items-center gap-2">
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

                <!-- Project Image -->
                <div class="rounded-2xl overflow-hidden mb-12 border border-gray-800">
                    <img src="<?= $project['image_display_url'] ?>" 
                         alt="<?= $project['title'] ?>" 
                         class="w-full h-96 object-cover gallery-image">
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
        // Simple image zoom effect
        document.addEventListener('DOMContentLoaded', function() {
            const galleryImages = document.querySelectorAll('.gallery-image');
            
            galleryImages.forEach(img => {
                img.addEventListener('click', function() {
                    this.classList.toggle('scale-105');
                });
            });
        });
    </script>
</body>
</html>