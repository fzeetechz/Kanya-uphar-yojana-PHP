<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UniversalController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/sab-clear', function() {
	Artisan::call('route:clear');
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('view:clear');
	Artisan::call('optimize');
	Artisan::call('migrate:fresh --seed');
	return "Sab-clear ho Gya";
});


Route::group(['middleware' => ['auth']], 
	function(){	
		Route::any('universal-status-change',[UniversalController::class,'universalstatuschange'])->name('universalstatuschange');
		Route::any('universal-delete',[UniversalController::class,'universaldelete'])->name('universaldelete');	 
	});

//Auth Routes
require __DIR__.'/auth.php';

