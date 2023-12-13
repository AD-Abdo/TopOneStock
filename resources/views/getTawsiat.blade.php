@push('css')
  <style>
      .data{
        font-size: .95rem !important;
      }
      .color{
        color:#E7CC86 !important;
      }
  </style>
@endpush
@extends('layouts.main')

@php 
//active item
    $title = ' معدل الأداء الخاص بالتوصيات';
    $description = 'معدل الأداء الخاص بالتوصيات السعودية متضمنا إسم السهم و الكود الخاص به و سعر الشراء و البيع و تاريخهم و نتيجة الصفقه رابحة أم خسارة';
    $item[0] = '';
    $item[1] = '';
    $item[2] = '';
    $item[3] = '';
    $item[4] = '';


@endphp
@section('content')
<main class="mo3dl-eladaa">
      <h1 class="text-center animate__ animate__bounceInUp animated" style="visibility: visible; animation-name: bounceInUp;">مــعـــدل الأداء</h1>
      <div class="container">
        <form action="{{ route('tawsiat.post', $id ) }}" method="POST">
          @csrf
          @method('POST')
          <h3 class="text-right">إختر تاريخ البحث</h3>
          <div class="form-row">
            <div class="col-sm">
              <select class="form-control" name="year">
                <option selected="">العام</option>
                <option value="19" @if($open_custom_year == '19') selected @endif>2019</option>
                <option value="20" @if($open_custom_year == '20') selected @endif>2020</option>
                <option value="21" @if($open_custom_year == '21') selected @endif>2021</option>
                <option value="22" @if($open_custom_year == '22') selected @endif>2022</option>
                <option value="23" @if($open_custom_year == '23') selected @endif>2023</option>
                <option value="24" @if($open_custom_year == '24') selected @endif>2024</option>
                <option value="25" @if($open_custom_year == '25') selected @endif>2025</option>
                <option value="26" @if($open_custom_year == '26') selected @endif>2026</option>
                <option value="27" @if($open_custom_year == '27') selected @endif>2027</option>
                <option value="28" @if($open_custom_year == '28') selected @endif>2028</option>
                <option value="29" @if($open_custom_year == '29') selected @endif>2029</option>
                <option value="30" @if($open_custom_year == '30') selected @endif>2030</option>
              </select>
            </div>
            <div class="col-sm">
              <select class="form-control" name="month">
                <option selected="" >إختر الشهر</option>
                <option value="01" @if($open_custom_month == '01') selected @endif>يناير</option>
                <option value="02" @if($open_custom_month == '02') selected @endif>مارس</option>
                <option value="03" @if($open_custom_month == '03') selected @endif>فبراير</option>
                <option value="04" @if($open_custom_month == '04') selected @endif>إبريل</option>
                <option value="05" @if($open_custom_month == '05') selected @endif>مايو</option>
                <option value="06" @if($open_custom_month == '06') selected @endif>يونيو</option>
                <option value="07" @if($open_custom_month == '07') selected @endif>يوليو</option>
                <option value="08" @if($open_custom_month == '08') selected @endif>أغسطس</option>
                <option value="09" @if($open_custom_month == '09') selected @endif>سبتمبر</option>
                <option value="10" @if($open_custom_month == '10') selected @endif>أكتوبر</option>
                <option value="11" @if($open_custom_month == '11') selected @endif>نوفمبر</option>
                <option value="12" @if($open_custom_month == '12') selected @endif>ديسمبر</option>
              </select>
            </div>
            <div class="col-sm">
              <button type="submit" class="btn w-100">
                بـحــث
              </button>
            </div>
          </div>
        </form>
        <div class="twsiat-results">
          <h3 class="text-right color">نتائج شهر {{ $month }}</h3>
          <ul class="list-unstyled">
            <li >إجمالى عدد التوصيات : <span class="color">{{ $count }}</span> توصية</li>
            <li >عدد التوصيات المحققة : <span class="color">{{ $success }}</span> توصية</li>
            <li >عدد التوصيات ايقاف الخسارة : <span class="color">{{ $failed }}</span> توصية</li>
            <li >متوسط ربح التوصية الواحدة : <span class="color">{{ round($got_success,2) }}</span> %</li>
            <li >عدد التوصيات المفتوحة : <span class="color">{{ $open_share }}</span> توصية</li>
          </ul>
        </div>
        <table class="text-center">
          <thead>
            <tr>
              <th class="data" scope="col">كود السهم</th>
              <th class="data" scope="col">اسم السهم</th>
              <th class="data" scope="col" colspan="2">تاريخ الشراء</th>
              <th class="data" scope="col">سعر الشراء</th>
              <th class="data" scope="col" colspan="2">تاريخ البيع</th>
              <th class="data" scope="col">سعر البيع</th>
              <th class="data" scope="col">عدد الجلسات</th>
              <th class="data" scope="col">الحالة</th>
              <th class="data" scope="col">نسبة الربح / الخسارة</th>
            </tr>
          </thead>
          <tbody>
            @if($count>0)
              @foreach($rows as $row)
              @php
                $share_date_time = explode(' ',$row->buy_date);
                $share_date = $share_date_time[0];
                $compare_date = '20'.date('y-m-d',strtotime($share_date.' + '.($row->no_cookies-1).' days'));
              @endphp
              @if($share_date >= $open_custom_date && $share_date <= $end_custom_date)
                    
                
                        
                
                    <tr>
                      <td class="data" data-label="كود السهم">{{ $row->code }}</td>
                      <td class="data" data-label="اسم السهم">{{ $row->name }}</td>
                      <td class="data"data-label="تاريخ الشراء" colspan="2">{{ $row->buy_date}} </td>
                      <td class="data" data-label="سعر الشراء">{{ $row->buy_salary }}</td>
                      <td class="data" data-label="تاريخ البيع" colspan="2">{{ $row->sell_date }}</td>
                      <td class="data" data-label="سعر البيع">{{ $row->sell_salary }}</td>
                      <td class="data" data-label="عدد الجلسات">{{ $row->no_cookies }}</td>
                      
                      <td class="data" data-label="الحالة">
                        @if($compare_date >= $real_date)
                          <i class="fas fa-info-circle" ></i> مفتوحة
                        @else
                          @if($row->status == 1)
                            <i class="fas fa-arrow-up" ></i> رابحة
                          @else
                            <i class="fas fa-arrow-down"></i> خسارة
                          @endif
                        @endif
                      </td>
                      <td class="data" data-label="نسبة الربح / الخسارة">{{ $row->profit }}</td>
                    </tr>

                      
                @endif
              @endforeach
            @else
              <tr>
                <td colspan="11" class="data">لا يوجد توصيات </td>
              </tr>
            @endif
            
          </tbody>
        </table>
      </div>
    </main>

@endsection