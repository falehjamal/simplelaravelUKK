<?php
Route::get('/', function () {
    return redirect('login');
});

Route::resource('buku','BukuController');
Route::resource('kategori','BukuController');
Route::resource('admin','AdminController');

Route::get('/admin/create', function () {return redirect('admin')->with('warning','Tidak bisa menambahkan user');});
Route::get('verify', 'Auth\RegisterController@verify')->name('signup.verify');
Auth::routes();

// Route::get('/redirect/{a}', function ($name = null) {
//     return redirect($name);
// });
