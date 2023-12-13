

@extends('layouts.main')

@php 
//active item
    $title = 'تسجيل جديد';
    $description ='تسجيل مستخدم جديد فى موقع شركة توب وان للتوصيات و الاسهم السعودية';
    $item[0] = '';
    $item[1] = '';
    $item[2] = '';
    $item[3] = '';
    $item[4] = '';


@endphp
@section('content')

<main class="tasgel-gaded">
      <h1 class="text-center animate__ animate__bounceInDown animated" style="visibility: visible; animation-name: bounceInDown;">تســـجيل جديــــد</h1>
      <div class="container">
        <div class="form-content">
          <div class="theForm">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              @method('POST')
              <div class="form-group">
                <label for="exampleInputName">الاســــــــم <span>*</span></label>
                <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="exampleInputName" placeholder="أدخل إسـمك" aria-describedby="nameHelp">
              </div>
              @if($errors->any())
                @if($errors->has('name'))
                  <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                    {{ $errors->first('name') }}
                  </div>
                @endif
              @endif
              <div class="form-group">
                <label for="exampleInputEmail">البـــريد الإلكترونى <span>*</span></label>
                <input type="text" value="{{ old('email') }}" name="email" class="form-control" id="exampleInputEmail" placeholder="أدخل البريد الإلكترونى">
              </div>
              @if($errors->any())
                @if($errors->has('email'))
                  <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                    {{ $errors->first('email') }}
                  </div>
                @endif
              @endif
              <div class="form-group">
                <label for="exampleInputPhone">رقـــم الهـــاتـــف <span>*</span></label>
                <input type="text" value="{{ old('phone') }}" name="phone" class="form-control" id="exampleInputPhone" placeholder="أدخل رقم هاتفك" aria-describedby="emailHelp">
              </div>
              @if($errors->any())
                @if($errors->has('phone'))
                  <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                    {{ $errors->first('phone') }}
                  </div>
                @endif
              @endif
              <div class="form-group">
                <label for="exampleFormControlTextarea1">إختـــر الدولــة <span>*</span></label>
                <select class="form-control" name="country">
                  <option disabled selected>إختر الدولة</option>
                  @if(old('country')=="مصر")
                    <option selected value="مصر">مـــــــصـــــر</option>
                  @else
                    <option  value="مصر">مـــــــصـــــر</option>
                  @endif
                  @if(old('country')=="السعودية")
                    <option selected value="السعودية">السعوديـــــــة</option>
                  @else
                    <option  value="السعودية">السعوديـــــــة</option>
                  @endif
                  @if(old('country')=="قطر")
                    <option selected value="قطر">قــــطــــــر</option>
                  @else
                    <option  value="قطر">قــــطــــــر</option>
                  @endif
                </select>
              </div>
              @if($errors->any())
                @if($errors->has('country'))
                  <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                    {{ $errors->first('country') }}
                  </div>
                @endif
              @endif
              <div class="form-group">
                <label for="exampleInputPass">كــلــمــة المــرور <span>*</span></label>
                <input type="password" name="password" class="form-control" id="exampleInputPass" placeholder="أدخل كلمة المرور" aria-describedby="emailHelp">
              </div>
              @if($errors->any())
                @if($errors->has('password'))
                  <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                    {{ $errors->first('password') }}
                  </div>
                @endif
              @endif
              <div class="form-group">
                <label for="exampleInputPass">تـــأكيـــد كــلــمــة المــرور<span>*</span></label>
                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPass" placeholder="تأكيد كـلمة المرور" aria-describedby="emailHelp">
              </div>
              <button type="submit" class="btn badge-pill w-100">
                تسجيل جديد
              </button>
            </form>
          </div>
        </div>
      </div>
</main>

@endsection