<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\{Banner,QrCode,Bank,Plan,GalleryPhoto,AboutUsPage,ContactUsPage,Address,Email,ContactNumber,ContactUs,HomePageContent};

class FrontController extends Controller{
    public function index(){
        try {
            $banners           = Banner::all();
            $home_page_content = HomePageContent::first();
            $plans = Plan::all();
            return view('front::index',compact('banners','home_page_content','plans'));
        }
        catch (\Exception $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            return redirect()->back();
        } catch (\Throwable $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            return redirect()->back();
        }
    }
    public function about(){
        try {
            $data=AboutUsPage::first();
            return view('front::about',compact('data'));
        }
        catch (\Exception $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            return redirect()->back();
        } catch (\Throwable $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            return redirect()->back();
        }
    }
    public function paymentDetails(){
        try {
            $qrCode=QrCode::first();
            $data= Bank::first();
            return view('front::payment_details.show',compact('data','qrCode'));
        }
        catch (\Exception $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            return redirect()->back();
        } catch (\Throwable $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            return redirect()->back();
        }
    }
    public function gallery(){
        try {
            $images=GalleryPhoto::Where('status','1')->get();
            return view('front::gallery',compact('images'));
        }
        catch (\Exception $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            return redirect()->back();
        } catch (\Throwable $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            return redirect()->back();
        }
    }
    public function contact(){
        try {
            $data    = ContactUsPage::first();
            $address = Address::where('default_status','1')->first();
            $email   = Email::where('default_status','1')->first();
            $contact_number = ContactNumber::where('default_status','1')->first();
            return view('front::contact',compact('data','address','email','contact_number'));
        }
        catch (\Exception $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            return redirect()->back();
        } catch (\Throwable $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            return redirect()->back();
        }
    }

    public function contactUsStore(Request $request){
        $validatedData = $request->validate([
            'mobile'    => 'required',
            'email'     => 'required',
            'name'      => 'required',
        ]);
        try {
            ContactUs::create($request->all());
            toastr()->success('Request Sent Successfully!');
            return redirect()->back(); 
        } catch (\Exception $e) {
            toastr()->error('Something is wrong error!.'.$e->getMessage());
            return redirect()->back();
        } catch (\Throwable $e) {
            toastr()->error('Something is wrong error!',$e->getMessage());
            return redirect()->back();
        }
    }

}
