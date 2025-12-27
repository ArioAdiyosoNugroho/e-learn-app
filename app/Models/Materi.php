<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable=[
        'title',
        'slug',
        'description',

        'cover_image',
        'pdf_file',
        'video_url',

        'views',
        'status',
        'published_at',

        'topic',
        'allow_comments',

        'category_id',
        'guru_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}
