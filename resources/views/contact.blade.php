
@extends('layouts.main')

@php 
//active item
    $title = 'اتصل بنا عن طريق الفورم الموجودة  او تواصل معنا من خلال وسائل التواصل الاجتماعى';
    $description = 'تواصل مع شركة توب وان للاسهم لTopOne من خلال الفورم الموجوده بالصفحة او من خلال أحد وسائل التواصل الاجتماعى | يسرنا الاستماع منك';
    $item[0] = '';
    $item[1] = '';
    $item[2] = '';
    $item[3] = 'active';
    $item[4] = '';


@endphp
@section('content')

<main class="contact">
      @if(Session::has('message'))
        <div class="container-fluid mt-3" id="message">
          <div class="col-md-12">
            <div class="card bg-info pt-3 mb-3 w-100 text-center">
          <p class="text-light" style="font-size: 1.1rem">{{ Session::get('message') }}</p>
            </div>
          </div>
        </div>
      @endif
      <h1 class="text-center animate__ animate__fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">إتـــــــــصل بـــــنـــــا</h1>
      <div class="container">
        <div class="form-content">
          <div class="theForm">
            <form action="{{ route('contact.post') }}" method="POST">
              @csrf
              @method('POST')
              
              
              @if(Auth::check())
                <div class="form-group">
                  <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" id="exampleInputEmail1" hidden aria-describedby="emailHelp">
                </div>
                @if($errors->any())
                  @if($errors->has('name'))
                    <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                      {{ $errors->first('name') }}
                    </div>
                  @endif
                @endif
                <div class="form-group">
                  <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control" id="exampleInputEmail1" hidden aria-describedby="emailHelp">
                </div>
                @if($errors->any())
                  @if($errors->has('phone'))
                    <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                      {{ $errors->first('phone') }}
                    </div>
                  @endif
                @endif
                <div class="form-group">
                  <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" id="exampleInputPassword1" hidden>
                </div>
                @if($errors->any())
                  @if($errors->has('email'))
                    <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                      {{ $errors->first('email') }}
                    </div>
                  @endif
                @endif
              @else
                  <div class="form-group">
                  <label for="exampleInputEmail1">الاســــــــم <span>*</span></label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                @if($errors->any())
                  @if($errors->has('name'))
                    <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                      {{ $errors->first('name') }}
                    </div>
                  @endif
                @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">رقـــم الهـــاتـــف <span>*</span></label>
                  <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                @if($errors->any())
                  @if($errors->has('phone'))
                    <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                      {{ $errors->first('phone') }}
                    </div>
                  @endif
                @endif
                <div class="form-group">
                  <label for="exampleInputPassword1">البـــريد الإلكترونى <span>*</span></label>
                  <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputPassword1">
                </div>
                @if($errors->any())
                  @if($errors->has('email'))
                    <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                      {{ $errors->first('email') }}
                    </div>
                  @endif
                @endif
              @endif
              <div class="form-group">
                <label for="exampleFormControlTextarea1">المـــوضوع <span>*</span></label>
                <textarea class="form-control" name="content" value="{{ old('content') }}" id="exampleFormControlTextarea1" rows="3">{{ old('name') }}</textarea>
              </div>
              @if($errors->any())
                @if($errors->has('content'))
                  <div class="form-group bg-danger text-light pt-2 pb-2 text-center">
                    {{ $errors->first('content') }}
                  </div>
                @endif
              @endif
              <button type="submit" class="btn badge-pill w-100">
                إرســــــــال
              </button>
            </form>
          </div>
          <div class="time-phone-location">
            <div class="one-info text-center">
              <i class="far fa-clock fa-3x"></i>
              <p class="lead">
                الأحد - الخميس من 8:00 إلى 18:00 <br>مغلق الجمعة
              </p>
            </div>
            <div class="one-info text-center">
              <i class="fas fa-map-marker-alt fa-3x"></i>
              <p class="lead">الرياض - الســــــــعوديـة</p>
            </div>
            <div class="one-info text-center">
              <i class="far fa-address-book fa-3x"></i>
              <p class="lead">
                <a href="mailto:contact@topone.com">  info@topone-stock.com</a> <br>
                <a href="tel:+20 155 254 3651">+20 155 254 3651</a>
              </p>
            </div>
          </div>
        </div>
      </div>
</main>

@endsection