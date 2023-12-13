
@extends('layouts.main')

@php 
//active item
    $title = 'باقات شركة توب وان للأسهم السعودية';
    $description = 'باقات شركة توب وان للاسهم السعودية | باقة مجانية - باقة شهرية - باقة ربع سنوية - باقة نصف سنوية - باقة 9 أشهر - باقة سنوية - باقة الإشراف و متابعة المحفظة';
    $item[0] = '';
    $item[1] = 'active';
    $item[2] = '';
    $item[3] = '';
    $item[4] = '';


@endphp
@section('content')

<main class="ba2at">
      @if(Session::has('message'))
        <div class="container-fluid " id="message">
          <div class="col-md-12">
            <div class="card bg-info pt-3 mb-3 w-100 text-center">
          <p class="text-light" style="font-size: 1.1rem">{{ Session::get('message') }}</p>
            </div>
          </div>
      </div>
      @endif
      <h1 class="text-center animate__ animate__bounceInDown animated" style="visibility: visible; animation-name: bounceInDown;">البـــــــاقـــــــات</h1>
      @if(isset($amount) )
        <div class="container-fluid w-100 pt-2">
            <div class="col-md-12 ">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <p class="text-light text-center bg-danger p-2" style="font-size:1.2rem;border-radius: 50px">نأسف لعدم عرض الباقات , أنت الان مشترك بباقة</p>
                </div>
                <div class="col-md-3"></div>
              </div>
               <div class="row">
                 <div class="col-md-4"></div>
                 <div class="col-md-4">
                   <div class="packages">

                    <div class="package card">
                      @if($row->image != null)
                        <img src="/package/{{ $row->Package->image }}" class="card-img-top" alt="باقات توب وان">
                      @else
                        <img src="/web/imgs/ba2a.jpg" class="card-img-top" alt="باقات توب وان">
                      @endif
                    <div class="card-body">
                      <h4 class="card-title text-center">بـــاقة  {{ $row->Package->name }}</h4>
                      @if($row->Package->salary != 0)
                        <p class="card-text">{{ $row->Package->salary }} ريــــال</p>
                      @else
                        <p class="card-text">مــــــجــــانــيـــة</p>
                      @endif
                      <p class="card-text disc">
                        {{ $row->Package->description }} .
                      </p>
                      
                    </div>
                  </div>
                 </div>
                 <div class="col-md-4"></div>
               </div>
            </div>
        </div>
      
      @else
        @if( isset($message))
          <div class="col-md-12 mt-5 mb-5">
                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    <p class="text-light text-center bg-danger p-2 pt-3 pb-3" style="font-size:1.2rem;border-radius: 50px">{{ $message }}</p>
                  </div>
                  <div class="col-md-3"></div>
                </div>
                
          </div>
        @else
          <div class="container">
            <div class="packages">
                @if(count($rows)> 0)

                  @foreach($rows as $row)
                  <div class="package card">
                    @if($row->image != null)
                      <img src="/package/{{ $row->image }}" class="card-img-top" alt="باقات توب وان">
                    @else
                      <img src="/web/imgs/ba2a.jpg" class="card-img-top" alt="باقات توب وان">
                    @endif
                  <div class="card-body">
                    <h4 class="card-title text-center">بـــاقة  {{ $row->name }}</h4>
                    @if($row->salary != 0)
                      <p class="card-text">{{ $row->salary }} ريــــال</p>
                    @else
                      <p class="card-text">مــــــجــــانــيـــة</p>
                    @endif
                    <p class="card-text disc">
                      {{ $row->description }} .
                    </p>
                    @if(Auth::check())
                    <form action="{{ route('partcipation.check') }}" method="POST">
                      @csrf
                      @method('POST')
                      <input type="number" name="user" value="{{ Auth::user()->id }}" hidden >
                      <input type="number" name="package" value="{{ $row->id }}" hidden >
                      <button type="submit"  class="btn w-100 btn-primary" style="overflow:auto;position: absolute;bottom: -5px; left:0px">إشتــــــراك</button>
                    </form>
                    @else
                      <a href="{{ route('register') }}" class="btn w-100 " style="overflow:auto;position: absolute;
        bottom: -5px; left:0px
        
        ">إشتــــــراك</a>
                    @endif
                  </div>
                </div>
                @endforeach
                @else

                @endif
              
              
            </div>
          </div>
        @endif

      @endif
</main>


@endsection