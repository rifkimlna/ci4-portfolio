<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold text-white">Site Information</h1>
            <p class="text-[#A0A0A0] mt-1">Kelola informasi website portfolio Anda</p>
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
    <div class="glassmorphism rounded-xl p-6">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-white">Edit Informasi Situs</h2>
        </div>
        
        <form action="/admin/site-info/update" method="POST">
            <?= csrf_field() ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-[#A0A0A0] mb-2">Nama *</label>
                    <input type="text" id="name" name="name" value="<?= $site_info['name'] ?? '' ?>" required
                           class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0]"
                           placeholder="Masukkan nama Anda">
                </div>
                <div>
                    <label for="title" class="block text-sm font-medium text-[#A0A0A0] mb-2">Judul Profesi *</label>
                    <input type="text" id="title" name="title" value="<?= $site_info['title'] ?? '' ?>" required
                           class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0]"
                           placeholder="Contoh: Full-Stack Developer">
                </div>
                <div class="md:col-span-2">
                    <label for="bio" class="block text-sm font-medium text-[#A0A0A0] mb-2">Bio Singkat (Hero Section) *</label>
                    <textarea id="bio" name="bio" rows="3" required
                              class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0] resize-none"
                              placeholder="Tulis bio singkat untuk hero section"><?= $site_info['bio'] ?? '' ?></textarea>
                    <p class="text-xs text-[#A0A0A0] mt-1">
                        Bio ini akan ditampilkan di hero section bawah nama.
                    </p>
                </div>
                <div class="md:col-span-2">
                    <label for="about_description" class="block text-sm font-medium text-[#A0A0A0] mb-2">Deskripsi Tentang Saya (Paragraf 1) *</label>
                    <textarea id="about_description" name="about_description" rows="4" required
                              class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0] resize-none"
                              placeholder="Tulis deskripsi tentang diri Anda (paragraf pertama)"><?= $site_info['about_description'] ?? 'Saya adalah seorang pengembang web yang bersemangat dalam mengubah ide-ide kompleks menjadi antarmuka yang elegan dan fungsional. Dengan pengalaman lebih dari 5 tahun, saya berspesialisasi dalam ekosistem JavaScript modern.' ?></textarea>
                </div>
                <div class="md:col-span-2">
                    <label for="about_experience" class="block text-sm font-medium text-[#A0A0A0] mb-2">Pengalaman & Keahlian (Paragraf 2) *</label>
                    <textarea id="about_experience" name="about_experience" rows="4" required
                              class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0] resize-none"
                              placeholder="Tulis tentang pengalaman dan keahlian teknis Anda"><?= $site_info['about_experience'] ?? 'Fokus utama saya adalah pada pengembangan front-end menggunakan React dan Vue.js, memastikan pengalaman pengguna (UX) yang mulus. Di sisi back-end, saya terampil menggunakan Node.js dan Express, serta mengelola basis data NoSQL seperti MongoDB atau Firestore.' ?></textarea>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-[#A0A0A0] mb-2">Email *</label>
                    <input type="email" id="email" name="email" value="<?= $site_info['email'] ?? '' ?>" required
                           class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0]"
                           placeholder="email@example.com">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-[#A0A0A0] mb-2">Telepon</label>
                    <input type="text" id="phone" name="phone" value="<?= $site_info['phone'] ?? '' ?>"
                           class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0]"
                           placeholder="+62 812-3456-7890">
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-primary text-background-dark px-4 py-2 rounded-lg hover:bg-primary/80 transition-colors font-bold flex-1">
                    <i class="fas fa-save mr-2"></i>Update Informasi
                </button>
                <a href="/admin/dashboard" class="bg-white/10 text-white px-4 py-2 rounded-lg hover:bg-white/20 transition-colors font-bold flex-1 text-center">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </form>
    </div>

    <!-- Preview Section -->
    <div class="glassmorphism rounded-xl p-6">
        <h3 class="text-xl font-bold text-white mb-4">Preview Tentang Saya</h3>
        <div class="glassmorphism rounded-lg p-6">
            <h4 class="text-white text-xl font-bold mb-4"><?= $site_info['name'] ?? 'Nama Anda' ?></h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <p class="text-[#A0A0A0]"><strong>Profesi:</strong> <?= $site_info['title'] ?? 'Judul profesi' ?></p>
                <p class="text-[#A0A0A0]"><strong>Email:</strong> <?= $site_info['email'] ?? 'email@example.com' ?></p>
            </div>
            
            <div class="text-[#A0A0A0] space-y-4">
                <div>
                    <p class="text-primary font-semibold mb-1">Bio:</p>
                    <p><?= $site_info['bio'] ?? 'Bio singkat Anda' ?></p>
                </div>
                <div>
                    <p class="text-primary font-semibold mb-1">Deskripsi 1:</p>
                    <p><?= $site_info['about_description'] ?? 'Deskripsi tentang diri Anda' ?></p>
                </div>
                <div>
                    <p class="text-primary font-semibold mb-1">Deskripsi 2:</p>
                    <p><?= $site_info['about_experience'] ?? 'Pengalaman dan keahlian Anda' ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .glassmorphism {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    input, textarea {
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: white !important;
    }
    
    input:focus, textarea:focus {
        outline: none;
        ring: 2px;
        ring-color: #00FFFF;
        border-color: #00FFFF !important;
    }
    
    input::placeholder, textarea::placeholder {
        color: #A0A0A0 !important;
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
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                const previewElement = document.querySelector(`[data-preview="${this.name}"]`);
                if (previewElement) {
                    previewElement.textContent = this.value || this.placeholder;
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>