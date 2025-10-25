<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable, SoftDeletes;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    //Các thuộc tính cần được ẩn để tuần tự hóa.
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //Các thuộc tính cần được ép kiểu.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relation with role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // public function instructors()
    // {
    //     $this->belongsTo(Instructor::class);
    // }
    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function discussion()
    {
        return $this->hasMany(Discussion::class);
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }
}
