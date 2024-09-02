<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if user is not logged in
        if (!session()->get('isLoggedIn')) {
            // Redirect to login page
            return redirect()->to('/user/login')->with('error', 'You must be logged in to access this page.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing after the request
    }
}


//Create AuthCheck 
//Register this to Config/Filter aliases
			//	 public array $aliases = [
						// 'auth'    		=> \App\Filters\AuthCheck::class,
//add to routes ['filter' => 'auth'] for pages that needs if authentication						
						