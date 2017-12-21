<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(25);

        $i = 1;
        return view('admin.user.index', compact('users','i'));
    }

    public function getNormalUsersIndex()
    {
        $normalUsers = User::where('role', 'user')
                            ->paginate(25);

        $i = 1;
        return view('admin.user.normalUsers', compact('i','normalUsers'));
    }

    public function getAdminIndex()
    {
        $admins = User::where('role', 'super_admin')
                        ->orWhere('role', 'admin')
                        ->paginate(25);

        $i = 1;
        return view('admin.user.admins', compact('i','admins'));
    }

    public function create()
    {

        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required' ,
            'subscriber' => 'required',
            'name' => 'required',
            'gender' => 'required',
        ]);

        User::create([
            'name' => ucfirst($request->get('name')),
            'email' => $request->get('email'),
            'password' => bcrypt( $request->get('password') ),
            'role' => $request->get('role'),
            'subscriber' => $request->get('subscriber'),
            'gender' => ucfirst($request->get('gender')),
        ]);

        return redirect()->back()->with('success', 'Category has been added successfully');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }


    public function update(UserRequest $request, $id)
    {
            $users = User::findOrFail($id);
            $image = $request->image;

            if ($image) {
                $imageName = $users->name . '-' . $image->getClientOriginalName() ;
                $imageFile = $image->move('user_img' , $imageName);

            }else if (!$image){
                $imageFile = $users->image;
            }
            
            if ($users) {
            
                $users->update([
                    'name' => $request->input('name'),
                    'birthDate' => $request->input('birthDate'),
                    'gender' => $request->input('gender'),
                    'address' => $request->input('address'),
                    'phone' => $request->input('phone'),
                    'email' => $request->get('email'),
                    'image' => $imageFile
                ]);

                return redirect()->route('user.show',$users->id)->with('success', 'Information has been Updated successfully');
            }
            return redirect()->route('user.show',$users->id)->with('errors', 'Something went wrong');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)
                        ->delete();

        return redirect()->back()->with('success', 'User has been deleted successfully');
    }

    public function getPassword($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.changePassword', compact('user'));
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request,[
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user->update([
            'password' => bcrypt( $request->get('password') ),
        ]);

        return redirect()->route('user.edit',$user->id)
                    ->with('success', 'Password has been Changed successfully. ');
    }

    /******************* Normal User Methods ***************/

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }


    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function updateUser(UserRequest $request, $id)
    {
            $users = User::findOrFail($id);
            $image = $request->image;

            if ($image) {
                $imageName = $users->name . '-' . $image->getClientOriginalName() ;
                $imageFile = $image->move('user_img' , $imageName);

            }else if (!$image){
                $imageFile = $users->image;
            }
            
            if ($users) {
            
                $users->update([
                    'name' => $request->input('name'),
                    'birthDate' => $request->input('birthDate'),
                    'gender' => $request->input('gender'),
                    'address' => $request->input('address'),
                    'phone' => $request->input('phone'),
                    'email' => $request->get('email'),
                    'image' => $imageFile
                ]);

                return redirect()->route('show.profile',$users->id)->with('success', 'Information has been Updated successfully');
            }
            return redirect()->route('show.profile',$users->id)->with('errors', 'Something went wrong');
    }

    public function getUserPassword($id)
    {
        $user = User::findOrFail($id);
        return view('user.changePassword', compact('user'));
    }

    public function changeUserPassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request,[
            'password' => 'required|string|min:6|confirmed',
            'old_password' => 'required|string|min:6',
        ]);


        if(Hash::check($request['old_password'], $user->password)){
            
            $user->update([
                    'password' => bcrypt( $request->get('password') ),
            ]);

            return redirect()->route('show.profile',$user->id)
                                ->with('success', 'Password has been Changed successfully.');
        }else{

            return redirect()->route('user.getUserPassword',$user->id)
                                ->with('success','It seems that your old password doesnt match our records, please try again.');

        }   
        
    }

    public function verify($token){

        User::where('token', $token)->firstOrFail()
                    ->update(['token' => null]);

        return redirect()
                ->route('home')
                ->with('success', 'Your account has been Verified');
    }


}
