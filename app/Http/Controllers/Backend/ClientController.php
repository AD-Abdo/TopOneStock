<?php

namespace App\Http\Controllers\Backend;

use App\CustomerSuperVisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;


class ClientController extends Controller
{
    
    public function index(){
        $rows = CustomerSuperVisor::paginate(5);
        return view('admin.client.index',compact(['rows']));
    }
    public function show($id){
        $data = CustomerSuperVisor::find($id);
        $row = User::find($data->Customer->id);
        $supervisor_data = User::find($data->Supervisor->id);
        $supervisor = $supervisor_data->name;
        return view('admin.client.show',compact(['row','supervisor']));
    }

    public function create()
    {
        return view('admin.client.create');
    }

    public function message()
    {
        $message = [
            'name.required'=>'اسم المستخدم مطلوب',
            'name.max'=>'الحد الاقصى لاسم المستخدم هو 255 حرف',

            'email.required'=>'البريد الالكتروني مطلوب',
            'email.string'=>'البريد الالكتروني يجب ان يحتوي على نص فقط',
            'email.email'=>'يجب ادخال بريد الكتروني صحيح',
            'email.max'=>'الحد الاقصى للبريد الالكتروني هو 255 حرف',
            'email.unique'=>'البريد الالكتروني مسخدم من قبل',

            'password.required'=>'كلمة المرور مطلوبة',
            'password.min'=>'الحد الادنى لكلمة المرور هو 8 أحرف او ارقام',
            'password.confirmed'=>'يجب تطابق كلمتى المرور',

            'phone.required'=>'يجب ادخال رقم الهاتف',
            'phone.numeric'=>'رقم الهاتف يجب ان يحتوي على ارقام فقط',

            'country.required'=>'يجب اختيار الدولة',
            'comment.required' => 'يجب ادخال التعليق'
        ];
        return $message;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone'=>['required','numeric'],
        ],$this->message());
        $value = $request->phone.rand(10,1000000000000);
        $password = $value;
        $email = $value.'_client@topone-stock.com';

        $user = new User();
        $user->name = $request->name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->phone= $request->phone;
        $user->status = 0;
        $user->role= 0;
        $user->customer_supervisor = 1;
        if($request->comment != null){
            $user->comment = $request->comment;
        }else{
            $user->comment = 'تم اضافة العميل بواسطة '.Auth::user()->name;
        }
        

        if($user->save()){
            $row = User::query()->where('email',$email)->first();
            CustomerSuperVisor::create([
                'user_id' => $row->id,
                'supervisor_id'=> Auth::user()->id
            ]);
        }
        return redirect()->route('admin.client.index')->with('message','تم اضافة العميل بنجاح');
    }

    public function edit($id)
    {
        $row = User::find($id);
        return view('admin.client.edit',compact('row'));
    }


    public function update($id,Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone'=>['required','numeric'],
            'comment' => ['required']
        ],$this->message());

        $user = User::find($id);

        
        $error = 3;
        
        $user->name == $request->name ? $error = $error-1 : $user->name = $request->name ;
        $user->phone == $request->phone ? $error = $error-1 : $user->phone = $request->phone ;
        $user->comment == $request->comment ? $error = $error-1 : $user->comment = $request->comment ;
        
        
        
        if( $error > 0){
            $user->update();
            return redirect()->route('admin.client.edit',$user->id)->with('message','تم تعديل بيانات العميل بنجاح');
        }else{
            return redirect()->route('admin.client.edit',$user->id)->with('error','لم بتم تعديل بيانات العميل لعدم التغيير في البيانات');
        }
        
    }

    public function destroy($id)
    {
        $row = CustomerSuperVisor::find($id);
        $client = User::find($row->Customer->id);
        $row->delete();
        if($client->delete()){
            if($row->image != null){
                unlink('user/'.$client->image);
            }
        }
        return redirect()->route('admin.client.index')->with('message','تم حذف العميل بنجاح');
    }

    public function ClientUpdate($id)
    {
        $row = User::query()->where('id',$id)->first();
       
        
        if($row->status == 0){
            $row->status = 1;
            $row->agree_date = '20'.date('y-m-d');
            $row->update();
            return redirect()->route('admin.client.index')->with('message','تم تفعيل العميل '.$row->name.' بنجاح');
        }else{
            $row->status = 0;
            $row->agree_date = null;
            $row->update();
            return redirect()->route('admin.client.index')->with('error','تم الغاء تفعيل العميل '.$row->name.' بنجاح');
        }
        
    }
    public function CustomePaginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function ClientFilter(Request $request)
    {
        if($request->name != null){
            $users = User::query()->where('role',0)->where('customer_supervisor',1)->where('name', 'like', '%'. $request->name.'%')->get()->all();
            $data = [];
            foreach ($users as $user) {
                $id = $user->id;
                $user_data = CustomerSuperVisor::query()->where('user_id',$id)->first();
                array_push($data, $user_data);
            }
            $rows = $this->CustomePaginate($data);
            return view('admin.client.index',compact(['rows']));
        }
        else {
            return redirect()->route('admin.client.index');
        }
        
    }
}