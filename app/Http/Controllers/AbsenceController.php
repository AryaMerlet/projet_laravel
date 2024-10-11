<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Motif;
use App\Models\User;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Summary of index
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // $user = auth::user();
        // if (Bouncer::is($user)->a('admin')){
        $motifs = Motif::all();
        // $absences = Absence::all();
        $users = User::all();
        $absences = Absence::with('motif');

        return view('absence.index', compact('absences', 'motifs', 'absences'));
        // } else if(Bouncer::is($user)->a('employee')) {
        //     $absencesUser = New Absence;
        //     $absencesUser->getAbsenceWithMotifAndUser($user->id);
        //     $motifs = Motif::all();
        //     $absences = Absence::all();

        //     return view('absence.index', compact('absences','user','motifs','absencesUser'));
        // } else {
        //     session::hasMessage("You don't have the rights to access this page");
        //     return redirect()->route('/');
        // }
    }

    /**
     * Summary of create
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('absence.create');
    }

    /**
     * Summary of store
     *
     * @return void
     */
    public function store(Request $request)
    {
        $absence = new Absence();
        $absence->leaveStart = $request->input('leavestart');
        $absence->leaveEnd = $request->input('leaveend');
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
