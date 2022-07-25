<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatterStudent extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'matter_student';

    public function matter(){
        return $this->belongsTo(Matter::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
