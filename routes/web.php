<?php

#$this->get('admin', 'Admin\AdminController@index')->nane('admin.home');
#$this->get('/', 'Site\SiteController@index')->name('home');



Route::group(
    [
        'middleware' => ['auth'],
        'namespace' => 'Admin',
        'prefix' => 'admin'
    ], function(){

        Route::get('historic', 'BalanceController@historic')->name('admin.historic');
        Route::any('historic-search', 'BalanceController@searchHistoric')->name('historic.search');

        Route::post('transfer', 'BalanceController@transferStore')->name('transfer.store');
        Route::post('confirm-transfer', 'BalanceController@confirmTransfer')->name('confirm.transfer');
        Route::get('transfer', 'BalanceController@transfer')->name('balance.transfer');

        Route::get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');
        Route::post('withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');

        Route::get('deposit', 'BalanceController@deposit')->name('balance.deposit');
        Route::post('deposit', 'BalanceController@depositStore')->name('deposit.store');

        Route::get('balance', 'BalanceController@index')->name('admin.balance');

        Route::get('/', 'AdminController@index')->name('admin.home');
    });

    Route::get('meu-perfil', 'Admin\UserController@profile')->middleware('auth')->name('profile');
    Route::post('atualizar-perfil', 'Admin\UserController@profileUpdate')->middleware('auth')->name('profile.update');
    Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();


/*


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

*/
