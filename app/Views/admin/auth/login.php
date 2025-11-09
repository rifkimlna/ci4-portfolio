<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login <?= $site_info['name'] ?? 'Portfolio Admin' ?></title>
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
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
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
    
    <!-- SPLINE SCRIPT -->
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.10.95/build/spline-viewer.js"></script>
</head>
<body class="bg-background-dark font-display text-white antialiased">

    <!-- BACKGROUND SPLINE -->
    <spline-viewer 
        url="https://prod.spline.design/lPtouUjIBDltsZ5Z/scene.splinecode"
        hide-watermark
        background="transparent">
    </spline-viewer>

    <!-- Content Overlay -->
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
                        <h1 class="text-white text-2xl font-semibold"><?= $site_info['name'] ?? 'Portfolio' ?></h1>
                    </div>

                    <!-- Hero Text -->
                    <div class="space-y-6 mb-8">
                        <h2 class="text-4xl lg:text-5xl xl:text-6xl font-light tracking-tight">
                            <span class="block text-white">Admin</span>
                            <span class="block text-white/70">Dashboard</span>
                        </h2>
                        <p class="text-white/60 text-lg lg:text-xl leading-relaxed max-w-xl">
                            Kelola portofolio dan proyek Anda dengan antarmuka yang powerful dan intuitif.
                        </p>
                    </div>

                    <!-- Features List -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-center lg:justify-start gap-3 text-white/60">
                            <i class="fas fa-check-circle text-green-400"></i>
                            <span>Kelola proyek dan skills</span>
                        </div>
                        <div class="flex items-center justify-center lg:justify-start gap-3 text-white/60">
                            <i class="fas fa-check-circle text-green-400"></i>
                            <span>Update informasi kontak</span>
                        </div>
                        <div class="flex items-center justify-center lg:justify-start gap-3 text-white/60">
                            <i class="fas fa-check-circle text-green-400"></i>
                            <span>Pantau pesan dari pengunjung</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="login-section flex-1 flex items-center justify-center p-8 lg:p-12 xl:p-16 min-h-screen">
                <div class="w-full max-w-md">
                    <div class="glassmorphism p-8 rounded-3xl transition-all duration-300">
                        <!-- Form Header -->
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-light text-white mb-2">Admin Login</h2>
                            <p class="text-white/60">Masuk ke dashboard admin</p>
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
                        <form action="/admin/login" method="POST" class="space-y-6">
                            <?= csrf_field() ?>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-white/70 mb-3">
                                    Email
                                </label>
                                <input type="email" id="email" name="email" required 
                                       value="<?= old('email') ?>"
                                       class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                                       placeholder="email@example.com">
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-white/70 mb-3">
                                    Password
                                </label>
                                <input type="password" id="password" name="password" required 
                                       class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                                       placeholder="Masukkan password">
                            </div>

                            <div class="mt-8">
                                <button type="submit" class="w-full bg-white text-black py-3 rounded-lg font-medium hover:bg-white/90 transition-colors">
                                    Login
                                </button>
                            </div>
                        </form>

                        <!-- Register Link -->
                        <div class="mt-6 text-center">
                            <p class="text-white/60 text-sm">
                                Belum punya akun? 
                                <a href="/admin/register" class="text-white hover:text-white/80 font-medium transition-colors">
                                    Daftar di sini
                                </a>
                            </p>
                        </div>

                        <!-- Back to Home -->
                        <div class="mt-6 text-center">
                            <a href="/" class="text-white/60 hover:text-white transition-colors text-sm inline-flex items-center gap-2">
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
                    submitButton.innerHTML = 'Memproses...';
                    submitButton.disabled = true;
                }
            });
        }

        // Smooth focus transitions for inputs
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.classList.add('ring-2', 'ring-white/20');
            });
            input.addEventListener('blur', function() {
                this.classList.remove('ring-2', 'ring-white/20');
            });
        });

        // Add animation classes
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.glassmorphism');
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                
                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>