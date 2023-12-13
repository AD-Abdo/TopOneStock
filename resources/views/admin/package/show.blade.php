@push('css')
    <style>
        input{
            background-color:#2A3038 !important
        }    
    </style>
@endpush

@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - عرض باقة ';
@endphp 

@section('content')
    <div class="content-wrapper ">
            <div class="page-header">
              <h3 class="page-title">جدول الباقات / عرض باقة : <span style="text-decoration: underline">{{ $row->name }}</span></h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.package.index') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-arrow-left  d-md-block"></i> </a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                    
                    
                    <form class="forms-sample">
                        @include('admin.package.form')

                        @if($row->image != null)

                    <div class="form-group row">
                        
                        <label for="image" class="col-sm-2 col-form-label">الصورة</label>
                        <div class="col-sm-10">
                          <img class="img-lg rounded-circle mb-3" src="/package/{{ $row->image }}">
                        </div>
                      </div>
                      
                      
                    @endif
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
@endsection
@push('js')
<script>
    document.getElementById("name").disabled = true;
    document.getElementById("salary").disabled = true;
    document.getElementById("description").disabled = true;
    
</script>
@endpush

