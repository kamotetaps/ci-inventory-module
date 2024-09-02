<?php

namespace App\Controllers\Inventory;

use App\Controllers\BaseController;
use App\Models\Inventory\InvItemsModel;
use App\Models\Inventory\ItemAssignmentsModel;
use App\Models\UserModel;
use App\Models\Inventory\TransactionsModel;
use App\Models\Inventory\InvSuppliersModel;
class TransactionsController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Transaction Lists';
		 
        $itemModel = new TransactionsModel();
        
        $data['items'] = $itemModel->getItemAndSupplier();
        // dd($data['items']);
        return view('inventory/transactions/index', $data);
    }

   public function add()
{
    $data['title'] = 'New Transaction';
    helper('form');

    $transactionModel = new TransactionsModel();
    $itemModel = new InvItemsModel();
    $supplierModel = new InvSuppliersModel();

	$data['transaction_type']= ['purchase', 'sale', 'adjustment'] ;
    $data['itemLists'] = $itemModel->getAllItems();
	 // dd( $data['itemLists']);
    $data['suppliers'] = $supplierModel->getAllSupplier();
	 // dd( $data['suppliers']);
    if ($this->request->getMethod() === 'POST') {
        $rules = [
            'item_id' => ['label' => 'Item', 'rules' => 'required'],
            'transaction_type' => ['label' => 'Type of Transaction', 'rules' => 'required'],
            'quantity' => ['label' => 'Qunatity', 'rules' => 'required'],
            'price' => ['label' => 'Price', 'rules' => 'required'],
            'date' => ['label' => 'Date', 'rules' => 'required'],
            'supplier_id' => ['label' => 'Supplier (optional)', 'rules' => 'permit_empty']
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
        } else {
			//Check if the supplier id is in supplier tbl
			 $supplier_id = $this->request->getPost('supplier_id');
			if ($supplier_id) {
						$supplierExists = $supplierModel->find($supplier_id);
						if (!$supplierExists) {
							$data['validation'] = $this->validator->setError('supplier_id', 'The selected supplier does not exist.');
							return view('inventory/transactions/add', $data);
						}
					}
		 
            $itemData = [
                'item_id' => $this->request->getPost('item_id'),
                'transaction_type' => $this->request->getPost('transaction_type'),
                'quantity' => $this->request->getPost('quantity'),
                'price' => $this->request->getPost('price'),
                'date' => $this->request->getPost('date'),
                'supplier_id' => $supplier_id ? $supplier_id : null  // Set to null if empty
            ];

            $transactionModel->insert($itemData);
            session()->setFlashdata('success', 'Transaction successfully added.');
            return redirect()->to('/inventory/transactions');
        }
    }

    return view('inventory/transactions/add', $data);
}




public function edit()
{
    $data['title'] = 'Edit Assigned To';
    helper('form');
	
    $transactionModel = new TransactionsModel();
    $itemModel = new InvItemsModel();
    $supplierModel = new InvSuppliersModel();

	$data['transaction_type']= ['purchase', 'sale', 'adjustment'] ;
    $data['itemLists'] = $itemModel->getAllItems();
	 // dd( $data['itemLists']);
    $data['suppliers'] = $supplierModel->getAllSupplier();
	
	
    if ($this->request->getMethod() === "POST") {
        $itemId = $this->request->getPost('id'); // Get the item ID from the POST request

        $rules = [
			'item_id' => ['label' => 'Item', 'rules' => 'required'],
            'transaction_type' => ['label' => 'Type of Transaction', 'rules' => 'required'],
            'quantity' => ['label' => 'Qunatity', 'rules' => 'required'],
            'price' => ['label' => 'Price', 'rules' => 'required'],
            'date' => ['label' => 'Date', 'rules' => 'required'],
            'supplier_id' => ['label' => 'Supplier (optional)', 'rules' => 'permit_empty']
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $data['category'] = $this->request->getPost(); // Preserve user input
        } else {
			
			//Check if the supplier id is in supplier tbl
			 $supplier_id = $this->request->getPost('supplier_id');
			if ($supplier_id) {
						$supplierExists = $supplierModel->find($supplier_id);
						if (!$supplierExists) {
							$data['validation'] = $this->validator->setError('supplier_id', 'The selected supplier does not exist.');
							return view('inventory/transactions/add', $data);
						}
					}
		 
			
            $update_data = [
                'item_id' => $this->request->getPost('item_id'),
                'transaction_type' => $this->request->getPost('transaction_type'),
                'quantity' => $this->request->getPost('quantity'),
                'price' => $this->request->getPost('price'),
                'date' => $this->request->getPost('date'),
                'supplier_id' => $supplier_id ? $supplier_id : null  // Set to null if empty
            ];

            $result = $transactionModel->update($this->request->getPost('id'), $update_data);

            if ($result) {
                session()->setFlashdata('success', 'Assigned to successfully updated.');  
                return redirect()->to('inventory/transactions');
            }
            session()->setFlashdata('error', 'Assigned to failed to update.');
        }
    } else {
        $itemId = $this->request->getGet('id');
        $itemDetail = $transactionModel->where('MD5(CONCAT(id, "edit"))', $itemId)->first();

        if (!$itemDetail) {                    
            session()->setFlashdata('error', 'Unable to find assigned to.');  
            return redirect()->to('inventory/transactions');
        }
        
        $data['category'] = $itemDetail;
    }

    return view('inventory/transactions/edit', $data);
}


 





public function delete()
{
    $itemModel = new TransactionsModel();
    $id = $this->request->getGet('id');

    // Check if the item exists
    $item = $itemModel->where('MD5(CONCAT(id, "delete"))', $id)->first();

    if (!$item) {
        session()->setFlashdata('error', 'Transaction to not found.');
        return redirect()->to('inventory/transactions');
    }

    // Delete the item
    if ($itemModel->delete($item['id'])) {
        session()->setFlashdata('success', 'Transaction to successfully deleted.');
    } else {
        session()->setFlashdata('error', 'Failed to delete transacation.');
    }

    return redirect()->to('inventory/transactions');
}

}
