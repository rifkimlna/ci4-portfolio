<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-light text-white">Site Information</h1>
            <p class="text-white/60 mt-1">Kelola informasi website portfolio Anda</p>
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

    <!-- Edit Form -->
    <div class="glassmorphism rounded-2xl p-6">
        <div class="mb-6">
            <h2 class="text-xl font-light text-white">Edit Informasi Situs</h2>
        </div>
        
        <form action="/admin/site-info/update" method="POST">
            <?= csrf_field() ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-white/70 mb-3">Nama *</label>
                    <input type="text" id="name" name="name" value="<?= $site_info['name'] ?? '' ?>" required
                           class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                           placeholder="Masukkan nama Anda">
                </div>
                <div>
                    <label for="title" class="block text-sm font-medium text-white/70 mb-3">Judul Profesi *</label>
                    <input type="text" id="title" name="title" value="<?= $site_info['title'] ?? '' ?>" required
                           class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                           placeholder="Contoh: Full-Stack Developer">
                </div>
                <div class="md:col-span-2">
                    <label for="bio" class="block text-sm font-medium text-white/70 mb-3">Bio Singkat (Hero Section) *</label>
                    <textarea id="bio" name="bio" rows="3" required
                              class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all resize-none"
                              placeholder="Tulis bio singkat untuk hero section"><?= $site_info['bio'] ?? '' ?></textarea>
                    <p class="text-xs text-white/60 mt-2">
                        Bio ini akan ditampilkan di hero section bawah nama.
                    </p>
                </div>
                <div class="md:col-span-2">
                    <label for="about_description" class="block text-sm font-medium text-white/70 mb-3">Deskripsi Tentang Saya (Paragraf 1) *</label>
                    <textarea id="about_description" name="about_description" rows="4" required
                              class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all resize-none"
                              placeholder="Tulis deskripsi tentang diri Anda (paragraf pertama)"><?= $site_info['about_description'] ?? 'Saya adalah seorang pengembang web yang bersemangat dalam mengubah ide-ide kompleks menjadi antarmuka yang elegan dan fungsional. Dengan pengalaman lebih dari 5 tahun, saya berspesialisasi dalam ekosistem JavaScript modern.' ?></textarea>
                </div>
                <div class="md:col-span-2">
                    <label for="about_experience" class="block text-sm font-medium text-white/70 mb-3">Pengalaman & Keahlian (Paragraf 2) *</label>
                    <textarea id="about_experience" name="about_experience" rows="4" required
                              class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all resize-none"
                              placeholder="Tulis tentang pengalaman dan keahlian teknis Anda"><?= $site_info['about_experience'] ?? 'Fokus utama saya adalah pada pengembangan front-end menggunakan React dan Vue.js, memastikan pengalaman pengguna (UX) yang mulus. Di sisi back-end, saya terampil menggunakan Node.js dan Express, serta mengelola basis data NoSQL seperti MongoDB atau Firestore.' ?></textarea>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-white/70 mb-3">Email *</label>
                    <input type="email" id="email" name="email" value="<?= $site_info['email'] ?? '' ?>" required
                           class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                           placeholder="email@example.com">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-white/70 mb-3">Telepon</label>
                    <input type="text" id="phone" name="phone" value="<?= $site_info['phone'] ?? '' ?>"
                           class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                           placeholder="+62 812-3456-7890">
                </div>
            </div>
            <div class="mt-8 flex flex-col sm:flex-row gap-4">
                <button type="submit" class="bg-white text-black px-6 py-3 rounded-lg hover:bg-white/90 transition-colors font-medium flex-1 flex items-center justify-center gap-2">
                    <i class="fas fa-save"></i>Update Informasi
                </button>
                <a href="/admin/dashboard" class="bg-white/10 text-white px-6 py-3 rounded-lg hover:bg-white/20 transition-colors font-medium flex-1 text-center flex items-center justify-center gap-2">
                    <i class="fas fa-arrow-left"></i>Kembali
                </a>
            </div>
        </form>
    </div>

    <!-- Preview Section -->
    <div class="glassmorphism rounded-2xl p-6">
        <h3 class="text-xl font-light text-white mb-6">Preview Tentang Saya</h3>
        <div class="glassmorphism rounded-xl p-6">
            <h4 class="text-white text-xl font-light mb-4"><?= $site_info['name'] ?? 'Nama Anda' ?></h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <p class="text-white/60"><strong>Profesi:</strong> <?= $site_info['title'] ?? 'Judul profesi' ?></p>
                <p class="text-white/60"><strong>Email:</strong> <?= $site_info['email'] ?? 'email@example.com' ?></p>
            </div>
            
            <div class="text-white/60 space-y-6">
                <div>
                    <p class="text-white font-medium mb-2">Bio:</p>
                    <p class="leading-relaxed"><?= $site_info['bio'] ?? 'Bio singkat Anda' ?></p>
                </div>
                <div>
                    <p class="text-white font-medium mb-2">Deskripsi 1:</p>
                    <p class="leading-relaxed"><?= $site_info['about_description'] ?? 'Deskripsi tentang diri Anda' ?></p>
                </div>
                <div>
                    <p class="text-white font-medium mb-2">Deskripsi 2:</p>
                    <p class="leading-relaxed"><?= $site_info['about_experience'] ?? 'Pengalaman dan keahlian Anda' ?></p>
                </div>
            </div>
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
    
    input, textarea {
        background: rgba(255, 255, 255, 0.03) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        color: white !important;
    }
    
    input:focus, textarea:focus {
        outline: none;
        ring: 2px;
        ring-color: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.2) !important;
    }
    
    input::placeholder, textarea::placeholder {
        color: rgba(255, 255, 255, 0.4) !important;
    }
</style>

<script>
    // Form submission loading state
    document.querySelector('form').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
        submitBtn.disabled = true;
    });

    // Real-time preview update
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('input, textarea');
        const previewElements = {
            'name': document.querySelector('h4'),
            'title': document.querySelector('p:has(strong:contains("Profesi"))'),
            'bio': document.querySelector('.text-white\\/60 > div:nth-child(1) p:last-child'),
            'about_description': document.querySelector('.text-white\\/60 > div:nth-child(2) p:last-child'),
            'about_experience': document.querySelector('.text-white\\/60 > div:nth-child(3) p:last-child'),
            'email': document.querySelector('p:has(strong:contains("Email"))')
        };

        inputs.forEach(input => {
            input.addEventListener('input', function() {
                const name = this.name;
                if (previewElements[name]) {
                    if (name === 'name') {
                        previewElements[name].textContent = this.value || 'Nama Anda';
                    } else if (name === 'title') {
                        const profesiElement = previewElements[name];
                        profesiElement.innerHTML = `<strong>Profesi:</strong> ${this.value || 'Judul profesi'}`;
                    } else if (name === 'email') {
                        const emailElement = previewElements[name];
                        emailElement.innerHTML = `<strong>Email:</strong> ${this.value || 'email@example.com'}`;
                    } else {
                        previewElements[name].textContent = this.value || this.placeholder;
                    }
                }
            });
        });
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
</script>
<?= $this->endSection() ?>