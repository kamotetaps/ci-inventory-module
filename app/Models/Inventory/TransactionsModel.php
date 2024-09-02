<?php

namespace App\Models\Inventory;

use CodeIgniter\Model;

class TransactionsModel extends Model
{
    protected $table = 'inv_inventory_transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['item_id', 'transaction_type', 'quantity', 'price', 'date', 'supplier_id'];
    protected $useTimestamps = true;

   public function getItemAndSupplier()
		{
			return $this->select('i.name as item_name, s.name as supplier_name, t.*')
						->from($this->table . ' as t')
						->join('inv_items as i', 'i.id = t.item_id')
						->join('inv_suppliers as s', 's.id = t.supplier_id', 'left') // Use 'left' for left join
						->groupBy('t.id') // Group by the primary key of the transaction table to avoid duplication
						->findAll();
		}

	public function countAllTransaction(){
		return $this->countAll();
	}
	 
	
}
