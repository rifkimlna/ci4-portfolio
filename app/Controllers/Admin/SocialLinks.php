<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SocialLinkModel;

class SocialLinks extends BaseController
{
    protected $socialLinkModel;

    public function __construct()
    {
        $this->socialLinkModel = new SocialLinkModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Social Links',
            'social_links' => $this->socialLinkModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/social_links/index', $data);
    }

    public function update()
    {
        try {
            $links = $this->request->getPost('links');
            
            if (empty($links)) {
                return redirect()->back()->with('error', 'Tidak ada data yang dikirim.');
            }

            foreach ($links as $id => $link) {
                // Validasi data
                if (empty($link['url'])) {
                    continue; // Skip jika URL kosong
                }

                // Siapkan data
                $data = [
                    'platform' => $this->getPlatformName($link),
                    'url' => $link['url'],
                    'is_active' => isset($link['is_active']) ? 1 : 0,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                // Handle new entries (ID dimulai dengan 'new_')
                if (strpos($id, 'new_') === 0) {
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $this->socialLinkModel->insert($data);
                } else {
                    // Update existing entries
                    $this->socialLinkModel->update($id, $data);
                }
            }

            return redirect()->back()->with('success', 'Social links berhasil diperbarui!');

        } catch (\Exception $e) {
            log_message('error', 'Error updating social links: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    /**
     * Handle custom platform names
     */
    private function getPlatformName($link)
    {
        $platform = $link['platform'] ?? '';
        $customPlatform = $link['custom_platform'] ?? '';

        // Jika platform adalah "Other" dan ada custom platform, gunakan custom
        if ($platform === 'Other' && !empty($customPlatform)) {
            return $customPlatform;
        }

        // Jika platform bukan "Other", abaikan custom platform
        return $platform;
    }

    /**
     * Delete social link
     */
    public function delete($id)
    {
        try {
            $this->socialLinkModel->delete($id);
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Social link berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error deleting social link: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.'
            ]);
        }
    }
}