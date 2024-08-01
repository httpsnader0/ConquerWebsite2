<?php

use Illuminate\Support\Facades\Route;
use App\Actions\Dashboard\Auth\{
    LoginIndexAction,
    LoginStoreAction,
};
use App\Actions\Dashboard\Home\{
    HomeIndexAction,
};
use App\Actions\Dashboard\Profile\{
    ProfileIndexAction,
    ProfileUpdateAction,
    ChangePasswordIndexAction,
    ChangePasswordUpdateAction,
    NotificationIndexAction,
    LogoutAction,
};
use App\Actions\Dashboard\Role\{
    RoleIndexAction,
    RoleCreateAction,
    RoleStoreAction,
    RoleShowAction,
    RoleEditAction,
    RoleUpdateAction,
    RoleDeleteAction,
};
use App\Actions\Dashboard\Admin\{
    AdminIndexAction,
    AdminCreateAction,
    AdminStoreAction,
    AdminShowAction,
    AdminEditAction,
    AdminUpdateAction,
    AdminDeleteAction,
    AdminChangeStatusAction,
};
use App\Actions\Dashboard\Setting\{
    SettingIndexAction,
    SettingUpdateAction,
    SliderIndexAction,
    SliderUpdateAction,
    AboutIndexAction,
    AboutUpdateAction,
    FeatureIndexAction,
    FeatureUpdateAction,
    DownloadIndexAction,
    DownloadUpdateAction,
    InstallationIndexAction,
    InstallationUpdateAction,
};
use App\Actions\Dashboard\Event\{
    EventIndexAction,
    EventCreateAction,
    EventStoreAction,
    EventShowAction,
    EventEditAction,
    EventUpdateAction,
    EventDeleteAction,
    EventChangeStatusAction,
};

Route::middleware(['guest'])->group(function () {

    Route::prefix('login')->as('login.')->group(function () {

        Route::get('', LoginIndexAction::class)->name('index');

        Route::post('', LoginStoreAction::class)->name('store');

    });

});


Route::middleware(['auth'])->group(function () {

    Route::name('home.')->group(function () {

        Route::get('', HomeIndexAction::class)->name('index');

    });
    
    Route::prefix('profile')->as('profile.')->group(function () {
    
        Route::get('', ProfileIndexAction::class)->name('index');
        Route::post('', ProfileUpdateAction::class)->name('update');
    
        Route::prefix('change-password')->as('change-password.')->group(function () {
    
            Route::get('', ChangePasswordIndexAction::class)->name('index');
            Route::post('', ChangePasswordUpdateAction::class)->name('update');
    
        });
    
        Route::prefix('notifications')->as('notifications.')->group(function () {
    
            Route::get('', NotificationIndexAction::class)->name('index');
    
        });
    
        Route::any('logout', LogoutAction::class)->name('logout');
    
    });

    Route::prefix('roles')->as('roles.')->group(function () {

        Route::get('', RoleIndexAction::class)->name('index');
        Route::get('create', RoleCreateAction::class)->name('create');
        Route::post('', RoleStoreAction::class)->name('store');
        Route::get('{role}', RoleShowAction::class)->name('show');
        Route::get('{role}/edit', RoleEditAction::class)->name('edit');
        Route::post('{role}', RoleUpdateAction::class)->name('update');
        Route::delete('{role}', RoleDeleteAction::class)->name('delete');

    });

    Route::prefix('admins')->as('admins.')->group(function () {

        Route::get('', AdminIndexAction::class)->name('index');
        Route::get('create', AdminCreateAction::class)->name('create');
        Route::post('', AdminStoreAction::class)->name('store');
        Route::get('{admin}', AdminShowAction::class)->name('show');
        Route::get('{admin}/edit', AdminEditAction::class)->name('edit');
        Route::post('{admin}', AdminUpdateAction::class)->name('update');
        Route::delete('{admin}', AdminDeleteAction::class)->name('delete');
        Route::get('{admin}/change-status', AdminChangeStatusAction::class)->name('change-status');

    });

    Route::prefix('settings')->as('settings.')->group(function () {

        Route::get('', SettingIndexAction::class)->name('index');
        Route::post('', SettingUpdateAction::class)->name('update');

        Route::get('sliders', SliderIndexAction::class)->name('sliders.index');
        Route::post('sliders', SliderUpdateAction::class)->name('sliders.update');

        Route::get('about', AboutIndexAction::class)->name('about.index');
        Route::post('about', AboutUpdateAction::class)->name('about.update');

        Route::get('features', FeatureIndexAction::class)->name('features.index');
        Route::post('features', FeatureUpdateAction::class)->name('features.update');

        Route::get('download', DownloadIndexAction::class)->name('download.index');
        Route::post('download', DownloadUpdateAction::class)->name('download.update');

        Route::get('installations', InstallationIndexAction::class)->name('installations.index');
        Route::post('installations', InstallationUpdateAction::class)->name('installations.update');

    });

    Route::prefix('events')->as('events.')->group(function () {

        Route::get('', EventIndexAction::class)->name('index');
        Route::get('create', EventCreateAction::class)->name('create');
        Route::post('', EventStoreAction::class)->name('store');
        Route::get('{event}', EventShowAction::class)->name('show');
        Route::get('{event}/edit', EventEditAction::class)->name('edit');
        Route::post('{event}', EventUpdateAction::class)->name('update');
        Route::delete('{event}', EventDeleteAction::class)->name('delete');
        Route::get('{event}/change-status', EventChangeStatusAction::class)->name('change-status');

    });

});
