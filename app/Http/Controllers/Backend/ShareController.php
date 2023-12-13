<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Share;

class ShareController extends BackendController
{
    public function __construct(Share $model)
    {
        parent::__construct($model);        
    } 

    
    public function message(){
        return [
            'code.required' => 'كود السهم مطلوب',
            'name.required' => 'اسم السهم مطلوب',
            'buy_date.required' => 'تاريخ شراء السهم مطلوب',
            'buy_time.required' => 'وقت شراء السهم مطلوب',
            'sell_date.required' => 'تاريخ بيع السهم مطلوب',
            'sell_time.required' => 'وقت بيع السهم مطلوب',
            'buy_salary.required' => 'سعر شراء السهم مطلوب',
            'sell_salary.required' => 'سعر بيع السهم مطلوب',
            'no_cookies.required' => 'عدد الجلسات مطلوبة',
        ];
    }

    public function getStatus($sell_salary , $buy_salary){
        $sell_salary > $buy_salary ? $status = 1 : $status = 0;
        return $status;
    }

    public function getProfit($sell_salary , $buy_salary){
        $profit = ($sell_salary - $buy_salary)/$buy_salary*100;
        $profit = round($profit,2);
        return $profit;
    }

    public function MixData($date , $time){
        $hours = $time[0].$time[1];
        
        $minutes = $time[3].$time[4];
        
        $hours >= 12 ? $wheter = 'مساءا' : $wheter = 'صباحا';
        $hours >= 12 ? $hours = $hours-12 : $hours;
        if($wheter == 'مساءا'){
            
                return $date.' '.'0'.$hours.':'.$minutes.' '.$wheter;
            
        }else{
          
                return $date.' '.$hours.':'.$minutes.' '.$wheter;
            
        }
        
                
    }

    public function store(Request $request){
        
        $request->validate([
            'code' =>'required',
            'name' => 'required',
            'buy_date' => 'required',
            'buy_time' => 'required',
            'sell_date' => 'required',
            'sell_time' => 'required',
            'buy_salary' => 'required',
            'sell_salary' => 'required',
            'no_cookies' => 'required'
        ],$this->message());
        

        
        $share = new Share();
        $share->code = $request->code;
        $share->name = $request->name;
        $share->buy_date = $this->MixData($request->buy_date,$request->buy_time);
        $share->sell_date = $sell = $this->MixData($request->sell_date,$request->sell_time);
        $share->buy_salary = $request->buy_salary;
        $share->sell_salary = $request->sell_salary;
        $share->no_cookies = $request->no_cookies;
        $share->status = $this->getStatus($request->sell_salary,$request->buy_salary);
        $share->profit = $this->getProfit($request->sell_salary,$request->buy_salary);
        $share->save();

        return redirect()->route('admin.share.index')->with('message','تم أضافة السهم بنجاح');
        
        
    }
    public function update(Request $request,$id){
        $row = Share::findOrFail($id);

        $request->validate([
            'code' =>'required',
            'name' => 'required',
            'buy_date' => 'required',
            'buy_time' => 'required',
            'sell_date' => 'required',
            'sell_time' => 'required',
            'buy_salary' => 'required',
            'sell_salary' => 'required',
            'no_cookies' => 'required'
        ],$this->message());
        $row->update([
            'code' => $request->code,
            'name' => $request->name,
            'buy_date' => $this->MixData($request->buy_date,$request->buy_time),
            'buy_salary' => $request->buy_salary,
            'sell_date' => $this->MixData($request->sell_date,$request->sell_time),
            'sell_salary' => $request->sell_salary,
            'no_cookies' => $request->no_cookies,
            'status' => $this->getStatus($request->sell_salary,$request->buy_salary),
            'profit' => $this->getProfit($request->sell_salary,$request->buy_salary)
        ]);
        return redirect()->route('admin.share.edit',$row->id)->with('message','تم تعديل السهم بنجاح');

    }

    protected function getSuccessDateAndTime($date){
        $all = explode(' ',$date);
        $date = $all[0];
        $first_time = $all[1];
        $hours = $first_time[0].$first_time[1];
        $minutes = $first_time[3].$first_time[4];
        $wheter = $all[2];
        $wheter == "مساءا" ? $hours = $hours +12 : $hours = $hours;
        $time = $hours.':'.$minutes; 
        return [$date , $time];

    }

    public function show($id){
        $row = $this->model->findOrFail($id);
        $buy = $this->getSuccessDateAndTime($row->buy_date);
        $buy_date = $buy[0];
        $buy_time = $buy[1];

        $sell = $this->getSuccessDateAndTime($row->sell_date);
        $sell_date = $sell[0];
        $sell_time = $sell[1];

        return view('admin.'.$this->getLowerModelName().'.show', compact('row','buy_date','buy_time','sell_date','sell_time'));
    }

    public function edit($id){
        $row = $this->model->findOrFail($id);
        $buy = $this->getSuccessDateAndTime($row->buy_date);
        $buy_date = $buy[0];
        $buy_time = $buy[1];

        $sell = $this->getSuccessDateAndTime($row->sell_date);
        $sell_date = $sell[0];
        $sell_time = $sell[1];

        
        return view('admin.'.$this->getLowerModelName().'.edit', compact('row','buy_date','buy_time','sell_date','sell_time'));
    }
    public function destroy($id){
        $row = Share::findOrFail($id);
        $row->delete();

        return redirect()->route('admin.share.index')->with('message','تم حذف السهم بنجاح');
    }
    public function filter(Request $request){
        if($request->name != null && $request->has('status')&& $request->code != null){
            $rows = Share::query()->where('name',$request->name)->where('code',$request->code)->where('status',$request->status)->paginate(5);
            return view('admin.share.index',compact('rows'));
        }
        else if ($request->name != null && $request->code == null){
            $rows = Share::query()->where('name',$request->name)->paginate(5);
            return view('admin.share.index',compact('rows'));
        }
        else if ($request->name == null && $request->code != null){
            $rows = Share::query()->where('code',$request->code)->paginate(5);
            return view('admin.share.index',compact('rows'));
        }
        else if ($request->has('status')){
            $rows = Share::query()->where('status',$request->status)->paginate(5);
            return view('admin.share.index',compact('rows'));
        }
        else if ($request->name != null && $request->has('status')){
            $rows = Share::query()->where('name',$request->name)->where('status',$request->status)->paginate(5);
            return view('admin.share.index',compact('rows'));
        }
        else if ($request->name != null && $request->code != null){
            $rows = Share::query()->where('name',$request->name)->where('code',$request->code)->paginate(5);
            return view('admin.share.index',compact('rows'));
        }
        else if ($request->has('status') && $request->code != null){
            $rows = Share::query()->where('code',$request->code)->where('status',$request->status)->paginate(5);
            return view('admin.share.index',compact('rows'));
        }
        else{
            return redirect()->route('admin.share.index');
        }
    }

}