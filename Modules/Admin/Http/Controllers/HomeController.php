<?php
namespace Modules\Admin\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\{User,Registration};
use Auth;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $week_date = Carbon::today()->subDays(7);
        $total_registrations = Registration::where(function($query) {
            if (!Auth::user()->hasRole('Admin')) {
                $query->where('user_id',"=",Auth::user()->id);
            }
        });
        $today_registrations_count = Registration::whereDate('created_at', Carbon::today())->where(function($query) {
            if (!Auth::user()->hasRole('Admin')) {
                $query->where('user_id',"=",Auth::user()->id);
            }
        });
        $this_week_registrations_count = Registration::where('created_at', '>=', $week_date->startOfDay())->where(function($query) {
            if (!Auth::user()->hasRole('Admin')) {
                $query->where('user_id',"=",Auth::user()->id);
            }
        });
        $this_month_registrations_count = Registration::where("created_at",">", Carbon::now()->subMonths(1))->where(function($query) {
            if (!Auth::user()->hasRole('Admin')) {
                $query->where('user_id',"=",Auth::user()->id);
            }
        });
        
        $data = array(
            'total_registrations'            => $total_registrations->count(),
            'today_registrations_count'      => $today_registrations_count->count(),
            'this_week_registrations_count'  => $this_week_registrations_count->count(),
            'this_month_registrations_count' => $this_month_registrations_count->count(),
            'total_registrations_sum'        => $total_registrations->sum('amount'),
            'today_registrations_sum'        => $today_registrations_count->sum('amount'),
            'this_week_registrations_sum'    => $this_week_registrations_count->sum('amount'),
            'this_month_registrations_sum'   => $this_month_registrations_count->sum('amount'),
        );

        return view('admin::dashboard')->with($data);
    }
}
