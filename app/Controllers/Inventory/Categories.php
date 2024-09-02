<?php

namespace App\Controllers\Inventory;

use App\Controllers\BaseController;
use App\Models\Inventory\InvCategoriesModel;

class Categories extends BaseController
{
    public function index()
    {
        $data['title'] = 'Category Lists';
		 
        $categoryModel = new InvCategoriesModel();
        
        $data['categories'] = $categoryModel->findAll();
        
        return view('inventory/categories/index', $data);
    }

    public function add()
    {
        $data['title'] = 'Add Category';
        helper('form');
        $categoryModel = new InvCategoriesModel();

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'name' => ['label' => 'Category Name', 'rules' => 'required|min_length[3]|is_unique[inv_categories.name]'],
                'description' => ['label' => 'Description', 'rules' => 'permit_empty']
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $categoryData = [
                    'name' => $this->request->getPost('name'),
                    'description' => $this->request->getPost('description')
                ];

                $categoryModel->insert($categoryData);
                session()->setFlashdata('success', 'Category successfully added.');
                return redirect()->to('/inventory/categories');
            }
        }

        return view('inventory/categories/add', $data);
    }

public function edit()
{
    $data['title'] = 'Edit Category';
    helper('form');
    $categoryModel = new InvCategoriesModel();

    if ($this->request->getMethod() === "POST") {
        $rules = [
            'name' => 'required', 
            'description' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $data['category'] = $this->request->getPost(); // Preserve user input
        } else {
            $update_data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description')
            ];

            $result = $categoryModel->update($this->request->getPost('id'), $update_data);

            if ($result) {
                session()->setFlashdata('success', 'Category successfully updated.');  
                return redirect()->to('inventory/categories');
            }
            session()->setFlashdata('error', 'Category failed update.');
        }
    } else {
        $catDetail = $categoryModel->where('MD5(CONCAT(id, "edit"))', $this->request->getGet('id'))->first();

        if (!$catDetail) {                    
            session()->setFlashdata('error', 'Unable to find category.');  
            return redirect()->to('inventory/categories');
        }
        
        $data['category'] = $catDetail;
    }

    return view('inventory/categories/edit', $data);
}


 
public function delete()
{
    $itemModel = new InvCategoriesModel();
    $id = $this->request->getGet('id');

    // Check if the item exists
    $item = $itemModel->where('MD5(CONCAT(id, "delete"))', $id)->first();

    if (!$item) {
        session()->setFlashdata('error', 'Category not found.');
        return redirect()->to('inventory/categories');
    }

    // Delete the item
    if ($itemModel->delete($item['id'])) {
        session()->setFlashdata('success', 'Category to successfully deleted.');
    } else {
        session()->setFlashdata('error', 'Failed to delete category.');
    }

    return redirect()->to('inventory/categories');
}

}
