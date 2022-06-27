<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
     protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function admin(){
        return $this->hasMany(Admin::class);
    }
    public function surveyor(){
        return $this->hasMany(Surveyor::class);
    }
    public function btslist(){
        return $this->hasMany(Btslist::class);
    }
    public function monitoring(){
        return $this->hasMany(Monitoring::class);
    }
    public function surveys()
    {
        return $this->belongsToMany(Survey::class);
    }
    public function btslists()
    {
        return $this->belongsToMany(Btslist::class);
    }
    public function answer(){
        return $this->hasMany(Answer::class);
    }
    // many-to-many
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
