@extends('admin::layouts.master')
@section('title') Dashboard @endsection
@section('content')
<div class="main-content">
<div class="page-title col-sm-12">
  <div class="row align-items-center">
    <div class="col-md-6">
      <h1 class="h3 m-0">Dashboard</h1>
    </div>
    <!--<div class="col-md-6">
      <form class="dateFilter">
        <div class="input-group">
          <input type="text" name="dates" class="form-control date-range" value="01/01/2020 - 01/09/2020" />
          <div class="input-group-prepend"> <span class="input-group-text"><i class="fal fa-calendar-alt"></i></span> </div>
        </div>
      </form>
    </div>-->
  </div>
</div>
  @can("Dashboard-registrations")  
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card">
            <div class="card-body widgets d-flex align-items-center">
              <div class="bg-gradient-muted widget-icon"> <i class="far fa-user-friends"></i> </div>
              <div>
                <div class="text-value text-primary"><h3 >{{$total_registrations}}</h3></div>
                <div class="text-muted text-uppercase font-weight-bold small">Registrations</div>
              </div>
            </div>
            <div class="card-footer px-3 py-2"> <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('registrations.index',['filter'=>'all']) }}"> <span class="small font-weight-bold">View More</span> <i class="fal fa-chevron-right text-muted"></i> </a> </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card">
            <div class="card-body widgets d-flex align-items-center">
              <div class="bg-gradient-muted widget-icon"> <i class="far fa-user-friends"></i> </div>
              <div>
                <div class="text-value text-primary"><h3 >{{$today_registrations_count}}</h3></div>
                <div class="text-muted text-uppercase font-weight-bold small">Today Registrations</div>
              </div>
            </div>
            <div class="card-footer px-3 py-2"> <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('registrations.index',['filter'=>'today']) }}"> <span class="small font-weight-bold">View More</span> <i class="fal fa-chevron-right text-muted"></i> </a> </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card">
            <div class="card-body widgets d-flex align-items-center">
              <div class="bg-gradient-muted widget-icon"> <i class="far fa-user-friends"></i> </div>
              <div>
                <div class="text-value text-primary"><h3 >{{$this_week_registrations_count}}</h3></div>
                <div class="text-muted text-uppercase font-weight-bold small">This Week Registrations</div>
              </div>
            </div>
            <div class="card-footer px-3 py-2"> <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('registrations.index',['filter'=>'this_week']) }}"> <span class="small font-weight-bold">View More</span> <i class="fal fa-chevron-right text-muted"></i> </a> </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card">
            <div class="card-body widgets d-flex align-items-center">
              <div class="bg-gradient-muted widget-icon"> <i class="far fa-user-friends"></i> </div>
              <div>
                <div class="text-value text-primary"><h3 >{{$this_month_registrations_count}}</h3></div>
                <div class="text-muted text-uppercase font-weight-bold small">This Month Registrations</div>
              </div>
            </div>
            <div class="card-footer px-3 py-2"> <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('registrations.index',['filter'=>'this_month']) }}"> <span class="small font-weight-bold">View More</span> <i class="fal fa-chevron-right text-muted"></i> </a> </div>
          </div>
        </div>
    </div>
  @endcan
  @can("Dashboard-amounts")
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card">
          <div class="card-body widgets d-flex align-items-center">
            <div class="bg-gradient-muted widget-icon"> <i class="far fa-user-friends"></i> </div>
            <div>
              <div class="text-value text-primary"><h3 >{{$total_registrations_sum}}</h3></div>
              <div class="text-muted text-uppercase font-weight-bold small">Registrations</div>
            </div>
          </div>
          <div class="card-footer px-3 py-2"> <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('registrations.index',['filter'=>'all']) }}"> <span class="small font-weight-bold">View More</span> <i class="fal fa-chevron-right text-muted"></i> </a> </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card">
          <div class="card-body widgets d-flex align-items-center">
            <div class="bg-gradient-muted widget-icon"> <i class="far fa-user-friends"></i> </div>
            <div>
              <div class="text-value text-primary"><h3 >{{$today_registrations_sum}}</h3></div>
              <div class="text-muted text-uppercase font-weight-bold small">Today Registrations</div>
            </div>
          </div>
          <div class="card-footer px-3 py-2"> <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('registrations.index',['filter'=>'today']) }}"> <span class="small font-weight-bold">View More</span> <i class="fal fa-chevron-right text-muted"></i> </a> </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card">
          <div class="card-body widgets d-flex align-items-center">
            <div class="bg-gradient-muted widget-icon"> <i class="far fa-user-friends"></i> </div>
            <div>
              <div class="text-value text-primary"><h3 >{{$this_week_registrations_sum}}</h3></div>
              <div class="text-muted text-uppercase font-weight-bold small">This Week Registrations</div>
            </div>
          </div>
          <div class="card-footer px-3 py-2"> <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('registrations.index',['filter'=>'this_week']) }}"> <span class="small font-weight-bold">View More</span> <i class="fal fa-chevron-right text-muted"></i> </a> </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card">
          <div class="card-body widgets d-flex align-items-center">
            <div class="bg-gradient-muted widget-icon"> <i class="far fa-user-friends"></i> </div>
            <div>
              <div class="text-value text-primary"><h3 >{{$this_month_registrations_sum}}</h3></div>
              <div class="text-muted text-uppercase font-weight-bold small">This Month Registrations</div>
            </div>
          </div>
          <div class="card-footer px-3 py-2"> <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('registrations.index',['filter'=>'this_month']) }}"> <span class="small font-weight-bold">View More</span> <i class="fal fa-chevron-right text-muted"></i> </a> </div>
        </div>
      </div>
    </div>
  @endcan
@endsection