<?php

namespace App\Models\Inventory;

use CodeIgniter\Model;

class InvSuppliersModel extends Model
{
    protected $table = 'inv_suppliers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'contact', 'phone','email','address','created_at', 'updated_at'];
    protected $useTimestamps = true;

    // Define validation rules
    // protected $validationRules = [
        // 'name' => 'required|min_length[3]|max_length[255]',
        // 'contact' => 'permit_empty|string',
        // 'phone' => 'permit_empty|string',
        // 'email' => 'permit_empty|string',
        // 'address' =>'permit_empty|string',
    // ];
	
	public function getAllSupplier(){
		return $this->findAll();
	}
	 
	
	

}
