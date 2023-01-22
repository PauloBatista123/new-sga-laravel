<?php

use App\Events\ChatMessageEvent;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PainelController;
use Illuminate\Database\Console\MonitorCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/play', function () {
    return null;
});

Route::get('/ws', function () {
    return view('websocket');
})->name('dashboard');

Route::post('/chat-message', function(Request $request){
    event(new ChatMessageEvent($request->message, auth()->user()));

    return response()->json(['msg' => 'correto']);
});

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/logar', [HomeController::class, 'logar'])->name('logar');

Route::middleware(['auth'])->group(function () {

    Route::get('/totem', function () {
        return view('admin.totem.index');
    });

    Route::get('/monitor', [MonitorController::class, 'index'])->name('monitor.index');
    Route::get('/painel', [PainelController::class, 'index'])->name('painel.index');

});
