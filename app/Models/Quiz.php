<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property int $materi_id
 * @property int $guru_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $is_active
 * @property int|null $time_limit
 * @property int|null $passing_score
 * @property-read \App\Models\User $guru
 * @property-read \App\Models\Materi $materi
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\QuestionOptions> $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Results> $resuts
 * @property-read int|null $resuts_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Quiz newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Quiz newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Quiz query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Quiz whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Quiz whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Quiz whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Quiz whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Quiz whereMateriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Quiz wherePassingScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Quiz whereTimeLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Quiz whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Quiz whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Quiz extends Model
{
    protected $fillable = [
        'title',
        'materi_id',
        'guru_id',
        'is_active',
        'time_limit',
        'passing_score',
    ];

    public function materi(){
        return $this->belongsTo(Materi::class);
    }

    public function guru(){
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function questions(){
        return $this->hasMany(QuestionOptions::class);
    }

    public function resuts(){
        return $this->hasMany(Results::class);
    }


}
