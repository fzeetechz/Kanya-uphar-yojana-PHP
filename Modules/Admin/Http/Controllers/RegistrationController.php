<?php
namespace Modules\Admin\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\{Registration,Plan};
use Carbon\Carbon;
use Auth;
use DB;

class RegistrationController extends Controller
{
    function __construct() {
        $this->pageName = "Registrations";
        $this->middleware('permission:Registrations-list|Registrations-create|Registrations-edit|Registrations-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:Registrations-create',['only' => ['create','store']]);
        $this->middleware('permission:Registrations-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:Registrations-delete',['only' => ['destroy']]);
        $this->middleware('permission:Registrations-list',  ['only' => ['index']]);
        $this->middleware('permission:Registrations-show',  ['only' => ['show']]);
    }
    public function index(Request $request)
    {
        $week_date = Carbon::today()->subDays(7);
        switch (@$request->query('filter')) {
            case 'today':
                $registrations = Registration::whereDate('created_at', Carbon::today())->where(function($query) {
                    if (!Auth::user()->hasRole('Admin')) {
                        $query->where('user_id',"=",Auth::user()->id);
                    }
                })->get();
                break;
            case 'this_week':
                $registrations = Registration::where('created_at', '>=', $week_date->startOfDay())->where(function($query) {
                    if (!Auth::user()->hasRole('Admin')) {
                        $query->where('user_id',"=",Auth::user()->id);
                    }
                })->get();
                break;
            case 'this_month':
                $registrations = Registration::where("created_at",">", Carbon::now()->subMonths(1))->where(function($query) {
                    if (!Auth::user()->hasRole('Admin')) {
                        $query->where('user_id',"=",Auth::user()->id);
                    }
                })->get();
                break;
            default:
                $registrations = Registration::where(function($query) {
                    if (!Auth::user()->hasRole('Admin')) {
                        $query->where('user_id',"=",Auth::user()->id);
                    }
                })->orderBy('id','desc')->get();
                break;
            }
        return view('admin::registrations.index',compact('registrations'))->with('pageName',$this->pageName);
    }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
    public function create()
    {
        $plans = Plan::all();
        return view('admin::registrations.create_edit',compact('plans'))->with('pageName',$this->pageName);
    }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
    public function generateRegistrationNumber($id = null)
    {
        if($id !=null){
            return  Registration::find($id)->registration_number;
        }
        elseif ($id ==null) {
            $registration_number =  Registration::select('registration_number')->orderBy('id', 'desc')->first()->registration_number;
            return (@$registration_number ? @$registration_number+1: 1000);
            
        }
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'mobile'      => 'required',
            'email'       => 'email',
            'amount'      => 'required',
            'full_name'   => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'address'     => 'required',
            'plan_id'     => 'required',
            'document'    => 'sometimes|required',
        ]);
        try {
            if ($request->hasfile("document")){
                $document = upload($request->document,"registration_documents");
            }
            @$registration_number = $this->generateRegistrationNumber($request->id);
            Registration::updateOrCreate(['id'=>@$request->id],[
                'mobile'      => $request->mobile,
                'email'       => $request->email,
                'amount'      => $request->amount,
                'full_name'   => $request->full_name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'address'     => $request->address,
                'plan_id'     => $request->plan_id,
                'document'    => @$document ? @$document: Registration::find($request->id)->document,
                'user_id'     => Auth::user()->id,
                'registration_number' => @$registration_number,
            ]);
            DB::commit();
            toastr()->success('Saved Successfully !');
            return redirect()->route('registrations.index');
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
        $data = Registration::find($id);
        return view('admin::registrations.show',compact('data'))->with('pageName',$this->pageName);
    }
    public function edit($id)
    {
        $data = Registration::find($id);
        $plans = Plan::all();
        return view('admin::registrations.create_edit',compact('data','plans'))->with('pageName',$this->pageName);
    }
}
