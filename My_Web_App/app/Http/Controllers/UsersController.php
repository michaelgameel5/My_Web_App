<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{


    public function register(Request $request) {
        return view('users.register');
        }

    public function doRegister(Request $request) {


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);  
        $user->save();

        return redirect("/");
    }

}

