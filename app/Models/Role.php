<?php

namespace App\Models;

use Database\Factories\RoleFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Role as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;


class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id', 'name'];

    public function users(){
        return $this->hasMany(User::class);
    }
}
