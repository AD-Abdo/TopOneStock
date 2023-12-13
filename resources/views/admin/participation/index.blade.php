
@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - جدول اشتراكات الباقات';
@endphp 

@section('content')

    <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">اشتراكات الباقات </h3>
              
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table">
                        
                        <thead>
                           <tr>
                            <form method="POST" action="{{ route('admin.participation.filter') }}">
                              @csrf
                              @method('post')
                              
                              
                              <td colspan="6">
                                <select class="form-control" name="confirm">
                                  <option selected disabled>اختر الحالة</option>
                                  @if(isset($confirm))
                                    @if($confirm == 1)
                                      <option selected value="1">الاشتراكات المفعلة</option>
                                    @else
                                      <option value="1">الاشتراكات المفعلة</option>
                                    @endif
                                    @if($confirm == 0)
                                      <option value="0" selected> الاشتراكات الغير المفعلة </option>
                                    @else
                                      <option value="0">الاشتراكات الغير المفعلة</option>
                                    @endif
                                  @else
                                    <option value="1">الاشتراكات المفعلة</option>
                                    <option value="0">الاشتراكات الغير المفعلة</option>
                                  @endif
                                </select>
                              </td>
                              
                              <td colspan="1"><input type="submit" class="btn btn-success w-100" value="بحث"></td>
                              <td colspan="1"><a href="{{ route('admin.participation.index') }}" class="btn btn-danger " >X</a></td>

                            </form>

                          </tr>
                          <tr>
                              <td colspan="8"></td>
                              

                          </tr>
                          <tr>
                            <th>الاسم العميل</th>
                            <th>البريد الالكتروني</th>
                            <th>اسم الباقة</th>
                            <th>سعر الباقة</th>
                            <th>التاريخ</th>
                            <th>الوقت</th>
                            <th class="text-center">الحالة</th>
                            <th class="text-center">العمليات</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($rows) > 0)
                            @foreach($rows as $row)
                              <tr>
                                <td>{{ $row->User->name }}</td>
                                <td>{{ $row->User->email }}	</td>
                                <td>{{ $row->Package->name }}</td>
                                <td>
                                  @if($row->Package->salary == 0)
                                      مجانية
                                    @else
                                    {{ $row->Package->salary }} ريال
                                    @endif
                                </td>
                                
                                @php
                                  $datetime = explode(' ',$row->created_at);
                                  $date = $datetime[0];
                                  $time = $datetime[1];
                                @endphp
                                <td>{{ $date }}</td>
                                <td>{{ $time }}</td>
                                
                                
                                <td class="text-center">
                                  <form action="{{ route('admin.participation.update', $row->id ) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @if($row->confirm == 1)
                                      <button type="submit" class="btn btn-success w-100">تفعيل</i></button>
                                    @else
                                      <button type="submit" class="btn btn-danger w-100">الغاء التفعيل</i></button>
                                    @endif
                                  </form>
                                </td>
                                <td>
                                  <form action="{{ route('admin.participation.destroy',$row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete d-md-block pl-1"></i></button>
                                  </form>
                                
                                </td>
                              </tr>
                            @endforeach
                          @else
                              <tr>
                                <td colspan="8" class="text-center">لا يوجد أى أشتراكات للعملاء</td>
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