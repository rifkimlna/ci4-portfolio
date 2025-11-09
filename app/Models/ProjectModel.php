<?php
// namespace App\Models;

// use CodeIgniter\Model;

// class ProjectModel extends Model
// {
//     protected $table = 'projects';
//     protected $primaryKey = 'id';
//     protected $allowedFields = ['title', 'description', 'technologies', 'demo_url', 'source_code_url', 'image_url', 'is_active', 'created_by'];
//     protected $useTimestamps = true;
//     protected $createdField = 'created_at';
//     protected $updatedField = 'updated_at';

//     public function getActiveProjects()
//     {
//         return $this->where('is_active', 1)->findAll();
//     }

//     public function getAllProjects()
//     {
//         return $this->findAll();
//     }
// }




namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 
        'description', 
        'technologies', 
        'demo_url', 
        'source_code_url', 
        'image_url',
        'is_active',
        'created_by'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Get active projects for portfolio
    public function getActiveProjects($limit = null)
    {
        $builder = $this->where('is_active', 1)
                       ->orderBy('created_at', 'DESC');
        
        if ($limit) {
            $builder->limit($limit);
        }
        
        return $builder->findAll();
    }

    // Get project detail
    public function getProjectDetail($id)
    {
        return $this->where('id', $id)
                    ->where('is_active', 1)
                    ->first();
    }

    // Get related projects (excluding current project)
    public function getRelatedProjects($currentId, $limit = 3)
    {
        return $this->where('id !=', $currentId)
                    ->where('is_active', 1)
                    ->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }
}