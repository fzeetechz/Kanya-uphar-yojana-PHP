<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
      function __construct() {
        $this->middleware('permission:Banners-list|Banners-create|Banners-edit|Banners-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:Banners-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Banners-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Banners-delete', ['only' => ['destroy']]);
        $this->middleware('permission:Banners-list', ['only' => ['index']]);
        $this->middleware('permission:Banners-show', ['only' => ['show']]);
    }
    public function index()
    {
        $banners = Banner::all();
        return view('admin::banners.index',compact('banners'));     
    }

    public function create()
    {
        return view('admin::banners.create_edit');
    }

    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'banner'  => 'sometimes|required',
            'title' => 'nullable',
        ]);

        if ($request->hasfile("banner")){
            $banner = upload($request->banner,"banners");
        }
        Banner::updateOrCreate(['id'=>@$request->id],[
            'title'     => $request->title,
            'url'       => getFile('banners',@$banner ? @$banner: Banner::find($request->id)->banner),
            'banner'    => @$banner ? @$banner: Banner::find($request->id)->banner,
        ]);
        toastr()->success('Saved Successfully!');
        return redirect()->route('banners.index')->with('success','Banner Created successfully');
    }
    public function show($homepagebanner)
    {
        $banner = Banner::find($homepagebanner);
        return view('admin::banners.show',compact('banner'));
    }
    public function edit($id)
    {
        $data = Banner::find($id);
        return view('admin::banners.create_edit',compact('data'));
    }
}
