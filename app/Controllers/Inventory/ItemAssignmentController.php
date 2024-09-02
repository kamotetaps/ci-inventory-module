<?php

namespace App\Controllers\Inventory;

use App\Controllers\BaseController;
use App\Models\Inventory\InvItemsModel;
use App\Models\Inventory\ItemAssignmentsModel;
use App\Models\UserModel;

class ItemAssignmentController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Inventory Allocation Records';
		 
        $itemModel = new ItemAssignmentsModel();
        
        $data['items'] = $itemModel->getItemAndUser();
        // dd($data['items']);
        return view('inventory/item-assignment/index', $data);
    }

   public function add()
{
    $data['title'] = 'Add Item Assignment';
    helper('form');

    $itemAssginmentModel = new ItemAssignmentsModel();
    $itemModel = new InvItemsModel();
    $userModel = new UserModel();
  $data['statusOptions'] = [
        'assigned' => 'Assigned',
        'in_use' => 'In Use',
        'returned' => 'Returned',
        'in_repair' => 'In Repair'
    ];
    // Fetch all items and users for dropdowns
    $data['itemLists'] = $itemModel->getAllItems();
	 // dd( $data['itemLists']);
    $data['userLists'] = $userModel->getUsers();
	 // dd( $data['userLists']);
    if ($this->request->getMethod() === 'POST') {
        $rules = [
            'item_id' => ['label' => 'Item', 'rules' => 'required'],
            'user_id' => ['label' => 'User', 'rules' => 'required'],
            'serial_number' => ['label' => 'Serial Number', 'rules' => 'permit_empty'],
            'photo' => ['label' => 'Photo', 'rules' => 'permit_empty'],
            'assigned_at' => ['label' => 'Date Assigned', 'rules' => 'required'],
			  'status' => ['label' => 'Status', 'rules' => 'required']
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
        } else {
            $itemData = [
                'item_id' => $this->request->getPost('item_id'),
                'user_id' => $this->request->getPost('user_id'),
                'serial_number' => $this->request->getPost('serial_number'),
                'photo' => $this->request->getPost('photo'),
                'assigned_at' => $this->request->getPost('assigned_at'),
				  'status' => $this->request->getPost('status')
            ];

            $itemAssginmentModel->insert($itemData);
            session()->setFlashdata('success', 'Item successfully assign.');
            return redirect()->to('/inventory/assignments');
        }
    }

    return view('inventory/item-assignment/add', $data);
}




public function edit()
{
    $data['title'] = 'Edit Assigned To';
    helper('form');
    $itemAssginmentModel = new ItemAssignmentsModel();
    $itemModel = new InvItemsModel();
    $userModel = new UserModel();

    // Fetch all items and users for dropdowns
    $data['itemLists'] = $itemModel->getAllItems();
	 // dd( $data['itemLists']);
    $data['userLists'] = $userModel->getUsers();
	 // dd( $data['userLists']);
 // Define the possible status values
    $data['statusOptions'] = [
        'assigned' => 'Assigned',
        'in_use' => 'In Use',
        'returned' => 'Returned',
        'in_repair' => 'In Repair'
    ];
    if ($this->request->getMethod() === "POST") {
        $itemId = $this->request->getPost('id'); // Get the item ID from the POST request

        $rules = [
             'item_id' => ['label' => 'Item', 'rules' => 'required'],
            'user_id' => ['label' => 'User', 'rules' => 'required'],
            'serial_number' => ['label' => 'Serial Number', 'rules' => 'permit_empty'],
            'photo' => ['label' => 'Photo', 'rules' => 'permit_empty'],
            'assigned_at' => ['label' => 'Date Assigned', 'rules' => 'required'],
            'status' => ['label' => 'Status', 'rules' => 'required']
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $data['category'] = $this->request->getPost(); // Preserve user input
        } else {
            $update_data = [
               'item_id' => $this->request->getPost('item_id'),
                'user_id' => $this->request->getPost('user_id'),
                'serial_number' => $this->request->getPost('serial_number'),
                'photo' => $this->request->getPost('photo'),
                'assigned_at' => $this->request->getPost('assigned_at'),
                'status' => $this->request->getPost('status')
            ];

            $result = $itemAssginmentModel->update($this->request->getPost('id'), $update_data);

            if ($result) {
                session()->setFlashdata('success', 'Assigned to successfully updated.');  
                return redirect()->to('inventory/assignments');
            }
            session()->setFlashdata('error', 'Assigned to failed to update.');
        }
    } else {
        $itemId = $this->request->getGet('id');
        $itemDetail = $itemAssginmentModel->where('MD5(CONCAT(id, "edit"))', $itemId)->first();

        if (!$itemDetail) {                    
            session()->setFlashdata('error', 'Unable to find assigned to.');  
            return redirect()->to('inventory/assignments');
        }
        
        $data['category'] = $itemDetail;
    }

    return view('inventory/item-assignment/edit', $data);
}


 





public function delete()
{
    $itemModel = new ItemAssignmentsModel();
    $id = $this->request->getGet('id');

    // Check if the item exists
    $item = $itemModel->where('MD5(CONCAT(id, "delete"))', $id)->first();

    if (!$item) {
        session()->setFlashdata('error', 'Assigned to not found.');
        return redirect()->to('inventory/assignments');
    }

    // Delete the item
    if ($itemModel->delete($item['id'])) {
        session()->setFlashdata('success', 'Assigned to successfully deleted.');
    } else {
        session()->setFlashdata('error', 'Failed to delete assigned to.');
    }

    return redirect()->to('inventory/assignments');
}

}
