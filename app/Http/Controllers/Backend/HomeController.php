<?php

namespace App\Http\Controllers\Backend;

use App\CustomerSuperVisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inbox;
use App\Package;
use App\Participation;
use App\Share;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index(){
        if(Auth::check()){
            $inbox_count = count(Inbox::get());
            $package_count =count(Package::get());
            $share_count =count(Share::get());
            $supervisor_count = count(User::where('role',2)->get());
            $accepted_user_count = count(User::where('role',0)->where('status',1)->get());
            $wait_user_count = count(User::where('role',0)->where('status',0)->get());

            $accepted_package_count= count(Participation::query()->where('confirm',1)->get());
            $wait_package_count= count(Participation::query()->where('confirm',0)->get());

            $result_supervisor_count = 0;
            if(Auth::user()->role == 2){
                $result_supervisor_count = count(CustomerSuperVisor::query()->where('supervisor_id',Auth::user()->id)->get());
            }


            return view('admin.index' , compact(
                'inbox_count',
                'package_count',
                'share_count',
                'supervisor_count',
                'accepted_user_count',
                'wait_user_count',
                'accepted_package_count',
                'wait_package_count',
                'result_supervisor_count'
            ));
        }
        else{
            return view('404');
        }
    }
}