
@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - جدول المشرفين';
@endphp 

@section('content')

    <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">جدول المشرفين </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.user.create') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-plus  d-md-block"></i> </a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table">
                        
                        <thead>
                           <tr>
                            <form method="POST" action="{{ route('admin.user.filter') }}">
                              @csrf
                              @method('post')
                              
                              <td colspan="1"><input type="text" name="name" class="form-control" value="@isset($name) {{ $name}} {{ old('name') }} @endisset" placeholder="اسم المشرف"></td>
                              <td colspan="1"><input type="email" name="email" class="form-control" value="@isset($email) {{ $email}} {{ old('email') }} @endisset" placeholder="البريد الالكتورني"></td>
                              
                              
                              <td colspan="1"><input type="submit" class="btn btn-success w-100" value="بحث"></td>
                              <td colspan="1"><a href="{{ route('admin.user.index') }}" class="btn btn-danger " >X</a></td>

                            </form>

                          </tr>
                          <tr>
                              <td colspan="4"></td>
                              

                          </tr>
                          <tr>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th colspan="2" class="text-center">العمليات</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($rows) > 0)
                            @foreach($rows as $row)
                              <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}	</td>
                                
                                <td><a href="{{ route('admin.user.show', $row->id) }}" class="btn btn-info"><i class="mdi mdi-eye  d-md-block pl-1"></i></a></td>
                                <td>
                                  <form action="{{ route('admin.user.destroy',$row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete d-md-block pl-1"></i></button>
                                  </form>
                                
                                </td>
                              </tr>
                            @endforeach
                          @else
                              <tr>
                                <td colspan="4" class="text-center">لا يوجد أى مشرف</td>
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