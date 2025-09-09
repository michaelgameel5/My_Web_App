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

        $user = User::where('email', $request->email)->first();

        if(!$user)
            return redirect()->back()->withInput($request->input())->withErrors('No email found.');


        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect()->back()->withInput($request->input())->withErrors('Invalid login information.');
        Auth::setUser($user);
    
        return redirect('/profile');
    }

    public function doLogout(Request $request) {

        Auth::logout();

    return redirect('/');
    }

    public function profile(Request $request) {
        $user = Auth::user();
        
        if (!$user) {
            return redirect('/login');
        }
        
        return view('users.profile', ['user' => $user]);
    }
}

