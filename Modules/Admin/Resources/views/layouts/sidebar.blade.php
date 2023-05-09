<div class="dashboard-menu">
   <div class="nav-menu">
      <div class="user-info">
         <div class="user-icon"><img src="@if(Auth::user()->profile_pic=='') {{ asset('public/images/profile_pics/avatar7.png') }}  @else {{ asset('admin/images/profile_pics/'.Auth::user()->profile_pic) }}@endif" alt="img"></div>
         <div class="user-name">
            <h5>{{ Auth::user()->full_name }}</h5>
            <span class="h6 text-muted">
               <label class="badge badge-success">{{ @Auth::user()->roles->pluck('name')[0] }}</label>
            </span>
         </div>
      </div>
      <ul class="list-unstyled nav">
         <li class="nav-item"><span class="menu-title text-muted">NAVIGATION </span></li>
         <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link" data-position="top"><i class="fal fa-home-alt"></i> Dashboard</a></li>
         @can('Roles-list')
         <li class="nav-item {{ (request()->is('admin/Roles*') || request()->is('admin/Permissions*') ) ? 'active' : '' }}" data-position="middle">
            <a href="#" class="nav-link" data-position="middle"><i class="fas fa-user-secret"></i> Roles </a>
            <ul class="sub-menu">
               <li class="nav-item"><a href="{{ route('Roles.index') }}" class="nav-link" data-position="middle"><i class="fa fa-users"></i>Roles</a></li>
               <li class="nav-item"><a href="{{ route('Permissions.index') }}" class="nav-link" data-position="middle"><i class="fa fa-users"></i> Permissions</a></li>
               <!-- <li class="nav-item"><a href="{{ route('Roles.create') }}" class="nav-link" data-position="middle"><i class="fa fa-plus-circle"></i>Create Role</a></li> -->
               <!-- <li class="nav-item"><a href="{{ route('Permissions.create') }}" class="nav-link" data-position="middle"><i class="fa fa-plus-circle"></i>Create Permission</a></li> -->
            </ul>
         </li>
         @endcan
         @can('Users-list')
         <li class="nav-item {{ (request()->is('admin/managers*') || request()->is('admin/create/manager*') || request()->is('admin/manager*')) ? 'active' : '' }}" data-position="middle">
            <a href="#" class="nav-link" data-position="middle"><i class="fa fa-users"></i> Admin manager </a>
            <ul class="sub-menu">
               <li class="nav-item"><a href="{{ route('users.admin.managers') }}" class="nav-link"><i class="fa fa-users"></i>Managers </a></li>
               <li class="nav-item"><a href="{{ route('admin.create.manager') }}" class="nav-link"><i class="fa fa-plus-circle"></i>Create Manager</a></li>
            </ul>
         </li>
         @endcan
         @can('Pages-list')
         <li class="nav-item {{ (request()->is('admin/pages*')) ? 'active' : '' }} {{ (request()->is('admin/pages*') || request()->is('admin/page*') ) ? 'active' : '' }}" data-position="middle">
            <a href="#" class="nav-link" data-position="middle"><i class="fas fa-file-alt"></i>Pages</a>
            <ul class="sub-menu">
               <li class="nav-item" ><a href="{{ route('admin.pages') }}" class="nav-link"><i class="fas fa-file-alt"></i>Pages</a></li>
            </ul>
         </li>
         @endcan
         {{--
         @can('Notifications-list')
            <li class="nav-item {{ (request()->is('admin/notifications*')) ? 'active' : '' }}" data-position="middle">
               <a href="#" class="nav-link"><i class="fas fa-envelope-open-text"></i>Notifications</a>
               <ul class="sub-menu">
                  <li class="nav-item" data-position="middle"><a href="{{ route('notifications.index') }}" class="nav-link"><i class="far fa-envelope"></i>Notifications</a></li>
                  <li class="nav-item" data-position="middle"><a href="{{ route('notifications.send.beauticians') }}" class="nav-link"><i class="fas fa-share-square"></i>Send PBTLA </a></li>
                  <li class="nav-item" data-position="middle"><a href="{{ route('notifications.send.customers') }}" class="nav-link"><i class="fas fa-share-square"></i>Send Customers </a></li>
                  <li class="nav-item" data-position="middle"><a href="{{ route('notifications.create') }}" class="nav-link"><i class="fas fa-share-square"></i>Send All </a></li>
               </ul>
            </li>
         @endcan
         --}}
         @can('Banners-list')
            <li class="nav-item {{ (request()->is('admin/banners*')) ? 'active' : '' }}" data-position="middle">
               <a href="#" class="nav-link"><i class="far fa-images"></i>Banners</a>
               <ul class="sub-menu">
                  <li class="nav-item" data-position="middle"><a href="{{ route('banners.index') }}" class="nav-link"><i class="fa fa-bars" aria-hidden="true"></i>Banners</a></li>
                  <li class="nav-item" data-position="middle"><a href="{{ route('banners.create') }}" class="nav-link"><i class="fa fa-plus-circle"></i>Add Banner</a></li>
               </ul>
            </li>
         @endcan
         @can('Contact-us-list')
         <li class="nav-item {{ (request()->is('admin/contact-us*')) ? 'active' : '' }}" data-position="middle">
            <a href="#" class="nav-link"><i class="fa fa-phone" aria-hidden="true"></i>Contact us</a>
            <ul class="sub-menu">
               <li class="nav-item" data-position="middle"><a href="{{ route('contact-us.index') }}" class="nav-link"><i class="fa fa-phone" aria-hidden="true"></i>Contact us</a></li>
            </ul>
         </li>
         @endcan
         @can('Registrations-list')
         <li class="nav-item {{ (request()->is('admin/registrations*')) ? 'active' : '' }}" data-position="middle">
            <a href="#" class="nav-link"><i class="fa fa-user-plus" aria-hidden="true"></i>Registrations</a>
            <ul class="sub-menu">
               <li class="nav-item" data-position="middle"><a href="{{ route('registrations.index') }}" class="nav-link"><i class="fa fa-bars" aria-hidden="true"></i>Registrations</a></li>
               <li class="nav-item" data-position="middle"><a href="{{ route('registrations.create') }}" class="nav-link"><i class="fa fa-plus-circle"></i>Add Registration</a></li>
            </ul>
         </li>
         @endcan
         @can('Plans-list')
         <li class="nav-item {{ (request()->is('admin/plans*')) ? 'active' : '' }}" data-position="middle">
            <a href="#" class="nav-link"><i class="fa fa-paper-plane" aria-hidden="true"></i>Plans</a>
            <ul class="sub-menu">
               <li class="nav-item" data-position="middle"><a href="{{ route('plans.index') }}" class="nav-link"><i class="fa fa-paper-plane" aria-hidden="true"></i>Plans</a></li>
               <li class="nav-item" data-position="middle"><a href="{{ route('plans.create') }}" class="nav-link"><i class="fa fa-plus-circle"></i>Add Plan</a></li>
            </ul>
         </li>
         @endcan
         @can('Settings-list') 
            <li class="nav-item {{ (request()->is('admin/settings*')) ? 'active' : '' }}" data-position="middle">
               <a href="#" class="nav-link"><i class="fas fa-cog"></i>Settings</a>
               <ul class="sub-menu">
                  @can('Settings-Address') 
                     <li class="nav-item" data-position="middle">
                        <a href="{{ route('settings.contactussettings.address') }}" class="nav-link"><i class="fa fa-plus-circle"></i>Address</a>
                     </li>
                  @endcan
                  @can('Settings-Email') 
                     <li class="nav-item" data-position="middle">
                        <a href="{{ route('settings.contactussettings.email') }}" class="nav-link"><i class="fa fa-plus-circle"></i>Emails</a>
                     </li>
                  @endcan
                  @can('Settings-Contact-number') 
                     <li class="nav-item" data-position="middle">
                        <a href="{{ route('settings.contactussettings.contactnumber') }}" class="nav-link"><i class="fa fa-plus-circle"></i>Contact Numbers</a>
                     </li>
                  @endcan
                  @can('Settings-Home-page-content') 
                     <li class="nav-item" data-position="middle">
                        <a href="{{ route('settings.homepagecontent',1) }}" class="nav-link"><i class="fa fa-plus-circle"></i>Home Content</a>
                     </li>
                  @endcan
                  @can('Settings-Bank') 
                     <li class="nav-item" data-position="middle">
                        <a href="{{ route('settings.bank.index') }}" class="nav-link"><i class="fa fa-plus-circle"></i>Banks</a>
                     </li>
                  @endcan
                  @can('Settings-Qr-Code') 
                     <li class="nav-item" data-position="middle">
                        <a href="{{ route('settings.qrcode.index') }}" class="nav-link"><i class="fa fa-plus-circle"></i>Qr Codes</a>
                     </li>
                  @endcan
               </ul>
            </li>
         @endcan
      </ul>
   </div>
</div>
