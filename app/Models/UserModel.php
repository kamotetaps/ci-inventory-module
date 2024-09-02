<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user_tbl';
    protected $primaryKey = 'UserID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object'; //array
    protected $useSoftDeletes = true;

    protected $allowedFields = [
            'LastName', 
            'FirstName',
            'MiddleName',
            'Username',
            'Password'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'EntryDate'; //created_at
    protected $updatedField  = 'LastUpdatingDate'; //updated_at
    protected $deletedField  = 'DateDeleted'; //deleted_at

	public function getUsers(){
		return $this->findAll();
	}
	
public function countAllUsers()
    {
        return $this->countAll();
    }
    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}