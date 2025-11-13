<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactModel;

class Contacts extends BaseController
{
    protected $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

   public function submit()
{
    try {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|max_length[255]',
            'message' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->with('errors', $this->validator->getErrors())
                ->withInput();
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
            'is_read' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->contactModel->insert($data)) {
            return redirect()->back()
                ->with('success', 'Pesan Anda berhasil dikirim! Terima kasih.');
        } else {
            return redirect()->back()
                ->with('error', 'Maaf, terjadi kesalahan. Silakan coba lagi.')
                ->withInput();
        }

    } catch (\Exception $e) {
        log_message('error', 'Contact submit error: ' . $e->getMessage());
        return redirect()->back()
            ->with('error', 'Terjadi kesalahan sistem.')
            ->withInput();
    }
}

    // Method untuk admin (tetap seperti sebelumnya)
    public function index()
    {
        $data = [
            'title' => 'Manage Contacts',
            'contacts' => $this->contactModel->getAllContacts()
        ];

        return view('admin/contacts/index', $data);
    }

    public function markAsRead($id)
    {
        $data = ['is_read' => 1];
        
        if ($this->contactModel->update($id, $data)) {
            return redirect()->back()->with('success', 'Message marked as read!');
        } else {
            return redirect()->back()->with('error', 'Failed to mark message as read.');
        }
    }

    public function delete($id)
    {
        if ($this->contactModel->delete($id)) {
            return redirect()->back()->with('success', 'Message deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete message.');
        }
    }
}