<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EducationModel;

class Education extends BaseController
{
    protected $educationModel;

    public function __construct()
    {
        $this->educationModel = new EducationModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Education',
            'subtitle' => 'Kelola riwayat pendidikan Anda',
            'educations' => $this->educationModel->getAllEducations()
        ];

        return view('admin/education/index', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        
        $rules = [
            'degree' => 'required|max_length[255]',
            'institution' => 'required|max_length[255]',
            'field_of_study' => 'permit_empty|max_length[255]',
            'start_year' => 'required|numeric|min_length[4]|max_length[4]',
            'end_year' => 'permit_empty|numeric|min_length[4]|max_length[4]',
            'description' => 'permit_empty',
            'grade' => 'permit_empty|max_length[50]',
            'activities' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        $isCurrent = $this->request->getPost('is_current') ? 1 : 0;
        $endYear = $isCurrent ? null : $this->request->getPost('end_year');

        $educationData = [
            'degree' => $this->request->getPost('degree'),
            'institution' => $this->request->getPost('institution'),
            'field_of_study' => $this->request->getPost('field_of_study'),
            'start_year' => $this->request->getPost('start_year'),
            'end_year' => $endYear,
            'is_current' => $isCurrent,
            'description' => $this->request->getPost('description'),
            'grade' => $this->request->getPost('grade'),
            'activities' => $this->request->getPost('activities'),
            'is_active' => 1,
            'created_by' => session()->get('user_id')
        ];

        if ($this->educationModel->createEducation($educationData)) {
            return redirect()->to('/admin/education')->with('success', 'Pendidikan berhasil ditambahkan!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan pendidikan. Silakan coba lagi.');
        }
    }

    public function update($id)
    {
        $education = $this->educationModel->getEducationById($id);
        
        if (!$education) {
            return redirect()->to('/admin/education')->with('error', 'Pendidikan tidak ditemukan.');
        }

        $validation = \Config\Services::validation();
        
        $rules = [
            'degree' => 'required|max_length[255]',
            'institution' => 'required|max_length[255]',
            'field_of_study' => 'permit_empty|max_length[255]',
            'start_year' => 'required|numeric|min_length[4]|max_length[4]',
            'end_year' => 'permit_empty|numeric|min_length[4]|max_length[4]',
            'description' => 'permit_empty',
            'grade' => 'permit_empty|max_length[50]',
            'activities' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        $isCurrent = $this->request->getPost('is_current') ? 1 : 0;
        $endYear = $isCurrent ? null : $this->request->getPost('end_year');

        $educationData = [
            'degree' => $this->request->getPost('degree'),
            'institution' => $this->request->getPost('institution'),
            'field_of_study' => $this->request->getPost('field_of_study'),
            'start_year' => $this->request->getPost('start_year'),
            'end_year' => $endYear,
            'is_current' => $isCurrent,
            'description' => $this->request->getPost('description'),
            'grade' => $this->request->getPost('grade'),
            'activities' => $this->request->getPost('activities')
        ];

        if ($this->educationModel->updateEducation($id, $educationData)) {
            return redirect()->to('/admin/education')->with('success', 'Pendidikan berhasil diperbarui!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui pendidikan. Silakan coba lagi.');
        }
    }

    public function delete($id)
    {
        $education = $this->educationModel->getEducationById($id);
        
        if (!$education) {
            return redirect()->to('/admin/education')->with('error', 'Pendidikan tidak ditemukan.');
        }

        if ($this->educationModel->deleteEducation($id)) {
            return redirect()->to('/admin/education')->with('success', 'Pendidikan berhasil dihapus!');
        } else {
            return redirect()->to('/admin/education')->with('error', 'Gagal menghapus pendidikan. Silakan coba lagi.');
        }
    }
}