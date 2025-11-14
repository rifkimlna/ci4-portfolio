<?php

// namespace App\Controllers;

// use App\Models\ProjectModel;

// class Projects extends BaseController
// {
//     protected $projectModel;

//     public function __construct()
//     {
//         $this->projectModel = new ProjectModel();
//         helper('url');
//     }

//     public function index()
//     {
//         $projects = $this->projectModel->getActiveProjects();
        
//         // Process projects data
//         $processedProjects = [];
//         foreach ($projects as $project) {
//             $processedProjects[] = $this->processProjectData($project);
//         }

//         $data = [
//             'title' => 'All Projects - Portfolio',
//             'projects' => $processedProjects,
//             'site_info' => $this->getSiteInfo()
//         ];

//         return view('projects/projects_all', $data);
//     }

//     public function detail($id)
//     {
//         $project = $this->projectModel->getProjectDetail($id);
        
//         if (!$project) {
//             throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Project tidak ditemukan');
//         }

//         $processedProject = $this->processProjectData($project);
//         $relatedProjects = $this->projectModel->getRelatedProjects($id, 3);

//         // Process related projects
//         $processedRelated = [];
//         foreach ($relatedProjects as $related) {
//             $processedRelated[] = $this->processProjectData($related);
//         }

//         $data = [
//             'title' => $project['title'] . ' - Portfolio',
//             'project' => $processedProject,
//             'related_projects' => $processedRelated,
//             'site_info' => $this->getSiteInfo()
//         ];

//         return view('projects/projects_detail', $data);
//     }

//     /**
//      * Process project data for display
//      */
//     private function processProjectData($project)
//     {
//         // Handle image URL
//         $project['image_display_url'] = $this->getImageUrl($project['image_url']);
        
//         // Parse technologies
//         $project['technologies_array'] = $this->parseTechnologies($project['technologies']);
        
//         // Format date
//         $project['formatted_date'] = date('F Y', strtotime($project['created_at']));
        
//         // Truncate description for cards
//         $project['short_description'] = $this->truncateDescription($project['description'], 120);
        
//         return $project;
//     }

//     /**
//      * Handle image URL
//      */
//     private function getImageUrl($imageUrl)
//     {
//         if (empty($imageUrl)) {
//             return 'https://placehold.co/600x400/1a1a1a/ffffff?text=Project+Image';
//         }

//         // If it's already a full URL, return as is
//         if (filter_var($imageUrl, FILTER_VALIDATE_URL)) {
//             return $imageUrl;
//         }

//         // If it's a local path, prepend base_url
//         return base_url($imageUrl);
//     }

//     /**
//      * Parse technologies string into array
//      */
//     private function parseTechnologies($technologies)
//     {
//         if (empty($technologies)) {
//             return ['No technologies specified'];
//         }

//         $techArray = explode(',', $technologies);
//         return array_map('trim', $techArray);
//     }

//     /**
//      * Truncate description for cards
//      */
//     private function truncateDescription($description, $length = 100)
//     {
//         if (strlen($description) <= $length) {
//             return $description;
//         }
        
//         return substr($description, 0, $length) . '...';
//     }

//     private function getSiteInfo()
//     {
//         return [
//             'name' => 'Rifki Maulana',
//             'title' => 'Full-Stack Developer',
//             'bio' => 'Membangun solusi digital yang elegan dan fungsional dengan teknologi modern.',
//             'email' => 'hello@example.com',
//             'phone' => '+62 812 3456 7890'
//         ];
//     }
// }



namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\SocialLinkModel;
use App\Models\SiteInfoModel;

