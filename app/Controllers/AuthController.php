<?php

namespace App\Controllers;

 use App\Controllers\BaseController;
use App\Models\Inventory\InvCategoriesModel;
use App\Models\Inventory\TransactionsModel;
use App\Models\Inventory\InvItemsModel;
use App\Models\Inventory\ItemAssignmentsModel;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function dashboard()
    {
		$data['title']='Dashboard'; //for dynamic title
		
		
		$model = new InvCategoriesModel();
        $data['categories'] = $model->getCategoryItemCounts();
		
		$userModel = new UserModel();
            // Get user count
        $data['countUser'] = $userModel->countAllUsers();
		
		$transactionModel = new TransactionsModel();
            
        $data['countTransaction'] = $transactionModel->countAllTransaction();
		 
		
		$itemAssignment=new ItemAssignmentsModel();
		$data['assignmentStatus']=$itemAssignment->countAssignmentStatus();	
		
		$itemModel=new InvItemsModel();
		$data['getItemTotals'] = $itemModel->getItemTotals();
		$data['categoryTotals'] = $itemModel->getCategoryTotals();
		 // dd($data['getItemTotals']);
		 // dd($data['assignmentStatus']);
        return view('dashboard',$data);
    }

    }
