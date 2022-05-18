<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function surveyor()
    {
    return $this->belongsTo(surveyor::class);
    }
    public function survey()
    {
    return $this->belongsTo(survey::class);
    }
    public function monitoring()
    {
    return $this->belongsTo(monitoring::class);
    }
}
