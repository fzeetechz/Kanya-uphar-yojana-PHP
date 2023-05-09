<?php
namespace Modules\Front\Http\Controllers;

use App\Models\{Registration,Plan};
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RegistrationController extends Controller
{
    
    public function findRegistration()
    {
        return view('front::registrations.find_registration');
    }
    public function show()
    {
        return view('front::registrations.show');
    }

    public function create()
    {
        $plans = Plan::all();
        return view('front::registrations.create',compact('plans'));
    }
 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mobile'    => 'required',
            'email'     => 'required',
            'amount'    => 'required',
            'full_name' => 'required',
        ]);
        try {
            $registration_number=Registration::latest()->first();
            Registration::create([
                'mobile'    => $request->mobile,
                'email'     => $request->email,
                'amount'    => $request->amount,
                'full_name' => $request->full_name,
                'registration_number' => ($registration_number ? $registration_number->registration_number+1: 1000),
            ]);
            toastr()->success('Banner Created successfully!');
            return redirect()->route('front.registrations.create');
        } catch (\Exception $e) {
            toastr()->error('Something is wrong error!.'.$e->getMessage());
            return redirect()->back();
        } catch (\Throwable $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            return redirect()->back();
        }
    }
    public function showDetail(Request $request)
    {
        $validatedData = $request->validate([
            'registration_number' => 'required|exists:registrations,registration_number',
        ]);
        try {
            $data= Registration::where('registration_number',$request->registration_number)->first();
            return view('front::registrations.show',compact('data'));

        } catch (\Throwable $th) {
            toastr()->error('Something is wrong error!',$th->getMessage());
            return redirect()->back();
        }
    }
}