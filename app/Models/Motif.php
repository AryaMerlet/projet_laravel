<?php

namespace App\Models;

use Cache;
use Database\Factories\MotifFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Absence> $absences
 * @property-read int|null $absences_count
 *
 * @method static \Database\Factories\MotifFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Motif newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Motif newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Motif onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Motif query()
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Motif withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Motif extends Model
{
    /** @use HasFactory<MotifFactory> */
    use HasFactory;

    use SoftDeletes;

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'description', // Add 'description' to the fillable array
    ];

    /**
     * Summary of absences
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Absence>
     */
    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    /**
     * Summary of getMotifWithCache
     *
     * @return mixed
     */
    public function getMotifWithCache()
    {
        return Cache::remember('motif', 3600, function () {
            return Motif::all();
        });
    }

    /**
     * Summary of casts
     *
     * @return array<mixed>
     */
    protected function casts(): array
    {
        return [
            'is_accessible_worker' => 'boolean',
        ];
    }

    //For mass integration
    // protected $fillable = ['description'];
}
