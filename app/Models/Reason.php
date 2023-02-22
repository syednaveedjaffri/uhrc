<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    use HasFactory;
    protected $fillable = ['reason_type','id'];

    public function reason()
    {
        return $this->belongsTo(Vendor::class,'reason_id','id');
    }
}
