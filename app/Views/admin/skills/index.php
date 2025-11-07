<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold text-white">Manage Skills</h1>
            <p class="text-[#A0A0A0] mt-1">Kelola keahlian dan skills yang ditampilkan di portfolio</p>
        </div>
        <button onclick="openCreateModal()" class="bg-primary text-background-dark px-6 py-3 rounded-lg hover:bg-primary/80 transition-colors font-bold flex items-center gap-2 w-full sm:w-auto justify-center">
            <i class="fas fa-plus"></i>
            Tambah Skill
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

    <!-- Skills Table -->
    <div class="glassmorphism rounded-xl">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-xl font-bold text-white">Daftar Skills</h2>
        </div>
        <div class="p-6">
            <?php if (!empty($skills)): ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#A0A0A0] uppercase tracking-wider">Nama Skill</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#A0A0A0] uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#A0A0A0] uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#A0A0A0] uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <?php foreach ($skills as $skill): ?>
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-white"><?= $skill['name'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-[#A0A0A0]"><?= $skill['category'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $skill['is_active'] ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' ?>">
                                            <?= $skill['is_active'] ? 'Active' : 'Inactive' ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openEditModal(<?= htmlspecialchars(json_encode($skill)) ?>)" class="text-primary hover:text-primary/80 mr-4">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        
                                        <form action="/admin/skills/toggle/<?= $skill['id'] ?>" method="POST" class="inline">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="text-<?= $skill['is_active'] ? 'yellow' : 'green' ?>-400 hover:text-<?= $skill['is_active'] ? 'yellow' : 'green' ?>-300 mr-4">
                                                <i class="fas fa-<?= $skill['is_active'] ? 'pause' : 'play' ?>"></i> 
                                                <?= $skill['is_active'] ? 'Deactivate' : 'Activate' ?>
                                            </button>
                                        </form>
                                        
                                        <form action="/admin/skills/delete/<?= $skill['id'] ?>" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this skill?')">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="text-red-400 hover:text-red-300">
                                                <i class="fas fa-trash"></i> Delete
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
                        <i class="fas fa-code text-3xl text-[#A0A0A0]"></i>
                    </div>
                    <h3 class="text-white text-lg font-semibold mb-2">Belum ada skills</h3>
                    <p class="text-[#A0A0A0] mb-4">Tambahkan skill pertama Anda untuk ditampilkan di portfolio.</p>
                    <button onclick="openCreateModal()" class="bg-primary text-background-dark px-6 py-3 rounded-lg hover:bg-primary/80 transition-colors font-bold flex items-center gap-2 mx-auto">
                        <i class="fas fa-plus"></i>
                        Tambah Skill Pertama
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Create/Edit Modal -->
<div id="skillModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
    <div class="glassmorphism rounded-xl w-full max-w-md transform transition-all">
        <div class="p-6 border-b border-white/10">
            <h3 id="modalTitle" class="text-xl font-bold text-white">Tambah Skill Baru</h3>
        </div>
        
        <form id="skillForm" method="POST" class="p-6">
            <?= csrf_field() ?>
            <input type="hidden" id="skillId" name="id">
            
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-[#A0A0A0] mb-2">Nama Skill</label>
                    <input type="text" id="name" name="name" required 
                           class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-[#A0A0A0]"
                           placeholder="Contoh: React.js, Node.js, etc.">
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-[#A0A0A0] mb-2">Kategori</label>
                    <select id="category" name="category" required 
                            class="w-full px-3 py-2 glassmorphism text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="" class="text-[#A0A0A0]">Pilih Kategori</option>
                        <option value="Frontend" class="text-white">Frontend</option>
                        <option value="Backend" class="text-white">Backend</option>
                        <option value="Database" class="text-white">Database</option>
                        <option value="Tools" class="text-white">Tools</option>
                        <option value="Mobile" class="text-white">Mobile</option>
                        <option value="Other" class="text-white">Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-primary text-background-dark px-4 py-2 rounded-lg hover:bg-primary/80 transition-colors font-bold flex-1">
                    Simpan
                </button>
                <button type="button" onclick="closeModal()" class="bg-white/10 text-white px-4 py-2 rounded-lg hover:bg-white/20 transition-colors font-bold flex-1">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .glassmorphism {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    input, select {
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
    }
    
    input:focus, select:focus {
        outline: none;
        ring: 2px;
        ring-color: #00FFFF;
    }
    
    /* Ensure text in inputs and selects is visible */
    input, select, option {
        color: white !important;
    }
    
    /* Placeholder color */
    input::placeholder {
        color: #A0A0A0 !important;
    }
    
    /* Selected option background */
    option:checked {
        background: #00FFFF !important;
        color: #000000 !important;
    }
</style>

<script>
    let currentAction = 'create';
    
    function openCreateModal() {
        currentAction = 'create';
        document.getElementById('modalTitle').textContent = 'Tambah Skill Baru';
        document.getElementById('skillForm').action = '/admin/skills/store';
        document.getElementById('skillForm').reset();
        document.getElementById('skillId').value = '';
        document.getElementById('skillModal').classList.remove('hidden');
    }
    
    function openEditModal(skill) {
        currentAction = 'edit';
        document.getElementById('modalTitle').textContent = 'Edit Skill';
        document.getElementById('skillForm').action = `/admin/skills/update/${skill.id}`;
        document.getElementById('skillId').value = skill.id;
        document.getElementById('name').value = skill.name;
        document.getElementById('category').value = skill.category;
        document.getElementById('skillModal').classList.remove('hidden');
    }
    
    function closeModal() {
        document.getElementById('skillModal').classList.add('hidden');
    }
    
    // Close modal when clicking outside
    document.getElementById('skillModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
    
    // Form submission
    document.getElementById('skillForm').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
        submitBtn.disabled = true;
    });
</script>
<?= $this->endSection() ?>