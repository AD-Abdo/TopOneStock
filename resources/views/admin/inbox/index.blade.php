
@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - البريد';
@endphp 

@section('content')

    <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">البريد </h3>
              
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table">
                        
                        <thead>
                           <tr>
                            <form method="POST" action="{{ route('admin.inbox.filter') }}">
                              @csrf
                              @method('post')
                              
                              <td colspan="2"><input type="text" name="name" class="form-control" value="@isset($name) {{ $name}} {{ old('name') }} @endisset" placeholder="اسم المرسل"></td>
                              <td colspan="2"><input type="email" name="email" class="form-control" value="@isset($email) {{ $email}} {{ old('email') }} @endisset" placeholder="البريد الالكتروني"></td>
                              
                              <td colspan="1"><input type="submit" class="btn btn-success w-100" value="بحث"></td>
                              <td colspan="1"><a href="{{ route('admin.inbox.index') }}" class="btn btn-danger " >X</a></td>
                            </form>

                          </tr>
                          <tr>
                              <td colspan="6"></td>
                              

                          </tr>
                          <tr>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th>رقم الهاتف</th>
                            <th>الرسالة</th>
                            <th colspan="2" class="text-center">العمليات</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($rows) > 0)
                            @foreach($rows as $row)
                              <tr>
                                <td> {{ $row->name }}</td>
                                <td> {{ $row->email }}</td>
                                <td> {{ $row->phone }}</td>
                                <td>
                                  @if(Str::length($row->content)<=50)
                                    {{ $row->content }}
                                  @else
                                    {{ Str::limit($row->content,50) }} الخ
                                  @endif
                                </td>
                                
                                <td><a href="{{ route('admin.inbox.show', $row->id) }}" class="btn btn-info"><i class="mdi mdi-eye  d-md-block pl-1"></i></a></td>
                                <td>
                                  <form action="{{ route('admin.inbox.destroy',$row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete d-md-block pl-1"></i></button>
                                  </form>
                                
                                </td>
                              </tr>
                            @endforeach
                          @else
                              <tr>
                                <td colspan="6" class="text-center">لا يوجد أى رسائل</td>
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