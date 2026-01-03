<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $question_id
 * @property string|null $option_label
 * @property string|null $option_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Questions|null $questions
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOptions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOptions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOptions query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOptions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOptions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOptions whereOptionLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOptions whereOptionText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOptions whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionOptions whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class QuestionOptions extends Model
{
    protected $fillable = [
        'question_id',
        'option_label',
        'option_text',
    ];

    public function questions(){
        return $this->belongsTo(Questions::class);
    }
}
