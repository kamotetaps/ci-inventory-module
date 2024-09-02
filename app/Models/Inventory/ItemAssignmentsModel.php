<?php

namespace App\Models\Inventory;

use CodeIgniter\Model;

class ItemAssignmentsModel extends Model
{
    protected $table = 'inv_item_assignments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['item_id', 'user_id', 'serial_number','photo','assigned_at','status','created_at', 'updated_at'];
    protected $useTimestamps = true;

   
	
	public function getItemAndUser()
    {
        
        return $this->select('inv_items.name as item_name, user_tbl.LastName as last_name, user_tbl.FirstName as first_name, inv_item_assignments.serial_number, inv_item_assignments.assigned_at, inv_item_assignments.status, inv_item_assignments.id as id')
                    ->join('inv_items', 'inv_items.id = inv_item_assignments.item_id')
                    ->join('user_tbl', 'user_tbl.UserId = inv_item_assignments.user_id')
                    ->findAll();
    }
	
	
	public function countAssignmentStatus(){
		  return $this->select('inv_item_assignments.status, COUNT(inv_item_assignments.id) as status_total')
                    ->groupBy('inv_item_assignments.status')
                    ->findAll();
	}
}
