<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        $message = [
            'name.required'=>'اسم المستخدم مطلوب',
            'name.max'=>'الحد الاقصى لاسم المستخدم هو 255 حرف'

        ];
        $request->validate([
            'name' => ['required', 'max:255'],
            
        ],$message);

        if($request->name == Auth::user()->name && $request->image == null){
            return redirect()->route('admin.profile')->with('error','لم يتم تعديل بيانات الصفحة الشخصية لعدم التغيير فى  البيانات');
        }
        if($request->name != Auth::user()->name && $request->image != null){
            $image = $request->image;
            $newimage = null;
            if($image != null){
                $newimage = time().' - '.$image->getClientOriginalName();
                $image->move('user',$newimage);
            }
            if(Auth::user()->image != null){
                unlink('user/'.Auth::user()->image);
            }
            $row = User::find(Auth::user()->id)->first();
            $row->update([
                'name' => $request->name,
                'image' => $newimage
            ]);
            return redirect()->route('admin.profile')->with('message','تم تعديل البيانات الشخصية بنجاح');
        }
        else if($request->name == Auth::user()->name && $request->image != null){
            $image = $request->image;
            $newimage = null;
            if($image != null){
                $newimage = time().' - '.$image->getClientOriginalName();
                $image->move('user',$newimage);
            }
            if(Auth::user()->image != null){
                unlink('user/'.Auth::user()->image);
            }
            $row = User::find(Auth::user()->id)->first();
            $row->update([
                'image' => $newimage
            ]);
            return redirect()->route('admin.profile')->with('message','تم تعديل البيانات الشخصية بنجاح');
        }
        else if($request->name != Auth::user()->name && $request->image == null){

            $row = User::find(Auth::user()->id)->first();
            $row->update([
                'name' => $request->name,
            ]);
            return redirect()->route('admin.profile')->with('message','تم تعديل البيانات الشخصية بنجاح');
        }
        else{
            return redirect()->route('admin.profile');

        }
        
    }

    public function Password()
    {
        return view('admin.profile.password');
    }

    public function PasswordUpdate(Request $request)
    {
        $message=[
            'password.required'=>'كلمة المرور مطلوبة',
            'password.min'=>'الحد الادنى لكلمة المرور هو 8 أحرف او ارقام',
            'password.confirmed'=>'يجب تطابق كلمتى المرور',

        ];
        $request->validate([
            'password' => ['required', 'min:8', 'confirmed'],
        ],$message);

        $password = Hash::make($request->password);

        if($password == Auth::user()->password){
            return redirect()->route('admin.profile.password')->with('error','لا يمكن استخدام كلمة المرور القديمة');

        }

        $row = User::find(Auth::user()->id)->first();
        $row->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.profile.password')->with('message','تم تعديل كلمة المرور بنجاح');
        
    }
}