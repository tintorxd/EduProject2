<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class LoginController extends Controller
{
    public function index()
    {
        return view("LoginForm");
    }
    public function authenticationDocente()
    {

        if (auth("docenteadmin")->attempt(request(['email', 'password']))) {

            // echo "exitoso";
            return redirect()->route('docente.mainpage');
        } else {

            return redirect()->route('docente.login')->with(['error' => true]);;
        }
    }
    public function authenticationAdmin()
    {

        if (auth("webadmin")->attempt(request(['email', 'password']))) {

            return redirect()->to('adminweb');
        } else {

            return redirect()->route('Admin.page')->with(['error' => true]);;
        }
    }
    public function authenticationUser()
    {

        if (auth("students")->attempt(request(['email', 'password']))) {

            return back();
        } else {
            echo "Fallo la coneccion";
        }
    }

    public function destroy()
    {


        auth("students")->logout();
        return redirect()->to('/');
    }
    public function destroyAdmin()
    {


        auth('webadmin')->logout();
        return redirect()->to('/adminweb');
    }
    public function destroyDocente()
    {


        auth('docenteadmin')->logout();
        return redirect()->to('/docente/login');
    }
}
