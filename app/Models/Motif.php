<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Database\Factories\MotifFactory;

/**
 *
 *
 * @property int $id
 * @property string $description
 * @property bool $is_accessible_worker
 * @property string|null $job
 * @property string $firstname
 * @property string $lastname
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\MotifFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Motif newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Motif newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Motif onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Motif query()
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereIsAccessibleWorker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereJob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Motif withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Motif withoutTrashed()
 * @mixin \Eloquent
 */
class Motif extends Model
{
    /** @use HasFactory<MotifFactory> */
    use HasFactory;
    use SoftDeletes;

    /**
     * Summary of casts
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
