<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lab extends Model
{
    use HasFactory;
    protected $fillable=['
    id','campus_id','user_id','faculty_id','department_id','vendor_id','complain_id'];

    public function campus()
    {
        return $this->belongsTo(Campus::class,'campus_id','id');
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }
    public function user()
        {
            return $this->belongsTo(User::class,'user_id','id');
        }
    public function complain()
        {
            return $this->belongsTo(Complain::class,'complain_id','id');
        }
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
    public function complains()
        {
            return $this->hasMany(Complain::class,'complain_id','id');
        }

}
