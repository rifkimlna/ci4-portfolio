<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-light text-white">Pendidikan</h1>
            <p class="text-white/60 mt-1">Kelola riwayat pendidikan Anda</p>
        </div>
        <button onclick="openCreateModal()" class="bg-white text-black px-6 py-3 rounded-lg hover:bg-white/90 transition-colors font-medium flex items-center gap-2 w-full sm:w-auto justify-center">
            <i class="fas fa-plus"></i>
            Tambah Pendidikan
        </button>
    </div>

    <!-- Education Table -->
    <div class="glassmorphism rounded-2xl">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-xl font-light text-white">Semua Riwayat Pendidikan</h2>
        </div>
        <div class="p-6">
            <?php if (!empty($educations)): ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Pendidikan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Institusi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Periode</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Nilai</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <?php foreach ($educations as $education): ?>
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-white"><?= $education['degree'] ?></div>
                                        <?php if ($education['field_of_study']): ?>
                                            <div class="text-sm text-white/60"><?= $education['field_of_study'] ?></div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white/60"><?= $education['institution'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white/60">
                                            <?= $education['start_year'] ?>
                                            <?= $education['end_year'] ? ' - ' . $education['end_year'] : ($education['is_current'] ? ' - Sekarang' : '') ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white/60"><?= $education['grade'] ?: '-' ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openEditModal(<?= htmlspecialchars(json_encode($education)) ?>)" class="text-white hover:text-white/80 mr-4">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="/admin/education/delete/<?= $education['id'] ?>" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pendidikan ini?')">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="text-red-400 hover:text-red-300">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <div class="glassmorphism rounded-full size-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-graduation-cap text-3xl text-white/60"></i>
                    </div>
                    <h3 class="text-white text-lg font-light mb-2">Belum ada riwayat pendidikan</h3>
                    <p class="text-white/60 mb-4">Tambahkan riwayat pendidikan pertama Anda.</p>
                    <button onclick="openCreateModal()" class="bg-white text-black px-6 py-3 rounded-lg hover:bg-white/90 transition-colors font-medium flex items-center gap-2 mx-auto">
                        <i class="fas fa-plus"></i>
                        Tambah Pendidikan Pertama
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Create/Edit Modal -->
<div id="educationModal" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-70 backdrop-blur-sm"></div>
    
    <!-- Modal Content -->
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="glassmorphism rounded-2xl w-full max-w-2xl max-h-[85vh] overflow-y-auto transform transition-all">
            <!-- Header -->
            <div class="sticky top-0 glassmorphism rounded-t-2xl p-6 border-b border-white/10">
                <div class="flex items-center justify-between">
                    <h3 id="modalTitle" class="text-xl font-light text-white">Tambah Pendidikan Baru</h3>
                    <button onclick="closeModal()" class="text-white/60 hover:text-white transition-colors">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
            </div>
            
            <!-- Form -->
            <form id="educationForm" method="POST" class="p-6">
                <?= csrf_field() ?>
                <input type="hidden" id="educationId" name="id">
                
                <!-- Tampilkan validation errors di dalam modal -->
                <?php 
                $validationErrors = session()->getFlashdata('error');
                if (is_array($validationErrors)): ?>
                    <div class="mb-6 p-4 bg-red-500/20 border border-red-500 text-red-300 rounded-lg">
                        <h4 class="font-medium mb-2">Terjadi kesalahan:</h4>
                        <ul class="list-disc list-inside text-sm">
                            <?php foreach ($validationErrors as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="degree" class="block text-sm font-medium text-white/70 mb-3">Gelar / Jenis Pendidikan *</label>
                        <input type="text" id="degree" name="degree" required 
                               class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                               placeholder="Contoh: Sarjana Teknik Informatika"
                               value="<?= old('degree', '') ?>">
                    </div>

                    <div>
                        <label for="institution" class="block text-sm font-medium text-white/70 mb-3">Institusi *</label>
                        <input type="text" id="institution" name="institution" required 
                               class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                               placeholder="Nama universitas atau institusi"
                               value="<?= old('institution', '') ?>">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="field_of_study" class="block text-sm font-medium text-white/70 mb-3">Bidang Studi</label>
                            <input type="text" id="field_of_study" name="field_of_study" 
                                   class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                                   placeholder="Contoh: Computer Science"
                                   value="<?= old('field_of_study', '') ?>">
                        </div>

                        <div>
                            <label for="grade" class="block text-sm font-medium text-white/70 mb-3">Nilai / IPK</label>
                            <input type="text" id="grade" name="grade" 
                                   class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                                   placeholder="Contoh: 3.8/4.0"
                                   value="<?= old('grade', '') ?>">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="start_year" class="block text-sm font-medium text-white/70 mb-3">Tahun Mulai *</label>
                            <input type="number" id="start_year" name="start_year" required 
                                   class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                                   placeholder="2020"
                                   min="1900"
                                   max="2030"
                                   value="<?= old('start_year', '') ?>">
                        </div>

                        <div>
                            <label for="end_year" class="block text-sm font-medium text-white/70 mb-3">Tahun Selesai</label>
                            <input type="number" id="end_year" name="end_year" 
                                   class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                                   placeholder="2024"
                                   min="1900"
                                   max="2030"
                                   value="<?= old('end_year', '') ?>">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="is_current" name="is_current" value="1" 
                                   class="rounded glassmorphism border-white/20 focus:ring-white/20"
                                   <?= old('is_current') ? 'checked' : '' ?>>
                            <label for="is_current" class="text-sm font-medium text-white/70">
                                Masih berlangsung
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-white/70 mb-3">Deskripsi</label>
                        <textarea id="description" name="description" rows="4" 
                                  class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all resize-none"
                                  placeholder="Deskripsi tentang pendidikan Anda"><?= old('description', '') ?></textarea>
                    </div>

                    <div>
                        <label for="activities" class="block text-sm font-medium text-white/70 mb-3">Aktivitas & Pencapaian</label>
                        <textarea id="activities" name="activities" rows="3" 
                                  class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all resize-none"
                                  placeholder="Aktivitas ekstrakurikuler, organisasi, pencapaian"><?= old('activities', '') ?></textarea>
                    </div>
                </div>

                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <button type="submit" class="bg-white text-black px-6 py-3 rounded-lg hover:bg-white/90 transition-colors font-medium flex-1 flex items-center justify-center gap-2">
                        <i class="fas fa-save"></i>Simpan Pendidikan
                    </button>
                    <button type="button" onclick="closeModal()" class="bg-white/10 text-white px-6 py-3 rounded-lg hover:bg-white/20 transition-colors font-medium flex-1 flex items-center justify-center gap-2">
                        <i class="fas fa-times"></i>Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let currentAction = 'create';
    
    function openCreateModal() {
        currentAction = 'create';
        document.getElementById('modalTitle').textContent = 'Tambah Pendidikan Baru';
        document.getElementById('educationForm').action = '/admin/education/store';
        document.getElementById('educationForm').reset();
        document.getElementById('educationId').value = '';
        document.getElementById('educationModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        // Auto open modal jika ada error validation
        <?php if (session()->getFlashdata('error') && is_array(session()->getFlashdata('error'))): ?>
            document.getElementById('educationModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        <?php endif; ?>
    }
    
    function openEditModal(education) {
        currentAction = 'edit';
        document.getElementById('modalTitle').textContent = 'Edit Pendidikan';
        document.getElementById('educationForm').action = `/admin/education/update/${education.id}`;
        document.getElementById('educationId').value = education.id;
        document.getElementById('degree').value = education.degree;
        document.getElementById('institution').value = education.institution;
        document.getElementById('field_of_study').value = education.field_of_study || '';
        document.getElementById('grade').value = education.grade || '';
        document.getElementById('start_year').value = education.start_year;
        document.getElementById('end_year').value = education.end_year || '';
        document.getElementById('description').value = education.description || '';
        document.getElementById('activities').value = education.activities || '';
        
        // Set current status
        const isCurrentCheckbox = document.getElementById('is_current');
        if (education.is_current == 1) {
            isCurrentCheckbox.checked = true;
            document.getElementById('end_year').disabled = true;
        } else {
            isCurrentCheckbox.checked = false;
            document.getElementById('end_year').disabled = false;
        }
        
        document.getElementById('educationModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        document.getElementById('educationModal').classList.add('hidden');
        document.body.style.overflow = '';
    }
    
    // Handle current study checkbox
    document.getElementById('is_current').addEventListener('change', function(e) {
        const endYearField = document.getElementById('end_year');
        if (this.checked) {
            endYearField.disabled = true;
            endYearField.value = '';
        } else {
            endYearField.disabled = false;
        }
    });
    
    // Close modal when clicking outside
    document.getElementById('educationModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('educationModal').classList.contains('hidden')) {
            closeModal();
        }
    });
    
    // Form submission
    document.getElementById('educationForm').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
        submitBtn.disabled = true;
    });

    // Auto open modal jika ada error validation saat page load
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (session()->getFlashdata('error') && is_array(session()->getFlashdata('error'))): ?>
            openCreateModal();
        <?php endif; ?>
    });
</script>
<?= $this->endSection() ?>