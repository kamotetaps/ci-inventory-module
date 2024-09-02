<?php

namespace App\Models\Inventory;

use CodeIgniter\Model;

class InvItemsModel extends Model
{
    protected $table = 'inv_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category_id', 'name', 'description','quantity','price','created_at', 'updated_at'];
    protected $useTimestamps = true;

    // Define validation rules
    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[255]',
        'description' => 'permit_empty|string',
        'price' => 'permit_empty|string',
        'quantity' => 'required',
        'category_id' => 'required',
    ];
	
	
	public function getItemsWithCategories()
    {
        // Join with InvCategoriesModel using category_id
        return $this->select('inv_items.*, inv_categories.name as category_name')
                    ->join('inv_categories', 'inv_categories.id = inv_items.category_id')
                    ->findAll();
    }
	
	public function getAllItems(){
		 return $this->findAll();
	}
	
	
	 public function getItemTotals()
    {
        return $this->db->table($this->table)
            ->select('name, (quantity * price) AS total')
            ->get()
            ->getResultArray();
    }


public function getCategoryTotals()
    {
        $builder = $this->db->table($this->table);
        $builder->select('inv_categories.name AS category_name, SUM(inv_items.quantity * inv_items.price) AS total');
        $builder->join('inv_categories', 'inv_categories.id = inv_items.category_id');
        $builder->groupBy('inv_items.category_id');

        $query = $builder->get();
        return $query->getResultArray();
    }
/*
SELECT 
    inv_categories.name AS category_name, 
    SUM(inv_items.quantity * inv_items.price) AS total 
FROM 
    inv_items 
JOIN 
    inv_categories ON inv_categories.id = inv_items.category_id 
GROUP BY 
    inv_items.category_id;
	*/
}
