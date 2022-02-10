<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'sub_title',
        'slug',
        'content',
        'short_content',
        'thumb_image_path',
    ];

    protected $casts = [
        'title'         => 'string',
        'sub_title'     => 'string',
        'slug'          => 'string',
        'content'       => 'string',
        'short_content' => 'string',
        'created_at'    => 'datetime:Y-m-d H:i:s',
        'updated_at'    => 'datetime:Y-m-d H:i:s',
        'deleted_at'    => 'datetime:Y-m-d H:i:s'
    ];
}
