<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    function __construct() {
        $this->middleware('permission:Contact-us-list', ['only' => ['index']]);
    }
    public function index()
    {
        $list = ContactUs::all();
        return view('admin::contact_us.index',compact('list'));     
    }
}
