<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPhoto extends Model
{
    use HasFactory;
    protected $table = 'admin_photos';
    protected $fillable = [
        'admin_id',
        'photo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function admin()
    {
       return $this->belongsTo('App\Models\Admin','admin_id');
    }

}
