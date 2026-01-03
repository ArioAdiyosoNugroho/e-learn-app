<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string|null $cover_image
 * @property string|null $pdf_file
 * @property string|null $video_url
 * @property int $views
 * @property string $status
 * @property string|null $published_at
 * @property string|null $topic
 * @property int|null $allow_comments
 * @property int $category_id
 * @property int $guru_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\User $guru
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereAllowComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi wherePdfFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereTopic($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereVideoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materi whereViews($value)
 * @mixin \Eloquent
 */
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
