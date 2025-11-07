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