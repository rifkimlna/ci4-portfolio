<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProjectModel;

class Projects extends BaseController
{
    protected $projectModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Projects',
            'projects' => $this->projectModel->findAll()
        ];
        return view('admin/projects/index', $data);
    }


    


public function store()
{
    $validation = \Config\Services::validation();
    $validation->setRules([
        'title' => 'required',
        'description' => 'required',
       'project_image' => 'max_size[project_image,5120]|is_image[project_image]|ext_in[project_image,jpg,jpeg,png,gif]|mime_in[project_image,image/jpg,image/jpeg,image/png,image/gif]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        // Ambil error pertama saja untuk flashdata
        $errors = $validation->getErrors();
        $firstError = reset($errors);
        return redirect()->back()->withInput()->with('error', $firstError);
    }

    $image = $this->request->getFile('project_image');
    $imageName = null;

    if ($image && $image->isValid() && !$image->hasMoved()) {
        $uploadPath = FCPATH . 'uploads/projects';
        
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $imageName = $image->getRandomName();
        
        try {
            $image->move($uploadPath, $imageName);
            $imageName = 'uploads/projects/' . $imageName;
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar: ' . $e->getMessage());
        }
    }

    $this->projectModel->save([
        'title' => $this->request->getPost('title'),
        'technologies' => $this->request->getPost('technologies'),
        'description' => $this->request->getPost('description'),
        'demo_url' => $this->request->getPost('demo_url'),
        'source_code_url' => $this->request->getPost('source_code_url'),
        'image_url' => $imageName
    ]);

    return redirect()->to('/admin/projects')->with('success', 'Project berhasil ditambahkan');
}

 public function update($id)
{
    $project = $this->projectModel->find($id);

    if (!$project) {
        return redirect()->to('/admin/projects')->with('error', 'Project tidak ditemukan');
    }

    $validation = \Config\Services::validation();
    $validation->setRules([
        'title' => 'required',
        'description' => 'required',
       'project_image' => 'max_size[project_image,5120]|is_image[project_image]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        $errors = $validation->getErrors();
        $firstError = reset($errors);
        return redirect()->back()->withInput()->with('error', $firstError);
    }

    $image = $this->request->getFile('project_image');
    $imageName = $project['image_url'];

    if ($image && $image->isValid() && !$image->hasMoved()) {
        // Hapus gambar lama jika ada
        if ($project['image_url'] && file_exists(FCPATH . $project['image_url'])) {
            unlink(FCPATH . $project['image_url']);
        }

        $uploadPath = FCPATH . 'uploads/projects';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $imageName = $image->getRandomName();
        
        try {
            $image->move($uploadPath, $imageName);
            $imageName = 'uploads/projects/' . $imageName;
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar: ' . $e->getMessage());
        }
    }

    $this->projectModel->update($id, [
        'title' => $this->request->getPost('title'),
        'technologies' => $this->request->getPost('technologies'),
        'description' => $this->request->getPost('description'),
        'demo_url' => $this->request->getPost('demo_url'),
        'source_code_url' => $this->request->getPost('source_code_url'),
        'image_url' => $imageName
    ]);

    return redirect()->to('/admin/projects')->with('success', 'Project berhasil diupdate');
}

    public function delete($id)
{
    $project = $this->projectModel->find($id);
    
    if ($project) {
        // Hapus gambar jika ada (gunakan FCPATH)
        if ($project['image_url'] && file_exists(FCPATH . $project['image_url'])) {
            unlink(FCPATH . $project['image_url']);
        }
        
        $this->projectModel->delete($id);
        return redirect()->to('/admin/projects')->with('success', 'Project berhasil dihapus');
    }
    
    return redirect()->to('/admin/projects')->with('error', 'Project tidak ditemukan');
}
}