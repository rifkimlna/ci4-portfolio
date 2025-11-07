<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="mb-6">
    <h1 class="text-3xl font-bold text-white">Social Links</h1>
    <p class="text-[#A0A0A0]">Manage your social media links</p>
</div>

<div class="glassmorphism rounded-xl">
    <div class="p-6 border-b border-white/10">
        <h2 class="text-xl font-bold text-white">Social Media Profiles</h2>
    </div>
    <div class="p-6">
        <form action="/admin/social-links/update" method="POST">
            <?= csrf_field() ?>
            <div class="space-y-4">
                <?php if (!empty($social_links)): ?>
                    <?php foreach ($social_links as $link): ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-[#A0A0A0] mb-2">Platform</label>
                                <input type="text" value="<?= $link['platform'] ?>" 
                                       class="w-full px-3 py-2 glassmorphism text-white rounded-md" readonly>
                                <input type="hidden" name="links[<?= $link['id'] ?>][platform]" value="<?= $link['platform'] ?>">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#A0A0A0] mb-2">URL</label>
                                <input type="url" name="links[<?= $link['id'] ?>][url]" value="<?= $link['url'] ?>" 
                                       class="w-full px-3 py-2 glassmorphism text-white rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                                       placeholder="https://example.com/yourprofile">
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-[#A0A0A0]">No social links configured.</p>
                <?php endif; ?>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-primary text-black px-4 py-2 rounded-md hover:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-primary transition-colors">
                    Update Social Links
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
    
    input::placeholder {
        color: #A0A0A0;
    }
</style>
<?= $this->endSection() ?>