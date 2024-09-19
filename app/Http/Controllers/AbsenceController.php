<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Summary of index
     * @return void
     */
    public function index()
    {
    }

    /**
     * Summary of create
     * @return void
     */
    public function create()
    {
    }

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
    }

    /**
     * Summary of show
     * @param \App\Models\Absence $absence
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
     * @param \Illuminate\Http\Request $request
     * @param mixed $absence
     * @return mixed
     */
    public function getAbsence(Request $request, $absence)
    {
        return $absence;
    }

    /**
     * Summary of edit
     * @param \App\Models\Absence $absence
     * @return void
     */
    public function edit(Absence $absence)
    {
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Absence $absence
     * @return void
     */
    public function update(Request $request, Absence $absence)
    {
    }

    /**
     * Summary of destroy
     * @param \App\Models\Absence $absence
     * @return void
     */
    public function destroy(Absence $absence)
    {
    }
}
