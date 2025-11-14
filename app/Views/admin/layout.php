<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard' ?> - <?= $site_info['name'] ?? 'Portfolio Admin' ?></title>
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
        }
        
        .bg-background-dark {
            background-color: #0A0A0A;
        }
        
        /* Mobile menu styles */
        .mobile-menu {
            transform: translateX(-100%);
        }
        .mobile-menu.active {
            transform: translateX(0);
        }
        .backdrop {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
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
</head>
<body class="bg-background-dark font-display text-white antialiased">

    <!-- Mobile Menu Button -->
    <div class="lg:hidden fixed top-4 right-4 z-50">
        <button id="mobileMenuButton" class="glassmorphism p-3 rounded-lg">
            <i class="fas fa-bars text-white/70"></i>
        </button>
    </div>

    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        <div class="flex flex-1">
            <!-- SideNavBar -->
            <aside class="mobile-menu lg:transform-none fixed inset-y-0 left-0 z-40 w-64 flex-shrink-0 p-4 lg:static lg:z-auto">
                <div class="flex h-full flex-col justify-between rounded-2xl glassmorphism p-6">
                    <!-- Close button for mobile -->
                    <button class="lg:hidden self-end mb-4 text-white/60 hover:text-white">
                        <i class="fas fa-times text-lg"></i>
                    </button>

                    <!-- Logo and User Info -->
                    <div class="flex flex-col gap-8">
                        <div class="flex items-center gap-3">
                            <div class="size-8 text-white">
                                <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" d="M24 4H6V17.3333V30.6667H24V44H42V30.6667V17.3333H24V4Z" fill="currentColor" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h1 class="text-white text-lg font-semibold truncate"><?= $site_info['name'] ?? 'Portfolio' ?></h1>
                        </div>

                        <div class="flex items-center gap-3 p-3 rounded-lg glassmorphism">
                            <div class="bg-white/10 aspect-square rounded-full size-10 flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-white text-sm">person</span>
                            </div>
                            <div class="flex flex-col min-w-0">
                                <h1 class="text-white text-sm font-medium leading-normal truncate"><?= session()->get('username') ?? 'Admin' ?></h1>
                                <p class="text-white/60 text-xs font-normal leading-normal">Administrator</p>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <nav class="flex flex-col gap-2">
                            <a class="flex items-center gap-3 px-3 py-3 rounded-lg bg-white/10 text-white font-medium" href="/admin/dashboard">
                                <span class="material-symbols-outlined text-lg">dashboard</span>
                                <p class="text-sm font-medium leading-normal">Dashboard</p>
                            </a>
                            <a class="flex items-center gap-3 px-3 py-3 rounded-lg text-white/60 hover:bg-white/10 hover:text-white <?= strpos(current_url(), 'site-info') !== false ? 'bg-white/10 text-white' : '' ?>" href="/admin/site-info">
                                <span class="material-symbols-outlined text-lg">info</span>
                                <p class="text-sm font-medium leading-normal">Site Info</p>
                            </a>
                            <a class="flex items-center gap-3 px-3 py-3 rounded-lg text-white/60 hover:bg-white/10 hover:text-white <?= strpos(current_url(), 'projects') !== false ? 'bg-white/10 text-white' : '' ?>" href="/admin/projects">
                                <span class="material-symbols-outlined text-lg">folder</span>
                                <p class="text-sm font-medium leading-normal">Projects</p>
                            </a>
                            <a class="flex items-center gap-3 px-3 py-3 rounded-lg text-white/60 hover:bg-white/10 hover:text-white <?= strpos(current_url(), 'skills') !== false ? 'bg-white/10 text-white' : '' ?>" href="/admin/skills">
                                <span class="material-symbols-outlined text-lg">code</span>
                                <p class="text-sm font-medium leading-normal">Skills</p>
                            </a>
                            <a class="flex items-center gap-3 px-3 py-3 rounded-lg text-white/60 hover:bg-white/10 hover:text-white <?= strpos(current_url(), 'social-links') !== false ? 'bg-white/10 text-white' : '' ?>" href="/admin/social-links">
                                <span class="material-symbols-outlined text-lg">share</span>
                                <p class="text-sm font-medium leading-normal">Social Links</p>
                            </a>
                            <a class="flex items-center gap-3 px-3 py-3 rounded-lg text-white/60 hover:bg-white/10 hover:text-white <?= strpos(current_url(), 'contacts') !== false ? 'bg-white/10 text-white' : '' ?>" href="/admin/contacts">
                                <span class="material-symbols-outlined text-lg">mail</span>
                                <p class="text-sm font-medium leading-normal">Messages</p>
                            </a>
                        </nav>
                    </div>

                    <!-- Bottom Actions -->
                    <div class="flex flex-col gap-2">
                        <button id="theme-toggle" class="flex items-center gap-3 px-3 py-3 rounded-lg text-white/60 hover:bg-white/10 hover:text-white">
                            <span class="material-symbols-outlined text-lg">dark_mode</span>
                            <p class="text-sm font-medium leading-normal">Toggle Theme</p>
                        </button>
                        <a class="flex items-center gap-3 px-3 py-3 rounded-lg text-white/60 hover:bg-red-500/20 hover:text-red-400" href="/admin/logout">
                            <span class="material-symbols-outlined text-lg">logout</span>
                            <p class="text-sm font-medium leading-normal">Logout</p>
                        </a>
                    </div>
                </div>
            </aside>

            <!-- Backdrop for mobile -->
            <div id="mobileBackdrop" class="backdrop fixed inset-0 z-30 lg:hidden hidden"></div>

            <!-- Main Content -->
            <main class="flex-1 p-6 min-h-screen w-full lg:w-[calc(100%-16rem)]">
                <div class="flex flex-col gap-6">
                    <!-- Page Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h1 class="text-2xl font-light text-white"><?= $title ?? 'Dashboard' ?></h1>
                            <p class="text-white/60 mt-1 text-base">Kelola portofolio Anda dengan mudah</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-white/60 text-sm"><?= date('l, d F Y') ?></span>
                        </div>
                    </div>

                    <?php if (session()->getFlashdata('success')): ?>
    <div class="glassmorphism bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded-lg text-base">
        <i class="fas fa-check-circle mr-2"></i>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php 
$errorFlash = session()->getFlashdata('error');
if ($errorFlash): ?>
    <div class="glassmorphism bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded-lg text-base">
        <i class="fas fa-exclamation-circle mr-2"></i>
        <?php 
        if (is_array($errorFlash)) {
            // Tampilkan error pertama saja
            echo isset($errorFlash[0]) ? $errorFlash[0] : 'Terjadi kesalahan';
        } else {
            echo $errorFlash;
        }
        ?>
    </div>
<?php endif; ?>

                    <!-- Main Content Section -->
                    <div class="glassmorphism rounded-2xl p-6">
                        <?= $this->renderSection('content') ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Mobile Menu Functionality
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.querySelector('.mobile-menu');
        const mobileBackdrop = document.getElementById('mobileBackdrop');
        const closeMenuButton = mobileMenu?.querySelector('button');

        function toggleMobileMenu() {
            mobileMenu.classList.toggle('active');
            mobileBackdrop.classList.toggle('hidden');
            document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
        }

        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', toggleMobileMenu);
        }

        if (mobileBackdrop) {
            mobileBackdrop.addEventListener('click', toggleMobileMenu);
        }

        if (closeMenuButton) {
            closeMenuButton.addEventListener('click', toggleMobileMenu);
        }

        // Close menu when clicking on navigation links (mobile)
        document.querySelectorAll('.mobile-menu nav a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 1024) {
                    toggleMobileMenu();
                }
            });
        });

        // Theme Toggle Functionality
        const themeToggle = document.getElementById('theme-toggle');
        const html = document.documentElement;

        // Check for saved theme preference or respect OS preference
        const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        html.classList.toggle('dark', savedTheme === 'dark');

        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            const isDark = html.classList.contains('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            
            // Update icon
            const icon = themeToggle.querySelector('.material-symbols-outlined');
            icon.textContent = isDark ? 'light_mode' : 'dark_mode';
        });

        // Set initial icon
        const icon = themeToggle.querySelector('.material-symbols-outlined');
        if (icon) {
            icon.textContent = html.classList.contains('dark') ? 'light_mode' : 'dark_mode';
        }

        // Add active state management for navigation
        document.addEventListener('DOMContentLoaded', function() {
            const currentUrl = window.location.href;
            const navLinks = document.querySelectorAll('nav a');
            
            navLinks.forEach(link => {
                if (currentUrl.includes(link.getAttribute('href'))) {
                    link.classList.add('bg-white/10', 'text-white');
                    link.classList.remove('text-white/60');
                }
            });
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                mobileMenu.classList.remove('active');
                mobileBackdrop.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    </script>
</body>
</html>