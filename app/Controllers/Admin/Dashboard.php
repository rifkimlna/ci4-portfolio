<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProjectModel;
use App\Models\ContactModel;
use App\Models\SkillModel;

class Dashboard extends BaseController
{
    protected $projectModel;
    protected $contactModel;
    protected $skillModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
        $this->contactModel = new ContactModel();
        $this->skillModel = new SkillModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'project_count' => $this->projectModel->countAll(),
            'contact_count' => $this->contactModel->countAll(),
            'unread_contact_count' => $this->contactModel->getUnreadCount(),
            'skill_count' => $this->skillModel->countAll(),
            'recent_contacts' => $this->contactModel->orderBy('created_at', 'DESC')->findAll(5)
        ];

        return view('admin/dashboard/index', $data);
    }
}