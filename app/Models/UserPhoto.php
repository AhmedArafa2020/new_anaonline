<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
    use HasFactory;
    protected $table = 'user_photos';
    protected $fillable = [
        'user_id',
        'photo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
       return $this->belongsTo('App\Models\User','user_id');
    }

}
