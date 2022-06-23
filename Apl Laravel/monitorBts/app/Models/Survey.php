<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // many-to-many
    public function question()
    {
        return $this->belongsToMany(Question::class);
    }
    public function offeredanswer()
    {
        return $this->belongsToMany(Offeredanswer::class);
    }
    // public function surveyor()
    // {
    //     return $this->belongsToMany(Surveyor::class);
    // }
    public function user(){
        return $this->belongsToMany(User::class);
    }
}
