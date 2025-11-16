<?php

namespace App\Models;

use CodeIgniter\Model;

class EducationModel extends Model
{
    protected $table            = 'educations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'degree', 
        'institution', 
        'field_of_study', 
        'start_year', 
        'end_year', 
        'is_current', 
        'description', 
        'grade', 
        'activities', 
        'is_active', 
        'created_by'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'degree'      => 'required|max_length[255]',
        'institution' => 'required|max_length[255]',
        'start_year'  => 'required|numeric|min_length[4]|max_length[4]',
        'end_year'    => 'permit_empty|numeric|min_length[4]|max_length[4]',
    ];

    protected $validationMessages = [
        'degree' => [
            'required' => 'Gelar pendidikan harus diisi',
            'max_length' => 'Gelar pendidikan maksimal 255 karakter'
        ],
        'institution' => [
            'required' => 'Nama institusi harus diisi',
            'max_length' => 'Nama institusi maksimal 255 karakter'
        ],
        'start_year' => [
            'required' => 'Tahun mulai harus diisi',
            'numeric' => 'Tahun harus berupa angka',
            'min_length' => 'Tahun harus 4 digit',
            'max_length' => 'Tahun harus 4 digit'
        ]
    ];

    protected $skipValidation = false;

    /**
     * Get all active educations ordered by start year
     */
    public function getActiveEducations()
    {
        return $this->where('is_active', 1)
                    ->orderBy('start_year', 'DESC')
                    ->findAll();
    }

    /**
     * Get all educations for admin
     */
    public function getAllEducations()
    {
        return $this->orderBy('start_year', 'DESC')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Get education by ID
     */
    public function getEducationById($id)
    {
        return $this->find($id);
    }

    /**
     * Create new education
     */
    public function createEducation($data)
    {
        return $this->insert($data);
    }

    /**
     * Update education
     */
    public function updateEducation($id, $data)
    {
        return $this->update($id, $data);
    }

    /**
     * Delete education
     */
    public function deleteEducation($id)
    {
        return $this->delete($id);
    }
}