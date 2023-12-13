                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">اسم المستخدم</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control cairo" id="name" placeholder=" اسم المستخدم" value="{{ isset($row)? $row->name : old('name')}}" >
                            
                          
                        </div>
                        
                        
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10  text-center" >
                                  @if($errors->has('name'))
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('name')}}</p>
                                  @endif
                                </div>
                            
                               
                            
                        </div>
                      @endif
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">رقم الهاتف</label>
                        <div class="col-sm-10">
                          <input type="text" id="phone" name="phone" class="form-control cairo" id="phone" placeholder=" رقم الهاتف" value="{{ isset($row)? $row->phone : old('phone')}}" >
                            
                          
                        </div>
                        
                        
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10  text-center" >
                                  @if($errors->has('phone'))
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('phone')}}</p>
                                  @endif
                                </div>
                            
                               
                                
                            
                        </div>
                      @endif
                        
                      
                      
                      
                     
                      
                      
                      
                      
                     
                      
                      
                      
                      
                     
                      
                      