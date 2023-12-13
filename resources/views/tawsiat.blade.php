
@extends('layouts.main')

@php 
//active item
    $title = 'التوصيات الخاصة بشركه توب وان للاسهم السعودية';
    $description = 'توصيات شركة توب وان السعودية | توصيات لحظية - توصيات مضاربية - توصيات ذهبية - توصيات طفرة - توصيات إستثمارية';
    $item[0] = '';
    $item[1] = '';
    $item[2] = 'active';
    $item[3] = '';
    $item[4] = '';


@endphp
@section('content')
<main class="eltwsiat-page">
      <h1 class="text-center animate__ animate__bounceInUp animated" style="visibility: visible; animation-name: bounceInUp;">مــعـــدل الأداء</h1>
      <div class="container">
        <div class="eltwsiat">
          <div class="eltwsia text-center rounded">
            <img src="/web/imgs/rate12.svg" alt="rate icon" width="64" height="64">
            <div class="twsia-content">
              <h3>توصيات لحظية</h3>
              <p class="lead">جلسة واحدة</p>
              <a href="{{ route('tawsiat.get',1) }}" class="btn w-100">عــرض معدل الأداء</a>
            </div>
          </div>
          <div class="eltwsia text-center rounded">
            <img src="/web/imgs/rate12.svg" alt="rate icon" width="64" height="64">
            <div class="twsia-content">
              <h3>توصيات مضاربية</h3>
              <p class="lead">من جلستين إلى 3 جلسات</p>
              <a href="{{ route('tawsiat.get',2) }}" class="btn w-100">عــرض معدل الأداء</a>
            </div>
          </div>
          <div class="eltwsia text-center rounded">
            <img src="/web/imgs/rate12.svg" alt="rate icon" width="64" height="64">
            <div class="twsia-content">
              <h3>توصيات ذهبية</h3>
              <p class="lead">من 4 جلسات إلى 7 جلسات</p>
              <a href="{{ route('tawsiat.get',3) }}" class="btn w-100">عــرض معدل الأداء</a>
            </div>
          </div>
          <div class="eltwsia text-center rounded">
            <img src="/web/imgs/rate12.svg" alt="rate icon" width="64" height="64">
            <div class="twsia-content">
              <h3>توصيات طفرة</h3>
              <p class="lead">من 8 جلسات إلى 12 جلسة</p>
              <a href="{{ route('tawsiat.get',4) }}" class="btn w-100">عــرض معدل الأداء</a>
            </div>
          </div>
          <div class="eltwsia text-center rounded">
            <img src="/web/imgs/rate12.svg" alt="rate icon" width="64" height="64">
            <div class="twsia-content">
              <h3>توصيات إستثمارية</h3>
              <p class="lead">من 20 جلسة إلى شهر</p>
              <a href="{{ route('tawsiat.get',5) }}" class="btn w-100">عــرض معدل الأداء</a>
            </div>
          </div>
        </div>
      </div>
</main>

@endsection