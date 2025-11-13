<?php
namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'message', 'is_read'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getUnreadCount()
    {
        return $this->where('is_read', 0)->countAllResults();
    }

    public function getAllContacts()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
    
}

