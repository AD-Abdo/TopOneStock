                      <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">الكود</label>
                        <div class="col-sm-4">
                          <input type="number" name="code" id="code" min="1" class="form-control cairo" id="code" placeholder=" كود السهم" value="{{ isset($row)? $row->code : old('code')}}" >
                            
                          
                        </div>
                        <label for="name" class="col-sm-2 col-form-label">الاسم</label>
                        <div class="col-sm-4">
                          <input type="text" id="name" name="name" class="form-control cairo" id="name" placeholder=" اسم السهم" value="{{ isset($row)? $row->name : old('name')}}">
                        </div>
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('code'))
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('code')}}</p>
                                  @endif
                                </div>
                            
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('name'))
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('name')}}</p>
                                  @endif
                                </div>
                            
                        </div>
                      @endif
                      <div class="form-group row">
                        <label for="buy_date" class="col-sm-2 col-form-label">تاريخ الشراء</label>
                        <div class="col-sm-4">
                          <input type="date" name="buy_date" id="buy_date" dateformat="d M y"  class="form-control cairo" id="buy_date" placeholder=" تاريخ الشراء السهم" value="{{ isset($row)? $buy_date : old('buy_date')}}"> 
                        </div>
                        <label for="buy_time" class="col-sm-2 col-form-label">وقت الشراء</label>
                        <div class="col-sm-4">
                          <input type="time" name="buy_time" id="buy_time" class="form-control cairo" id="buy_time" placeholder="وقت الشراء السهم" value="{{ isset($row)? $buy_time : old('buy_time')}}">
                        </div>
                      </div>
                      
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('buy_date') )
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('buy_date')}}</p>
                                  @endif
                                </div>
                            
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('buy_time') )
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('buy_time')}}</p>
                                  @endif
                                </div>
                            
                        </div>
                      @endif
                      <div class="form-group row">
                        <label for="sell_date" class="col-sm-2 col-form-label">تاريخ البيع</label>
                        <div class="col-sm-4">
                          <input type="date" name="sell_date" id="sell_date" class="form-control cairo" id="sell_date" placeholder=" تاريخ بيع السهم" value="{{ isset($row)? $sell_date : old('sell_date')}}">
                        </div>
                        <label for="sell_time" class="col-sm-2 col-form-label">وقت البيع</label>
                        <div class="col-sm-4">
                          <input type="time" name="sell_time" id="sell_time" class="form-control cairo" id="sell_time" placeholder="وقت بيع السهم" value="{{ isset($row)? $sell_time : old('sell_time')}}">
                        </div>
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('sell_date') )
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('sell_date')}}</p>
                                  @endif
                                </div>
                            
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('sell_time') )
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('sell_time')}}</p>
                                  @endif
                                </div>
                            
                        </div>
                      @endif
                      <div class="form-group row">
                        <label for="buy_salary" class="col-sm-2 col-form-label">سعر الشراء</label>
                        <div class="col-sm-4">
                          <input type="number" name="buy_salary" id="buy_salary" step="any" class="form-control cairo" id="buy_salary" placeholder=" سعر شراء السهم" value="{{ isset($row)? $row->buy_salary : old('buy_salary')}}">
                        </div>
                        <label for="sell_salary" class="col-sm-2 col-form-label">سعر البيع</label>
                        <div class="col-sm-4">
                          <input type="number" name="sell_salary" id="sell_salary" step="any" class="form-control cairo" id="sell_salary" placeholder=" سعر بيع السهم" value="{{ isset($row)? $row->sell_salary : old('sell_salary')}}">
                        </div>
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('buy_salary') )
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('buy_salary')}}</p>
                                  @endif
                                </div>
                            
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('sell_salary') )
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('sell_salary')}}</p>
                                  @endif
                                </div>
                            
                        </div>
                      @endif
                      <div class="form-group row">
                        <label for="no_cookies" class="col-sm-2 col-form-label">عدد الجلسات</label>
                        <div class="col-sm-4">
                          <input type="number" name="no_cookies" id="no_cookies" class="form-control cairo" id="no_cookies" placeholder=" عدد جلسات السهم" value="{{ isset($row)? $row->no_cookies : old('no_cookies')}}">
                        </div>
                        
                      </div>
                      @if($errors->any())
                        <div class="row">
                            @if($errors->has('no_cookies'))
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('no_cookies')}}</p>
                                </div>
                            @endif
                        </div>
                            
                      @endif
                      
                      
                      