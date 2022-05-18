<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class edit_answer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function surveyor()
    {
    return $this->belongsTo(surveyor::class);
    }

    public function answer()
    {
    return $this->belongsTo(answer::class);
    }
}
