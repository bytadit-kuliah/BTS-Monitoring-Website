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

}
