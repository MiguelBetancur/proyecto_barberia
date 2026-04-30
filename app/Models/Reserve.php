<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reserve_Service;
use App\Models\Payment;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reserve extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'date',
        'time',
        'state',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reserve_services(){
        return $this->hasMany(Reserve_Service::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function services()
    {
      return $this->belongsToMany(Service::class, 'reserve_services');
    }
}
