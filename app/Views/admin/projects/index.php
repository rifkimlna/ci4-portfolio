<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold text-white">Projects</h1>
            <p class="text-[#A0A0A0] mt-1">Kelola proyek portfolio Anda</p>
        </div>
        <button onclick="openCreateModal()" class="bg-primary text-background-dark px-6 py-3 rounded-lg hover:bg-primary/80 transition-colors font-bold flex items-center gap-2 w-full sm:w-auto justify-center">
            <i class="fas fa-plus"></i>
            Tambah Project
        </button>
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

    <!-- Projects Table -->
    <div class="glassmorphism rounded-xl">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-xl font-bold text-white">Semua Projects</h2>
        </div>
        <div class="p-6">
            <?php if (!empty($projects)): ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#A0A0A0] uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#A0A0A0] uppercase tracking-wider">Teknologi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#A0A0A0] uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <?php foreach ($projects as $project): ?>
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-white"><?= $project['title'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-[#A0A0A0]"><?= $project['technologies'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openEditModal(<?= htmlspecialchars(json_encode($project)) ?>)" class="text-primary hover:text-primary/80 mr-4">
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
                        <i class="fas fa-folder-open text-3xl text-[#A0A0A0]"></i>
                    </div>
                    <h3 class="text-white text-lg font-semibold mb-2">Belum ada projects</h3>
                    <p class="text-[#A0A0A0] mb-4">Tambahkan project pertama Anda untuk ditampilkan di portfolio.</p>
                    <button onclick="openCreateModal()" class="bg-primary text-background-dark px-6 py-3 rounded-lg hover:bg-primary/80 transition-colors font-bold flex items-center gap-2 mx-auto">
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
        <div class="glassmorphism rounded-xl w-full max-w-2xl max-h-[85vh] overflow-y-auto transform transition-all">
            <!-- Header -->
            <div class="sticky top-0 glassmorphism rounded-t-xl p-6 border-b border-white/10">
                <div class="flex items-center justify-between">
                    <h3 id="modalTitle" class="text-xl font-bold text-white">Tambah Project Baru</h3>
                    <button onclick="closeModal()" class="text-[#A0A0A0] hover:text-white transition-colors">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
            </div>
            
            <!-- Form -->
            <form id="projectForm" method="POST" enctype="multipart/form-data" class="p-6">
                <?= csrf_field() ?>
                <input type="hidden" id="projectId" name="id">
                
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-[#A0A0A0] mb-2">Judul Project *</label>
                        <input type="text" id="title" name="title" required 
                               class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0]"
                               placeholder="Nama project Anda">
                    </div>

                    <div>
                        <label for="technologies" class="block text-sm font-medium text-[#A0A0A0] mb-2">Teknologi</label>
                        <input type="text" id="technologies" name="technologies" 
                               class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0]"
                               placeholder="React, Node.js, MongoDB, etc.">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-[#A0A0A0] mb-2">Deskripsi *</label>
                        <textarea id="description" name="description" rows="4" required 
                                  class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0]"
                                  placeholder="Deskripsi lengkap tentang project Anda"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="demo_url" class="block text-sm font-medium text-[#A0A0A0] mb-2">URL Demo</label>
                            <input type="url" id="demo_url" name="demo_url" 
                                   class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0]"
                                   placeholder="https://demo.example.com">
                        </div>

                        <div>
                            <label for="source_code_url" class="block text-sm font-medium text-[#A0A0A0] mb-2">URL Source Code</label>
                            <input type="url" id="source_code_url" name="source_code_url" 
                                   class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0]"
                                   placeholder="https://github.com/username/repo">
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="project_image" class="block text-sm font-medium text-[#A0A0A0] mb-2">Gambar Project</label>
                        <div class="flex items-center gap-4">
                            <div class="flex-1">
                                <input type="file" id="project_image" name="project_image" accept="image/*" 
                                       class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-background-dark hover:file:bg-primary/80">
                            </div>
                        </div>
                        <p class="text-xs text-[#A0A0A0] mt-2">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                        
                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-3 hidden">
                            <p class="text-sm text-[#A0A0A0] mb-2">Preview gambar baru:</p>
                            <img id="previewImage" class="max-w-full h-32 object-cover rounded-lg border border-white/10">
                        </div>
                        
                        <!-- Current Image (for edit) -->
                        <div id="currentImage" class="mt-3 hidden">
                            <p class="text-sm text-[#A0A0A0] mb-2">Gambar saat ini:</p>
                            <img id="currentImageSrc" class="max-w-full h-32 object-cover rounded-lg border border-white/10">
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <button type="submit" class="bg-primary text-background-dark px-4 py-2 rounded-lg hover:bg-primary/80 transition-colors font-bold flex-1">
                        Simpan Project
                    </button>
                    <button type="button" onclick="closeModal()" class="bg-white/10 text-white px-4 py-2 rounded-lg hover:bg-white/20 transition-colors font-bold flex-1">
                        Batal
                    </button>
                </div>
            </form>
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
    
    input, textarea, select {
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: white !important;
    }
    
    input:focus, textarea:focus, select:focus {
        outline: none;
        ring: 2px;
        ring-color: #00FFFF;
        border-color: #00FFFF !important;
    }
    
    input::placeholder, textarea::placeholder {
        color: #A0A0A0 !important;
    }
    
    /* Custom scrollbar for modal */
    #projectModal .overflow-y-auto::-webkit-scrollbar {
        width: 6px;
    }
    
    #projectModal .overflow-y-auto::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 3px;
    }
    
    #projectModal .overflow-y-auto::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 3px;
    }
    
    #projectModal .overflow-y-auto::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.3);
    }
</style>

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
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
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
        if (project.image_url) {
            document.getElementById('currentImageSrc').src = project.image_url;
            document.getElementById('currentImage').classList.remove('hidden');
        } else {
            document.getElementById('currentImage').classList.add('hidden');
        }
        
        document.getElementById('imagePreview').classList.add('hidden');
        document.getElementById('projectModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }
    
    function closeModal() {
        document.getElementById('projectModal').classList.add('hidden');
        document.body.style.overflow = ''; // Restore scrolling
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
</script>
<?= $this->endSection() ?>