<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="mb-6">
    <h1 class="text-3xl font-bold text-white">Contact Messages</h1>
    <p class="text-[#A0A0A0]">Manage incoming messages from your portfolio</p>
</div>

<div class="glassmorphism rounded-xl">
    <div class="p-6 border-b border-white/10">
        <h2 class="text-xl font-bold text-white">All Messages</h2>
    </div>
    <div class="p-6">
        <?php if (!empty($contacts)): ?>
            <div class="space-y-6">
                <?php foreach ($contacts as $contact): ?>
                    <div class="glassmorphism rounded-xl p-6 <?= $contact['is_read'] ? '' : 'border-l-4 border-l-primary' ?>">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg text-white"><?= $contact['name'] ?></h3>
                                <p class="text-[#A0A0A0]"><?= $contact['email'] ?></p>
                            </div>
                            <div class="text-right">
                                <span class="text-sm text-[#A0A0A0]"><?= date('M j, Y g:i A', strtotime($contact['created_at'])) ?></span>
                                <?php if (!$contact['is_read']): ?>
                                    <span class="ml-2 bg-primary/20 text-primary text-xs px-2 py-1 rounded">New</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p class="text-white mb-4"><?= nl2br(htmlspecialchars($contact['message'])) ?></p>
                        <div class="flex gap-2">
                            <?php if (!$contact['is_read']): ?>
                                <form action="/admin/contacts/read/<?= $contact['id'] ?>" method="POST" class="inline">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="bg-primary text-black px-3 py-1 rounded text-sm hover:bg-primary/80 transition-colors">
                                        Mark as Read
                                    </button>
                                </form>
                            <?php endif; ?>
                            <form action="/admin/contacts/delete/<?= $contact['id'] ?>" method="POST" class="inline">
                                <?= csrf_field() ?>
                                <button type="submit" class="bg-red-500/20 text-red-400 border border-red-500/30 px-3 py-1 rounded text-sm hover:bg-red-500/30 transition-colors" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                            <a href="mailto:<?= $contact['email'] ?>" class="bg-white/10 text-white px-3 py-1 rounded text-sm hover:bg-white/20 transition-colors">
                                Balas Email
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-[#A0A0A0]">No contact messages yet.</p>
        <?php endif; ?>
    </div>
</div>

<style>
    .glassmorphism {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
</style>
<?= $this->endSection() ?>