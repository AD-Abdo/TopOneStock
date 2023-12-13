

@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - اضافة عميل جديد';
@endphp 

@section('content')
    <div class="content-wrapper ">
            <div class="page-header">
              <h3 class="page-title">جدول العملاء المضافة من قبل المشرفين / اضافة عميل جديد</h3>
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
                    
                    <form class="forms-sample" action="{{route('admin.client.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        @include('admin.client.form_g')
                        
                      <div class="form-group row">
                        <label for="comment" class="col-sm-2 col-form-label">التعليق</label>
                        <div class="col-sm-10">
                          <textarea name="comment" class="form-control cairo" id="comment" rows="10"></textarea>
                            
                          
                        </div>
                        
                        
                      </div>
                        
                      
                        <div class=" row  w-100 mt-4">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">

                                <input type="submit" class="text-center btn btn-primary w-100 cairo" value="اضافة">
                            </div>
                            <div class="col-md-4">
                            </div>

                        </div>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
@endsection
