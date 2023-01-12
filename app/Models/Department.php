<?php

namespace App\Models;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','faculty_id','department_name',
        'extension'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }


}
