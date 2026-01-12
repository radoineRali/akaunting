<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Illuminate\Http\Request;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;

Livewire::setScriptRoute(function ($handle) {
    $base = request()->getBasePath();
    return Route::get($base . '/vendor/livewire/livewire/dist/livewire.min.js', $handle);
});

Route::get('/', function () {
    return view('custom_index');
})->name('welcome');

Route::get('/my-register', function () {
    return view('custom_register');
})->name('my-register.show');

Route::post('/my-register', function (Request $request) {
    try {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'enabled'  => 1,
        ]);

        $user->roles()->attach(1);

        return "Registration successful! You can now <a href='/auth/login'>Login here</a>";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
})->name('my-register.store');