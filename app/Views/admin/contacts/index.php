<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-light text-white">Contact Messages</h1>
            <p class="text-white/60 mt-1">Kelola pesan yang masuk dari portfolio Anda</p>
        </div>
        <div class="flex items-center gap-3">
            <?php if ($unread_count ?? 0 > 0): ?>
                <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-sm font-medium">
                    <?= $unread_count ?> pesan belum dibaca
                </span>
            <?php endif; ?>
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

    <!-- Messages List -->
    <div class="glassmorphism rounded-2xl">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-xl font-light text-white">Semua Pesan</h2>
        </div>
        <div class="p-6">
            <?php if (!empty($contacts)): ?>
                <div class="space-y-6">
                    <?php foreach ($contacts as $contact): ?>
                        <div class="glassmorphism rounded-2xl p-6 transition-all duration-300 <?= $contact['is_read'] ? '' : 'border-l-4 border-l-white bg-white/5' ?>">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4 mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <h3 class="font-medium text-lg text-white"><?= $contact['name'] ?></h3>
                                        <?php if (!$contact['is_read']): ?>
                                            <span class="bg-white/20 text-white text-xs px-2 py-1 rounded-full font-medium">Baru</span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="text-white/60 text-sm">
                                        <i class="fas fa-envelope mr-2"></i><?= $contact['email'] ?>
                                    </p>
                                </div>
                                <div class="text-right">
                                    <span class="text-sm text-white/60"><?= date('d M Y, H:i', strtotime($contact['created_at'])) ?></span>
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <p class="text-white/80 leading-relaxed whitespace-pre-line"><?= htmlspecialchars($contact['message']) ?></p>
                            </div>
                            
                            <div class="flex flex-wrap gap-3">
                                <?php if (!$contact['is_read']): ?>
                                    <!-- Form Mark as Read - SESUAI ROUTES -->
                                    <form action="/admin/contacts/read/<?= $contact['id'] ?>" method="POST" class="inline">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="bg-white text-black px-4 py-2 rounded-lg hover:bg-white/90 transition-colors text-sm font-medium flex items-center gap-2">
                                            <i class="fas fa-check"></i>Tandai Sudah Dibaca
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <span class="bg-white/10 text-white/60 px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2">
                                        <i class="fas fa-check-circle"></i>Sudah Dibaca
                                    </span>
                                <?php endif; ?>
                                
                                <a href="mailto:<?= $contact['email'] ?>?subject=Re: Pesan dari <?= $contact['name'] ?>&body=Halo <?= $contact['name'] ?>," 
                                   class="bg-white/10 text-white px-4 py-2 rounded-lg hover:bg-white/20 transition-colors text-sm font-medium flex items-center gap-2">
                                    <i class="fas fa-reply"></i>Balas Email
                                </a>
                                
                                <!-- Form Delete - SESUAI ROUTES YANG ADA -->
                                <form action="/admin/contacts/delete/<?= $contact['id'] ?>" method="POST" class="inline">
                                    <?= csrf_field() ?>
                                    <button type="submit" 
                                            class="bg-red-500/20 text-red-400 px-4 py-2 rounded-lg hover:bg-red-500/30 transition-colors text-sm font-medium flex items-center gap-2"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pesan dari <?= addslashes($contact['name']) ?>?')">
                                        <i class="fas fa-trash"></i>Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <div class="glassmorphism rounded-full size-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope-open text-3xl text-white/60"></i>
                    </div>
                    <h3 class="text-white text-lg font-light mb-2">Belum ada pesan</h3>
                    <p class="text-white/60">Pesan dari pengunjung akan muncul di sini.</p>
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
    
    .whitespace-pre-line {
        white-space: pre-line;
    }
</style>

<script>
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

    // Handle form submission loading states
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
                    submitBtn.disabled = true;
                }
            });
        });
    });

    // Auto scroll to new messages
    document.addEventListener('DOMContentLoaded', function() {
        const unreadMessages = document.querySelectorAll('.border-l-white');
        if (unreadMessages.length > 0) {
            unreadMessages[0].scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });
        }
    });
</script>
<?= $this->endSection() ?>