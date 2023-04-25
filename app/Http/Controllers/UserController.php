<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Administradores;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index(){
    return view("RegisterForm");
   }
   public function create(){
    
    $user =  User::create(request(['names', 'lastnames', 'email', 'password', 'phone_number', 'birthdate']));
    auth()->login($user);
    return redirect()->to('/');


   }
   public function createAdmin(){
    
    $user =  Administradores::create(request(['names', 'lastnames', 'email', 'password', 'phone_number']));
    auth("webadmin")->login($user);
    return redirect()->to('/');


   }
}
