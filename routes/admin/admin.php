<?php
/**
 * Created by PhpStorm.
 * User: lsl
 * Date: 2018/8/7
 * Time: 9:03
 */
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    //登录模块
    //注册模块
    Route::get('login','PublicController@login')->name('admin.public.login');
    Route::post('login','PublicController@loginHandle')->name('admin.public.login');
    Route::post('login1','PublicController@loginAuth')->name('admin.public.loginauth');
});
Route::group(['prefix'=>'/admin'],function (){
    Route::get('hello', function () {
        return 'Hello, Welcome to LaravelAcademy.org';
    });
    Route::get('/logout/{id}/{name}',function ($id,$name){
        return json_encode([$id,$name]);
    });
});
