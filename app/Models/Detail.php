<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    // protected $fillable = Guard;
    protected $fillable = ["stu_id", "years", "marks1", "marks2", "marks3", "remarks"];
    public function student()
    {
        return $this->belongsTo(Student::class, 'stu_id', 'id');
    }
}
