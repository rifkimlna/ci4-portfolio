<?php
namespace App\Models;

use CodeIgniter\Model;

class SocialLinkModel extends Model
{
    protected $table = 'social_links';
    protected $primaryKey = 'id';
    protected $allowedFields = ['platform', 'url', 'icon_svg', 'is_active', 'created_by'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getActiveLinks()
    {
        return $this->where('is_active', 1)->findAll();
    }
}