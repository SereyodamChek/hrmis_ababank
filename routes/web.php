<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/lang/{locale}', function (string $locale) {
    $available = ['km', 'en']; // Add 'zh' if needed

    if (! in_array($locale, $available)) {
        $locale = config('app.fallback_locale');
    }
    session(['locale' => $locale]);
    App::setLocale($locale);
    return back(); // Return to previous page
})->name('locale.switch');
Route::get('/', function () {
    return view('welcome');
});
Route::post('/login', function (Request $request) {
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);
    if ($request->input('username') === 'admin' && $request->input('password') === '123$') {
        session()->flash('login_success', true);
        return redirect('/home');
    }
    return back()
        ->withErrors(['login' => 'Invalid username or password'])
        ->withInput();
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/logout', function () {
    session()->forget('login_success');
    session()->flush();
    return redirect('/');
})->name('logout');
