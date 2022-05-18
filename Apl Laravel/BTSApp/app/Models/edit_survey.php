<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class edit_survey extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function admin()
    {
    return $this->belongsTo(admin::class);
    }

    public function survey()
    {
    return $this->belongsTo(survey::class);
    }
}
