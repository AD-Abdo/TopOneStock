                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">اسم الباقة</label>
                        <div class="col-sm-4">
                          <input type="text" name="name" class="form-control cairo" id="name" placeholder=" اسم الباقة" value="{{ isset($row)? $row->name : old('name')}}" >
                            
                          
                        </div>
                        <label for="salary" class="col-sm-2 col-form-label">سعر الباقة</label>
                        <div class="col-sm-4">
                          <input type="number" name="salary" id="salary" step="any" class="form-control cairo" id="salary" placeholder=" سعر الباقة" value="{{ isset($row)? $row->salary : old('salary')}}">
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
                                    @if($errors->has('salary') )
                                      <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('salary')}}</p>
                                    @endif
                                  </div>
                                
                            
                        </div>
                      @endif
                      
                      
                     
                      
                      <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">تفاصيل الباقة</label>
                        <div class="col-sm-10">
                          <input type="text" id="description" name="description" class="form-control cairo" id="description" placeholder=" تفاصيل الباقة" value="{{ isset($row)? $row->description : old('description')}}">
                        </div>
                        
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                
                              <div class="col-sm-2"></div>
                                <div class="col-sm-10  text-center" >
                                  @if($errors->has('description'))
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('description')}}</p>
                                  @endif
                                </div>
                            
                                
                            
                        </div>
                      @endif
                      
                      
                      
                      