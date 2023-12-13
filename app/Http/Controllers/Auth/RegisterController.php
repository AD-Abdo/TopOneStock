<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
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
        ];

        return Validator::make($data, [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'phone'=>['required','numeric'],
            'country'=> ['required','in:مصر,السعودية,قطر'],
            
        ],$message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country'=>$data['country'],
            'phone'=>$data['phone'],
            'status'=>0,
            'role'=>0,
        ]);
    }
}