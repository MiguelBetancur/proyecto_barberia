<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reserve;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['amount', 'method', 'reserve_id'];


    public function reserve()
    {
        return $this->belongsTo(Reserve::class);
    }
}
