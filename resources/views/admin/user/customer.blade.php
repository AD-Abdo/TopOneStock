
@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - جدول العملاء';
@endphp 

@section('content')

    <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">جدول العملاء </h3>
              
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table">
                        
                        <thead>
                           <tr>
                            <form method="POST" action="{{ route('admin.customer.filter') }}">
                              @csrf
                              @method('post')
                              
                              <td colspan="1"><input type="text" name="name" class="form-control" value="@isset($name) {{ $name}} {{ old('name') }} @endisset" placeholder="اسم العميل"></td>
                              <td colspan="1"><input type="email" name="email" class="form-control" value="@isset($email) {{ $email}} {{ old('email') }} @endisset" placeholder="البريد الالكتورني"></td>
                              <td colspan="2">
                                <select class="form-control" name="country">
                                  <option selected disabled>اختر الدولة</option>
                                  @if(isset($country))
                                    @if($country == "مصر")
                                      <option selected value="مصر">مصر</option>
                                    @else
                                      <option value="مصر">مصر</option>
                                    @endif
                                    @if($country == "السعودية")
                                      <option selected value="السعودية">السعودية</option>
                                    @else
                                      <option value="السعودية">السعودية</option>
                                    @endif
                                    @if($country == "قطر")
                                      <option selected value="قطر">قطر</option>
                                    @else
                                      <option value="قطر">قطر</option>
                                    @endif
                                  @else
                                    <option value="مصر">مصر</option>
                                    <option value="السعودية">السعودية</option>
                                    <option value="قطر">قطر</option>

                                  @endif
                                  
                                </select>
                              </td>
                              <td colspan="3">
                                <select class="form-control" name="status">
                                  <option selected disabled>اختر الحالة</option>
                                  @if(isset($status))
                                    @if($status == 1)
                                      <option selected value="1">مفعل</option>
                                    @else
                                      <option value="1">مفعل</option>
                                    @endif
                                    @if($status == 0)
                                      <option value="0" selected>غير مفعل</option>
                                    @else
                                      <option value="0">غير مفعل</option>
                                    @endif
                                  @else
                                    <option value="1">مفعل</option>
                                    <option value="0">غير مفعل</option>
                                  @endif
                                </select>
                              </td>
                              
                              
                              <td colspan="1"><input type="submit" class="btn btn-success w-100" value="بحث"></td>
                              <td colspan="1"><a href="{{ route('admin.customer') }}" class="btn btn-danger w-100" >X</a></td>
                            </form>

                          </tr>
                          <tr>
                              <td colspan="9"></td>
                              

                          </tr>
                          <tr>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th>الدولة</th>
                            <th>رقم الهاتف</th>
                            <th>تاريخ التفعيل</th>
                            <th colspan="4" class="text-center">الحالة</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($rows) > 0)
                            @foreach($rows as $row)
                              <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}	</td>
                                <td>{{ $row->country }}	</td>
                                <td>{{ $row->phone }}	</td>
                                <td>
                                  @if($row->agree_date != null)
                                    {{ $row->agree_date }}
                                  @else
                                    غير مفعل
                                  @endif
                                </td>
                                <td><a href="{{ route('admin.customer.show',$row->id) }}" class="btn btn-info"><i class="mdi mdi-eye  d-md-block pl-1"></i></a></td>
                                <td><a href="{{ route('admin.customer.comment',$row->id) }}" class="btn btn-primary">التعليق</a></td>
                                <td class="text-center" colspan="1">
                                  

                                    
                                  <form action="{{ route('admin.customer.update', $row->id ) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @if($row->status == 1)
                                      <button type="submit" class="btn btn-success w-100">مفعل</i></button>
                                    @else
                                      <button type="submit" class="btn btn-danger w-100">غير مفعل</i></button>
                                    @endif
                                  </form>
                                </td>
                                <td class="text-center" colspan="1">
                                  <form action="{{ route('admin.customer.delete', $row->id ) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                      <button type="submit" class="btn btn-danger w-100">X</i></button>
                                   
                                  </form>
                                </td>
                                
                              </tr>
                            @endforeach
                          @else
                              <tr>
                                <td colspan="9" class="text-center">لا يوجد أى عميل</td>
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