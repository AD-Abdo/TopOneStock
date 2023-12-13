

@extends('layouts.main')

@php 
//active item
    $title = 'الصفحة الشخصية';
    $description ='';
    $item[0] = '';
    $item[1] = '';
    $item[2] = '';
    $item[3] = '';
    $item[4] = '';


@endphp
@section('content')

<main class="profile">
      @if(Session::has('message'))
        <div class="bg bg-success" id="message">
          <p class="text-light text-center pt-2 pb-2"> {{ Session::get('message') }}</p>
        </div>
      @endif
      <h1 class="text-center animate__ animate__bounceInUp animated" style="visibility: visible; animation-name: bounceInUp;">الصفحة الشخصية</h1>
      <div class="container">
        <div class="profile-content">
         <div class="img animate__ animate__bounceInRight animated" style="visibility: visible; animation-name: bounceInRight;">
            @if(Auth::user()->image != null)
              <img src="/user/{{ Auth::user()->image }}" alt="صورة العميل {{ Auth::user()->name }}">
            @else
              <img src="/web/imgs/images (1).jpeg" alt="صورة العميل {{ Auth::user()->name }}">
            @endif
            
          </div>
          <div class="text">
            <ul class="list-unstyled lead">
              <li><span>الاسم</span> : {{ Auth::user()->name }}</li>
              <li><span>البريد الالكتروني</span> : {{ Auth::user()->email }}</li>
              <li><span>البلد</span> : {{ Auth::user()->country }}</li>
              <li><span>رقم الهاتف</span> : {{ Auth::user()->phone }}</li>
              <li class="text-center"><a href="{{ route('user.profile.edit') }}" class="btn btn-success w-100">تعديل</a></li>
            </ul>
          </div>
        </div>
      </div>
    </main>

@endsection