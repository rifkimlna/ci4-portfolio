<?php
namespace App\Controllers;

use App\Models\SiteInfoModel;
use App\Models\ProjectModel;
use App\Models\SkillModel;
use App\Models\SocialLinkModel;
use App\Models\ContactModel;
use App\Models\EducationModel;


class Home extends BaseController
{
    protected $siteInfoModel;
    protected $projectModel;
    protected $skillModel;
    protected $socialLinkModel;
    protected $contactModel;
        protected $educationModel; 

    public function __construct()
    {
        $this->siteInfoModel = new SiteInfoModel();
        $this->projectModel = new ProjectModel();
        $this->skillModel = new SkillModel();
        $this->socialLinkModel = new SocialLinkModel();
        $this->contactModel = new ContactModel();
         $this->educationModel = new EducationModel();
    }

    public function index()
    {
        $data = [
            'site_info' => $this->siteInfoModel->getSiteInfo(),
            'projects' => $this->projectModel->getActiveProjects(),
            'skills' => $this->skillModel->getActiveSkills(),
            'social_links' => $this->socialLinkModel->getActiveLinks(),
             'educations' => $this->educationModel->getActiveEducations()
        ];

        return view('index', $data);
    }

    

    public function contact()
{
    // Debug: Cek apakah data POST terkirim
    if ($this->request->getMethod() === 'post') {
        echo "<pre>POST Data: ";
        print_r($this->request->getPost());
        echo "</pre>";
    }

    $validation = \Config\Services::validation();
    $validation->setRules([
        'name' => 'required|min_length[3]|max_length[255]',
        'email' => 'required|valid_email|max_length[255]',
        'message' => 'required|min_length[10]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        $errors = $validation->getErrors();
        echo "<pre>Validation Errors: ";
        print_r($errors);
        echo "</pre>";
        return redirect()->back()->with('errors', $errors)->withInput();
    }

    try {
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
            'is_read' => 0
        ];

        echo "<pre>Data to save: ";
        print_r($data);
        echo "</pre>";

        // Coba save dengan model
        if ($this->contactModel->save($data)) {
            echo "SUCCESS: Data saved to database!";
            return redirect()->back()->with('success', 'Pesan berhasil dikirim! Terima kasih telah menghubungi saya.');
        } else {
            $errors = $this->contactModel->errors();
            echo "<pre>Model Errors: ";
            print_r($errors);
            echo "</pre>";
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan pesan.')->withInput();
        }

    } catch (\Exception $e) {
        echo "<pre>Exception: " . $e->getMessage() . "</pre>";
        return redirect()->back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage())->withInput();
    }
}
}