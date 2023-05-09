<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Plan;
use DB;

class PlanController extends Controller
{
    function __construct() {
        $this->pageName = "Plans";
        $this->middleware('permission:Plans-list|Plans-create|Plans-edit|Plans-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:Plans-create',['only' => ['create','store']]);
        $this->middleware('permission:Plans-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:Plans-delete',['only' => ['destroy']]);
        $this->middleware('permission:Plans-list',  ['only' => ['index']]);
        $this->middleware('permission:Plans-show',  ['only' => ['show']]);
    }
    
    public function index()
    {
        $plans = Plan::all();
        return view('admin::plans.index',compact('plans'))->with('pageName',$this->pageName);
    }

 
    public function create()
    {
        return view('admin::plans.create_edit')->with('pageName',$this->pageName);
    }

  
    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'amount'    => 'required',
            'name' => 'required',
            'text' => 'required',
            'days' => 'required',
            'image'  => 'sometimes|required',
        ]);
        try {
            if ($request->hasfile("image")){
                $image = upload($request->image,"plans");
            }
            Plan::updateOrCreate(['id'=>@$request->id],[
                'image'        => @$image ? @$image: Plan::find($request->id)->image,
                'text'         => $request->text,
                'amount'       => $request->amount,
                'days'       => $request->days,
                'name'         => $request->name,
            ]);
            DB::commit();
            toastr()->success('Saved Successfully !');
            return redirect()->route('plans.index');
        } catch (\Exception $e) {
            toastr()->error('Something is wrong error!.'.$e->getMessage());
            DB::rollback();
            return redirect()->back();
        } catch (\Throwable $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            DB::rollback();
            return redirect()->back();
        }
    }
    public function show($id){
        $data = Plan::find($id);
        return view('admin::plans.show',compact('data'))->with('pageName',$this->pageName);
    }
    public function edit($id)
    {
        $data = Plan::find($id);
        return view('admin::plans.create_edit',compact('data'))->with('pageName',$this->pageName);
    }

}
