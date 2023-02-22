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
    public function reason()
    {
        return $this->hasOne(Reason::class);
    }
}
