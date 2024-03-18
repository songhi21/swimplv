<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userchangepassword extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("userchnagepassword");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("userchnagepassword");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $users= user::find($id);
        $this->validate($request, [
            "password" => "required|confirmed|min:6|max:200|alpha_num",
            "old_password" => "required|current_password"
        ]);

        $users->password = Hash::make($request->input('password'));
        if(Auth::check()){
            if(Auth::user()->type == "Admin"){
                if(Auth::user()->id == $id){
                    $users->save();
                    return back()->with('success', 'You have Successfully Updated');
                }
                else{
                    return redirect('home');
                }
            }
            elseif(Auth::user()->type == "guest"){
                if(Auth::user()->id == $id){
                    $users->save();
                    return back()->with('success', 'You have Successfully Updated');
                }
                else{
                    return redirect('home');
                }
            }
            else{
                return redirect('home');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
