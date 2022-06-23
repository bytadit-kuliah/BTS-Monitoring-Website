<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveyor extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function monitoring(){
    //     return $this->hasMany(Monitoring::class);
    // }
    // // many-to-many
    // public function question()
    // {
    //     return $this->belongsToMany(Question::class);
    // }
    // public function survey()
    // {
    //     return $this->belongsToMany(Survey::class);
    // }
    // public function offeredanswer()
    // {
    //     return $this->belongsToMany(Offeredanswer::class);
    // }

}
