


@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم';
@endphp 

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card corona-gradient-card">
                <div class="card-body py-0 px-0 px-sm-3">
                  <div class="row align-items-center">
                    <div class="col-4 col-sm-3 col-xl-2">
                      <img src="/assets/images/dashboard/Group126%402x.png"
                        class="gradient-corona-img img-fluid" alt="">
                    </div>
                    <div class="col-5 col-sm-7 col-xl-8 p-0">
                      <h4 class="mb-1 mb-sm-0">مرحبا بك فى لوحة التحكم الخاصة لموقع توب وان</h4>
                      <p class="mb-0 font-weight-normal d-none d-sm-block"></p>
                    </div>
                    <div class="col-3 col-sm-2 col-xl-2 pr-0 text-center">
                        
                      <a class="btn btn-outline-light btn-rounded get-started-btn cairo" target="_blank" href="https://www.facebook.com/MohamedMagdy9191">مطور لوحة التحكم </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          @if(Auth::user()->role == 1)
          <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin ">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0 mt-2" style="font-size: 1rem">عدد الباقات</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div style="background-color:#F3F4F6;border-radius:50px;box-shadow: 0px 0px 20px red;" class="text-center">
                          <p class="text-cneter text-dark pt-1 pl-2 pr-2 pb-1" style="font-size: 1rem">{{ $package_count }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin ">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0 mt-2" style="font-size: 1rem">عدد الاسهم</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div style="background-color:#F3F4F6;border-radius:50px;box-shadow: 0px 0px 20px red;" class="text-center">
                          <p class="text-cneter text-dark pt-1 pl-2 pr-2 pb-1" style="font-size: 1rem">{{ $share_count }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin ">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0 mt-2" style="font-size: 1rem">عدد المشرفين</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div style="background-color:#F3F4F6;border-radius:50px;box-shadow: 0px 0px 20px red;" class="text-center">
                          <p class="text-cneter text-dark pt-1 pl-2 pr-2 pb-1" style="font-size: 1rem">{{ $supervisor_count }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin ">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0 mt-2" style="font-size: 1rem">عدد الرسائل</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div style="background-color:#F3F4F6;border-radius:50px;box-shadow: 0px 0px 20px red;" class="text-center">
                          <p class="text-cneter text-dark pt-1 pl-2 pr-2 pb-1" style="font-size: 1rem">{{ $inbox_count }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin ">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0" style="font-size: 1rem">عدد العملاء المقبولين</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div style="background-color:#F3F4F6;border-radius:50px;box-shadow: 0px 0px 20px red;" class="text-center">
                          <p class="text-cneter text-dark pt-1 pl-2 pr-2 pb-1" style="font-size: 1rem">{{ $accepted_user_count }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin ">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0" style="font-size: 1rem">عدد العملاء فى قائمة الانتظار</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div style="background-color:#F3F4F6;border-radius:50px;box-shadow: 0px 0px 20px red;" class="text-center">
                          <p class="text-cneter text-dark pt-1 pl-2 pr-2 pb-1" style="font-size: 1rem">{{ $wait_user_count }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin ">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0" style="font-size: 1rem">عدد الاشتراكات المقبولة</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div style="background-color:#F3F4F6;border-radius:50px;box-shadow: 0px 0px 20px red;" class="text-center">
                          <p class="text-cneter text-dark pt-1 pl-2 pr-2 pb-1" style="font-size: 1rem">{{ $accepted_package_count }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin ">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0" style="font-size: 1rem">عدد الاشتراكات فى قائمة الانتظار</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div style="background-color:#F3F4F6;border-radius:50px;box-shadow: 0px 0px 20px red;" class="text-center">
                          <p class="text-cneter text-dark pt-1 pl-2 pr-2 pb-1" style="font-size: 1rem">{{ $wait_package_count }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          
          
          </div>
          @endif

          @if(Auth::user()->role == 2)
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin ">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0 mt-2" style="font-size: 1rem">عدد العملاء</h3>
                        </div>
                      </div>
                      <div class="col-3">
                      <div style="background-color:#F3F4F6;border-radius:50px;box-shadow: 0px 0px 20px red;" class="text-center">
                        <p class=" text-cneter text-dark pt-1 pl-2 pr-2 pb-1" style="font-size: 1rem">
                          {{ $result_supervisor_count }}               
                        </p>
                      </div>
                    </div>
                </div>
              </div>
          @endif
      
        
        
        

        
    
@endsection
  