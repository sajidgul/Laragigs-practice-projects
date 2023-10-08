<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
           'name'=>'required',
           'email'=>'required',
           'password'=>['required', 'confirmed']
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        
        auth()->login($user);
        return redirect(route('index'))->with('success', 'User Created and logged in Successfully');
    }

    public function logout(Request $request){
        auth()->logout();

        // $request->session->invalidate();
        // $request->session->regenerateToken();

        return redirect(route('index'))->with('success', 'You have been logged out');
    }

    public function login(){
        return view('auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $formFields = $request->validate([
            'email'=>'required',
            'password'=>'required'
         ]);

         if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect(route('index'))->with('success', 'You are now logged in');

         }else{
            return back()->withErrors(['email'=>'Invalid credentials'])->onlyInput('email');
         }
    }
}
