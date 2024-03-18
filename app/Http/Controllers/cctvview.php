<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cctvviews;

use Illuminate\Support\Facades\Auth;



class cctvview extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = [];
        $cctvview = cctvviews::paginate(6);
        foreach($cctvview as $hubs){
            $temphub = [
                "id" => $hubs->id,
                "name" => $hubs->name,
                "updated" => $hubs->updated_at->diffForHumans(),
                "created" => $hubs->created_at->diffForHumans(),
                "links" => $hubs->link
            ];
            $result[] = $temphub;
        }
        

        return view('cctvview')->with('result', $result)->with("cctvview", $cctvview);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cctvview');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $this->validate($request,[
        //     'name' => 'required|regex:/^[a-zA-Z0-9- -]+$/u|max:255',
        //     'link' => 'required|max:255'
        // ]);
        if(Auth::check()){
            if(Auth::user()->type == "Admin"){
                $cctvview = new cctvviews;
                $cctvview->name = $request->name;
                $cctvview->link = $request->link;
                $cctvview->save();
        
                return back()->with('success','Submitted successfully');
            }
            else{
                return redirect("home");
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
        //
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

        if(Auth::check()){
            if(Auth::user()->type == "Admin"){
                $hub = cctvviews::find($id);
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
        if(Auth::check()){
            if(Auth::user()->type == "Admin"){
                $wls = cctvviews::find($id);
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
        $hub = cctvviews::where('name', 'like', '%' .$input.'%')->paginate(6);
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
        return view('cctvview')->with('result', $result)->with("cctvview", $hub);
    }
}