class Projects extends BaseController
{
    protected $projectModel;
    protected $socialLinkModel;
    protected $siteInfoModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
        $this->socialLinkModel = new SocialLinkModel();
        $this->siteInfoModel = new SiteInfoModel();
        helper('url');
    }

    public function index()
    {
        $projects = $this->projectModel->getActiveProjects();
        
        // Process projects data
        $processedProjects = [];
        foreach ($projects as $project) {
            $processedProjects[] = $this->processProjectData($project);
        }

        $data = [
            'title' => 'All Projects - Portfolio',
            'projects' => $processedProjects,
            'social_links' => $this->socialLinkModel->where('is_active', 1)->findAll(),
            'site_info' => $this->getSiteInfo()
        ];

        return view('projects/projects_all', $data);
    }

    public function detail($id)
    {
        $project = $this->projectModel->getProjectDetail($id);
        
        if (!$project) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Project tidak ditemukan');
        }

        $processedProject = $this->processProjectData($project);
        $relatedProjects = $this->projectModel->getRelatedProjects($id, 3);

        // Process related projects
        $processedRelated = [];
        foreach ($relatedProjects as $related) {
            $processedRelated[] = $this->processProjectData($related);
        }

        $data = [
            'title' => $project['title'] . ' - Portfolio',
            'project' => $processedProject,
            'related_projects' => $processedRelated,
            'social_links' => $this->socialLinkModel->where('is_active', 1)->findAll(),
            'site_info' => $this->getSiteInfo()
        ];

        return view('projects/projects_detail', $data);
    }

    /**
     * Process project data for display
     */
    private function processProjectData($project)
    {
        // Handle image URL
        $project['image_display_url'] = $this->getImageUrl($project['image_url']);
        
        // Parse technologies
        $project['technologies_array'] = $this->parseTechnologies($project['technologies']);
        
        // Format date
        $project['formatted_date'] = date('F Y', strtotime($project['created_at']));
        
        // Truncate description for cards
        $project['short_description'] = $this->truncateDescription($project['description'], 120);
        
        return $project;
    }

    /**
     * Handle image URL
     */
    private function getImageUrl($imageUrl)
    {
        if (empty($imageUrl)) {
            return 'https://placehold.co/600x400/1a1a1a/ffffff?text=Project+Image';
        }

        // If it's already a full URL, return as is
        if (filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            return $imageUrl;
        }

        // If it's a local path, prepend base_url
        return base_url($imageUrl);
    }

    /**
     * Parse technologies string into array
     */
    private function parseTechnologies($technologies)
    {
        if (empty($technologies)) {
            return ['No technologies specified'];
        }

        $techArray = explode(',', $technologies);
        return array_map('trim', $techArray);
    }

    /**
     * Truncate description for cards
     */
    private function truncateDescription($description, $length = 100)
    {
        if (strlen($description) <= $length) {
            return $description;
        }
        
        return substr($description, 0, $length) . '...';
    }

    /**
     * Get site info from database with fallback values
     */
    private function getSiteInfo()
    {
        // Ambil data dari database
        $siteInfo = $this->siteInfoModel->first();
        
        if (!$siteInfo) {
            // Fallback jika tidak ada data di database
            return [
                'name' => 'Rifki Maulana',
                'title' => 'Full-Stack Developer',
                'short_description' => 'Membangun solusi digital yang inovatif dan berdampak dengan teknologi terkini.',
                'bio' => 'Membangun solusi digital yang elegan dan fungsional dengan teknologi modern.',
                'email' => 'hello@example.com',
                'phone' => '+62 812 3456 7890',
                'location' => 'Indonesia'
            ];
        }

        // Mapping field dari database ke format yang diharapkan
        return [
            'name' => $siteInfo['name'] ?? 'Rifki Maulana',
            'title' => $siteInfo['title'] ?? 'Full-Stack Developer',
            'short_description' => $siteInfo['bio'] ?? 'Membangun solusi digital yang inovatif dan berdampak dengan teknologi terkini.',
            'bio' => $siteInfo['bio'] ?? 'Membangun solusi digital yang elegan dan fungsional dengan teknologi modern.',
            'email' => $siteInfo['email'] ?? 'hello@example.com',
            'phone' => $siteInfo['phone'] ?? '+62 812 3456 7890',
            'location' => 'Indonesia' // Default location karena tidak ada field di database
        ];
    }
}