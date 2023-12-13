@push('css')
    <style>
        input{
            background-color:#2A3038 !important
        }   
        textarea , select{
          background-color:#2A3038 !important;
          color: #fff;
        } 
    </style>
@endpush


@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - عرض بيانات عميل جديد';
@endphp 

@section('content')
    <div class="content-wrapper ">
            <div class="page-header">
              <h3 class="page-title">جدول العملاء / عرض بيانات العميل : {{ $row->name }}</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.customer') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-arrow-left  d-md-block"></i> </a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <form class="forms-sample" >
                        @csrf
                        @method('POST')
                                              <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">اسم المستخدم</label>
                        <div class="col-sm-4">
                          <input type="text" name="name" class="form-control cairo" id="name" placeholder=" اسم المستخدم" value="{{ isset($row)? $row->name : old('name')}}" >
                            
                          
                        </div>
                        <label for="email" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                        <div class="col-sm-4">
                          <input type="email" name="email" id="email" class="form-control cairo" placeholder=" البريد الالكتروني" value="{{ isset($row)? $row->email : old('email')}}" >
                        </div>
                        
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('name'))
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('name')}}</p>
                                  @endif
                                </div>
                            
                                <div class="col-sm-2"></div>
                                  <div class="col-sm-4  text-center" >
                                    @if($errors->has('email') )
                                      <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('email')}}</p>
                                    @endif
                                  </div>
                                
                            
                        </div>
                      @endif
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">رقم الهاتف</label>
                        <div class="col-sm-4">
                          <input type="text" id="phone" name="phone" class="form-control cairo" id="phone" placeholder=" رقم الهاتف" value="{{ isset($row)? $row->phone : old('phone')}}" >
                            
                          
                        </div>
                        <label for="email" class="col-sm-2 col-form-label">الدولة</label>
                        <div class="col-sm-4">
                          <select class="form-control cairo" name="country" id="country">
                            <option disabled selected>إختر الدولة</option>
                            @if(old('country')=="مصر" )                              
                                <option selected value="مصر">مـــــــصـــــر</option>
                            @elseif(isset($row))
                              @if($row->country == 'مصر')
                                  <option selected value="مصر">مـــــــصـــــر</option>
                              @else
                                <option value="مصر">مـــــــصـــــر</option>
                              @endif
                            @else 
                              
                              <option  value="مصر">مـــــــصـــــر</option>
                            @endif
                            @if(old('country')=="السعودية" )
                                <option selected value="السعودية">السعوديـــــــة</option>
                              
                            @elseif( isset($row))
                              @if($row->country == 'السعودية')
                                <option selected value="السعودية">السعوديـــــــة</option>
                              @else
                                <option  value="السعودية">السعوديـــــــة</option>
                              @endif 
                            @else
                              
                              <option  value="السعودية">السعوديـــــــة</option>
                            @endif
                            @if(old('country')=="قطر" )
                              
                                  <option selected value="قطر">قــــطــــــر</option>
                            @elseif( isset($row))
                              @if($row->country == 'قطر')
                                  <option selected value="قطر">قــــطــــــر</option>
                              @else
                                  <option  value="قطر">قــــطــــــر</option>
                              @endif
                              
                             
                            @else
                              
                              <option  value="قطر">قــــطــــــر</option>
                            @endif
                          </select>
                        </div>
                        
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('phone'))
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('phone')}}</p>
                                  @endif
                                </div>
                            
                                <div class="col-sm-2"></div>
                                  <div class="col-sm-4  text-center" >
                                    @if($errors->has('country') )
                                      <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('country')}}</p>
                                    @endif
                                  </div>
                                
                            
                        </div>
                      @endif
                        
                        @if($row->agree_date != null)
                          <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">الحالة</label>
                            <div class="col-sm-4">
                              <input type="text" name="status" class="form-control cairo" disabled id="status" placeholder="حالة العميل" value="{{ $row->status == 1 ? 'مفعل' : 'غير مفعل' }}">
                                
                              
                            </div>
                            <label for="agree_date" class="col-sm-2 col-form-label">تاريخ التفعيل</label>
                            <div class="col-sm-4">
                              <input type="text" name="agree_date" class="form-control cairo" disabled id="agree_date" placeholder="تاريخ التفعيل" value="{{ $row->agree_date }}">
                                
                              
                            </div>
                        
                        
                          </div>
                        @else
                          <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">الحالة</label>
                            <div class="col-sm-10">
                              <input type="text" name="status" class="form-control cairo" id="status" disabled placeholder="حالة العميل" value="{{ $row->status == 1 ? 'مفعل' : 'غير مفعل' }}">
                                
                              
                            </div>
                            
                        
                        
                          </div>
                        @endif
                        
                        
                      
                      <div class="form-group row">
                        <label for="comment" class="col-sm-2 col-form-label">التعليق</label>
                        <div class="col-sm-10">
                          <textarea name="comment" rows="5" class="form-control cairo" id="comment"  disabled >{{ $row->comment }}</textarea>
                            
                          
                        </div>
                       
                        
                      </div>
                     
                        
                      
                        
                  </div>
                </div>
              </div>
              
            </div>
          </div>
@endsection
@push('js')
<script>
    document.getElementById("name").disabled = true;
    document.getElementById("email").disabled = true;
    document.getElementById("country").disabled = true;
    document.getElementById("phone").disabled = true;
    document.getElementById("supervisor").disabled = true;
    document.getElementById("comment").disabled = true;
    document.getElementById("status").disabled = true;
    document.getElementById("agree_date").disabled = true;
    
</script>
@endpush
