@push('css')
    <style>
        input{
            background-color:#2A3038 !important
        }    
    </style>
@endpush

@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - عرض المشرفين ';
@endphp 

@section('content')
    <div class="content-wrapper ">
            <div class="page-header">
              <h3 class="page-title">جدول المشرفين / عرض المشرف : {{ $row->name }}</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-arrow-left  d-md-block"></i> </a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <form class="forms-sample" >
                        
                        @include('admin.user.form')
                        <div class="form-group row">
                        
                        <label for="image" class="col-sm-2 col-form-label">الرتبة</label>
                        <div class="col-sm-10">
                          @php 
                            $role = "";
                              if($row->role == 1){$role="مدير";}
                                    
                            elseif($row->role == 2){$role="مشرف";}
                                    
                            else{$role="مستخدم عادي";}
                                    
                          @endphp
                          <input type="text"  name="role" disabled  class="form-control cairo" id="role" placeholder="الرتبة" value="{{ $role }}">
                        </div>
                      </div>
                        @if($row->image != null)

                    <div class="form-group row">
                        
                        <label for="image" class="col-sm-2 col-form-label">الصورة</label>
                        <div class="col-sm-10">
                          <img class="img-lg rounded-circle mb-3" src="/user/{{ $row->image }}">
                        </div>
                      </div>
                      
                      
                    @endif
                      @if($errors->any())
                        <div class=" row">
                            
                                
                              
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10  text-center" >
                                  @if($errors->has('image') )
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('image')}}</p>
                                  @endif
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
    document.getElementById("email").disabled = true;
    document.getElementById("password").disabled = true;
    document.getElementById("password_confirmed").disabled = true;
    

</script>
@endpush

