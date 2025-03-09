<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoEditorGallery extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'photo_library_gallery';

    // Allow mass assignment for these fields
    protected $fillable = ['user_id', 'user_type', 'photo'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
