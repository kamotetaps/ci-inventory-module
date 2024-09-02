<?php

namespace App\Controllers\Inventory;

use App\Controllers\BaseController;
use App\Models\Inventory\InvItemsModel;
use App\Models\Inventory\InvCategoriesModel;

class Items extends BaseController
{
    public function index()
    {
        $data['title'] = 'Item Lists';
		 
        $itemModel = new InvItemsModel();
        
        $data['items'] = $itemModel->getItemsWithCategories();
        
        return view('inventory/items/index', $data);
    }

    public function add()
    {
        $data['title'] = 'Add Items';
        helper('form');
        $itemModel = new InvItemsModel();
		
		
		
		   // Instantiate InvCategoriesModel to get categories
        $categoryModel = new InvCategoriesModel();
        $data['categories'] = $categoryModel->getAllCategories(); // fetch all categories for dropdown
		
		
		
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'category_id' => ['label' => 'Item Category', 'rules' => 'required'],
                'quantity' => ['label' => 'Quantity', 'rules' => 'required'],
                'price' => ['label' => 'Price', 'rules' => 'required'],
                'name' => ['label' => 'Category Name', 'rules' => 'required|min_length[3]|is_unique[inv_items.name]'],
                'description' => ['label' => 'Description', 'rules' => 'permit_empty']
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $itemData = [
                    'name' => $this->request->getPost('name'),
                    'description' => $this->request->getPost('description'),
                    'price' => $this->request->getPost('price'),
                    'quantity' => $this->request->getPost('quantity'),
                    'category_id' => $this->request->getPost('category_id'),
                ];

                $itemModel->insert($itemData);
                session()->setFlashdata('success', 'Item successfully added.');
                return redirect()->to('/inventory/items');
            }
        }

        return view('inventory/items/add', $data);
    }



public function edit()
{
    $data['title'] = 'Edit Items';
    helper('form');
    $itemModel = new InvItemsModel();
    $categoryModel = new InvCategoriesModel();
    $data['categories'] = $categoryModel->getAllCategories(); // Fetch all categories for dropdown

    if ($this->request->getMethod() === "POST") {
        $itemId = $this->request->getPost('id'); // Get the item ID from the POST request

        $rules = [
            'category_id' => ['label' => 'Item Category', 'rules' => 'required'],
            'quantity' => ['label' => 'Quantity', 'rules' => 'required'],
            'price' => ['label' => 'Price', 'rules' => 'required'],
            'name' => [
                'label' => 'Category Name',
                'rules' => 'required|is_unique[inv_items.name, id, ' . $itemId . ']'
            ],
            'description' => ['label' => 'Description', 'rules' => 'permit_empty']
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $data['category'] = $this->request->getPost(); // Preserve user input
        } else {
            $update_data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'quantity' => $this->request->getPost('quantity'),
                'category_id' => $this->request->getPost('category_id'),
            ];

            $result = $itemModel->update($this->request->getPost('id'), $update_data);

            if ($result) {
                session()->setFlashdata('success', 'Item successfully updated.');  
                return redirect()->to('inventory/items');
            }
            session()->setFlashdata('error', 'Item failed to update.');
        }
    } else {
        $itemId = $this->request->getGet('id');
        $itemDetail = $itemModel->where('MD5(CONCAT(id, "edit"))', $itemId)->first();

        if (!$itemDetail) {                    
            session()->setFlashdata('error', 'Unable to find item.');  
            return redirect()->to('inventory/items');
        }
        
        $data['category'] = $itemDetail;
    }

    return view('inventory/items/edit', $data);
}



    // public function delete()
// {
    // $data['title'] = 'Delete Item';
    // helper('form');
    // $itemModel = new InvCategoriesModel();

    // if ($this->request->getMethod() === "POST") {
        // $rules = [
            // 'id' => 'required', 
             
        // ];

        // if (!$this->validate($rules)) {
            // $data['validation'] = $this->validator;
            // $data['category'] = $this->request->getPost(); // Preserve user input
        // } else {
            // $update_data = [
                // 'name' => $this->request->getPost('name'),
                // 'description' => $this->request->getPost('description')
            // ];

            // $result = $itemModel->delete($this->request->getPost('id'));

            // if ($result) {
                // session()->setFlashdata('success', 'Category successfully deleted.');  
                // return redirect()->to('inventory/items');
            // }
            // session()->setFlashdata('error', 'Category failed to delete.');
        // }
    // } else {
        // $itemDetail = $itemModel->where('MD5(CONCAT(id, "delete"))', $this->request->getGet('id'))->first();

        // if (!$itemDetail) {                    
            // session()->setFlashdata('error', 'Unable to find category.');  
            // return redirect()->to('inventory/items');
        // }
        
        // $data['category'] = $itemDetail;
    // }

    // return view('inventory/items/delete', $data);
// }








public function delete()
{
    $itemModel = new InvItemsModel();
    $id = $this->request->getGet('id');

    // Check if the item exists
    $item = $itemModel->where('MD5(CONCAT(id, "delete"))', $id)->first();

    if (!$item) {
        session()->setFlashdata('error', 'Item not found.');
        return redirect()->to('inventory/items');
    }

    // Delete the item
    if ($itemModel->delete($item['id'])) {
        session()->setFlashdata('success', 'Item successfully deleted.');
    } else {
        session()->setFlashdata('error', 'Failed to delete item.');
    }

    return redirect()->to('inventory/items');
}

}
