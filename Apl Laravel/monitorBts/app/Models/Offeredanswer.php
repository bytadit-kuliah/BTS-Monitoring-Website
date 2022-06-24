<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offeredanswer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // many-to-many
    // public function question()
    // {
    //     return $this->belongsToMany(Question::class);
    // }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function answer(){
        return $this->hasMany(Answer::class);
    }
    // public function survey()
    // {
    //     return $this->belongsToMany(Survey::class);
    // }
    // public function surveyor()
    // {
    //     return $this->belongsToMany(Surveyor::class);
    // }
    // public function user(){
    //     return $this->belongsToMany(User::class);
    // }
}
