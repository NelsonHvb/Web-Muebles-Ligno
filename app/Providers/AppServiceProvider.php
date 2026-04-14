<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ---- Personalizar correo de "Reset Password" ----
        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            return (new MailMessage)
                ->subject('Restablecer contraseña - Muebles Ligno')
                ->view('emails.reset-password', [
                    'user' => $notifiable,
                    'url'  => $url,
                ]);
        });

        // “Super admin” (opcional)
        Gate::before(function ($user, string $ability) {
            $esAdmin = DB::table('TBUsuariosRoles as ur')
                ->join('TBRoles as r', 'r.RolId', '=', 'ur.RolId')
                ->where('ur.UserId', $user->UserId)
                ->where('ur.RolId', 1)
                ->where('r.EstadoRol', 'A')
                ->exists();

            return $esAdmin ? true : null;
        });

        Gate::define('manage-roles', fn ($user) => DB::table('TBUsuariosRoles')->where('UserId', $user->UserId)->where('RolId', 1)->exists());
        Gate::define('assign-roles', fn ($user) => DB::table('TBUsuariosRoles')->where('UserId', $user->UserId)->where('RolId', 1)->exists());
        Gate::define('view-bitacoras', fn ($user) => DB::table('TBUsuariosRoles')->where('UserId', $user->UserId)->where('RolId', 1)->exists());
    }
}
