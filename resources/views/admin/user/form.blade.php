                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">اسم المستخدم</label>
                        <div class="col-sm-4">
                          <input type="text" name="name" class="form-control cairo" id="name" placeholder=" اسم المستخدم" value="{{ isset($row)? $row->name : old('name')}}" >
                            
                          
                        </div>
                        <label for="email" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                        <div class="col-sm-4">
                          <input type="email" name="email" id="email" class="form-control cairo" placeholder=" البريد الالكتروني" value="{{ isset($row)? $row->email : old('email')}}">
                        </div>
                        
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('name'))
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('name')}}</p>
                                  @endif
                                </div>
                            
                                <div class="col-sm-2"></div>
                                  <div class="col-sm-4  text-center" >
                                    @if($errors->has('email') )
                                      <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('email')}}</p>
                                    @endif
                                  </div>
                                
                            
                        </div>
                      @endif
                        
                      
                      
                      
                     
                      
                      
                      
                      
                     
                      
                      
                      
                      
                     
                      
                      