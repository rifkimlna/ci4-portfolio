<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        $data = [
            'title' => 'Login - Portfolio Admin'
        ];

        return view('admin/auth/login', $data);
    }

    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        $data = [
            'title' => 'Daftar Akun Baru - Portfolio Admin'
        ];

        return view('admin/auth/register', $data);
    }

    public function attemptLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->verifyLogin($email, $password);

        if ($user) {
            $sessionData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ];
            session()->set($sessionData);

            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->back()->withInput()->with('error', 'Email atau password salah!');
        }
    }

   public function attemptRegister()
{
    try {
        $validation = \Config\Services::validation();
        
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]'
        ];

        // Debug: Tampilkan data yang diterima
        echo "<pre>Data POST: ";
        print_r($this->request->getPost());
        echo "</pre>";

        if (!$this->validate($rules)) {
            echo "<pre>Validation Errors: ";
            print_r($this->validator->getErrors());
            echo "</pre>";
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        echo "<pre>Data sebelum save: ";
        print_r($data);
        echo "</pre>";

        $result = $this->userModel->createUser($data);
        
        echo "<pre>Result save: ";
        var_dump($result);
        echo "</pre>";

        if ($result) {
            echo "SUCCESS: User created!";
            return redirect()->to('/admin/login')->with('success', 'Registrasi berhasil! Silakan login.');
        } else {
            echo "<pre>Model Errors: ";
            print_r($this->userModel->errors());
            echo "</pre>";
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat registrasi.');
        }

    } catch (\Exception $e) {
        echo "<pre>Exception: " . $e->getMessage() . "</pre>";
        echo "<pre>Stack Trace: " . $e->getTraceAsString() . "</pre>";
        return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
    }
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}