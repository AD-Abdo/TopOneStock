<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Share;


class BackendController extends Controller
{
    protected $model ;

    public function __construct(Model $model){
        
        $this->model = $model;
    }

    public function index(){
        $rows = $this->model::latest();
        
        $rows = $rows->paginate(4);    
        
        return view('admin.'.$this->getLowerModelName().'.index',compact('rows'));

    }

    
    public function create(){
        return view('admin.'.$this->getLowerModelName().'.create');
    }

    

    public function show($id){

        $row = $this->model->find($id);
        return view('admin.'.$this->getLowerModelName().'.show', compact('row'));
    }

    public function edit($id){
        $row = $this->model->find($id);
        return view('admin.'.$this->getLowerModelName().'.edit', compact('row'));
    }

    

    


    //Structure Collection OF Function
    protected function getModelName(){
        return class_basename($this->model);
    }

    protected function getLowerModelName(){
        return strtolower($this->getModelName());
    }

    protected function getPluralModelName(){
        return str_plural($this->getLowerModelName());
    }

}