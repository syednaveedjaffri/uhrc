<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable=['id','campus_id','faculty_id','department_id','employee_name','extension'];

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
    // public function complain()
    //     {
    //         return $this->belongsTo(Complain::class,'complain_id','id');
    //     }
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
    public function complaine()
        {
            return $this->hasMany(Complain::class);
        }

public function lab()
{
    return $this->hasOne(Query::class);
}
}
