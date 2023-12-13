

@extends('layouts.main')

@php 
//active item
    $title = 'تعديل كلمة المرور';
    $description ='';
    $item[0] = '';
    $item[1] = '';
    $item[2] = '';
    $item[3] = '';
    $item[4] = '';


@endphp
@section('content')

<main class="tasgel-gaded">
      @if(Session::has('error'))
        <div class="bg bg-danger" id="message">
          <p class="text-light text-center pt-2 pb-2"> {{ Session::get('error') }}</p>
        </div>
      @endif
      @if(Session::has('message'))
        <div class="bg bg-success" id="message">
          <p class="text-light text-center pt-2 pb-2"> {{ Session::get('message') }}</p>
        </div>
      @endif
      <h1 class="text-center animate__ animate__bounceInDown animated" style="visibility: visible; animation-name: bounceInDown;">تعديل كلمة المرور</h1>
      <div class="container">
        <div class="form-content">
          <div class="theForm">
            
            <form method="POST" action="{{ route('user.profile.password.update') }}" >
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="exampleInputName">كلمة المرور <span>*</span></label>
                <input name="password" type="password" class="form-control" id="exampleInputName" placeholder="أدخل كلمة المرور" aria-describedby="nameHelp">
              </div>
              @if($errors->any())
                @if($errors->has('password'))
                  <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                    {{ $errors->first('password') }}
                  </div>
                @endif
              @endif
              
              <div class="form-group">
                <label for="exampleInputPhone">تاكيد كلمة المرور <span>*</span></label>
                <input type="password"  name="password_confirmation" class="form-control" id="exampleInputPhone" placeholder="أدخل تاكيد كلمة المرور" aria-describedby="emailHelp">
              </div>
              
              
              
              <button type="submit" class="btn badge-pill w-100">
                تعديل
              </button>
            </form>
          </div>
        </div>
      </div>
</main>

@endsection