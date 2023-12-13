
@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - جدول العملاء';
@endphp 

@section('content')

    <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">جدول العملاء المضافة من قبل المشرفين</h3>
              @if(Auth::user()->role == 2)
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.client.create') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-plus  d-md-block"></i> </a></li>
                </ol>
              </nav>
              @endif
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table">
                        
                        <thead>
                          @if(Auth::user()->role == 1)
                           <tr>
                            <form method="POST" action="{{ route('admin.client.filter') }}">
                              @csrf
                              @method('post')
                              
                              
                              <td colspan="4">
                                <div class="col-sm-12">
                                  <input type="text" name="name" class="form-control cairo" id="name" placeholder=" البحث باسم المستخدم" value="{{ isset($row)? $row->name : old('name')}}" >
                                      
                                    
                                  
                                  
                                </div>
                              </td>
                              
                              
                              <td colspan="1"><input type="submit" class="btn btn-success w-100" value="بحث"></td>
                              <td colspan="1"><a href="{{ route('admin.client.index') }}" class="btn btn-danger w-100" >X</a></td>
                            </form>

                          </tr>
                          @endif
                          <tr>
                            @if(Auth::user()->role == 1)
                              <td colspan="6"></td>
                            @elseif(Auth::user()->role == 1)
                              <td colspan="5"></td>
                            @endif
                              

                          </tr>
                          <tr>
                            <th>الاسم</th>
                            <th>رقم الهاتف</th>
                            
                            @if(Auth::user()->role == 1)
                              <th>مضاف من قبل</th>
                            @endif
                            @if(Auth::user()->role == 1)
                              <th colspan="3" class="text-center">الحالة</th>
                            @elseif(Auth::user()->role == 2)
                              <th colspan="1" class="text-center">الحالة</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @if(Auth::user()->role == 1)
                            @if(count($rows) > 0)
                              @foreach($rows as $row)
                                <tr>
                                  <td>{{ $row->Customer->name }}</td>
                                  <td>{{ $row->Customer->phone }}	</td>
                                  <td>{{ $row->Supervisor->name }}	</td>
                                  
                                  <td><a href="{{ route('admin.client.show',$row->id) }}" class="btn btn-info"><i class="mdi mdi-eye  d-md-block pl-1"></i></a></td>
                                  <td><a href="{{ route('admin.client.edit',$row->Customer->id) }}" class="btn btn-primary"><i class="mdi mdi-pencil  d-md-block pl-1"></i></a></td>

                                  
                                  
                                  <td class="text-center" colspan="1">
                                    <form action="{{ route('admin.client.delete', $row->id ) }}" method="POST">
                                      @csrf
                                      @method('POST')
                                        <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete  d-md-block pl-1"></i></button>
                                    
                                    </form>
                                  </td>
                                  
                                </tr>
                              @endforeach
                            @else
                                @if(Auth::user()->role == 1)
                                        <td colspan="6" class="text-center">لا يوجد أى عميل</td>
                                @elseif(Auth::user()->role == 2)
                                        <td colspan="5" class="text-center">لا يوجد أى عميل</td>
                                @endif
                            @endif
                          @elseif(Auth::user()->role == 2)
                              @if(count($rows) > 0)
                                @foreach($rows as $row)
                                  @if(Auth::user()->id == $row->supervisor_id)
                                  <tr>
                                    <td>{{ $row->Customer->name }}</td>
                                    <td>{{ $row->Customer->phone }}	</td>
                                    @if(Auth::user()->role == 2)
                                    <td class="text-center"><a href="{{ route('admin.client.show',$row->id) }}" class="btn btn-info"><i class="mdi mdi-eye  d-md-block pl-1"></i></a></td>
                                    
                                    @elseif(Auth::user()->role == 1)
                                    <td><a href="{{ route('admin.client.show',$row->id) }}" class="btn btn-info"><i class="mdi mdi-eye  d-md-block pl-1"></i></a></td>
                                    <td><a href="{{ route('admin.client.edit',$row->Customer->id) }}" class="btn btn-primary"><i class="mdi mdi-pencil  d-md-block pl-1"></i></a></td>

                                    
                                    
                                    <td class="text-center" colspan="1">
                                      <form action="{{ route('admin.client.delete', $row->id ) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                          <button type="submit" class="btn btn-danger w-100">X</i></button>
                                      
                                      </form>
                                    </td>
                                    @endif
                                    
                                  </tr>
                                  
                                  @endif
                                @endforeach
                              @else
                                  <tr>
                                      @if(Auth::user()->role == 1)
                                        <td colspan="6" class="text-center">لا يوجد أى عميل</td>
                                      @elseif(Auth::user()->role == 2)
                                        <td colspan="5" class="text-center">لا يوجد أى عميل</td>
                                      @endif
                                  </tr>
                              @endif
                          @else
                            <tr>
                                      @if(Auth::user()->role == 1)
                                        <td colspan="6" class="text-center">لا يوجد أى عميل</td>
                                      @elseif(Auth::user()->role == 2)
                                        <td colspan="5" class="text-center">لا يوجد أى عميل</td>
                                      @endif
                            </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
             {{ $rows->links() }}
            </div>
          </div>
@endsection