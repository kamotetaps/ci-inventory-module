<?php

namespace App\Controllers\Inventory;

use App\Controllers\BaseController;
use App\Models\Inventory\InvSuppliersModel;
 

class Suppliers extends BaseController
{
    public function index()
    {
        $data['title'] = 'Supplier Lists';
		 
        $supplierModel = new InvSuppliersModel();
		$data['suppliers']=$supplierModel->findAll();
         
        return view('inventory/suppliers/index', $data);
    }

    public function add()
    {
        $data['title'] = 'Add Supplier';
        helper('form');
        $model = new InvSuppliersModel();
		
 
		
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                 'name' => 'required|min_length[3]|max_length[255]',
				'contact' => 'permit_empty|string',
				'phone' => 'permit_empty|string',
				'email' => 'permit_empty|string',
				'address' =>'permit_empty|string',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $supplierData = [
                    'name' => $this->request->getPost('name'),
                    'contact' => $this->request->getPost('contact'),
                    'email' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'address' => $this->request->getPost('address'),
                ];

                $model->insert($supplierData);
                session()->setFlashdata('success', 'Supplier successfully added.');
                return redirect()->to('/inventory/suppliers');
            }
        }

        return view('inventory/suppliers/add', $data);
    }



public function edit()
{
    $data['title'] = 'Edit Supplier';
    helper('form');
    $model = new InvSuppliersModel();
   

    if ($this->request->getMethod() === "POST") {
        $itemId = $this->request->getPost('id'); // Get the supplier ID encrypted from the POST request

        $rules = [
				'name' => 'required|min_length[3]|max_length[255]',
				'contact' => 'permit_empty|string',
				'phone' => 'permit_empty|string',
				'email' => 'permit_empty|string',
				'address' =>'permit_empty|string',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $data['suppliers'] = $this->request->getPost(); // Preserve user input
        } else {
            $update_data = [
                'name' => $this->request->getPost('name'),
                'contact' => $this->request->getPost('contact'),
                'phone' => $this->request->getPost('phone'),
                'email' => $this->request->getPost('email'),
                'address' => $this->request->getPost('address'),
            ];

            $result = $model->update($this->request->getPost('id'), $update_data);

            if ($result) {
                session()->setFlashdata('success', 'Supplier successfully updated.');  
                return redirect()->to('inventory/suppliers');
            }
            session()->setFlashdata('error', 'Supplier failed to update.');
        }
    } else {
        $itemId = $this->request->getGet('id');
        $itemDetail = $model->where('MD5(CONCAT(id, "edit"))', $itemId)->first();

        if (!$itemDetail) {                    
            session()->setFlashdata('error', 'Unable to find supplier.');  
            return redirect()->to('inventory/suppliers');
        }
        
        $data['suppliers'] = $itemDetail;
		
    }
// dd($data['suppliers']);
    return view('inventory/suppliers/edit', $data);
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
    $model = new InvSuppliersModel();
    $id = $this->request->getGet('id');

    // Check if the item exists
    $item = $model->where('MD5(CONCAT(id, "delete"))', $id)->first();

    if (!$item) {
        session()->setFlashdata('error', 'Supplier not found.');
        return redirect()->to('inventory/suppliers');
    }

    // Delete the item
    if ($model->delete($item['id'])) {
        session()->setFlashdata('success', 'Supplier successfully deleted.');
    } else {
        session()->setFlashdata('error', 'Failed to delete supplier.');
    }

    return redirect()->to('inventory/suppliers');
}
}
