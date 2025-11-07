<?php
namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'technologies', 'demo_url', 'source_code_url', 'image_url', 'is_active', 'created_by'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getActiveProjects()
    {
        return $this->where('is_active', 1)->findAll();
    }

    public function getAllProjects()
    {
        return $this->findAll();
    }
}