<?php

namespace App\Models;

use Database\Factories\AbsenceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $startleave
 * @property string $duration
 * @property int $id_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $id_motif
 *
 * @property-read \App\Models\Motif|null $Motifs
 * @property-read \App\Models\User|null $Users
 *
 * @method static \Database\Factories\AbsenceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Absence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absence query()
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereIdMotif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereStartleave($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Absence extends Model
{
    /** @use HasFactory<AbsenceFactory> */
    use HasFactory;

    public function Motifs()
    {
        return $this->HasOne(Motif::class);
    }

    public function Users()
    {
        return $this->HasOne(User::class);
    }
}
