                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">الاسم</label>
                        <div class="col-sm-4">
                          <input type="text" name="name" class="form-control cairo" id="name" placeholder=" الاسم" value="{{ isset($row)? $row->name : old('name')}}" >
                            
                          
                        </div>
                        <label for="phone" class="col-sm-2 col-form-label">رقم الهاتف</label>
                        <div class="col-sm-4">
                          <input type="text" name="phone" class="form-control cairo" id="phone" placeholder=" رقم الهاتف" value="{{ isset($row)? $row->phone : old('phone')}}" >
                            
                          
                        </div>
                        
                        
                      </div>
                        <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                        <div class="col-sm-10">
                          <input type="text" name="email" id="email"  class="form-control cairo" id="email" placeholder=" البريد الالكتروني" value="{{ isset($row)? $row->email : old('email')}}">
                        </div>
                        
                        
                      </div>
                      <div class="form-group row">
                        <label for="content" class="col-sm-2 col-form-label">الرسالة</label>
                        <div class="col-sm-10">
                          <textarea id="content" rows="5" style="line-height: 2rem" class="form-control cairo" placeholder=" رسالة العميل" value="{{ isset($row)? $row->content : old('content')}}">{{ isset($row)? $row->content : old('content')}}</textarea>
                        </div>
                      </div>
                     
                     