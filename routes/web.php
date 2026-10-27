<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat');
    Route::get('/chat/{id}', [ChatController::class, 'conversation'])->name('chat.conversation');
    Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
});

use Illuminate\Support\Facades\Auth;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->only('name','password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/chat');
    }
    return back()->withErrors([
        'name' => 'Credenciales incorrectas',
    ]);
})->name('login.post');

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
