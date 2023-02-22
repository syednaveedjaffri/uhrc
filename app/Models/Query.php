<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;
    protected $fillable = ['
    id','campus_id','faculty_id','department_id','complain_id','user_id','employee_id','username','status','send_to_vendor','send_to_dept','received_from_vendor'];
    // protected $hidden = ['status'];
    // protected $fillable=['
    // id','campus_id','user_id','faculty_id','department_id','vendor_id','complain_id'];

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
            return $this->belongsTo(employee::class,'employee_id','id');
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
