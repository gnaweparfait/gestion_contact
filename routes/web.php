<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

/* GOOGLE LOGIN */
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::where('email', $googleUser->email)->first();

    if (!$user) {
        $user = User::create([
            'name'     => $googleUser->name,
            'email'    => $googleUser->email,
            'password' => bcrypt(uniqid()),
        ]);
    }

    Auth::login($user);

    return redirect()->route('contacts.index');
});

/* ROUTES PROTÉGÉES */
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('contacts.index');
    })->name('dashboard');

    // ✅ correction ici : contacts (pluriel)
    Route::resource('contacts', ContactController::class);

});