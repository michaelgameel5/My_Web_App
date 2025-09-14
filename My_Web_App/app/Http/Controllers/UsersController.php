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


    public function login(Request $request) {
    return view('users.login');
    }

    public function doLogin(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->route('welcome');
        }

        // Authentication failed
        return redirect()->back()->withInput($request->input())->withErrors('Invalid login information.');
    }

    public function doLogout(Request $request) {

        Auth::logout();

    return redirect('/');
    }

    public function profile(Request $request, $id = null) {
        // If ID is provided, find that user, otherwise use authenticated user
        if ($id) {
            $user = User::find($id);
        } else {
            $user = Auth::user();
        }
        
        if (!$user) {
            return redirect('/login');
        }
        
        return view('users.profile', ['user' => $user]);
    }
    
    public function welcome() {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }
        

        return view('welcome', ['user' => $user]);
    
    }
}