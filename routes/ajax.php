<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

Route::group(['prefix'=>'ajax','as'=>'ajax.'],function(){

    
    //get roles
    Route::get('get_roles',[AjaxController::class,'get_roles'])->name('get_roles');

    //get online users
    Route::get('online',[AjaxController::class,'online'])->name('online')->middleware('Admin');

    //get chat
    Route::get('get_chat/{id}',[AjaxController::class,'get_chat'])->name('get_chat')->middleware('Admin');
    Route::get('chat_unread/{id}',[AjaxController::class,'chat_unread'])->name('chat_unread')->middleware('Admin');
    Route::post('send_message/{id}',[AjaxController::class,'send_message'])->name('send_message')->middleware('Admin');

    //change visit status
    Route::post('change_visit_status/{id}',[AjaxController::class,'change_visit_status'])->name('change_visit_status')->middleware('Admin');

    //change lang status
    Route::post('change_lang_status/{id}',[AjaxController::class,'change_lang_status'])->name('change_lang_status')->middleware('Admin');

    //get unread messages
    Route::get('get_unread_messages',[AjaxController::class,'get_unread_messages'])->name('get_unread_messages')->middleware('Admin');
    Route::get('get_unread_messages_count/{id}',[AjaxController::class,'get_unread_messages_count'])->name('get_unread_messages_count')->middleware('Admin');

    //get my messages
    Route::get('get_my_messages/{id}',[AjaxController::class,'get_my_messages'])->name('get_my_messages')->middleware('Admin');

    //get new visits
    Route::get('get_new_visits',[AjaxController::class,'get_new_visits'])->name('get_new_visits')->middleware('Admin');

    //load more messages
    Route::get('load_more/{user_id}/{message_id}',[AjaxController::class,'load_more'])->name('load_more')->middleware('Admin');

    //add credits
    Route::post('add_credits',[AjaxController::class,'add_credits'])->name('add_credits')->middleware('Admin');

});
