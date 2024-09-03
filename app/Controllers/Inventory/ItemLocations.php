<?php

namespace App\Controllers\Inventory;

use App\Controllers\BaseController;
use App\Models\Inventory\ItemLocationsModel;
use App\Models\Inventory\InvItemsModel;


class ItemLocations extends BaseController
{
    public function index()
    {
        $data['title'] = 'Item Locations';
		 
        $itemModel = new ItemLocationsModel();
        
        $data['items'] = $itemModel->getItemsWithLocation();
        
        return view('inventory/item-locations/index', $data);
    }

    public function add()
    {
        $data['title'] = 'Assign the Item to a Storage Location';
        helper('form');
        $itemModel = new ItemLocationsModel();
		
		
		
		   // Instantiate InvCategoriesModel to get categories
        $itemsModel = new InvItemsModel();
        $data['itemLists'] = $itemsModel->getAllItems(); // fetch all categories for dropdown
		
		
		
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'item_id' => ['label' => 'Item', 'rules' => 'required'],
                'location' => ['label' => 'Location', 'rules' => 'required'],
                'quantity' => ['label' => 'Quantity', 'rules' => 'required'],
             
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $itemData = [
                    'item_id' => $this->request->getPost('item_id'),
                    'location' => $this->request->getPost('location'), 
                    'quantity' => $this->request->getPost('quantity'), 
                ];

                $itemModel->insert($itemData);
                session()->setFlashdata('success', 'Item successfully assigned to '.$this->request->getPost('location').'('.$this->request->getPost('quantity').' pieces).');
                return redirect()->to('/inventory/item-locations');
            }
        }

        return view('inventory/item-locations/add', $data);
    }



public function edit()
{
    $data['title'] = 'Edit Location';
    helper('form');
    $itemLocModel = new ItemLocationsModel();
    $itemModel = new InvItemsModel();
	
    $data['itemLists'] = $itemModel->getAllItems(); // Fetch all items for dropdown select

    if ($this->request->getMethod() === "POST") {
        $itemId = $this->request->getPost('id'); // Get the item ID from the POST request

        $rules = [
              'item_id' => ['label' => 'Item', 'rules' => 'required'],
                'location' => ['label' => 'Location', 'rules' => 'required'],
                'quantity' => ['label' => 'Quantity', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $data['category'] = $this->request->getPost(); // Preserve user input
        } else {
            $update_data = [
               'item_id' => $this->request->getPost('item_id'),  
                'location' => $this->request->getPost('location'),
                'quantity' => $this->request->getPost('quantity'),
            ];
 // dd($rules,$update_data);
            $result = $itemLocModel->update($this->request->getPost('id'), $update_data);

            if ($result) {
                session()->setFlashdata('success', 'Item location successfully updated.');  
                return redirect()->to('inventory/item-locations');
            }
            session()->setFlashdata('error', 'Item location failed to update.');
        }
    } else {
		
        $itemId = $this->request->getGet('id');
	 
        $itemDetail = $itemLocModel->where('MD5(CONCAT(id, "edit"))', $itemId)->first();
 
        if (!$itemDetail) {                    
            session()->setFlashdata('error', 'Unable to find item location.');  
            return redirect()->to('inventory/item-locations');
        }
        
        $data['category'] = $itemDetail;
    }

    return view('inventory/item-locations/edit', $data);
}



  





public function delete()
{
    $itemModel = new ItemLocationsModel();
    $id = $this->request->getGet('id');

    // Check if the item exists
    $item = $itemModel->where('MD5(CONCAT(id, "delete"))', $id)->first();

    if (!$item) {
        session()->setFlashdata('error', 'Item location not found.');
        return redirect()->to('inventory/item-locations');
    }

    // Delete the item
    if ($itemModel->delete($item['id'])) {
        session()->setFlashdata('success', 'Item location successfully deleted.');
    } else {
        session()->setFlashdata('error', 'Failed to delete item location.');
    }

    return redirect()->to('inventory/item-locations');
}

}
