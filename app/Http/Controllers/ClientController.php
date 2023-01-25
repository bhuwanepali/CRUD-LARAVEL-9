<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Education;
use DataTables;

class ClientController extends Controller
{
    public function home()
    {
        return view('home');
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn("action", function($row){
       
                            $btn = "<button type='button' class='view btn btn-success btn-sm' data-id='".$row->id."' data-toggle='tooltip' data-placement='bottom' title='View'><i class='fa-solid fa-eye'></i></button>&nbsp;
                                    <button type='button' class='edit btn btn-warning btn-sm' data-id='".$row->id."' data-toggle='tooltip' data-placement='bottom' title='Edit'><i class='fa-solid fa-pen-to-square'></i></button>&nbsp;
                                    <form method='POST' action='{{route('client.destroy',".$row->id.")}}'>
                                    <button type='button' class='delete btn btn-danger btn-sm' data-id='".$row->id."' data-toggle='tooltip' data-placement='bottom' title='Delete'><i class='fa-solid fa-trash'></i></button>
                                    </form>";
      
                            return $btn;
                    })
                    ->rawColumns(["action"])
                    ->make(true);
        }
          
        return view('home');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'string|required|max:50',
            'email'=>'string|nullable',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'education' => 'required'
        ]);

        $input = $request->all();
        $input['education'] = json_encode($request->education);
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $status = Client::forceCreate($input);
        return redirect()->route('home')->with('success','Client created successfully.');
    }

    public function update(Request $request)
    {
        $id = request('id');
        $client = Client::findOrFail($id);

        $this->validate($request,[
            'name'=>'string|required|max:50',
            'email'=>'string|nullable',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'education' => 'required'
        ]);
        
        $input = $request->all();
        $input['education'] = json_encode($request->education);
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        else
        {
            unset($input['image']);
        }
        $status = $client->fill($input)->update();
        return redirect()->route('home')->with('success','Client updated successfully.');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $status = $client->delete();
        if($status){
            request()->session()->flash('success','Client successfully deleted');
        }
        else{
            request()->session()->flash('error','Error occurred while deleting client');
        } 

        return redirect()->route('home')->with('success','Client deleted successfully');
    }

    public function edit($id)
    {
        $clients = Client::findOrFail($id);
        return response()->json(['status' => 200, 'message' => 'Data Available', 'clients' => $clients]);
    }

    public function view($id)
    {
        $clients = Client::findOrFail($id);
        return response()->json(['status' => 200, 'message' => 'Data Available', 'clients' => $clients]);
    }

    public function get_education(Request $request)
    {
        $education = [];
        if ($search = $request->name) {
            $education = Education::where('title','LIKE',"%$search%")->get();
        }
        return response()->json($education);
    }
}
