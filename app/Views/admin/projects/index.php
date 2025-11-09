<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-light text-white">Projects</h1>
            <p class="text-white/60 mt-1">Kelola proyek portfolio Anda</p>
        </div>
        <button onclick="openCreateModal()" class="bg-white text-black px-6 py-3 rounded-lg hover:bg-white/90 transition-colors font-medium flex items-center gap-2 w-full sm:w-auto justify-center">
            <i class="fas fa-plus"></i>
            Tambah Project
        </button>
    </div>

    <!-- HAPUS BAGIAN NOTIFICATIONS DI SINI karena sudah ada di layout -->

    <!-- Projects Table -->
    <div class="glassmorphism rounded-2xl">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-xl font-light text-white">Semua Projects</h2>
        </div>
        <div class="p-6">
            <?php if (!empty($projects)): ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Gambar</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Teknologi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <?php foreach ($projects as $project): ?>
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php if ($project['image_url']): ?>
                                            <img src="<?= base_url($project['image_url']) ?>" alt="<?= $project['title'] ?>" class="w-16 h-16 object-cover rounded-lg border border-white/10">
                                        <?php else: ?>
                                            <div class="w-16 h-16 bg-white/10 rounded-lg flex items-center justify-center border border-white/10">
                                                <i class="fas fa-image text-white/40"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-white"><?= $project['title'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white/60"><?= $project['technologies'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openEditModal(<?= htmlspecialchars(json_encode($project)) ?>)" class="text-white hover:text-white/80 mr-4">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="/admin/projects/delete/<?= $project['id'] ?>" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus project ini?')">
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
                        <i class="fas fa-folder-open text-3xl text-white/60"></i>
                    </div>
                    <h3 class="text-white text-lg font-light mb-2">Belum ada projects</h3>
                    <p class="text-white/60 mb-4">Tambahkan project pertama Anda untuk ditampilkan di portfolio.</p>
                    <button onclick="openCreateModal()" class="bg-white text-black px-6 py-3 rounded-lg hover:bg-white/90 transition-colors font-medium flex items-center gap-2 mx-auto">
                        <i class="fas fa-plus"></i>
                        Tambah Project Pertama
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Create/Edit Modal -->
<div id="projectModal" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-70 backdrop-blur-sm"></div>
    
    <!-- Modal Content -->
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="glassmorphism rounded-2xl w-full max-w-2xl max-h-[85vh] overflow-y-auto transform transition-all">
            <!-- Header -->
            <div class="sticky top-0 glassmorphism rounded-t-2xl p-6 border-b border-white/10">
                <div class="flex items-center justify-between">
                    <h3 id="modalTitle" class="text-xl font-light text-white">Tambah Project Baru</h3>
                    <button onclick="closeModal()" class="text-white/60 hover:text-white transition-colors">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
            </div>
            
            <!-- Form -->
            <form id="projectForm" method="POST" enctype="multipart/form-data" class="p-6">
                <?= csrf_field() ?>
                <input type="hidden" id="projectId" name="id">
                
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
                        <label for="title" class="block text-sm font-medium text-white/70 mb-3">Judul Project *</label>
                        <input type="text" id="title" name="title" required 
                               class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                               placeholder="Nama project Anda"
                               value="<?= old('title', '') ?>">
                    </div>

                    <div>
                        <label for="technologies" class="block text-sm font-medium text-white/70 mb-3">Teknologi</label>
                        <input type="text" id="technologies" name="technologies" 
                               class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                               placeholder="React, Node.js, MongoDB, etc."
                               value="<?= old('technologies', '') ?>">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-white/70 mb-3">Deskripsi *</label>
                        <textarea id="description" name="description" rows="4" required 
                                  class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all resize-none"
                                  placeholder="Deskripsi lengkap tentang project Anda"><?= old('description', '') ?></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="demo_url" class="block text-sm font-medium text-white/70 mb-3">URL Demo</label>
                            <input type="url" id="demo_url" name="demo_url" 
                                   class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                                   placeholder="https://demo.example.com"
                                   value="<?= old('demo_url', '') ?>">
                        </div>

                        <div>
                            <label for="source_code_url" class="block text-sm font-medium text-white/70 mb-3">URL Source Code</label>
                            <input type="url" id="source_code_url" name="source_code_url" 
                                   class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all"
                                   placeholder="https://github.com/username/repo"
                                   value="<?= old('source_code_url', '') ?>">
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="project_image" class="block text-sm font-medium text-white/70 mb-3">Gambar Project</label>
                        <div class="flex items-center gap-4">
                            <div class="flex-1">
                                <input type="file" id="project_image" name="project_image" accept="image/*" 
                                       class="w-full px-4 py-3 rounded-lg glassmorphism text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-white file:text-black hover:file:bg-white/90">
                            </div>
                        </div>
                        <p class="text-xs text-white/60 mt-2">Format: JPG, PNG, GIF. Maksimal 5MB</p>
                        
                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-3 hidden">
                            <p class="text-sm text-white/60 mb-2">Preview gambar baru:</p>
                            <img id="previewImage" class="max-w-full h-32 object-cover rounded-lg border border-white/10">
                        </div>
                        
                        <!-- Current Image (for edit) -->
                        <div id="currentImage" class="mt-3 hidden">
                            <p class="text-sm text-white/60 mb-2">Gambar saat ini:</p>
                            <img id="currentImageSrc" class="max-w-full h-32 object-cover rounded-lg border border-white/10">
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <button type="submit" class="bg-white text-black px-6 py-3 rounded-lg hover:bg-white/90 transition-colors font-medium flex-1 flex items-center justify-center gap-2">
                        <i class="fas fa-save"></i>Simpan Project
                    </button>
                    <button type="button" onclick="closeModal()" class="bg-white/10 text-white px-6 py-3 rounded-lg hover:bg-white/20 transition-colors font-medium flex-1 flex items-center justify-center gap-2">
                        <i class="fas fa-times"></i>Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript dan CSS tetap sama -->
<script>
    let currentAction = 'create';
    
    function openCreateModal() {
        currentAction = 'create';
        document.getElementById('modalTitle').textContent = 'Tambah Project Baru';
        document.getElementById('projectForm').action = '/admin/projects/store';
        document.getElementById('projectForm').reset();
        document.getElementById('projectId').value = '';
        document.getElementById('imagePreview').classList.add('hidden');
        document.getElementById('currentImage').classList.add('hidden');
        document.getElementById('projectModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        // Auto open modal jika ada error validation
        <?php if (session()->getFlashdata('error') && is_array(session()->getFlashdata('error'))): ?>
            document.getElementById('projectModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        <?php endif; ?>
    }
    
    function openEditModal(project) {
        currentAction = 'edit';
        document.getElementById('modalTitle').textContent = 'Edit Project';
        document.getElementById('projectForm').action = `/admin/projects/update/${project.id}`;
        document.getElementById('projectId').value = project.id;
        document.getElementById('title').value = project.title;
        document.getElementById('technologies').value = project.technologies || '';
        document.getElementById('description').value = project.description;
        document.getElementById('demo_url').value = project.demo_url || '';
        document.getElementById('source_code_url').value = project.source_code_url || '';
        
        // Show current image if exists
        const currentImageDiv = document.getElementById('currentImage');
        if (project.image_url) {
            const currentImageSrc = document.getElementById('currentImageSrc');
            if (currentImageSrc) {
                currentImageSrc.src = '<?= base_url() ?>' + project.image_url;
            }
            currentImageDiv.classList.remove('hidden');
        } else {
            currentImageDiv.classList.add('hidden');
        }
        
        document.getElementById('imagePreview').classList.add('hidden');
        document.getElementById('projectModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        document.getElementById('projectModal').classList.add('hidden');
        document.body.style.overflow = '';
    }
    
    // Image preview functionality
    document.getElementById('project_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
        }
    });
    
    // Close modal when clicking outside
    document.getElementById('projectModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('projectModal').classList.contains('hidden')) {
            closeModal();
        }
    });
    
    // Form submission
    document.getElementById('projectForm').addEventListener('submit', function(e) {
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