

@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - تعديل سهم ';
@endphp 

@section('content')
    <div class="content-wrapper ">
            <div class="page-header">
              <h3 class="page-title">جدول الاسهم / تعديل بيانات سهم : <span style="text-decoration: underline">{{ $row->name }}</span></h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.share.index') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-arrow-left  d-md-block"></i> </a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <form class="forms-sample" action="{{route('admin.share.update',$row->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        @include('admin.share.form')

                        <div class=" row  w-100 mt-4">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">

                                <input type="submit" class="text-center btn btn-primary w-100 cairo" value="تعديل">
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
