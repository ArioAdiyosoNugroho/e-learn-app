<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $quiz_id
 * @property int $user_id
 * @property int $score
 * @property string|null $completed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Quiz $quiz
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Results newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Results newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Results query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Results whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Results whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Results whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Results whereQuizId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Results whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Results whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Results whereUserId($value)
 * @mixin \Eloquent
 */
class Results extends Model
{
    protected $fillable = [
        'quiz_id',
        'user_id',
        'score',
        'completed_at',
    ];

    protected $dates = [
        'completed_at',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
