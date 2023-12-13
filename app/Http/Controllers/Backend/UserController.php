<?php

namespace App\Http\Controllers\Backend;

use App\CustomerSuperVisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends BackendController
{
    public function __construct(User $model){
        parent::__construct($model);
    }
    
    protected function message(){
        return $message = [
            'name.required'=> 'اسم المستخدم مطلوب',
            'name.min' => 'يجب ان يحتوى اسم المستخدم على 3 أحرف على الاقل',
            'name.string' => 'أسم المستخدم يجب أن يحتوي على أحرف فقط',
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'يجب ادخال بريد الكتروني صحيح',
            'email.unique' => 'البريد اللالكتروني مسجل مسبقا',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'يجب ان تحتوي كلمة المرور على اكثر من 8 أحرف او ارقام',
            'password.confirmed' => 'يجب تطابق كلمتى المرور',
            'role.required' => 'يجب اختيار رتبة المستخدم'

        ];
    }
    public function index(){
        $rows = User::query()->where('role',2)->paginate(5);
        return view('admin.user.index',compact('rows'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required'
        ],$this->message());

        $image = $request->image;
        $newimage = null;
        if($image != null){
            $newimage = time().' - '.$image->getClientOriginalName();
            $image->move('user',$newimage);
        }

        $row = new User();
        $row->name = $request->name;
        $row->email = $request->email;
        $row->password = Hash::make($request->password);
        $row->role = $request->role;
        $row->image = $newimage;
        $row->save();

        return redirect()->route('admin.user.index')->with('message','تم اضافة المستخدم بنجاح');
        

    }

    public function destroy($id){
        $row = User::findOrFail($id);
        if($row->delete()){
            if($row->image != null){
                unlink('user/'.$row->image);
            }

        }
        return redirect()->route('admin.user.index')->with('message','تم حذف المستخدم بنجاح');
    }

    public function Filter(Request $request)
    {
        $name= $request->name;
        $email = $request->email;
        if($name != null && $email != null){
            $rows = User::query()->where('role',2)->where('name',$name)->where('email',$email)->paginate(5);
            return view('admin.user.index',compact(['rows','name','email']));
        }
        else if($name != null && $email == null){
            $rows = User::query()->where('role',2)->where('name',$name)->paginate(5);
            return view('admin.user.index',compact(['rows','name','email']));
        }
        else if($name == null && $email != null){
            $rows = User::query()->where('role',2)->where('email',$email)->paginate(5);
            return view('admin.user.index',compact(['rows','name','email']));
        }
        
        return redirect()->route('admin.user.index');

        
    }

    public function Customer(){
        $rows = User::query()->where('role',0)->where('customer_supervisor',0)->paginate(5);
        return view('admin.user.customer',compact('rows'));
    }

    public function CustomerDelete($id)
    {
        $user = User::find($id);
        if($user->delete()){
            if($user->image != null ){
                unlink('user/'.$user->image);
            }
        }
        return redirect()->route('admin.customer')->with('message','تم حذف العميل بنجاح');
    }

    public function CustomerFilter(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $country = null;
        $status = null;
        
        if($name != null && $email != null && $request->has('country') && $request->has('status')){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('name',$name)->where('email',$email)->where('country',$country)->where('status',$status)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }
        //three factory
        else if($name != null && $email != null && $request->has('status')){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('name',$name)->where('email',$email)->where('status',$status)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }
        else if($name != null && $email != null && $request->has('country') ){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('name',$name)->where('email',$email)->where('country',$country)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }
        else if($name != null  && $request->has('country') && $request->has('status')){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('name',$name)->where('country',$country)->where('status',$status)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }
        else if( $email != null && $request->has('country') && $request->has('status')){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('email',$email)->where('country',$country)->where('status',$status)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }
        //Two Factory
        else if($name != null && $email != null){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('name',$name)->where('email',$email)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }
        else if($name != null && $request->has('country') ){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('name',$name)->where('country',$country)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }
        else if($name != null && $request->has('status')){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('name',$name)->where('status',$status)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }
        else if($email != null && $request->has('country') ){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('email',$email)->where('country',$country)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }
        else if($email != null && $request->has('status')){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('email',$email)->where('status',$status)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }
        else if( $request->has('country') && $request->has('status')){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('country',$country)->where('status',$status)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }
        //one factory
        else if($name != null ){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('name',$name)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }

        else if($email != null ){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('email',$email)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }

        else if($request->has('country') ){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('country',$country)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }
        else if($request->has('status')){
            $country = $request->country;
            $status = $request->status;
            $rows = User::query()->where('role',0)->where('customer_supervisor',0)->where('status',$status)->paginate(5);
            return view('admin.user.customer',compact(['rows','name','email','country','status']));
        }

        $rows = User::query()->where('role',0)->where('customer_supervisor',0)->paginate(5);
        return view('admin.user.customer',compact(['rows','name','email','country','status']));
    }

    public function CustomerUpdate($id)
    {
        $row = User::query()->where('id',$id)->first();
        
        if($row->status == 0){
            $row->status = 1;
            $row->agree_date = '20'.date('y-m-d');
            $row->update();
            return redirect()->route('admin.customer')->with('message','تم تفعيل العميل '.$row->name.' بنجاح');
        }else{
            $row->status = 0;
            $row->agree_date = null;
            $row->update();
            return redirect()->route('admin.customer')->with('error','تم الغاء تفعيل العميل '.$row->name.' بنجاح');
        }
    }

    public function CustomerShow($id)
    {
        $row = User::find($id);
        return view('admin.user.customer_show',compact('row'));
    }

    public function Comment($id)
    {
        $row = User::find($id);
        return view('admin.user.comment',compact('row'));
    }
    public function editComment($id,Request $request)
    {
        
        $comment = $request->comment;
        $row = User::find($id);
        if($comment != $row->comment){
            $row->comment = $comment;
            $row->update();
            return redirect()->route('admin.customer.comment',$row->id)->with('message','تم تعديل التعليق بنجاح');
        }
        else{
            return redirect()->route('admin.customer.comment',$row->id)->with('error','لم يتم التعديل لعدم التغيير فى البيانات');
        }
    }

    public function Analysis()
    {
        $supervisors = User::query()->where('role',2)->get();
        $rows = CustomerSuperVisor::get();
        return view('admin.user.analysis',compact(['rows','supervisors']));
    }

    
}