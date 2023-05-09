<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\{Bank,QrCode,ContactNumber,Email,Address,Setting,HomePageContent};
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class SettingController extends Controller
{
    function __construct() {
      $this->middleware('permission:Settings-Address',['only' => ['Addressstore']]);
      $this->middleware('permission:Settings-Qr-Code',['only' => ['QrCodeStore']]);
      $this->middleware('permission:Settings-Email',['only' => ['Emailstore']]);
      $this->middleware('permission:Settings-Contact-number',['only' => ['Contactnumberstore']]);
      $this->middleware('permission:Settings-Home-page-content',['only' => ['Homepagecontentstore']]);
      $this->middleware('permission:Settings-list',  ['only' => ['index']]);
    }
    public function index(Request $request,$id=null )
    {
        $requesttype = "index";
         $updatedata='';
        switch ($requesttype) {
          case $request->routeIs('settings.contactussettings.address*'):
                $data = Address::orderBy('id', 'desc')->get();
                if ($id) {
            try {
                  $updatedata = Address::findorfail($id);
                } catch (\Exception $ex) {
                  return redirect()->route('settings.contactussettings.address');
                } 
              }
            return view('admin::settings.contactussettings.address.index', compact('data','id','updatedata'));   
            break;
          case $request->routeIs('settings.homepagecontent*'):
                $data = HomePageContent::orderBy('id', 'desc')->get();
                if ($id) {
                  $updatedata = HomePageContent::find($id);
                  if ($updatedata=="") {
                    $addresses = HomePageContent::create(["about_us_text"=>"about_us_text","membership_text"=>"membership_text","contact_us_text"=>"contact_us_text","about_us_image"=>"about_us_image","about_us_video"=>"about_us_video"]);
                  }
                }
            return view('admin::settings.homepagecontent.index', compact('data','id','updatedata'));   
            break;
          case $request->routeIs('settings.contactussettings.email*'):
              if ($id) { $updatedata = Email::findorfail($id);}
              $data = Email::orderBy('id', 'desc')->get();
            return view('admin::settings.contactussettings.email.index', compact('data','id','updatedata'));
            break;
          case $request->routeIs('settings.bank.index*'):
              if ($id) { $updatedata = Bank::findorfail($id);}
              $data = Bank::orderBy('id', 'desc')->get();
            return view('admin::settings.banks.index', compact('data','id','updatedata'));
            break;
          case $request->routeIs('settings.qrcode.index*'):
              if ($id) { $updatedata = QrCode::findorfail($id);}
              $data = QrCode::orderBy('id', 'desc')->get();
           return view('admin::settings.qr_codes.index', compact('data','id','updatedata'));
           break;
          case $request->routeIs('settings.contactussettings.contactnumber*'):
               if ($id) {
               try {
                  $updatedata = ContactNumber::findorfail($id);
                } catch (\Exception $ex) {
                  return redirect()->route('settings.contactussettings.contactnumber');
                }  
              }
                $data = ContactNumber::orderBy('id', 'desc')->get();
            return view('admin::settings.contactussettings.contactnumber.index', compact('data','id','updatedata'));
          break;
          default:
           $data = Setting::orderBy('id', 'desc')->get();
           return view('admin::settings.index', compact('data'));
        }
    }
    
    public function contactussettings()
    {
      return view('admin::settings.create');
    }
    
    public function Addressstore(Request $request,$id=null){ 
      $validatedData = $request->validate([
          'title' => 'required|string|max:100',
          'address' => 'required|string|max:500',
        ]);
      if($request->has('default_status')) 
          {
            $validatedData['default_status']  = request('default_status');
            if (request('default_status')==1) {
               Address::where('default_status', '1')->update(['default_status' => '0']);
            }
          }
     if ($id) {
     try {
          $updatedata = Address::findorfail($id);
          } catch (\Exception $ex) {
          return redirect()->route('settings.contactussettings.address');
        }
          $addresses = Address::where('id',$id)->update($validatedData);
          alert()->Success('Success', 'address update Successfully')->autoclose(3000);
          return redirect()->back();
        }
         $addresses = Address::create($validatedData);
         alert()->Success('Success', 'address add Successfully')->autoclose(3000);
        return redirect()->back();

    }        
    public function Emailstore(Request $request,$id=null){
      $validatedData = $request->validate([
          'title' => 'required|string|max:100',
          'mail_id' => 'required|string|max:200',
        ]);
       if($request->has('default_status')) 
          {
            $validatedData['default_status']  = request('default_status');
            if (request('default_status')==1) {
               Email::where('default_status', '1')->update(['default_status' => '0']);
            }
          }
     if ($id) {
     try {
          $updatedata = Email::findorfail($id);
          } catch (\Exception $ex) {
          return redirect()->route('settings.contactussettings.contactnumber');
        } 
           $addresses = Email::where('id',$id)->update($validatedData);
           alert()->Success('Success', 'Email update Successfully')->autoclose(3000);
          return redirect()->back();
        }
         $addresses = Email::create($validatedData);
         alert()->Success('Success', 'Email add Successfully')->autoclose(3000);
        return redirect()->back();
    }

    public function Contactnumberstore(Request $request,$id=null ){
      $validatedData = $request->validate([
          'title' => 'required|string|max:100',
          'number' => 'required|string|max:20',
        ]);
      if($request->has('default_status')) 
          {
            $validatedData['default_status']  = request('default_status');
            if (request('default_status')==1) {
               ContactNumber::where('default_status', '1')->update(['default_status' => '0']);
            }
          }
      if ($id) {
      try {
          $updatedata = ContactNumber::findorfail($id);
          } catch (\Exception $ex) {
          return redirect()->route('settings.contactussettings.contactnumber');
      } 
           $addresses = ContactNumber::where('id',$id)->update($validatedData);
           alert()->Success('Success', 'update Successfully')->autoclose(3000);
          return redirect()->back();
        }
         $addresses = ContactNumber::create($validatedData);
         alert()->Success('Success', 'contact number add Successfully')->autoclose(3000);
        return redirect()->back();
    } 
    public function BankNamestore(Request $request,$id=null ){
      $validatedData = $request->validate([
        'bank_name'           => 'required|string|max:191',
        'account_holder_name' => 'required|string|max:191',
        'account_number'      => 'required|digits:12',
        'ifsc_code'           => 'string|max:12',
      ]);
      if ($id) {
      try {
            $updatedata = Bank::findorfail($id);
          }catch (\Exception $ex) {
            return redirect()->route('settings.contactussettings.contactnumber');
          } 
          $bank  = Bank::where('id',$id)->update($validatedData);
          alert()->Success('Success', 'contact number update Successfully')->autoclose(3000);
          return redirect()->back();
        }
        $bank   = Bank::create($validatedData);
        alert()->Success('Success', 'add Successfully')->autoclose(3000);
        return redirect()->back();
    }
    public function QrCodeStore(Request $request,$id=null ){
      $validatedData = $request->validate([
        'title'           => 'required|string|max:191',
        'image'           => 'required|sometimes',
      ]);
      if ($request->hasfile("image")){
        $validatedData['image']= upload($request->image,"qr_codes");
      }
     
      if ($id) {
      try {
            $updatedata = QrCode::findorfail($id);
          }catch (\Exception $ex) {
            return redirect()->route('settings.qr_codes.index');
          } 
          $bank  = QrCode::where('id',$id)->update($validatedData);
          alert()->Success('Success', 'Qr Code update Successfully')->autoclose(3000);
          return redirect()->back();
        }
        $bank   = QrCode::create($validatedData);
        alert()->Success('Success', 'add Successfully')->autoclose(3000);
        return redirect()->back();
    }
    public function Homepagecontentstore(Request $request,$id=1)
    {
      $validatedData = $request->validate([
          'middle_section_right_text'             => 'required|string|max:1000',
          'middle_section_right_heading_text'     => 'required|string|max:55',
          'middle_section_right_sub_heading_text' => 'required|string|max:55',
          'middle_section_image_left'             => 'required|sometimes',
          'middle_section_left_text'              => 'required|string|max:1000',
          'middle_section_left_heading_text'      => 'required|string|max:55',
          'middle_section_left_sub_heading_text'  => 'required|string|max:55',
          'middle_section_image_right'            => 'required|sometimes',
        ]);
      if ($request->hasfile("middle_section_image_left")){
        $validatedData['middle_section_image_left']= upload($request->middle_section_image_left,"home_page");
      }
      if ($request->hasfile("middle_section_image_right")){
        $validatedData['middle_section_image_right']= upload($request->middle_section_image_right,"home_page");
      }
     if ($id) {
     try {
            $updatedata = HomePageContent::findorfail($id);
          } catch (\Exception $ex) {
          return redirect()->route('settings.contactussettings.contactnumber');
        } 
          HomePageContent::where('id',$id)->update($validatedData);
          alert()->Success('Success', 'Home page update Successfully')->autoclose(3000);
          return redirect()->back();
        }

          HomePageContent::create($validatedData);
          alert()->Success('Success', 'Home page add Successfully')->autoclose(3000);
          return redirect()->back();
    }

}
