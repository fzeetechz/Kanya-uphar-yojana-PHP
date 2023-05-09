<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Notification};
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Events\Registered;
use PDF;
use DB;
use Module;
class UserController extends Controller{
function __construct() {
        $this->middleware('permission:Users-list|Users-create|Users-edit|Users-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:Users-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Users-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Users-delete', ['only' => ['destroy']]);
        $this->middleware('permission:Users-list', ['only' => ['index']]);
        $this->middleware('permission:Users-show', ['only' => ['show']]);
    }
    public function index(Request $request)
    {
        $admin_managers = Role::whereIn('name', ['Sub-Admin','Admin'])->get();
        $data           = User::orderBy('id','DESC')->role($admin_managers)->get();
        return view('admin::users.index', compact('data'));
    }
    public function create(Request $request)
    {
        $roles = Role::whereNotIn('name', ['Admin'])->pluck('name','name')->all();
        return view('admin::users.create',compact('roles'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'full_name' => 'required',
            'profile_pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone_no' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password|min:6',
            'emergency_number' => 'required|numeric',
            'id_proof' => 'required',
        ],
        [
            'profile_pic.max' => 'Please select the 3 Mb bellow file in profile pic!',
        ]);
        $input = $request->all();
        $profileInformation['emergency_number'] =$request->emergency_number;
        
        if ($request->hasfile("profile_pic")){
            $input['profile_pic']= upload($request->profile_pic,"profile_pics");
        }

        $input["password"] = Hash::make($input["password"]);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        
        if ($request->hasfile("id_proof")){
            $profileInformation['id_proof']= upload($request->id_proof,"id_proofs");
        }
        $user->profileInformation()->create($profileInformation); 
        return redirect()->route('users.index');
        // event(new Registered($user));                    
    }
    public function adminmanagerprofile($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->getRoleNames()->first();
        $id = $user->roles->first()->id;
        $role = Role::findOrFail($id);
        $permissions = Permission::orderBy('permission_for')->get()->groupBy(function($item) 
            {
            return $item->permission_for;
        });
 
         $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
        return view('admin::users.adminmanagerprofile',compact('user','id','permissions','rolePermissions'));
    }
    public function edit($id)
    {
        $user = User::with('profileInformation')->find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin::users.edit',compact('user','roles','userRole'));
    }
    public function changepasswordview($id)
    {
        $user = User::find($id);
        return view('admin::users.changepassword',compact('user','id'));
    }
    public function changepassword(Request $request,$id)
    {
        $validatedData = $request->validate([
           'password'=>'required|min:6|max:25',
           'Confirm_password' => 'required|same:password',
        ]);
        $current_password = request('current_password');
        $user = User::findorfail($id);
        $user->password =  Hash::make(request('password'));
        if($user->save()){
            toastr()->success('Password update Successfully!');
            return redirect()->route('users.index');
        }
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'full_name' => 'required',
    		'phone_no' => 'required|unique:users,phone_no,'.$id,
    		'Address_Location' => 'required',
            'emergency_number' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        $input = $request->all();
        $user = User::findorfail($id);
        if ($request->hasfile("profile_pic")){
            $input['profile_pic'] =upload($request->profile_pic,"profile_pics");
        }
        $profileInformation['emergency_number'] =$request->emergency_number;

        if ($request->hasfile("id_proof")){
            $profileInformation['id_proof']= upload($request->id_proof,"id_proofs");
        }
        $user->profileInformation()->updateOrCreate([
            'user_id' => $user->id,
        ],$profileInformation); 

        $user->update($input);
        alert()->Success('Success', 'Profile updated Successfully!')->autoclose(4000);
        if (!$user->roles->first()=='') {
            $role = $user->roles->first()->name;
            return redirect()->route('users.admin.managers');
        }
    }
    public function destroy($id)
    {
        toastr()->success('User deleted Successfully!');
        User::find($id)->delete();
        return redirect()->route('users.index');
    }

}