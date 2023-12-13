<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Inbox;
use App\Package;
use App\Participation;
use App\Share;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function __construct()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                return redirect('/dashboard/home');
            }
            
        }
        $this->middleware('CheckAdmin');

    }

    public function Home()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                return redirect('/dashboard/home');
            }
            
        }
        
        return view('index');
    }
    public function About()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                return redirect('/dashboard/home');
            }
        }
        return view('about');
    }
    public function Contact()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                return redirect('/dashboard/home');
            }
        }
        return view('contact');
    }

    public function ContactPost(Request $request)
    {

        $message = [
            'name.required' => 'اسم المستخدم مطلوب',
            'name.max' => 'الحد الاقصى لاسم المستخدم هو 255 حرف',

            'email.required' => 'البريد الالكتروني مطلوب',
            'email.string' => 'البريد الالكتروني يجب ان يحتوي على نص فقط',
            'email.email' => 'يجب ادخال بريد الكتروني صحيح',
            'email.max' => 'الحد الاقصى للبريد الالكتروني هو 255 حرف',

            'phone.required' => 'يجب ادخال رقم الهاتف',
            'phone.numeric' => 'رقم الهاتف يجب ان يحتوي على ارقام فقط',

            'content.required' => 'الموضوع مطلوب',
        ];

        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'content' => ['required'],
            'phone' => ['required', 'numeric'],
        ], $message);

        $inbox = new Inbox();
        $inbox->name = $request->name;
        $inbox->phone = $request->phone;
        $inbox->email = $request->email;
        $inbox->content = $request->content;
        $inbox->save();

        return redirect()->route('contact')->with('message', 'تم ارسال رسالتك بنجاح');

    }
    public function Packages()
    {
        if (Auth::check()) {
            $amount = count(Participation::query()->where('user_id', Auth::user()->id)->get());

            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                return redirect('/dashboard/home');
            } else if (Auth::user()->role == 0 && $amount == '1') {

                $row = Participation::query()->where('user_id', Auth::user()->id)->first();
                if ($row->confirm == 1) {
                    return view('packages', compact('amount', 'row'));
                } else {
                    $message = "طلبك قيد المراجة";
                    return view('packages', compact('message'));
                }

            }

        }
        $rows = Package::latest()->get();
        return view('packages', compact('rows'));

    }
    public function Tawsiat()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                return redirect('/dashboard/home');
            }
        }
        return view('tawsiat');
    }

    public function getMonth($open_custom_month)
    {
        $month = '';
        switch ($open_custom_month) {
            case '01':
                $month = "يناير";
                break;

            case '02':
                $month = "فبراير";
                break;

            case '03':
                $month = "مارس";
                break;

            case '04':
                $month = "ابريل";
                break;

            case '05':
                $month = "مايو";
                break;

            case '06':
                $month = "يونيو";
                break;

            case '07':
                $month = "يوليو";
                break;

            case '08':
                $month = "أغسطس";
                break;

            case '09':
                $month = "سيبتمبر";
                break;

            case '10':
                $month = "أكتوبر";
                break;

            case '11':
                $month = "نوفمبر";
                break;

            case '12':
                $month = "ديسمبر";
                break;
        }

        return $month;
    }

    public function TawsiatGet($id)
    {

        $real_day = date('d');
        $real_month = date('m');
        $real_year = date('y');
        $real_date = '20' . $real_year . '-' . $real_month . '-' . $real_day;

        $open_custom_day = '01';
        $end_custom_day = '30';
        $open_custom_month = $real_month;
        $open_custom_year = $real_year;

        $month = $this->getMonth($open_custom_month);

        $open_custom_date = '20' . date($open_custom_year . '-' . $open_custom_month . '-' . $open_custom_day);
        $end_custom_date = '20' . date($open_custom_year . '-' . $open_custom_month . '-' . $end_custom_day);

        if ($id == 1) {
            $rows = Share::query()->where('no_cookies', 1)->latest()->get();
            $success = 0;
            $failed = 0;
            $count = 0;
            $open_share = 0;

            foreach ($rows as $row) {
                $share_date_time = explode(' ', $row->buy_date);
                $share_date = $share_date_time[0];
                if ($share_date >= $open_custom_date && $share_date <= $end_custom_date) {
                    $count = $count + 1;
                    

                    $compare_date = '20' . date('y-m-d', strtotime($share_date . ' + ' . ($row->no_cookies - 1) . ' days'));
                    if ($compare_date >= $real_date) {
                        $open_share = $open_share + 1;
                    }
                    else{
                        if ($row->status == 1) {
                        $success = $success + 1;
                        }
                        if ($row->status == 0) {
                            $failed = $failed + 1;
                        }
                    }
                }
            }

            if ($count == 0) {
                $got_success = 0;
            } else {
                $got_success = ($success / $count) * 100;
            }

            return view('getTawsiat', compact('id', 'rows', 'count', 'success', 'failed', 'got_success', 'open_share', 'open_custom_month', 'open_custom_year', 'open_custom_date', 'end_custom_date', 'real_date', 'month'));

        }
        if ($id == 2) {
            $rows = Share::query()->where('no_cookies', '<=', 3)->where('no_cookies', '>=', 2)->latest()->get();
            $success = 0;
            $failed = 0;
            $count = 0;
            $open_share = 0;

            foreach ($rows as $row) {
                $share_date_time = explode(' ', $row->buy_date);
                $share_date = $share_date_time[0];
                if ($share_date >= $open_custom_date && $share_date <= $end_custom_date) {
                    $count = $count + 1;
                    

                    $compare_date = '20' . date('y-m-d', strtotime($share_date . ' + ' . ($row->no_cookies - 1) . ' days'));
                    if ($compare_date >= $real_date) {
                        $open_share = $open_share + 1;
                    }

                    else{
                        if ($row->status == 1) {
                        $success = $success + 1;
                        }
                        if ($row->status == 0) {
                            $failed = $failed + 1;
                        }
                    }
                }
            }

            if ($count == 0) {
                $got_success = 0;
            } else {
                $got_success = ($success / $count) * 100;
            }

            return view('getTawsiat', compact('id', 'rows', 'count', 'success', 'failed', 'got_success', 'open_share', 'open_custom_month', 'open_custom_year', 'open_custom_date', 'end_custom_date', 'real_date', 'month'));
        }
        if ($id == 3) {
            $rows = Share::query()->where('no_cookies', '>=', 4)->where('no_cookies', '<=', 7)->latest()->get();
            $success = 0;
            $failed = 0;
            $count = 0;
            $open_share = 0;

            foreach ($rows as $row) {
                $share_date_time = explode(' ', $row->buy_date);
                $share_date = $share_date_time[0];
                if ($share_date >= $open_custom_date && $share_date <= $end_custom_date) {
                    $count = $count + 1;
                    

                    $compare_date = '20' . date('y-m-d', strtotime($share_date . ' + ' . ($row->no_cookies - 1) . ' days'));
                    if ($compare_date >= $real_date) {
                        $open_share = $open_share + 1;
                    }
                    else{
                        if ($row->status == 1) {
                        $success = $success + 1;
                        }
                        if ($row->status == 0) {
                            $failed = $failed + 1;
                        }
                    }
                }
            }

            if ($count == 0) {
                $got_success = 0;
            } else {
                $got_success = ($success / $count) * 100;
            }

            return view('getTawsiat', compact('id', 'rows', 'count', 'success', 'failed', 'got_success', 'open_share', 'open_custom_month', 'open_custom_year', 'open_custom_date', 'end_custom_date', 'real_date', 'month'));
        }
        if ($id == 4) {
            $rows = Share::query()->where('no_cookies', '>=', 8)->where('no_cookies', '<=', 12)->latest()->get();
            $success = 0;
            $failed = 0;
            $count = 0;
            $open_share = 0;

            foreach ($rows as $row) {
                $share_date_time = explode(' ', $row->buy_date);
                $share_date = $share_date_time[0];
                if ($share_date >= $open_custom_date && $share_date <= $end_custom_date) {
                    $count = $count + 1;
                    

                    $compare_date = '20' . date('y-m-d', strtotime($share_date . ' + ' . ($row->no_cookies - 1) . ' days'));
                    if ($compare_date >= $real_date) {
                        $open_share = $open_share + 1;
                    }
                    else{
                        if ($row->status == 1) {
                        $success = $success + 1;
                        }
                        if ($row->status == 0) {
                            $failed = $failed + 1;
                        }
                    }
                }
            }

            if ($count == 0) {
                $got_success = 0;
            } else {
                $got_success = ($success / $count) * 100;
            }

            return view('getTawsiat', compact('id', 'rows', 'count', 'success', 'failed', 'got_success', 'open_share', 'open_custom_month', 'open_custom_year', 'open_custom_date', 'end_custom_date', 'real_date', 'month'));
        }
        if ($id == 5) {
            $rows = Share::query()->where('no_cookies', '>=', 20)->latest()->get();
            $success = 0;
            $failed = 0;
            $count = 0;
            $open_share = 0;

            foreach ($rows as $row) {
                $share_date_time = explode(' ', $row->buy_date);
                $share_date = $share_date_time[0];
                if ($share_date >= $open_custom_date && $share_date <= $end_custom_date) {
                    $count = $count + 1;
                    

                    $compare_date = '20' . date('y-m-d', strtotime($share_date . ' + ' . ($row->no_cookies - 1) . ' days'));
                    if ($compare_date >= $real_date) {
                        $open_share = $open_share + 1;
                    }
                    else{
                        if ($row->status == 1) {
                        $success = $success + 1;
                        }
                        if ($row->status == 0) {
                            $failed = $failed + 1;
                        }
                    }
                }
            }

            if ($count == 0) {
                $got_success = 0;
            } else {
                $got_success = ($success / $count) * 100;
            }

            return view('getTawsiat', compact('id', 'rows', 'count', 'success', 'failed', 'got_success', 'open_share', 'open_custom_month', 'open_custom_year', 'open_custom_date', 'end_custom_date', 'real_date', 'month'));
        }

    }

    public function TawsiatPost($id, Request $request)
    {
        $real_day = date('d');
        $real_month = date('m');
        $real_year = date('y');
        $real_date = '20' . $real_year . '-' . $real_month . '-' . $real_day;

        $open_custom_day = '01';
        $end_custom_day = '30';
        $open_custom_month = $request->month;
        $open_custom_year = $request->year;

        $month = $this->getMonth($open_custom_month);

        $open_custom_date = '20' . date($open_custom_year . '-' . $open_custom_month . '-' . $open_custom_day);
        $end_custom_date = '20' . date($open_custom_year . '-' . $open_custom_month . '-' . $end_custom_day);

        if ($id == 1) {
            $rows = Share::query()->where('no_cookies', 1)->latest()->get();
            $success = 0;
            $failed = 0;
            $count = 0;
            $open_share = 0;

            foreach ($rows as $row) {
                $share_date_time = explode(' ', $row->buy_date);
                $share_date = $share_date_time[0];
                if ($share_date >= $open_custom_date && $share_date <= $end_custom_date) {
                    $count = $count + 1;
                    
                    $compare_date = '20' . date('y-m-d', strtotime($share_date . ' + ' . ($row->no_cookies - 1) . ' days'));
                    if ($compare_date >= $real_date) {
                        $open_share = $open_share + 1;
                    }
                    else{
                        if ($row->status == 1) {
                        $success = $success + 1;
                        }
                        if ($row->status == 0) {
                            $failed = $failed + 1;
                        }
                    }
                }
            }

            if ($count == 0) {
                $got_success = 0;
            } else {
                $got_success = ($success / $count) * 100;
            }

            return view('getTawsiat', compact('id', 'rows', 'count', 'success', 'failed', 'got_success', 'open_share', 'open_custom_month', 'open_custom_year', 'open_custom_date', 'end_custom_date', 'real_date', 'month'));

        }
        if ($id == 2) {
            $rows = Share::query()->where('no_cookies', '<=', 3)->where('no_cookies', '>=', 2)->latest()->get();
            $success = 0;
            $failed = 0;
            $count = 0;
            $open_share = 0;

            foreach ($rows as $row) {
                $share_date_time = explode(' ', $row->buy_date);
                $share_date = $share_date_time[0];
                if ($share_date >= $open_custom_date && $share_date <= $end_custom_date) {
                    $count = $count + 1;
                    

                    $compare_date = '20' . date('y-m-d', strtotime($share_date . ' + ' . ($row->no_cookies - 1) . ' days'));
                    if ($compare_date >= $real_date) {
                        $open_share = $open_share + 1;
                    }
                    else{
                        if ($row->status == 1) {
                        $success = $success + 1;
                        }
                        if ($row->status == 0) {
                            $failed = $failed + 1;
                        }
                    }
                }
            }

            if ($count == 0) {
                $got_success = 0;
            } else {
                $got_success = ($success / $count) * 100;
            }

            return view('getTawsiat', compact('id', 'rows', 'count', 'success', 'failed', 'got_success', 'open_share', 'open_custom_month', 'open_custom_year', 'open_custom_date', 'end_custom_date', 'real_date', 'month'));
        }
        if ($id == 3) {
            $rows = Share::query()->where('no_cookies', '>=', 4)->where('no_cookies', '<=', 7)->latest()->get();
            $success = 0;
            $failed = 0;
            $count = 0;
            $open_share = 0;

            foreach ($rows as $row) {
                $share_date_time = explode(' ', $row->buy_date);
                $share_date = $share_date_time[0];
                if ($share_date >= $open_custom_date && $share_date <= $end_custom_date) {
                    $count = $count + 1;
                    

                    $compare_date = '20' . date('y-m-d', strtotime($share_date . ' + ' . ($row->no_cookies - 1) . ' days'));
                    if ($compare_date >= $real_date) {
                        $open_share = $open_share + 1;
                    }
                    else{
                        if ($row->status == 1) {
                        $success = $success + 1;
                        }
                        if ($row->status == 0) {
                            $failed = $failed + 1;
                        }
                    }
                }
            }

            if ($count == 0) {
                $got_success = 0;
            } else {
                $got_success = ($success / $count) * 100;
            }

            return view('getTawsiat', compact('id', 'rows', 'count', 'success', 'failed', 'got_success', 'open_share', 'open_custom_month', 'open_custom_year', 'open_custom_date', 'end_custom_date', 'real_date', 'month'));
        }
        if ($id == 4) {
            $rows = Share::query()->where('no_cookies', '>=', 8)->where('no_cookies', '<=', 12)->latest()->get();
            $success = 0;
            $failed = 0;
            $count = 0;
            $open_share = 0;

            foreach ($rows as $row) {
                $share_date_time = explode(' ', $row->buy_date);
                $share_date = $share_date_time[0];
                if ($share_date >= $open_custom_date && $share_date <= $end_custom_date) {
                    $count = $count + 1;
                    

                    $compare_date = '20' . date('y-m-d', strtotime($share_date . ' + ' . ($row->no_cookies - 1) . ' days'));
                    if ($compare_date >= $real_date) {
                        $open_share = $open_share + 1;
                    }
                    else{
                        if ($row->status == 1) {
                        $success = $success + 1;
                        }
                        if ($row->status == 0) {
                            $failed = $failed + 1;
                        }
                    }
                }
            }

            if ($count == 0) {
                $got_success = 0;
            } else {
                $got_success = ($success / $count) * 100;
            }

            return view('getTawsiat', compact('id', 'rows', 'count', 'success', 'failed', 'got_success', 'open_share', 'open_custom_month', 'open_custom_year', 'open_custom_date', 'end_custom_date', 'real_date', 'month'));
        }
        if ($id == 5) {
            $rows = Share::query()->where('no_cookies', '>=', 20)->latest()->get();
            $success = 0;
            $failed = 0;
            $count = 0;
            $open_share = 0;

            foreach ($rows as $row) {
                $share_date_time = explode(' ', $row->buy_date);
                $share_date = $share_date_time[0];
                if ($share_date >= $open_custom_date && $share_date <= $end_custom_date) {
                    $count = $count + 1;
                    

                    $compare_date = '20' . date('y-m-d', strtotime($share_date . ' + ' . ($row->no_cookies - 1) . ' days'));
                    if ($compare_date >= $real_date) {
                        $open_share = $open_share + 1;
                    }
                    else{
                        if ($row->status == 1) {
                        $success = $success + 1;
                        }
                        if ($row->status == 0) {
                            $failed = $failed + 1;
                        }
                    }
                }
            }

            if ($count == 0) {
                $got_success = 0;
            } else {
                $got_success = ($success / $count) * 100;
            }

            return view('getTawsiat', compact('id', 'rows', 'count', 'success', 'failed', 'got_success', 'open_share', 'open_custom_month', 'open_custom_year', 'open_custom_date', 'end_custom_date', 'real_date', 'month'));
        }
    }
    public function Register()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 1 && Auth::user()->role == 2 ) {
                return redirect()->route('admin.home');
            }
            if (Auth::user()->role == 0 ) {
                return redirect()->route('home');
            }

        }

        return view('register');
    }

    public function ErrorDashboard()
    {
        return view('404');
    }

    public function PartcipationCheck(Request $request)
    {
        $particiation = new Participation();
        $particiation->user_id = $request->user;
        $particiation->package_id = $request->package;
        $particiation->save();
        return redirect()->route('packages')->with('message', 'طلب الاشتراك فى الباقة تحت المراجعة سيتم التواصل معك فى حالة اذا تم قبول طلبك');
    }

    public function Profile()
    {
        return view('auth.profile');
    }
    public function ProfileEdit()
    {
        return view('auth.edit');
    }
    protected function message()
    {
        return $message = [
            'name.required' => 'اسم المستخدم مطلوب',
            'name.min' => 'يجب ان يحتوى اسم المستخدم على 3 أحرف على الاقل',
            'name.string' => 'أسم المستخدم يجب أن يحتوي على أحرف فقط',
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'يجب ادخال بريد الكتروني صحيح',
            'email.unique' => 'البريد اللالكتروني مسجل مسبقا',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'يجب ان تحتوي كلمة المرور على اكثر من 8 أحرف او ارقام',
            'password.confirmed' => 'يجب تطابق كلمتى المرور',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.required' => 'رقم الهاتف يجب ان يحتوي على ارقام فقط',
            'country.required' => 'الدولة مطلوبة',

        ];
    }
    public function ProfileUpdate(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|string',
            'country' => 'required',
            'phone' => 'required',
        ], $this->message());

        $name = $request->name;
        $phone = $request->phone;
        $country = $request->country;
        $image = $request->image;
        $row = User::find(Auth::user()->id);
        if ($name == Auth::user()->name && $phone == Auth::user()->phone && $country == Auth::user()->country && $image == null) {
            return redirect()->route('user.profile.edit')->with('error', 'فشل تحديث البيانات لعدم تغييرها');
        }

        //three
        if ($name != Auth::user()->name) {
            $row->update([
                'name' => $name,
            ]);
        }

        if ($phone != Auth::user()->phone) {
            $row->update([
                'phone' => $phone,
            ]);
        }
        if ($country != Auth::user()->country) {
            $row->update([
                'country' => $country,
            ]);
        }
        if ($image != null) {
            $newimage = null;
            $newimage = time() . ' - ' . $image->getClientOriginalName();
            $image->move('user', $newimage);

            if (Auth::user()->image != null) {
                unlink('user/' . Auth::user()->image);
            }
            $row->update([
                'image' => $newimage,
            ]);
        }

        return redirect()->route('user.profile')->with('message', 'تم تحديث البيانات بنجاح');

    }

    public function PasswordEdit()
    {
        return view('auth.password');
    }

    public function PasswordUpdate(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ], $this->message());
        $row = User::find(Auth::user()->id);
        $password = Hash::make($request->password);

        $row->update([
            'password' => $password,
        ]);
        return redirect()->route('user.profile.password')->with('message', 'تم تحديث كلمة المرور بنجاح');

    }

}
