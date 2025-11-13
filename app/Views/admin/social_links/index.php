<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-light text-white">Social Links</h1>
            <p class="text-white/60 mt-1">Kelola tautan media sosial Anda</p>
        </div>
        <div class="flex gap-3">
            <button onclick="addNewSocialLink()" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors font-medium flex items-center gap-2">
                <i class="fas fa-plus"></i>Tambah Baru
            </button>
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
            <p class="text-white/60 text-sm mt-1">Atur URL dan status aktif media sosial Anda</p>
        </div>
        <div class="p-6">
            <form action="/admin/social-links/update" method="POST" id="socialLinksForm">
                <?= csrf_field() ?>
                <div class="space-y-6" id="socialLinksContainer">
                    <?php if (!empty($social_links)): ?>
                        <?php foreach ($social_links as $link): ?>
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start social-link-item border-b border-white/10 pb-6 last:border-b-0 last:pb-0">
                                <!-- Platform Selection -->
                                <div class="md:col-span-3">
                                    <label class="block text-sm font-medium text-white/70 mb-3">Platform</label>
                                    <select name="links[<?= $link['id'] ?>][platform]" 
                                            class="w-full px-4 py-3 rounded-lg glassmorphism text-white focus:outline-none focus:ring-2 focus:ring-purple-500/20 transition-all appearance-none bg-[rgba(255,255,255,0.03)] border border-white/10">
                                        <option value="GitHub" <?= $link['platform'] === 'GitHub' ? 'selected' : '' ?>>GitHub</option>
                                        <option value="LinkedIn" <?= $link['platform'] === 'LinkedIn' ? 'selected' : '' ?>>LinkedIn</option>
                                        <option value="Twitter" <?= $link['platform'] === 'Twitter' ? 'selected' : '' ?>>Twitter</option>
                                        <option value="Instagram" <?= $link['platform'] === 'Instagram' ? 'selected' : '' ?>>Instagram</option>
                                        <option value="Facebook" <?= $link['platform'] === 'Facebook' ? 'selected' : '' ?>>Facebook</option>
                                        <option value="YouTube" <?= $link['platform'] === 'YouTube' ? 'selected' : '' ?>>YouTube</option>
                                        <option value="Dribbble" <?= $link['platform'] === 'Dribbble' ? 'selected' : '' ?>>Dribbble</option>
                                        <option value="Behance" <?= $link['platform'] === 'Behance' ? 'selected' : '' ?>>Behance</option>
                                        <option value="Website" <?= $link['platform'] === 'Website' ? 'selected' : '' ?>>Website</option>
                                        <option value="Other" <?= !in_array($link['platform'], ['GitHub', 'LinkedIn', 'Twitter', 'Instagram', 'Facebook', 'YouTube', 'Dribbble', 'Behance', 'Website']) ? 'selected' : '' ?>>Lainnya</option>
                                    </select>
                                </div>

                                <!-- Custom Platform Name (if Other selected) -->
                                <div class="md:col-span-2 custom-platform-field" style="<?= !in_array($link['platform'], ['GitHub', 'LinkedIn', 'Twitter', 'Instagram', 'Facebook', 'YouTube', 'Dribbble', 'Behance', 'Website']) ? '' : 'display: none;' ?>">
                                    <label class="block text-sm font-medium text-white/70 mb-3">Nama Platform</label>
                                    <input type="text" name="links[<?= $link['id'] ?>][custom_platform]" 
                                           value="<?= !in_array($link['platform'], ['GitHub', 'LinkedIn', 'Twitter', 'Instagram', 'Facebook', 'YouTube', 'Dribbble', 'Behance', 'Website']) ? $link['platform'] : '' ?>" 
                                           class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500/20 transition-all"
                                           placeholder="Nama platform">
                                </div>

                                <!-- URL -->
                                <div class="md:col-span-5">
                                    <label class="block text-sm font-medium text-white/70 mb-3">URL</label>
                                    <input type="url" name="links[<?= $link['id'] ?>][url]" 
                                           value="<?= $link['url'] ?>" 
                                           class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500/20 transition-all"
                                           placeholder="https://example.com/yourprofile">
                                </div>

                                <!-- Active Status -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-white/70 mb-3">Status</label>
                                    <div class="flex items-center gap-3">
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="links[<?= $link['id'] ?>][is_active]" 
                                                   value="1" <?= $link['is_active'] ? 'checked' : '' ?> 
                                                   class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                                        </label>
                                        <span class="text-sm text-white/60"><?= $link['is_active'] ? 'Aktif' : 'Nonaktif' ?></span>
                                    </div>
                                </div>

                                <!-- Delete Button -->
                                <div class="md:col-span-12 flex justify-end mt-2">
                                    <button type="button" onclick="deleteSocialLink(this)" 
                                            class="text-red-400 hover:text-red-300 transition-colors text-sm flex items-center gap-2">
                                        <i class="fas fa-trash"></i>Hapus
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-8">
                            <div class="glassmorphism rounded-full size-20 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-share-alt text-3xl text-white/60"></i>
                            </div>
                            <h3 class="text-white text-lg font-light mb-2">Belum ada social links</h3>
                            <p class="text-white/60">Klik "Tambah Baru" untuk menambahkan social link pertama Anda.</p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mt-8 flex gap-3">
                    <button type="submit" class="bg-gradient-to-r from-purple-600 to-purple-700 text-white px-6 py-3 rounded-lg hover:from-purple-700 hover:to-purple-800 transition-all font-medium flex items-center gap-2">
                        <i class="fas fa-save"></i>Update Social Links
                    </button>
                    <button type="button" onclick="resetForm()" class="glassmorphism text-white px-6 py-3 rounded-lg hover:bg-white/10 transition-colors font-medium flex items-center gap-2">
                        <i class="fas fa-undo"></i>Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Preview Section -->
    <div class="glassmorphism rounded-2xl p-6">
        <h3 class="text-xl font-light text-white mb-6">Preview Social Links</h3>
        <p class="text-white/60 text-sm mb-4">Hanya link dengan status "Aktif" yang akan ditampilkan</p>
        <div class="flex flex-wrap gap-4" id="previewContainer">
            <?php if (!empty($social_links)): ?>
                <?php foreach ($social_links as $link): ?>
                    <?php if (!empty($link['url']) && $link['is_active']): ?>
                        <a href="<?= $link['url'] ?>" target="_blank" 
                           class="flex items-center gap-3 px-4 py-3 rounded-lg glassmorphism hover:bg-purple-500/20 transition-colors group border border-transparent hover:border-purple-500/30">
                            <?php if ($link['platform'] === 'LinkedIn'): ?>
                                <i class="fab fa-linkedin-in text-lg text-purple-400"></i>
                            <?php elseif ($link['platform'] === 'GitHub'): ?>
                                <i class="fab fa-github text-lg text-purple-400"></i>
                            <?php elseif ($link['platform'] === 'Twitter'): ?>
                                <i class="fab fa-twitter text-lg text-purple-400"></i>
                            <?php elseif ($link['platform'] === 'Instagram'): ?>
                                <i class="fab fa-instagram text-lg text-purple-400"></i>
                            <?php elseif ($link['platform'] === 'Facebook'): ?>
                                <i class="fab fa-facebook text-lg text-purple-400"></i>
                            <?php elseif ($link['platform'] === 'YouTube'): ?>
                                <i class="fab fa-youtube text-lg text-purple-400"></i>
                            <?php elseif ($link['platform'] === 'Dribbble'): ?>
                                <i class="fab fa-dribbble text-lg text-purple-400"></i>
                            <?php elseif ($link['platform'] === 'Behance'): ?>
                                <i class="fab fa-behance text-lg text-purple-400"></i>
                            <?php else: ?>
                                <i class="fas fa-globe text-lg text-purple-400"></i>
                            <?php endif; ?>
                            <span class="text-white/80 group-hover:text-white text-sm font-medium"><?= $link['platform'] ?></span>
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
    
    input, select {
        background: rgba(255, 255, 255, 0.03) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        color: white !important;
    }
    
    input:focus, select:focus {
        outline: none;
        border-color: rgba(168, 85, 247, 0.5) !important;
        box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.1);
    }
    
    input::placeholder {
        color: rgba(255, 255, 255, 0.4) !important;
    }
    
    /* Custom checkbox toggle */
    input[type="checkbox"]:checked ~ .peer-checked\:bg-purple-600 {
        background-color: #a855f7;
    }
