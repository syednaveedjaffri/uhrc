<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $table = 'complains';

    protected  $fillable= [
            'id','user_id','complain_type',
            'serialnumber',
            'specification'];
    public function user()
    {
         return $this->belongsTo(User::class,'user_id','id');
    }
    // public function complain()
    // {
    //      return $this->hasOne(Department::class,'complain_id','id');
    // }
}
