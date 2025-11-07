<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'role'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Nonaktifkan validasi sementara untuk debugging
    protected $skipValidation = true;

    public function verifyLogin($email, $password)
    {
        $user = $this->where('email', $email)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        
        return false;
    }

    public function createUser($data)
    {
        try {
            // Hash password
            if (isset($data['password'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }
            
            // Set default role untuk user baru sebagai editor
            $data['role'] = 'editor';
            
            echo "<pre>Data sebelum insert: ";
            print_r($data);
            echo "</pre>";

            $result = $this->insert($data);
            
            echo "<pre>Insert result: ";
            var_dump($result);
            echo "</pre>";

            echo "<pre>Last query: " . $this->db->getLastQuery() . "</pre>";
            
            return $result;

        } catch (\Exception $e) {
            echo "<pre>Model Exception: " . $e->getMessage() . "</pre>";
            return false;
        }
    }
}