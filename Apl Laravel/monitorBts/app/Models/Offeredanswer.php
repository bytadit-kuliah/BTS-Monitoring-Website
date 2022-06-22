<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offeredanswer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // many-to-many
    public function question()
    {
        return $this->belongsToMany(Question::class);
    }
    public function survey()
    {
        return $this->belongsToMany(Survey::class);
    }
    public function surveyor()
    {
        return $this->belongsToMany(Surveyor::class);
    }
}
