
@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - جدول الاسهم';
@endphp 

@section('content')

    <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">جدول الاسهم </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.share.create') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-plus  d-md-block"></i> </a></li>
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
                            <form method="POST" action="{{ route('admin.share.filter.post') }}">
                              @csrf
                              @method('post')
                              <td colspan="3"><input type="number" name="code" class="form-control" placeholder="كود السهم"></td>
                              <td colspan="3"><input type="text" name="name" class="form-control" placeholder="اسم السهم"></td>
                              <td colspan="3">
                                <select class="form-control" name="status">
                                  <option disabled selected>اختر حالة السهم</option>
                                  <option value=1>رابحة</option>
                                  <option value="0">خسارة</option>
                                </select>
                              </td>
                              <td><input type="submit" class="btn btn-success w-100" value="بحث"></td>
                            </form>

                          </tr>
                          <tr>
                              <td colspan="10"></td>
                              

                          </tr>
                          <tr>
                            <th>الكود</th>
                            <th>الاسم</th>
                            <th>سعر الشراء</th>
                            <th>سعر البيع</th>
                            <th>عدد الجلسات</th>
                            <th>الحالة</th>
                            <th>نسبة الربح</th>
                            <th colspan="3" class="text-center">العمليات</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(count($rows) > 0)
                            @foreach($rows as $row)
                              <tr>
                                <td>{{ $row->code }}</td>
                                <td>{{ $row->name }}	</td>
                                <td>{{ $row->buy_salary }}</td>
                                <td>{{ $row->sell_salary }}</td>
                                <td>{{ $row->no_cookies }}</td>
                                @if($row->status == 1)
                                <td><label class="badge badge-success">
                                  <i class="mdi mdi-arrow-top-right d-md-block pl-1"></i>  
                                </label></td>
                                @else
                                <td><label class="badge badge-danger">
                                  <i class="mdi mdi-arrow-bottom-left d-md-block pl-1"></i>  
                                </label></td>
                                @endif
                                <td>{{ $row->profit }}</td>
                                <td><a href="{{ route('admin.share.show',$row->id) }}" class="btn btn-info"><i class="mdi mdi-eye  d-md-block pl-1"></i></a></td>
                                <td><a href="{{ route('admin.share.edit',$row->id) }}" class="btn btn-primary"><i class="mdi mdi-pencil  d-md-block pl-1"></i></a></td>
                                <td>
                                  <form action="{{ route('admin.share.destroy',$row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete d-md-block pl-1"></i></button>
                                  </form>
                                
                                </td>
                              </tr>
                            @endforeach
                          @else
                              <tr>
                                <td colspan="10" class="text-center">لا يوجد أى أسهم</td>
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