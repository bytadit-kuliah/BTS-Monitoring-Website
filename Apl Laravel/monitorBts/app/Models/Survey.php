<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function btslists()
    {
        return $this->belongsToMany(Btslist::class);
    }
    public function answer(){
        return $this->hasMany(Answer::class);
    }
    public function question(){
        return $this->hasMany(Question::class);
    }
    public function mysurvey(){
        return $this->hasMany(Mysurvey::class);
    }
}
