<?php

namespace App\Models\Inventory;

use CodeIgniter\Model;

class ItemLocationsModel extends Model
{
    protected $table = 'inv_item_locations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['item_id', 'location', 'quantity','created_at', 'updated_at'];
    protected $useTimestamps = true;

   
	
	public function getItemsWithLocation()
    {
        
        return $this->select('inv_item_locations.*, inv_items.name as item_name')
                    ->join('inv_items', 'inv_items.id = inv_item_locations.item_id')
                    ->findAll();
    }
	
	

}
