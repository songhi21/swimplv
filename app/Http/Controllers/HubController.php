<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;


use App\Models\hub;

use Illuminate\Support\Facades\Auth;



use Validator;



class HubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = [];
        $hub = hub::paginate(6);
        foreach($hub as $hubs){
            $temphub = [
                "id" => $hubs->id,
                "name" => $hubs->name,
                "updated" => $hubs->updated_at->diffForHumans(),
                "created" => $hubs->created_at->diffForHumans(),
                "links" => $hubs->link
            ];
            $result[] = $temphub;
        }
        

        return view('hub')->with('result', $result)->with("hub", $hub);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('hub');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name' => 'required|regex:/^[a-zA-Z0-9- -]+$/u|max:255',
            'link' => 'required|max:255'
        ]);

        if(Auth::check()){
            if(Auth::user()->type == "Admin"){
                $hub = new hub;
                $hub->name = $request->name;
                $hub->link = $request->link;
                $hub->save();
        
                return back()->with('success','Submitted successfully');
            }
            else{
                return "home";
            }
        }
       

        
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
        return view('hub');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->namehubedit;
        $link = $request->linkhubedit;
         $this->validate($request,[
            "name" => 'required|regex:/^[a-zA-Z0-9- -]+$/u|max:255',
            "link"  => 'bail|required|max:255'
        ]);
        $hub = hub::find($id);
        if(Auth::check()){
            if(Auth::user()->type == "Admin"){
                $hub->name = $request->name;
                $hub->link = $request->link;
                $hub->save();

                return back()->with("success", 'Submitted successfully' ); 
            }
            else{
                return redirect("home");
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $request->validate([

        //     'name'=>'required|unique:form_types,name,'.$id.',id,deleted_at,NULL',
    
        // ]);
        if(Auth::check()){
            if(Auth::user()->type == "Admin"){
                $wls = hub::find($id);
                $wls->delete();
                return redirect()->back()->withErrors(['msg' => 'You deleted succesfully']);
            }
            else{
                return redirect("home");
            }
        }

    }
    public function searching(Request $request){
        $this->validate($request,[
            "searchinput" => "required|regex:/^[a-zA-Z0-9- -]+$/u|max:255 "
        ] );
        $input = $request->searchinput;
        $hub = hub::where('name', 'like', '%' .$input.'%')->paginate(6);
        $result = [];
        foreach($hub as $hubs){
            $temphub = [
                "id" => $hubs->id,
                "name" => $hubs->name,
                "updated" => $hubs->updated_at->diffForHumans(),
                "created" => $hubs->created_at->diffForHumans(),
                "links" => $hubs->link
            ];
            $result[] = $temphub;
        }
        return view('hub')->with('result', $result)->with("hub", $hub);
    }
}
