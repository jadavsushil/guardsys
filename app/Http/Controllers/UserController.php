<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::latest()->paginate(5);

        return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

   
    public function create()
    {
        return view('create');
    }

    
    public function store(Request $request)
    {
       
        $request->validate([
            'name'          =>  'required',
            'phone'          =>  'required',
            'email'         =>  'required|email|unique:users',
            'photo'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'	
        ]);

        $file_name = time() . '.' . request()->photo->getClientOriginalExtension();

        request()->photo->move(public_path('images'), $file_name);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->photo = $file_name;

        $user->save();
        return redirect()->route('users.index')->with('success', 'User Added successfully.');
    }

  
    public function show(User $user)
    {
        return view('show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('edit', compact('user'));
    }

    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'      =>  'required',
            'phone'      =>  'required',
            'email'     =>  'required|email',
            'image'     =>  'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images'), $file_name);
        }else{
            $file_name  = $request->hidden_user_image;
        }
       
        $user = User::find($request->hidden_id);

        $user->name = $request->name;

        $user->email = $request->email;

        $user->phone = $request->phone;

        $user->photo = $file_name;

        $user->save();

        return redirect()->route('users.index')->with('success', 'User Data has been updated successfully');
    }

   
    public function destroy()
    {
        //$user->delete();

        //return redirect()->route('users.index')->with('success', 'User Data deleted successfully');
    }

    public function delete(Request $request){
        
        $user = User::find($request->id)->delete();
        if ($user) {
            return response()->json(['success'=>'User deleted successfully']);            
        } else {
            return response()->json(['success'=>'User deletion failed!']);
        }
    }

    public function adduserapi(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'phone'          =>  'required',
            'email'         =>  'required|email|unique:users',
            'photo'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'	
        ]);

        $file_name = time() . '.' . request()->photo->getClientOriginalExtension();

        request()->photo->move(public_path('images'), $file_name);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->photo = $file_name;

        $user->save();
        return response()->json(['success'=> 'User Added successfully.']);
    }

    public function updateuserapi(Request $request)
    {
        $request->validate([
            'name'      =>  'required',
            'phone'      =>  'required',
            'email'     =>  'required|email',
            'image'     =>  'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images'), $file_name);
        }else{
            $file_name  = $request->hidden_user_image;
        }
       
        $user = User::find($request->hidden_id);

        $user->name = $request->name;

        $user->email = $request->email;

        $user->phone = $request->phone;

        $user->photo = $file_name;

        $user->save();
        return response()->json(['success'=> 'User update successfully.']);
    }
}
