<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Btslist extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function btstype(){
        return $this->belongsTo(Btstype::class);
    }
    public function village(){
        return $this->belongsTo(Village::class);
    }
    public function owner(){
        return $this->belongsTo(Owner::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function btsphoto(){
        return $this->hasMany(Btsphoto::class);
    }
    public function monitoring(){
        return $this->hasMany(Monitoring::class);
    }
    public function provider()
    {
        return $this->belongsToMany(Provider::class);
    }
    public function answer(){
        return $this->hasMany(Answer::class);
    }
    public function survey()
    {
        return $this->belongsToMany(Survey::class);
    }

}
