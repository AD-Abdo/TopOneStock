<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inbox;

class InboxController extends BackendController
{
    public function __construct(Inbox $model)
    {
        parent::__construct($model);
    }

    public function destroy($id)
    {
        $row = Inbox::findOrFail($id);
        $row->delete();
        return redirect()->route('admin.inbox.index')->with('message','تم حذف الرسالة بنجاح');
    }

    public function filter(Request $request)
    {
        $name = $request->name;
        $email = $request->email;

        if($name != null && $email != null){
            $rows = Inbox::query()->where('name',$name)->where('email',$email)->paginate(5);
            return view('admin.inbox.index',compact('rows','name','email'));
        }
        else if($name != null && $email == null){
            $rows = Inbox::query()->where('name',$name)->paginate(5);
            return view('admin.inbox.index',compact('rows','name','email'));
        }
        else if($name == null && $email != null){
            $rows = Inbox::query()->where('email',$email)->paginate(5);
            return view('admin.inbox.index',compact('rows','name','email'));
        }
        else{
            return redirect()->route('admin.inbox.index');
        }
    }
}