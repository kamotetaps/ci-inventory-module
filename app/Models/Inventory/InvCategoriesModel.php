<?php

namespace App\Models\Inventory;

use CodeIgniter\Model;

class InvCategoriesModel extends Model
{
    protected $table = 'inv_categories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    // Define validation rules
    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[255]',
        'description' => 'permit_empty|string'
    ];
	
	
		public function getAllCategories()
    {
        return $this->findAll();
    }
	
	
	
	  public function getCategoryItemCounts()
    {
        return $this->select('inv_categories.name, COUNT(inv_items.id) as item_count')
                    ->join('inv_items', 'inv_items.category_id = inv_categories.id', 'left')
                    ->groupBy('inv_categories.id')
                    ->findAll();
    }
}
