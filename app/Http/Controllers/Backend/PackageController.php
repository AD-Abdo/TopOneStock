<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;

class PackageController extends BackendController
{
    public function __construct(Package $model)
    {
        parent::__construct($model);
    }

    protected function message(){
        return $message = [
            'name.required' => 'اسم الباقة مطلوب',
            'salary.required' => 'سعر الباقة مطلوب',
            'description.required' => 'وصف الباقة مطلوب',
        ];
    }

    public function store(Request $request){
        
        $request->validate([
            'name'=>'required',
            'salary' => 'required',
            'description' => 'required'
        ],$this->message());
        $image = $request->image;

        $request->image == null ? $newimage = null : $newimage = $image;
        if($image != null){
            
            $newimage = time().' - '.$request->image->getClientOriginalName();
            $image->move('package',$newimage);
        }
        $package = new Package();
        $package->name = $request->name;
        $package->salary = $request->salary;
        $package->description = $request->description;
        $package->image = $newimage;
        $package->save();

        return redirect()->route('admin.package.index')->with('message','تم اضافة الباقة بنجاح');

    }

    public function destroy($id){
        $row = Package::findOrFail($id);
        
        if($row->delete()){
            if($row-> image != null){
                unlink('package/'.$row->image);
            }
        }
        return redirect()->route('admin.package.index')->with('message','تم حذف الباقة بنجاح');
        
    }

    public function update($id,Request $request){
        $row = Package::findOrFail($id);
        
        $request->validate([
            'name'=>'required',
            'salary' => 'required',
            'description' => 'required'
        ],$this->message());
        $image = $request->image;
        
        if($request->name == $row->name && 
        $request->salary == $row->salary &&
        $request->description == $row->description&&
        $request->image == null ){
            return redirect()->route('admin.package.edit',$row->id)->with('error','لم يتم تعديل الباقة لعدم التغيير فى البيانات');

        }
        else{
            

            if($image != null){
                $newimage = $image;
                if($row->image != null){
                    unlink('package/'.$row->image);
                }
                $newimage = time().' - '.$request->image->getClientOriginalName();
                $image->move('package',$newimage);
            }else{
                $newimage = $row->image;
            }

            $row->update([
                'name' => $request->name,
                'description' => $request->description,
                'salary' => $request->salary,
                'image' => $newimage,

            ]);
            return redirect()->route('admin.package.edit',$row->id)->with('message','تم تعديل الباقة بنجاح');

        }
        
    }

    public function filter(Request $request){
        if($request->name != null ){
            $rows = Package::query()->where('name',$request->name)->paginate();
            return view('admin.package.index',compact('rows'));
        }
        else{
            return redirect()->route('admin.package.index');
        }
    }
    
}