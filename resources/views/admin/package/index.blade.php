
@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - جدول الباقات';
@endphp 

@section('content')

    <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">جدول الباقات </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.package.create') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-plus  d-md-block"></i> </a></li>
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
                            <form method="POST" action="{{ route('admin.package.filter.post') }}">
                              @csrf
                              @method('post')
                              
                              <td colspan="4"><input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="اسم الباقة"></td>
                              
                              <td><input type="submit" class="btn btn-success w-100" value="بحث"></td>
                              <td colspan="1"><a href="{{ route('admin.package.index') }}" class="btn btn-danger " >X</a></td>
                            </form>

                          </tr>
                          <tr>
                              <td colspan="6"></td>
                              

                          </tr>
                          <tr>
                            <th>اسم الباقة</th>
                            <th>وصف الباقة</th>
                            <th>سعر الباقة</th>
                            <th colspan="3" class="text-center">العمليات</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($rows) > 0)
                            @foreach($rows as $row)
                              <tr>
                                <td>باقة {{ $row->name }}</td>
                                <td>
                                  @if(Str::length($row->description)<=50)
                                    {{ $row->description }}
                                  @else
                                    {{ Str::limit($row->description,50) }} الخ
                                  @endif
                                </td>
                                <td>
                                    @if($row->salary == 0)
                                      مجانية
                                    @else
                                    {{ $row->salary }} ريال
                                    @endif
                                </td>
                                <td><a href="{{ route('admin.package.show', $row->id) }}" class="btn btn-info"><i class="mdi mdi-eye  d-md-block pl-1"></i></a></td>
                                <td><a href="{{ route('admin.package.edit', $row->id) }}" class="btn btn-primary"><i class="mdi mdi-pencil  d-md-block pl-1"></i></a></td>
                                <td>
                                  <form action="{{ route('admin.package.destroy',$row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete d-md-block pl-1"></i></button>
                                  </form>
                                
                                </td>
                              </tr>
                            @endforeach
                          @else
                              <tr>
                                <td colspan="6" class="text-center">لا يوجد أى باقة</td>
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