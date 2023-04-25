<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class LoginController extends Controller
{
    public function index(){
        return view("LoginForm");
    }
    public function authenticationAdmin(){
      
        if(auth("webadmin")->attempt(request(['email','password']))){
      
            return redirect()->to('adminweb');
        }else{

            return redirect()->route('Admin.page')->with(['error' => true]);;
        }
        
       
       
        
    }
    public function authenticationUser(){
        
        if(auth()->attempt(request(['email','password']))){
          
            return redirect()->to('/');
        }else{
echo"FAllo la coneccion";
        }

        
       
       
        
    }

    public function destroy(){

        
        auth()->logout();
        return redirect()->to('/');
    }
    public function destroyAdmin(){

        
        auth('webadmin')->logout();
        return redirect()->to('/adminweb');
    }
}
