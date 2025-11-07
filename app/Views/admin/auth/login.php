<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?= $site_info['name'] ?? 'Portfolio Admin' ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
        .bg-background-dark {
            background-color: #0A0A0A;
        }
        .material-symbols-outlined {
          font-variation-settings:
          'FILL' 0,
          'wght' 300,
          'GRAD' 0,
          'opsz' 24
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
        
        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .split-layout {
                flex-direction: column;
            }
            .hero-section {
                padding: 2rem 1rem;
                text-align: center;
            }
            .login-section {
                min-height: auto;
                padding: 2rem 1rem;
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
                    borderRadius: {"DEFAULT": "0.5rem", "lg": "0.75rem", "xl": "1rem", "full": "9999px"},
                },
            },
        }
    </script>
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.10.95/build/spline-viewer.js"></script>
</head>
<body class="bg-background-dark font-display text-white antialiased">

    <spline-viewer url="https://prod.spline.design/lPtouUjIBDltsZ5Z/scene.splinecode"></spline-viewer>

    <div class="content-overlay">
        <div class="split-layout flex min-h-screen">
            <!-- Left Side - Hero Content -->
            <div class="hero-section flex-1 flex items-center justify-center p-8 lg:p-12 xl:p-16">
                <div class="max-w-2xl text-center lg:text-left">
                    <!-- Logo -->
                    <div class="flex items-center justify-center lg:justify-start gap-3 mb-8">
                        <div class="size-8 text-white">
                            <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M24 4H6V17.3333V30.6667H24V44H42V30.6667V17.3333H24V4Z" fill="currentColor" fill-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h1 class="text-white text-2xl font-bold leading-tight"><?= $site_info['name'] ?? 'Rifki Maulana' ?></h1>
                    </div>

                    <!-- Hero Text -->
                    <div class="space-y-6 mb-8">
                        <h2 class="text-4xl lg:text-5xl xl:text-6xl font-black leading-tight">
                            <span class="block">Admin</span>
                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-white to-[#A0A0A0]">Dashboard</span>
                        </h2>
                        <p class="text-[#A0A0A0] text-lg lg:text-xl leading-relaxed max-w-xl">
                            Kelola portofolio dan proyek Anda dengan antarmuka yang powerful dan intuitif.
                        </p>
                    </div>

                    <!-- Features List -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-center lg:justify-start gap-3 text-[#A0A0A0]">
                            <i class="fas fa-check-circle text-green-400"></i>
                            <span>Kelola proyek dan skills</span>
                        </div>
                        <div class="flex items-center justify-center lg:justify-start gap-3 text-[#A0A0A0]">
                            <i class="fas fa-check-circle text-green-400"></i>
                            <span>Update informasi kontak</span>
                        </div>
                        <div class="flex items-center justify-center lg:justify-start gap-3 text-[#A0A0A0]">
                            <i class="fas fa-check-circle text-green-400"></i>
                            <span>Pantau pesan dari pengunjung</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="login-section flex-1 flex items-center justify-center p-8 lg:p-12 xl:p-16 min-h-screen">
                <div class="w-full max-w-md">
                    <div class="glassmorphism p-8 rounded-xl glassmorphism-hover transition-all duration-300">
                        <!-- Form Header -->
                        <div class="text-center mb-8">
                            <h2 class="text-2xl font-bold text-white">Admin Login</h2>
                            <p class="text-[#A0A0A0] mt-2">Masuk ke dashboard admin</p>
                        </div>

                        <!-- Flash Messages -->
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="glassmorphism bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded-lg mb-4 text-sm">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="glassmorphism bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded-lg mb-4 text-sm">
                                <i class="fas fa-check-circle mr-2"></i>
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <!-- Login Form -->
                        <form action="/admin/login" method="POST">
                            <?= csrf_field() ?>
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-[#A0A0A0] mb-2">
                                        <i class="fas fa-envelope mr-2"></i>Email
                                    </label>
                                    <input type="email" id="email" name="email" required 
                                           value="<?= old('email') ?>"
                                           class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-[#A0A0A0] focus:ring-2 focus:ring-white/30 focus:outline-none transition-shadow border-none"
                                           placeholder="email@example.com">
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-[#A0A0A0] mb-2">
                                        <i class="fas fa-lock mr-2"></i>Password
                                    </label>
                                    <input type="password" id="password" name="password" required 
                                           class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-[#A0A0A0] focus:ring-2 focus:ring-white/30 focus:outline-none transition-shadow border-none"
                                           placeholder="Masukkan password">
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="w-full flex items-center justify-center gap-2 cursor-pointer overflow-hidden rounded-lg h-12 px-5 bg-white/10 text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-white/20 transition-colors glassmorphism-hover">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span class="truncate">Login</span>
                                </button>
                            </div>
                        </form>

                        <!-- Register Link -->
                        <div class="mt-6 text-center">
                            <p class="text-[#A0A0A0] text-sm">
                                Belum punya akun? 
                                <a href="/admin/register" class="text-white hover:text-[#A0A0A0] font-medium transition-colors">
                                    Daftar di sini
                                </a>
                            </p>
                        </div>

                        <!-- Back to Home -->
                        <div class="mt-4 text-center">
                            <a href="/" class="text-[#A0A0A0] hover:text-white transition-colors text-sm inline-flex items-center gap-2">
                                <i class="fas fa-arrow-left"></i>
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Form submission loading state
        const loginForm = document.querySelector('form[action="/admin/login"]');
        if (loginForm) {
            loginForm.addEventListener('submit', function() {
                const submitButton = this.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i><span class="truncate">Memproses...</span>';
                    submitButton.disabled = true;
                }
            });
        }

        // Smooth focus transitions for inputs
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-white/30');
            });
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-white/30');
            });
        });

        // Responsive menu (jika diperlukan)
        const menuButton = document.getElementById('menuButton');
        const mobileNav = document.getElementById('mobileNav');
        
        if (menuButton && mobileNav) {
            menuButton.addEventListener('click', () => {
                mobileNav.classList.toggle('active');
            });
        }
    </script>
</body>
</html>