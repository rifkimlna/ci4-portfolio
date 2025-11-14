<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?= $site_info['name'] ?? 'Portfolio Admin' ?></title>
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

        /* Chart styling */
        .chart-path {
            stroke: #00FFFF;
            stroke-width: 2;
            fill: url(#chartGradient);
        }

        /* Active menu state */
        .nav-item.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }
    </style>
    
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#00FFFF",
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
                            <h1 class="text-white text-lg font-semibold"><?= $site_info['name'] ?? 'Portfolio' ?></h1>
                        </div>

                        <!-- User Info -->
                        <div class="flex items-center gap-3 p-3 rounded-lg glassmorphism">
                            <div class="bg-white/10 aspect-square rounded-full size-10 flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-white text-sm">person</span>
                            </div>
                            <div class="flex flex-col min-w-0">
                                <h1 class="text-white text-sm font-medium leading-normal truncate"><?= session()->get('username') ?? 'Admin' ?></h1>
                                <p class="text-white/60 text-xs font-normal leading-normal">Administrator</p>
                            </div>
                        </div>

                        <!-- Main Navigation -->
                        <nav class="flex flex-col gap-2">
                            <a class="nav-item flex items-center gap-3 px-3 py-3 rounded-lg bg-white/10 text-white font-medium" href="/admin/dashboard">
                                <span class="material-symbols-outlined text-lg">dashboard</span>
                                <p class="text-sm font-medium leading-normal">Dashboard</p>
                            </a>
                            <a class="nav-item flex items-center gap-3 px-3 py-3 rounded-lg text-white/60 hover:bg-white/10 hover:text-white" href="/admin/site-info">
                                <span class="material-symbols-outlined text-lg">info</span>
                                <p class="text-sm font-medium leading-normal">Site Info</p>
                            </a>
                            <a class="nav-item flex items-center gap-3 px-3 py-3 rounded-lg text-white/60 hover:bg-white/10 hover:text-white" href="/admin/projects">
                                <span class="material-symbols-outlined text-lg">folder</span>
                                <p class="text-sm font-medium leading-normal">Projects</p>
                            </a>
                            <a class="nav-item flex items-center gap-3 px-3 py-3 rounded-lg text-white/60 hover:bg-white/10 hover:text-white" href="/admin/skills">
                                <span class="material-symbols-outlined text-lg">code</span>
                                <p class="text-sm font-medium leading-normal">Skills</p>
                            </a>
                            <a class="nav-item flex items-center gap-3 px-3 py-3 rounded-lg text-white/60 hover:bg-white/10 hover:text-white" href="/admin/social-links">
                                <span class="material-symbols-outlined text-lg">share</span>
                                <p class="text-sm font-medium leading-normal">Social Links</p>
                            </a>
                            <a class="nav-item flex items-center gap-3 px-3 py-3 rounded-lg text-white/60 hover:bg-white/10 hover:text-white" href="/admin/contacts">
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
                    <!-- Welcome Section -->
                    <div class="glassmorphism rounded-2xl p-6">
                        <h1 class="text-2xl font-light text-white mb-2">Selamat datang, <?= session()->get('username') ?? 'Admin' ?></h1>
                        <p class="text-white/60">Ringkasan aktivitas dan statistik portfolio</p>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Total Projects -->
                        <div class="glassmorphism rounded-2xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-white/60 text-sm font-medium">Total Projek</h3>
                                <span class="material-symbols-outlined text-white/60">folder</span>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-white text-3xl font-bold"><?= $project_count ?? '1' ?></p>
                                <p class="text-green-400 text-sm font-medium">+2 bulan ini</p>
                            </div>
                        </div>

                        <!-- Unread Messages -->
                        <div class="glassmorphism rounded-2xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-white/60 text-sm font-medium">Pesan Belum Dibaca</h3>
                                <span class="material-symbols-outlined text-white/60">mail</span>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-white text-3xl font-bold"><?= $unread_contact_count ?? '1' ?></p>
                                <p class="text-green-400 text-sm font-medium">+1 hari ini</p>
                            </div>
                        </div>

                        <!-- Total Skills -->
                        <div class="glassmorphism rounded-2xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-white/60 text-sm font-medium">Total Skills</h3>
                                <span class="material-symbols-outlined text-white/60">code</span>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-white text-3xl font-bold"><?= $skill_count ?? '1' ?></p>
                                <p class="text-green-400 text-sm font-medium">+5.2% bulan ini</p>
                            </div>
                        </div>
                    </div>

                    <!-- Analytics and Recent Messages -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Analytics Chart -->
                        <div class="lg:col-span-2 glassmorphism rounded-2xl p-6">
                            <h2 class="text-white text-xl font-light mb-6">Analitik Pengunjung</h2>
                            <div class="flex flex-col gap-4">
                                <div class="flex items-baseline gap-2">
                                    <p class="text-white text-3xl font-bold">1.2k</p>
                                    <p class="text-green-400 text-sm font-medium">+4.2%</p>
                                </div>
                                <p class="text-white/60 text-sm">30 Hari Terakhir</p>
                                
                                <!-- Chart -->
                                <div class="mt-4">
                                    <svg width="100%" height="120" viewBox="0 0 400 120" class="max-w-full">
                                        <defs>
                                            <linearGradient id="chartGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                                <stop offset="0%" stop-color="#00FFFF" stop-opacity="0.3" />
                                                <stop offset="100%" stop-color="#00FFFF" stop-opacity="0" />
                                            </linearGradient>
                                        </defs>
                                        <path class="chart-path" d="M0,80 C50,80 50,20 100,20 C150,20 150,60 200,60 C250,60 250,30 300,30 C350,30 350,90 400,90" 
                                              fill="url(#chartGradient)" />
                                    </svg>
                                    <div class="flex justify-between text-xs text-white/60 mt-2">
                                        <span>Minggu 1</span>
                                        <span>Minggu 2</span>
                                        <span>Minggu 3</span>
                                        <span>Minggu 4</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Messages -->
                        <div class="lg:col-span-1 glassmorphism rounded-2xl p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-white text-xl font-light">Pesan Terbaru</h2>
                                <a href="/admin/contacts" class="text-white/60 hover:text-white text-sm">
                                    Lihat semua
                                </a>
                            </div>
                            <div class="space-y-4 max-h-[300px] overflow-y-auto">
                                <?php if (!empty($recent_contacts)): ?>
                                    <?php foreach ($recent_contacts as $contact): ?>
                                        <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-white/5">
                                            <div class="bg-white/10 rounded-full size-10 flex items-center justify-center flex-shrink-0">
                                                <span class="material-symbols-outlined text-white text-sm">person</span>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex justify-between items-start">
                                                    <h3 class="text-white text-sm font-medium truncate"><?= $contact['name'] ?></h3>
                                                    <span class="text-white/60 text-xs flex-shrink-0 ml-2"><?= date('M j', strtotime($contact['created_at'])) ?></span>
                                                </div>
                                                <p class="text-white/60 text-xs mt-1 line-clamp-2"><?= $contact['message'] ?></p>
                                            </div>
                                            <?php if (!$contact['is_read']): ?>
                                                <div class="size-2 bg-primary rounded-full mt-2 flex-shrink-0"></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <!-- Fallback messages -->
                                    <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-white/5">
                                        <div class="bg-white/10 rounded-full size-10 flex items-center justify-center flex-shrink-0">
                                            <span class="material-symbols-outlined text-white text-sm">person</span>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-white text-sm font-medium truncate">Rifki Maulana</h3>
                                            <p class="text-white/60 text-xs mt-1 line-clamp-2">Tolong untuk bisa menjadi yang terbaik dalam bidang ini...</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-white/5">
                                        <div class="bg-white/10 rounded-full size-10 flex items-center justify-center flex-shrink-0">
                                            <span class="material-symbols-outlined text-white text-sm">person</span>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-white text-sm font-medium truncate">Rifki Maulana</h3>
                                            <p class="text-white/60 text-xs mt-1 line-clamp-2">Tolong untuk bisa menjadi yang terbaik dalam bidang ini...</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Tambah Projek Baru Section -->
                    <div class="glassmorphism rounded-2xl p-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div>
                                <h2 class="text-white text-xl font-light">Tambah Projek Baru</h2>
                                <p class="text-white/60 text-sm mt-1">Mulai proyek portfolio baru Anda</p>
                            </div>
                            <a href="/admin/projects" class="bg-white text-black text-sm font-medium py-3 px-6 rounded-lg hover:bg-white/90 inline-flex items-center justify-center gap-2 w-full sm:w-auto">
                                <span class="material-symbols-outlined text-lg">add</span>
                                Tambah Projek
                            </a>
                        </div>
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

        // Active menu state based on current URL
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navItems = document.querySelectorAll('.nav-item');
            
            navItems.forEach(item => {
                const href = item.getAttribute('href');
                if (currentPath === href || currentPath.startsWith(href + '/')) {
                    item.classList.add('bg-white/10', 'text-white');
                    item.classList.remove('text-white/60');
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