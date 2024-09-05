<?php

namespace App\Controllers;
 
class User extends BaseController
{
    public function index()
    {
		 $data['title'] = 'User Lists';
        $UserModel=new \App\Models\UserModel();
        
        $data['UserData']=$UserModel->findAll();
        
                // return view('welcome_message');
                return view('user/index', $data);
    }

    public function login()
{
	  $data['title'] = 'Login';
    helper('form');
    $UserModel = new \App\Models\UserModel();

    if ($this->request->getMethod() === 'POST') {
        // rules
        $rules = [
            'Username' => ['label' => "Username", 'rules' => 'required'],
            'Password' => ['label' => "Password", 'rules' => 'required']
        ];

        // validate
        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
        } else {
            // set the value
            $username = $this->request->getPost('Username');
            $password = $this->request->getPost('Password');

            // get the uname
            $user = $UserModel->where('Username', $username)->first();

            // use object property access
            if ($user && password_verify($password, $user->Password)) {
                // Set session 
                $sessionData = [
                    'UserID' => $user->UserID,
                    'Username' => $user->Username,
                    'isLoggedIn' => true
                ];
                session()->set($sessionData);
				//flash notif for success and redirect to user
                // session()->setFlashdata('success', 'Login successful.');
                return redirect()->to('dashboard');
            } else {
				//else error in login flash msg
                session()->setFlashdata('error', 'Invalid username or password.');
            }
        }
    }

    return view('user/login', $data);
}

    
   public function logout()
    {
        session()->destroy();  // Destroy the session
        return redirect()->to('/user/login')->with('success', 'You have been logged out.');
    } 
    

    public function add()
    {
		$data['title'] = 'Add User';
        helper('form');
        $UserModel=new \App\Models\UserModel();
      

        if($this->request->getMethod() === "POST")
        {
             
            
            $rules = [
                'LastName'=>['label'=>"Last Name", 'rules'=>'required'],
                'FirstName'=>['label'=>"First Name", 'rules'=>'required'],
                'MiddleName'=>'permit_empty',
                'Username'=>['label'=>"Username", 'rules'=>'required|is_unique[user_tbl.Username]',
                                'errors'=> [
                                    'is_unique' => "The Username already exist."
                                ]
                        ],
                'Password'=>'required',
                'ConfirmPassword'=>['label'=>"Confirm Password", 'rules'=>'matches[Password]'],
            ];  
            
            if (!$this->validate($rules)){
                $data['validation'] = $this->validator;
            } else {
                $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
                $_POST['Password']=$password;

				$result= $UserModel->insert($_POST);

                if($result)
                {
                      session()->setFlashdata('success', 'User successfully added.');  
                     return redirect()->to('user') ;
                }
                session()->setFlashdata('error', 'User failed add.');  
			}
        
        }     
          // $data['UserData']=$UserModel->findAll();
                return view('user/add');
    }



    public function edit()
    {
		 $data['title'] = 'Edit User';
        helper('form');
        $UserModel=new \App\Models\UserModel();
      
        $data = [];
        if($this->request->getMethod() === "POST")
        {
       
            $rules = [
                'UserID'=>'required', 
                'LastName'=>['label'=>"Last Name", 'rules'=>'required'],
                'FirstName'=>['label'=>"First Name", 'rules'=>'required'],
                'MiddleName'=>'permit_empty',
                'Username'=>['label'=>"Username", 'rules'=>'required|is_unique[user_tbl.Username, UserID, {UserID}]',
                                'errors'=> [
                                    'is_unique' => "The Username already exist."
                                ]
                        ],
               
                'Password'=>'permit_empty',
                  'ConfirmPassword'=>['label'=>"Confirm Password", 'rules'=>'matches[Password]'],  
            ];  

            if (!$this->validate($rules)){
                $data['validation'] = $this->validator;
            } else {
                if($_POST['Password'])
                {
                    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
                    $update_data['Password']=$password;
                }
                   
                $update_data['LastName'] = $_POST['LastName'] ;
                $update_data['FirstName'] =  $_POST['FirstName'] ;
                $update_data['MiddleName'] = $_POST['MiddleName'];
                $update_data['Username'] = $_POST['Username'];

				$result= $UserModel->update($_POST['UserID'], $update_data);

                if($result)
                {
                      session()->setFlashdata('success', 'User successfully updated.');  
                     return redirect()->to('user') ;
                }
                session()->setFlashdata('error', 'User failed update.');  
			}
        
        }     
           $UserDetails=$UserModel
                                ->where('MD5(CONCAT(UserID, "edit"))', $_GET['id'])
                                ->first();

            if(!$UserDetails)                    
            {
                session()->setFlashdata('error', 'Unable to find user.');  
                return redirect()->to('user') ;
            }
            $_POST['UserID'] = $UserDetails->UserID;
            $_POST['LastName'] = $UserDetails->LastName;
            $_POST['FirstName'] = $UserDetails->FirstName;
            $_POST['MiddleName'] = $UserDetails->MiddleName;
            $_POST['Username'] = $UserDetails->Username;

                return view('user/edit',$data);
    }




    public function delete()
    {
		 $data['title'] = 'Delete User';
        helper('form');
        $UserModel=new \App\Models\UserModel();
      
        $data = [];
        if($this->request->getMethod() === "POST")
        {
       
            $rules = [
                'UserID'=>'required', 
            ];  

            if (!$this->validate($rules)){
                $data['validation'] = $this->validator;
            } else {
                

				$result= $UserModel->delete($_POST['UserID']);

                if($result)
                {
                      session()->setFlashdata('success', 'User successfully deleted.');  
                     return redirect()->to('user') ;
                }
                session()->setFlashdata('error', 'User failed to delete.');  
			}
        
        }     
        $UserDetails=$UserModel
            ->where('MD5(CONCAT(UserID, "delete"))', $_GET['id'])
             ->first();

            if(!$UserDetails)                    
            {
            session()->setFlashdata('error', 'Unable to find user.');  
            return redirect()->to('user') ;
            }

            $_POST['UserID'] = $UserDetails->UserID;
            $_POST['LastName'] = $UserDetails->LastName;
            $_POST['FirstName'] = $UserDetails->FirstName;
            $_POST['MiddleName'] = $UserDetails->MiddleName;
            $_POST['Username'] = $UserDetails->Username;

                return view('user/delete',$data);
    }

}
