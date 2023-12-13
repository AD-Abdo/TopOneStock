<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use App\Participation;

class ParticipationController extends BackendController
{
    public function __construct(Participation $model)
    {
        parent::__construct($model);        
    }

    public function index()
    {
        $rows = Participation::paginate(5);
        $packages = Package::latest()->get();
        return view('admin.participation.index',compact('rows','packages'));
    }
    
    public function ParticipationUpdate($id)
    {
        $row = Participation::query()->where('id',$id)->first();
        if($row->confirm == 0){
            $row->update([
                'confirm' => 1
            ]);
            return redirect()->route('admin.participation.index')->with('message','تم تفعيل اشتراك العميل '.$row->User->name.' بنجاح');
        }else{
            $row->update([
                'confirm' => 0
            ]);
            return redirect()->route('admin.participation.index')->with('error','تم الغاء تفعيل اشتراك العميل '.$row->User->name.' بنجاح');
        }
    }

    public function destroy($id)
    {
        $row = Participation::findOrFail($id);
        $row->delete();
        return redirect()->route('admin.participation.index')->with('message','تم حذف اشتراك العميل بنجاح');
    }

    public function filter(Request $request){
        $confirm = null;
        
        if($request->has('confirm')){
            $confirm = $request->confirm;
            
            $rows = Participation::query()->where('confirm',$confirm)->paginate();
            return view('admin.participation.index',compact('rows','confirm'));
            
        }

        return redirect()->route('admin.participation.index');
    }
}