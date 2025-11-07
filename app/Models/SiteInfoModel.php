<?php
// namespace App\Models;

// use CodeIgniter\Model;

// class SiteInfoModel extends Model
// {
//     protected $table = 'site_info';
//     protected $primaryKey = 'id';
//     protected $allowedFields = ['name', 'title', 'bio', 'email', 'phone'];
//     protected $useTimestamps = true;
//     protected $createdField = 'created_at';
//     protected $updatedField = 'updated_at';

//     public function getSiteInfo()
//     {
//         return $this->first();
//     }
// }



namespace App\Models;

use CodeIgniter\Model;

class SiteInfoModel extends Model
{
    protected $table = 'site_info';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'title', 'bio', 'about_description', 'about_experience', 'email', 'phone'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getSiteInfo()
    {
        return $this->first();
    }
}