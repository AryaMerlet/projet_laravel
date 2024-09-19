<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property string $startleave
 * @property string $duration
 * @property int $id_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AbsenceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Absence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absence query()
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereStartleave($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Absence extends Model
{
    /** @use HasFactory<AbsenceFactory> */
    use HasFactory;

    /**
     * Summary of absence
     * @return BelongsTo<Motif,<Absence>
     */
    public function motif()
    {
        return $this->belongsTo(Motif::class);
    }

    public function allAbsence($clause)
    {
        return Absence::where('id_user', $clause)->get();
    }
}
