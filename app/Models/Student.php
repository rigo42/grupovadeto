<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    public function matters(){
        return $this->belongsToMany(Matter::class)->withPivot('qualification');
    }
    public function imagePreview(){
        $image = asset('assets/admin/media/files/upload.png');
        if($this->image):
            if(Storage::exists($this->image->url)):
                $image = Storage::url($this->image->url);
            else:
                $image = $this->image->url;
            endif;
        endif;
        return $image;
    }
    public function fullName(){
        return $this->name.' '.$this->surname; 
    }
    public function age(){
        return Carbon::parse($this->date_birthday)->age;
    }
    public function dateBirthdayToString(){
        return Carbon::parse($this->date_birthday)->format('d-m-Y');
    }
    public function dateToString(){
        return Carbon::parse($this->created_at)->toFormattedDateString();
    }
}
