<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiteInfoModel;

class SiteInfo extends BaseController
{
    protected $siteInfoModel;

    public function __construct()
    {
        $this->siteInfoModel = new SiteInfoModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Site Information',
            'site_info' => $this->siteInfoModel->getSiteInfo()
        ];

        return view('admin/site_info/index', $data);
    }

    public function update()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'title' => $this->request->getPost('title'),
            'bio' => $this->request->getPost('bio'),
            'about_description' => $this->request->getPost('about_description'),
            'about_experience' => $this->request->getPost('about_experience'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone')
        ];

        if ($this->siteInfoModel->update(1, $data)) {
            return redirect()->back()->with('success', 'Site information updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update site information.');
        }
    }
}