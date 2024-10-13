<?php

namespace App\Repositories;

use App\Models\Motif;

class MotifRepository
{
    /**
     * Summary of motif
     * @var Motif
     */
    protected $motif;

    /**
     * Summary of __construct
     * @param \App\Models\Motif $motif
     */
    public function __construct(Motif $motif)
    {
        $this->motif = $motif;
    }

    /**
     * Summary of store
     *
     * @param  array<string, mixed>  $inputs
     *
     * @return Motif
     */
    public function store(array $inputs)
    {
        $motif = new motif();

        return $this->save($motif, $inputs);
    }

    /**
     * Summary of update
     *
     * @param  array<string, mixed>  $inputs
     *
     * @return Motif
     */
    public function update(Motif $motif, array $inputs)
    {
        return $this->save($motif, $inputs);
    }

    /**
     * Summary of save
     *
     * @param  array<string, mixed>  $inputs
     *
     * @return Motif
     */
    private function save(Motif $motif, array $inputs)
    {
        $motif->description = $inputs['description'];
        $motif->save();
        return $motif;
    }
}
