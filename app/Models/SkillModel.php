<?php
namespace App\Models;

use CodeIgniter\Model;

class SkillModel extends Model
{
    protected $table = 'skills';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'category', 'is_active', 'created_by'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getActiveSkills()
    {
        return $this->where('is_active', 1)->orderBy('category', 'ASC')->orderBy('name', 'ASC')->findAll();
    }

    public function getAllSkills()
    {
        return $this->orderBy('category', 'ASC')->orderBy('name', 'ASC')->findAll();
    }

    public function getSkillsByCategory()
    {
        $skills = $this->where('is_active', 1)->findAll();
        $categorized = [];
        
        foreach ($skills as $skill) {
            $category = $skill['category'] ?? 'Other';
            $categorized[$category][] = $skill;
        }
        
        return $categorized;
    }
}