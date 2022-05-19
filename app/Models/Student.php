<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $title = "students";
    protected $fillable = ["name", "nrc", "birthday", "phone", "profile", "gender", "region", "hobbies"];
    public function details()
    {
        return $this->hasMany(Detail::class, 'stu_id');
    }
}
