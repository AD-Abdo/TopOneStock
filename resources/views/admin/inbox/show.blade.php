@push('css')
    <style>
        input{
            background-color:#2A3038 !important
        }  
        textarea{
          background-color:#2A3038 !important
        }  
    </style>
@endpush

@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - البريد ';
@endphp 

@section('content')
    <div class="content-wrapper ">
            <div class="page-header">
              <h3 class="page-title">البريد / عرض رسالة : <span style="text-decoration: underline">{{ $row->name }}</span></h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.inbox.index') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-arrow-left  d-md-block"></i> </a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                    
                    
                    <form class="forms-sample">
                        @include('admin.inbox.form')

                        
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
    document.getElementById("email").disabled = true;
    document.getElementById("phone").disabled = true;
    document.getElementById("content").disabled = true;
    
</script>
@endpush

