

@extends('layouts.main')

@php 
//active item
    $title = 'تعديل البيانات الشخصية';
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
      <h1 class="text-center animate__ animate__bounceInDown animated" style="visibility: visible; animation-name: bounceInDown;">تعديل البيانات الشخصية</h1>
      <div class="container">
        <div class="form-content">
          <div class="theForm">
            
            <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="exampleInputName">الاســــــــم <span>*</span></label>
                <input name="name" value="{{ Auth::user()->name }}" type="text" class="form-control" id="exampleInputName" placeholder="أدخل إسـمك" aria-describedby="nameHelp">
              </div>
              @if($errors->any())
                @if($errors->has('name'))
                  <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                    {{ $errors->first('name') }}
                  </div>
                @endif
              @endif
              
              <div class="form-group">
                <label for="exampleInputPhone">رقـــم الهـــاتـــف <span>*</span></label>
                <input type="text" value="{{ Auth::user()->phone }}" name="phone" class="form-control" id="exampleInputPhone" placeholder="أدخل رقم هاتفك" aria-describedby="emailHelp">
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
                  @if(Auth::user()->country=="مصر")
                    <option selected value="مصر">مـــــــصـــــر</option>
                  @else
                    <option  value="مصر">مـــــــصـــــر</option>
                  @endif
                  @if(Auth::user()->country=="السعودية")
                    <option selected value="السعودية">السعوديـــــــة</option>
                  @else
                    <option  value="السعودية">السعوديـــــــة</option>
                  @endif
                  @if(Auth::user()->country=="قطر")
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
                <label for="exampleInputPhone">الصورة الشخصية <span>*</span></label>
                <input type="file" name="image" accept="image/*" class="form-control" id="exampleInputPhone" >
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