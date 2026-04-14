<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BitacoraMovController;
use App\Http\Controllers\BitacoraESController;
use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AccountController;

// Auth Controllers
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::view('/', 'tienda.index')->name('home');

Route::view('/contact', 'tienda.contact')->name('contact');
Route::view('/about-us', 'tienda.about-us')->name('about');
Route::view('/testimonials', 'tienda.testimonials')->name('testimonials');
Route::view('/blog', 'tienda.blog')->name('blog');
Route::view('/terms', 'tienda.terms')->name('terms');
Route::view('/checkout', 'tienda.checkout')->name('checkout');

/*
|--------------------------------------------------------------------------
| Auth (Register / Login / Logout)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Login (IMPORTANTE: POST también se llama "login" porque tu form usa route('login'))
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Perfil / Cuenta
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Account (Mi cuenta)
    Route::prefix('account')->name('account.')->group(function () {
        Route::view('/', 'account.index')->name('index');

        Route::put('/profile', [AccountController::class, 'updateProfile'])->name('profile.update');
        Route::put('/password', [AccountController::class, 'updatePassword'])->name('password.update');
        Route::delete('/', [AccountController::class, 'destroy'])->name('destroy');
    });
});

/*
|--------------------------------------------------------------------------
| Roles
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');

    Route::patch('/roles/{rol}/toggle', [RolesController::class, 'toggle'])->name('roles.toggle');
    Route::post('/roles/asignar', [RolesController::class, 'asignarRol'])->name('roles.asignar');
    Route::delete('/roles/desasignar', [RolesController::class, 'desasignarRol'])->name('roles.desasignar');
});

/*
|--------------------------------------------------------------------------
| Bitácoras
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'can:view-bitacoras'])->group(function () {
    Route::get('/bitacoras', fn () => redirect()->route('bitacoras.mov'))->name('bitacoras.index');

    Route::get('/bitacoras/movimientos', [BitacoraMovController::class, 'index'])->name('bitacoras.mov');
    Route::get('/bitacoras/usuarios', [BitacoraESController::class, 'index'])->name('bitacoras.usuario');
});

/*
|--------------------------------------------------------------------------
| Solicitudes (Cliente)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/solicitud-personalizada', [SolicitudesController::class, 'create'])->name('solicitudes.create');
    Route::post('/solicitud-personalizada', [SolicitudesController::class, 'store'])->name('solicitudes.store');

    Route::get('/mis-solicitudes', [SolicitudesController::class, 'index'])->name('solicitudes.index');
    Route::get('/mis-solicitudes/{solicitud}', [SolicitudesController::class, 'show'])->name('solicitudes.show');
});

/*
|--------------------------------------------------------------------------
| Solicitudes (Admin)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('solicitudes.index');
        Route::get('/solicitudes/{solicitud}', [SolicitudController::class, 'show'])->name('solicitudes.show');

        Route::patch('/solicitudes/{solicitud}/aprobar', [SolicitudController::class, 'aprobar'])->name('solicitudes.aprobar');
        Route::patch('/solicitudes/{solicitud}/rechazar', [SolicitudController::class, 'rechazar'])->name('solicitudes.rechazar');
    });

/*
|--------------------------------------------------------------------------
| Contacto
|--------------------------------------------------------------------------
*/

Route::post('/contacto', [ContactController::class, 'send'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| Email Verification (tu implementación)
|--------------------------------------------------------------------------
*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', function (Request $request, $id, $hash) {
    $user = User::findOrFail($id);

    if ($hash !== sha1($user->Email)) {
        abort(403, 'Invalid verification link.');
    }

    if (is_null($user->email_verified_at)) {
        $user->email_verified_at = now();
        $user->save();
    }

    return view('emails.email-verified');
})->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/*
|--------------------------------------------------------------------------
| Forgot / Reset Password
|--------------------------------------------------------------------------
*/

// Pedir enlace: guest (normal)
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', fn () => view('auth.forgot-password'))->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
});

// Reset: SIN guest (para que funcione aunque estés logueado)
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
