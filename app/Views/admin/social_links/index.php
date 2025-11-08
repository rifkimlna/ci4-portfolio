<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-light text-white">Social Links</h1>
            <p class="text-white/60 mt-1">Kelola tautan media sosial Anda</p>
        </div>
    </div>

    <!-- Notifications -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="glassmorphism bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded-lg">
            <i class="fas fa-check-circle mr-2"></i>
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="glassmorphism bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded-lg">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- Social Links Form -->
    <div class="glassmorphism rounded-2xl">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-xl font-light text-white">Social Media Profiles</h2>
        </div>
        <div class="p-6">
            <form action="/admin/social-links/update" method="POST">
                <?= csrf_field() ?>
                <div class="space-y-6">
                    <?php if (!empty($social_links)): ?>
                        <?php foreach ($social_links as $link): ?>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-white/70 mb-3">Platform</label>
                                    <input type="text" value="<?= $link['platform'] ?>" 
                                           class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                                           readonly>
                                    <input type="hidden" name="links[<?= $link['id'] ?>][platform]" value="<?= $link['platform'] ?>">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-white/70 mb-3">URL</label>
                                    <input type="url" name="links[<?= $link['id'] ?>][url]" value="<?= $link['url'] ?>" 
                                           class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                                           placeholder="https://example.com/yourprofile">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-8">
                            <div class="glassmorphism rounded-full size-20 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-share-alt text-3xl text-white/60"></i>
                            </div>
                            <h3 class="text-white text-lg font-light mb-2">Belum ada social links</h3>
                            <p class="text-white/60">Social links belum dikonfigurasi.</p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mt-8">
                    <button type="submit" class="bg-white text-black px-6 py-3 rounded-lg hover:bg-white/90 transition-colors font-medium flex items-center gap-2">
                        <i class="fas fa-save"></i>Update Social Links
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Preview Section -->
    <div class="glassmorphism rounded-2xl p-6">
        <h3 class="text-xl font-light text-white mb-6">Preview Social Links</h3>
        <div class="flex flex-wrap gap-4">
            <?php if (!empty($social_links)): ?>
                <?php foreach ($social_links as $link): ?>
                    <?php if (!empty($link['url'])): ?>
                        <a href="<?= $link['url'] ?>" target="_blank" 
                           class="flex items-center gap-3 px-4 py-3 rounded-lg glassmorphism hover:bg-white/10 transition-colors group">
                            <?php if ($link['platform'] === 'LinkedIn'): ?>
                                <i class="fab fa-linkedin-in text-lg text-white/60 group-hover:text-white"></i>
                            <?php elseif ($link['platform'] === 'GitHub'): ?>
                                <i class="fab fa-github text-lg text-white/60 group-hover:text-white"></i>
                            <?php elseif ($link['platform'] === 'Twitter'): ?>
                                <i class="fab fa-twitter text-lg text-white/60 group-hover:text-white"></i>
                            <?php elseif ($link['platform'] === 'Instagram'): ?>
                                <i class="fab fa-instagram text-lg text-white/60 group-hover:text-white"></i>
                            <?php elseif ($link['platform'] === 'Facebook'): ?>
                                <i class="fab fa-facebook text-lg text-white/60 group-hover:text-white"></i>
                            <?php else: ?>
                                <i class="fas fa-globe text-lg text-white/60 group-hover:text-white"></i>
                            <?php endif; ?>
                            <span class="text-white/60 group-hover:text-white text-sm font-medium"><?= $link['platform'] ?></span>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center w-full py-4">
                    <p class="text-white/60">Tambahkan URL social media untuk melihat preview</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .glassmorphism {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    input {
        background: rgba(255, 255, 255, 0.03) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        color: white !important;
    }
    
    input:focus {
        outline: none;
        ring: 2px;
        ring-color: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.2) !important;
    }
    
    input::placeholder {
        color: rgba(255, 255, 255, 0.4) !important;
    }
    
    input[readonly] {
        background: rgba(255, 255, 255, 0.02) !important;
        color: rgba(255, 255, 255, 0.6) !important;
        cursor: not-allowed;
    }
</style>

<script>
    // Form submission loading state
    document.querySelector('form').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
        submitBtn.disabled = true;
    });

    // Add animations
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

    // Real-time preview update
    document.addEventListener('DOMContentLoaded', function() {
        const urlInputs = document.querySelectorAll('input[type="url"]');
        
        urlInputs.forEach(input => {
            input.addEventListener('input', function() {
                // You could add real-time preview updates here if needed
                // For example, updating the preview links dynamically
            });
        });
    });
</script>
<?= $this->endSection() ?>