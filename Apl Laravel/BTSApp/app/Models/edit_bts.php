<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class edit_bts extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function admin()
    {
    return $this->belongsTo(admin::class);
    }
    public function bts()
    {
    return $this->belongsTo(bts::class);
    }
}
