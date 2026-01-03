<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $question_id
 * @property int $option_id
 * @property bool $is_correct
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\QuestionOptions $options
 * @property-read \App\Models\Questions|null $questions
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Answers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Answers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Answers query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Answers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Answers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Answers whereIsCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Answers whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Answers whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Answers whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Answers whereUserId($value)
 * @mixin \Eloquent
 */
class Answers extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'option_id',
        'is_correct',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->belongsTo(Questions::class);
    }

    public function options()
    {
        return $this->belongsTo(QuestionOptions::class, 'option_id');
    }
}
