<?php

namespace App\Models;

use Database\Factories\AbsenceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $leaveStart
 * @property string $leaveEnd
 * @property int $user_id
 * @property int $motif_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \App\Models\Motif $motif
 * @property-read \App\Models\User $user
 *
 * @method static \Database\Factories\AbsenceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Absence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absence query()
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereLeaveEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereLeaveStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereMotifId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Absence extends Model
{
    /** @use HasFactory<AbsenceFactory> */
    use HasFactory;

    /**
     * Summary of motif
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Motif,Absence>
     */
    public function motif()
    {
        return $this->belongsTo(Motif::class);
    }

    /**
     * Summary of user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User,Absence>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // // SELECT motifs.description FROM motifs, absences, users WHERE motifs.id = absences.id_motif AND users.id = absences.id_user AND users.id = $id ;

    // /**
    //  * Summary of getAbsenceWithMotifAndUser
    //  * @param mixed $user
    //  * @return \Illuminate\Support\Collection
    //  */
    // public function getAbsenceWithMotifAndUser($user){
    //     $userId = $user;

    //     return Motif::whereHas('absences', function ($query) use ($userId) {
    //         $query->whereHas('user', function ($query) use ($userId) {
    //             $query->where('id', $userId);
    //         });
    //     })->get();
    // }

    // public function getAbsenceOfUser($id){
    //     $userId = $id;

    //     return Absence::whereHas('user', function ($query) use ($userId){
    //         $query->where('id', $userId);
    //     })->get();
    // }
}
