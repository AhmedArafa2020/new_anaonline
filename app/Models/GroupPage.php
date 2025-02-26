<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name',
        'link',
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
