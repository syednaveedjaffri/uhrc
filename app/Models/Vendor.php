<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'vandor_name',
        'company_name',
        'address',
        'email',
        'phone',
        'city',
        'state',
    ];
    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }
}