</style>

<script>
    let linkCounter = <?= !empty($social_links) ? count($social_links) : 0 ?>;

    // Form submission loading state
    document.getElementById('socialLinksForm').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
        submitBtn.disabled = true;
    });

    // Toggle custom platform field
    document.addEventListener('change', function(e) {
        if (e.target.name && e.target.name.includes('[platform]')) {
            const platformField = e.target.closest('.social-link-item');
            const customField = platformField.querySelector('.custom-platform-field');
            const isOther = e.target.value === 'Other';
            
            customField.style.display = isOther ? 'block' : 'none';
            if (!isOther) {
                customField.querySelector('input').value = '';
            }
        }
    });

    // Add new social link
    function addNewSocialLink() {
        linkCounter++;
        const newId = 'new_' + linkCounter;
        
        const newLinkHTML = `
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start social-link-item border-b border-white/10 pb-6">
                <div class="md:col-span-3">
                    <label class="block text-sm font-medium text-white/70 mb-3">Platform</label>
                    <select name="links[${newId}][platform]" class="w-full px-4 py-3 rounded-lg glassmorphism text-white focus:outline-none focus:ring-2 focus:ring-purple-500/20 transition-all">
                        <option value="GitHub">GitHub</option>
                        <option value="LinkedIn">LinkedIn</option>
                        <option value="Twitter">Twitter</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Facebook">Facebook</option>
                        <option value="YouTube">YouTube</option>
                        <option value="Dribbble">Dribbble</option>
                        <option value="Behance">Behance</option>
                        <option value="Website">Website</option>
                        <option value="Other">Lainnya</option>
                    </select>
                </div>
                <div class="md:col-span-2 custom-platform-field" style="display: none;">
                    <label class="block text-sm font-medium text-white/70 mb-3">Nama Platform</label>
                    <input type="text" name="links[${newId}][custom_platform]" class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500/20 transition-all" placeholder="Nama platform">
                </div>
                <div class="md:col-span-5">
                    <label class="block text-sm font-medium text-white/70 mb-3">URL</label>
                    <input type="url" name="links[${newId}][url]" class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500/20 transition-all" placeholder="https://example.com/yourprofile">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-white/70 mb-3">Status</label>
                    <div class="flex items-center gap-3">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="links[${newId}][is_active]" value="1" checked class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                        </label>
                        <span class="text-sm text-white/60">Aktif</span>
                    </div>
                </div>
                <div class="md:col-span-12 flex justify-end mt-2">
                    <button type="button" onclick="deleteSocialLink(this)" class="text-red-400 hover:text-red-300 transition-colors text-sm flex items-center gap-2">
                        <i class="fas fa-trash"></i>Hapus
                    </button>
                </div>
            </div>
        `;
        
        const container = document.getElementById('socialLinksContainer');
        if (container.querySelector('.text-center')) {
            container.innerHTML = newLinkHTML;
        } else {
            container.insertAdjacentHTML('beforeend', newLinkHTML);
        }
    }

    // Delete social link
    function deleteSocialLink(button) {
        const item = button.closest('.social-link-item');
        item.remove();
        
        // Show empty state if no items left
        const container = document.getElementById('socialLinksContainer');
        if (container.children.length === 0) {
            container.innerHTML = `
                <div class="text-center py-8">
                    <div class="glassmorphism rounded-full size-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-share-alt text-3xl text-white/60"></i>
                    </div>
                    <h3 class="text-white text-lg font-light mb-2">Belum ada social links</h3>
                    <p class="text-white/60">Klik "Tambah Baru" untuk menambahkan social link pertama Anda.</p>
                </div>
            `;
        }
    }

    // Reset form
    function resetForm() {
        if (confirm('Yakin ingin mereset semua perubahan?')) {
            document.getElementById('socialLinksForm').reset();
        }
    }

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
</script>
<?= $this->endSection() ?>