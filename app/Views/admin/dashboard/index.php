<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
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

<style>
    .chart-path {
        stroke: #00FFFF;
        stroke-width: 2;
        fill: url(#chartGradient);
    }
</style>
<?= $this->endSection() ?>