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
            'project_image' => 'max_size[project_image,2048]|is_image[project_image]'
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $image = $this->request->getFile('project_image');
            $imageName = null;

            if ($image && $image->isValid() && !$image->hasMoved()) {
                // Gunakan WRITEPATH yang sudah memiliki permission write
                $uploadPath = WRITEPATH . 'uploads/projects';
                
                // Buat folder jika belum ada
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                $imageName = $image->getRandomName();
                
                try {
                    $image->move($uploadPath, $imageName);
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Gagal mengupload gambar: ' . $e->getMessage());
                }
            }

            $this->projectModel->save([
                'title' => $this->request->getPost('title'),
                'technologies' => $this->request->getPost('technologies'),
                'description' => $this->request->getPost('description'),
                'demo_url' => $this->request->getPost('demo_url'),
                'source_code_url' => $this->request->getPost('source_code_url'),
                'image_url' => $imageName ? 'uploads/projects/' . $imageName : null
            ]);

            return redirect()->to('/admin/projects')->with('success', 'Project berhasil ditambahkan');
        }

        return redirect()->back()->with('error', $validation->getErrors());
    }

    public function update($id)
    {
        $project = $this->projectModel->find($id);

        if (!$project) {
            return redirect()->to('/admin/projects')->with('error', 'Project tidak ditemukan');
        }

        $image = $this->request->getFile('project_image');
        $imageName = $project['image_url'];

        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Hapus gambar lama jika ada
            if ($project['image_url'] && file_exists(WRITEPATH . $project['image_url'])) {
                unlink(WRITEPATH . $project['image_url']);
            }

            $uploadPath = WRITEPATH . 'uploads/projects';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $imageName = 'uploads/projects/' . $image->getRandomName();
            
            try {
                $image->move($uploadPath, $imageName);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal mengupload gambar: ' . $e->getMessage());
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

    // PERBAIKAN: Method delete yang benar
    public function delete($id)
    {
        $project = $this->projectModel->find($id);
        
        if ($project) {
            // Hapus gambar jika ada
            if ($project['image_url'] && file_exists(WRITEPATH . $project['image_url'])) {
                unlink(WRITEPATH . $project['image_url']);
            }
            
            $this->projectModel->delete($id);
            return redirect()->to('/admin/projects')->with('success', 'Project berhasil dihapus');
        }
        
        return redirect()->to('/admin/projects')->with('error', 'Project tidak ditemukan');
    }
}