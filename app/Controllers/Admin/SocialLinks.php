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
            'social_links' => $this->socialLinkModel->findAll()
        ];

        return view('admin/social_links/index', $data);
    }

    public function update()
    {
        $links = $this->request->getPost('links');
        
        foreach ($links as $id => $link) {
            $data = [
                'platform' => $link['platform'],
                'url' => $link['url']
            ];
            $this->socialLinkModel->update($id, $data);
        }

        return redirect()->back()->with('success', 'Social links updated successfully!');
    }
}