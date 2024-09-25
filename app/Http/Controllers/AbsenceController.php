<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Summary of index
     *
     * @return void
     */
    public function index()
    {
    }

    /**
     * Summary of create
     *
     * @return void
     */
    public function create()
    {
    }

    /**
     * Summary of store
     *
     * @return void
     */
    public function store(Request $request)
    {
    }

    /**
     * Summary of show
     *
     * @return void
     */
    public function show(Absence $absence)
    {
        // $num = $absence->getAbsence();
        // $liste = $absence->allAbsence($absence);
        // dd($liste);
        //
    }

    /**
     * Summary of getAbsence
     *
     * @param  mixed  $absence
     *
     * @return mixed
     */
    public function getAbsence(Request $request, $absence)
    {
        return $absence;
    }

    /**
     * Summary of edit
     *
     * @return void
     */
    public function edit(Absence $absence)
    {
    }

    /**
     * Summary of update
     *
     * @return void
     */
    public function update(Request $request, Absence $absence)
    {
    }

    /**
     * Summary of destroy
     *
     * @return void
     */
    public function destroy(Absence $absence)
    {
    }
}
