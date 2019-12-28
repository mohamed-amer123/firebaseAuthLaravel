<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class UserController extends Controller
{

  public function login()
  {
    return view('/login');
  }
  public function register()
  {
    return view('/register');
  }
	
    public function addUser(Request $request)
    {
    	$serviceAccount = ServiceAccount::fromJsonFile( __DIR__.'/firebase.json');
    	$firebase = (new Factory)
				    ->withServiceAccount($serviceAccount)
                    ->withDatabaseUri('https://api-task-3774a.firebaseio.com/')
				    ->create();
        $database = $firebase->getDatabase();

        if (isset($request)) {
               $email = $request->input('email');
               $password = $request->input('password');
               $auth = $firebase->getAuth();
               $user = $auth->createUserWithEmailAndPassword($email,$password);

                return redirect('/welcome');

            
        }

     }

    public function confirmUser(Request $request)
    {
        $serviceAccount = ServiceAccount::fromJsonFile( __DIR__.'/firebase.json');
        $firebase = (new Factory)
                    ->withServiceAccount($serviceAccount)
                    ->withDatabaseUri('https://api-task-3774a.firebaseio.com/')
                    ->create();
        $database = $firebase->getDatabase();
         if (isset($request)) {
               $email = $request->input('email');
               $password = $request->input('password');
               $auth = $firebase->getAuth();
               try {
                  $user = $auth->verifyPassword($email, $password);
                  session_start();
                  $_SESSION['user'] = $user;
                  return redirect('/welcome');
                } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
                    $message = $e->getMessage();
                    return redirect('login');
                } catch (\Kreait\Firebase\Exception\InvalidArgumentException $e) {
                    $message = $e->getMessage();
                    return redirect('login');

                }
              
        }	
    }


}
