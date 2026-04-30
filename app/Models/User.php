<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\Advertisement;
use App\Models\Review;
use App\Models\Reserve;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Los atributos que se pueden asignar masivamente
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * Los atributos que se ocultan (por seguridad)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts (tipos de datos automáticos)
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación: Un usuario pertenece a un rol
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }

    public function reviews(){
        $this->hasMany(Review::class);
    }

    public function reserves(){
        $this->hasMany(Reserve::class);
    }
}