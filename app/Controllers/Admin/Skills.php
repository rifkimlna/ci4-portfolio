<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SkillModel;

class Skills extends BaseController
{
    protected $skillModel;

    public function __construct()
    {
        $this->skillModel = new SkillModel();
        helper('text');
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Skills',
            'skills' => $this->skillModel->getAllSkills()
        ];

        return view('admin/skills/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Skill'
        ];

        return view('admin/skills/create', $data);
    }

    public function store()
    {
        // Validation
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[2]|max_length[100]',
            'category' => 'required|max_length[50]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'category' => $this->request->getPost('category'),
            'created_by' => session()->get('user_id')
        ];

        if ($this->skillModel->save($data)) {
            return redirect()->to('/admin/skills')->with('success', 'Skill added successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add skill.');
        }
    }

    public function edit($id)
    {
        $skill = $this->skillModel->find($id);
        
        if (!$skill) {
            return redirect()->to('/admin/skills')->with('error', 'Skill not found.');
        }

        $data = [
            'title' => 'Edit Skill',
            'skill' => $skill
        ];

        return view('admin/skills/edit', $data);
    }

    public function update($id)
    {
        // Validation
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[2]|max_length[100]',
            'category' => 'required|max_length[50]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'category' => $this->request->getPost('category')
        ];

        if ($this->skillModel->update($id, $data)) {
            return redirect()->to('/admin/skills')->with('success', 'Skill updated successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update skill.');
        }
    }

    public function delete($id)
    {
        $skill = $this->skillModel->find($id);
        
        if (!$skill) {
            return redirect()->to('/admin/skills')->with('error', 'Skill not found.');
        }

        if ($this->skillModel->delete($id)) {
            return redirect()->to('/admin/skills')->with('success', 'Skill deleted successfully!');
        } else {
            return redirect()->to('/admin/skills')->with('error', 'Failed to delete skill.');
        }
    }

    public function toggleStatus($id)
    {
        $skill = $this->skillModel->find($id);
        
        if (!$skill) {
            return redirect()->to('/admin/skills')->with('error', 'Skill not found.');
        }

        $newStatus = $skill['is_active'] ? 0 : 1;
        
        if ($this->skillModel->update($id, ['is_active' => $newStatus])) {
            $statusText = $newStatus ? 'activated' : 'deactivated';
            return redirect()->to('/admin/skills')->with('success', "Skill {$statusText} successfully!");
        } else {
            return redirect()->to('/admin/skills')->with('error', 'Failed to update skill status.');
        }
    }
}