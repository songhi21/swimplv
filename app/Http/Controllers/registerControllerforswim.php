<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

use Illuminate\Validation\Rule;

class registerControllerforswim extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->type == "Admin"){
                $result = [];
                $User = User::paginate(10);
                foreach($User as $hubs){
                    if($hubs->type == "Admin"){

                    }
                    else{
                        $temphub = [
                            "id" => $hubs->id,
                            "name" => $hubs->name,
                            "email" => $hubs->email,
                            "updated" => $hubs->updated_at->diffForHumans(),
                            "created" => $hubs->created_at->diffForHumans(),
                            "type" => $hubs->type
                        ];
                        $result[] = $temphub;
                    }
                    
                }
                

                return view('account')->with('result', $result)->with("User", $User);

            }
            else{
                return redirect('home');
            }
        }
        

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
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if(Auth::check()){
            if(Auth::user()->type == "Admin"){
                $register = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password'])]);
                $register->save();

            }
            else{
                return redirect('home');
            }
        }
            
    
        
       

        // session()->flash('success', 'You have Successfully Registered'); 
        return  redirect("useraccount")->with('success', 'You have Successfully Registered');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $email = user::find($id);

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255',Rule::unique('users')->ignore($email->name, 'name')],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore($email->email, 'email')],
        ]);

        if($email->name === $request->input('name') && $email->email === $request->input('email')){
            return  back();
        }
        else{
            if(Auth::check()){
                if(Auth::user()->type == "Admin"){
                    $email->name = $request->input('name');
                    $email->email = $request->input('email');
                    $email->save();
                    return  redirect("useraccount")->with('success', 'You have Successfully Updated');
    
                }
                else{
                    return redirect('home');
                }
            }
            
        }
    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id_user = user::find($id);
        if($id_user->type != "Admin"){
            if(Auth::check()){
                if(Auth::user()->type == "Admin"){
                    $id_user->delete();
            return  redirect("useraccount")->with('success', 'You have Successfully Updated');
    
                }
            }
            else{
                return redirect('home');
            }
           
        }
        else{
            return back();
        }
        
    }
    public function changepassword(Request $request)
    {
        $id = $request->input('product_id');
        $users= user::find($id);
        $this->validate($request, [
            "password" => "required|confirmed|min:6|max:200|alpha_num"
        ]);
        $users->password = Hash::make($request->input('password'));
        if(Auth::check()){
            if(Auth::user()->type == "Admin"){
                $users->save();
                return back()->with('success', 'You have Successfully Updated');
            }
            else{
                return redirect('home');
            }
        }

    }
    public function searchuser(Request $request)
    {
        $this->validate($request,[
            "searchinput" => "required|regex:/^[a-zA-Z0-9- -]+$/u|max:255 "
        ] );
        if(Auth::check()){
            if(Auth::user()->type == "Admin"){
                $input = $request->searchinput;
                $User = User::where('name', 'like', '%' .$input.'%', 'OR', 'email', 'like', '%' .$input.'%')->paginate(6);
                $result = [];
                foreach($User as $hubs){
                    if($hubs->type == "Admin"){
        
                    }
                    else{
                        $temphub = [
                            "id" => $hubs->id,
                            "name" => $hubs->name,
                            "email" => $hubs->email,
                            "updated" => $hubs->updated_at->diffForHumans(),
                            "created" => $hubs->created_at->diffForHumans(),
                            "type" => $hubs->type
                        ];
                        $result[] = $temphub;
                    }
                    
                }
        
        
        
        
                return view('account')->with('result', $result)->with("User", $User);


                
            }
            else{
                return redirect('home');
            }
        }

    }
}
