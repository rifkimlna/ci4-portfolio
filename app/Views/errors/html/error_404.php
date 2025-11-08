<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan - Portfolio Admin</title>
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
        
        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        .slide-up {
            animation: slideUp 0.6s ease-out forwards;
        }
        
        .pulse-subtle {
            animation: pulseSubtle 4s ease-in-out infinite;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulseSubtle {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        * {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-black min-h-screen text-white">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="glassmorphism rounded-2xl p-8 md:p-12 max-w-md w-full text-center relative overflow-hidden">
            <!-- Subtle Background Pattern -->
            <div class="absolute inset-0 opacity-[0.02]">
                <div class="absolute top-6 left-6">
                    <i class="fas fa-square text-2xl"></i>
                </div>
                <div class="absolute bottom-6 right-6">
                    <i class="fas fa-circle text-2xl"></i>
                </div>
                <div class="absolute top-6 right-6">
                    <i class="fas fa-plus text-xl"></i>
                </div>
                <div class="absolute bottom-6 left-6">
                    <i class="fas fa-minus text-xl"></i>
                </div>
            </div>

            <!-- Main Content -->
            <div class="relative z-10">
                <!-- Logo -->
                <div class="flex justify-center mb-8 fade-in">
                    <div class="size-16 text-white">
                        <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M24 4H6V17.3333V30.6667H24V44H42V30.6667V17.3333H24V4Z" fill="currentColor" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>

                <!-- Error Icon -->
                <div class="mb-6 slide-up" style="animation-delay: 0.1s;">
                    <div class="inline-flex items-center justify-center size-16 bg-white/10 rounded-full border border-white/20">
                        <i class="fas fa-search text-white/60 text-xl"></i>
                    </div>
                </div>

                <!-- Error Number -->
                <div class="mb-4 slide-up" style="animation-delay: 0.2s;">
                    <h1 class="text-6xl md:text-7xl font-light tracking-tight text-white">
                        404
                    </h1>
                </div>

                <!-- Error Message -->
                <div class="slide-up" style="animation-delay: 0.3s;">
                    <h2 class="text-xl font-medium text-white mb-3">
                        Halaman Tidak Ditemukan
                    </h2>
                    <p class="text-white/60 text-sm leading-relaxed mb-8">
                        Halaman yang Anda cari tidak dapat ditemukan. 
                        Mungkin telah dipindahkan atau dihapus.
                    </p>
                </div>

                <!-- Error Details (Development) -->
                <?php if (ENVIRONMENT !== 'production') : ?>
                    <div class="glassmorphism rounded-lg p-4 mb-6 text-left slide-up" style="animation-delay: 0.4s;">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fas fa-info-circle text-white/40 text-sm"></i>
                            <span class="text-white/40 text-sm font-medium">Development Info</span>
                        </div>
                        <code class="text-xs text-white/60 break-words font-mono">
                            <?= nl2br(esc($message)) ?>
                        </code>
                    </div>
                <?php endif; ?>

                <!-- Action Buttons -->
                <div class="flex flex-col gap-3 slide-up" style="animation-delay: 0.5s;">
                    <a href="/admin/dashboard" 
                       class="bg-white text-black px-6 py-3 rounded-lg font-medium hover:bg-white/90 transition-all duration-200 flex items-center justify-center gap-2 group">
                       <i class="fas fa-home group-hover:scale-110 transition-transform"></i>
                       <span>Dashboard</span>
                    </a>
                    
                    <button onclick="history.back()" 
                            class="bg-transparent text-white px-6 py-3 rounded-lg font-medium hover:bg-white/10 transition-all duration-200 border border-white/20 flex items-center justify-center gap-2 group">
                       <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                       <span>Kembali</span>
                    </button>
                </div>

                <!-- Footer Note -->
                <div class="mt-8 pt-6 border-t border-white/10 slide-up" style="animation-delay: 0.6s;">
                    <p class="text-white/40 text-xs">
                        Need help? 
                        <a href="/admin/contacts" class="text-white/60 hover:text-white transition-colors">
                            Contact support
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simple hover effects
            const buttons = document.querySelectorAll('button, a');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-1px)';
                });
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Add subtle focus states
            const inputs = document.querySelectorAll('button, a');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.outline = '2px solid rgba(255, 255, 255, 0.3)';
                    this.style.outlineOffset = '2px';
                });
                input.addEventListener('blur', function() {
                    this.style.outline = 'none';
                });
            });
        });
    </script>
</body>
</html>