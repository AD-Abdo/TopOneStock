


@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - احصائيات المشرفين';
@endphp 

@section('content')
        <div class="content-wrapper">
          
            <div class="page-header">
              <h3 class="page-title">احصائيات المشرفين </h3>
              
            </div>
          
          <div class="row">
              @if(count($supervisors)>0)
                @foreach($supervisors as $supervisor)
                    
                    
                            <div class="col-xl-3 col-sm-6 grid-margin ">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0 mt-2" style="font-size: 1rem"><span style="font-size: .8rem">عدد عملاء المشرف</span><br><br> {{ $supervisor->name }}</h3>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div style="background-color:#F3F4F6;border-radius:50px;box-shadow: 0px 0px 20px red;" class="text-center">
                                                <p class="mt-3 text-cneter text-dark pt-1 pl-2 pr-2 pb-1" style="font-size: 1rem">
                                                    @php $count = 0 @endphp
                                                    @if(count($rows) > 0 )
                                                        @foreach($rows as $row)
                                                            @if($row->supervisor_id == $supervisor->id)
                                                                @php 
                                                                    $count = $count+1;
                                                                @endphp 
                                                            @endif                                                            
                                                        @endforeach
                                                        {{ $count }}
                                                    @else
                                                        {{ $count }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                @endforeach
                
              @else
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="mt-5 mb-5  col-md-4 text-center">
                            <h3 class="page-title bg-danger pb-2 pr-4 pl-4 pt-2" style="border-radius: 50px">لا يوجد مشرفين حاليا </h3>
                        
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
              @endif

              
            </div>
          
          
        </div>
        
        

        
    
@endsection
  