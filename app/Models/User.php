<?php

// App\Models\User.php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $table = 'TBUsuarios';
    protected $primaryKey = 'UserId';
    public $timestamps = false;

    protected $fillable = [
    'Usuario',
    'Email',
    'PasswordHash',
    'EstadoUsuario',
    'FechaRegistro',
    'TelefonoUsuario',
    'DireccionUsuario',
    'remember_token',
    'email_verified_at',
];



    protected function casts(): array
    {
        return [
            'PasswordHash' => 'hashed',
            'email_verified_at' => 'datetime',
        ];
    }

    public function getAuthPassword()
    {
        return $this->PasswordHash;
    }

    public function sendEmailVerificationNotification()
    {
        $verificationUrl = route('verification.verify', [
            'id'   => $this->getKey(),
            'hash' => sha1($this->Email),
        ]);

        Mail::send('emails.verify-email', [
            'url'  => $verificationUrl,
            'user' => $this,
        ], function ($m) {
            $m->to($this->Email)->subject('Verifica tu correo en Muebles Ligno');
        });
    }

    public function getEmailForPasswordReset()
    {
        return $this->Email;
    }

    public function routeNotificationForMail($notification): string
    {
        return $this->Email;
    }



    // aquí ya NO sobreescribimos sendEmailVerificationNotification()
}

