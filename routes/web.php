<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Zone
    Route::delete('zones/destroy', 'ZoneController@massDestroy')->name('zones.massDestroy');
    Route::resource('zones', 'ZoneController');

    // Emploi
    Route::delete('emplois/destroy', 'EmploiController@massDestroy')->name('emplois.massDestroy');
    Route::post('emplois/parse-csv-import', 'EmploiController@parseCsvImport')->name('emplois.parseCsvImport');
    Route::post('emplois/process-csv-import', 'EmploiController@processCsvImport')->name('emplois.processCsvImport');
    Route::resource('emplois', 'EmploiController');

    // Astreintes
    Route::delete('astreintes/destroy', 'AstreintesController@massDestroy')->name('astreintes.massDestroy');
    Route::post('astreintes/parse-csv-import', 'AstreintesController@parseCsvImport')->name('astreintes.parseCsvImport');
    Route::post('astreintes/process-csv-import', 'AstreintesController@processCsvImport')->name('astreintes.processCsvImport');
    Route::resource('astreintes', 'AstreintesController');

    // Tableau Debord
    Route::delete('tableau-debords/destroy', 'TableauDebordController@massDestroy')->name('tableau-debords.massDestroy');
    Route::resource('tableau-debords', 'TableauDebordController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
