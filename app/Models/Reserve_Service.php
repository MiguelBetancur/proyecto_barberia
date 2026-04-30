<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Reserve;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reserve_Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reserve_services';

    protected $fillable = [
        'reserve_id',
        'service_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function reserve()
    {
        return $this->belongsTo(Reserve::class);
    }
}
