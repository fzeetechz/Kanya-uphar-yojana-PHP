<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    public function run()
    {  
        $permissions = array (
            'Pages'  => array("Pages-list","Pages-show","Pages-edit"),
            'Notifications'  => array("Notifications-list","Notifications-show","Notifications-edit","Notifications-create"),
            'Settings'  => array('Settings-Qr-Code',"Settings-list","Settings-Address","Settings-Email","Settings-Contact-number",'Settings-Home-page-content','Settings-Bank'),
            'Roles'  => array("Roles-list","Roles-create","Roles-edit","Roles-delete","Roles-show"),
            'Banners'=> array("Banners-list","Banners-create","Banners-edit","Banners-delete","Banners-show"),
            'Users'=> array("Users-list","Users-create","Users-edit","Users-delete","Users-show"),
            'Registrations'=> array("Registrations-list","Registrations-create","Registrations-edit","Registrations-delete","Registrations-show"),
            'Social-Links'=> array("Sociallinks-list","Sociallinks-create","Sociallinks-edit","Sociallinks-delete","Sociallinks-show"),
            'Dashboard'=> array("Dashboard-registrations",'Dashboard-amounts'),
            'Contact-Us'=> array("Contact-us-list"),
            'Plans'=> array("Plans-list","Plans-create","Plans-edit","Plans-delete","Plans-show"),
        );
        foreach ($permissions as $key => $value) {
            foreach ($value as $permission) {
                Permission::updateOrCreate(['name' => $permission,'permission_for' => $key]);
            }
        }
    }
}
