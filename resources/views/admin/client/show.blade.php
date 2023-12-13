@push('css')
    <style>
        input{
            background-color:#2A3038 !important
        }   
        textarea , select{
          background-color:#2A3038 !important
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
              <h3 class="page-title">جدول العملاء المضافة من قبل المشرفين / عرض بيانات العميل : {{ $row->name }}</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.client.index') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-arrow-left  d-md-block"></i> </a></li>
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
                        @include('admin.client.form_g')
                        
                        @if(Auth::user()->role == 1)
                        <div class="form-group row">
                            
                            <label for="supervisor" class="col-sm-2 col-form-label">مضاف من قبل</label>
                            <div class="col-sm-10">
                              <input type="text" name="supervisor" class="form-control cairo" id="supervisor" placeholder="مضاف من قبل" value="{{ $supervisor }}">
                                
                              
                            </div>
                        
                        
                        </div>
                        @endif
                        
                      
                      <div class="form-group row">
                        <label for="comment" class="col-sm-2 col-form-label">التعليق</label>
                        <div class="col-sm-10">
                          <textarea name="comment" rows="5" class="form-control cairo" id="comment"  disabled  >{{ $row->comment }}</textarea>
                            
                          
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
    document.getElementById("phone").disabled = true;
    document.getElementById("supervisor").disabled = true;
    document.getElementById("comment").disabled = true;
    
</script>
@endpush
