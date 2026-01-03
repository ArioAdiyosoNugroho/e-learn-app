<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $quiz_id
 * @property string $question
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $correct_option_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Answers> $answers
 * @property-read int|null $answers_count
 * @property-read \App\Models\QuestionOptions|null $correctOption
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\QuestionOptions> $options
 * @property-read int|null $options_count
 * @property-read \App\Models\Quiz $quiz
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Questions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Questions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Questions query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Questions whereCorrectOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Questions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Questions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Questions whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Questions whereQuizId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Questions whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Questions whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Questions extends Model
{
    protected $fillable = [
        'quiz_id',
        'questions',
        'type',
        'correct_option_id',
    ];

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function correctOption(){
        return $this->belongsTo(QuestionOptions::class, 'correct_option_id');
    }

    public function options(){
        return $this->hasMany(QuestionOptions::class);
    }

    public function answers(){
        return $this->hasMany(Answers::class);
    }


}
