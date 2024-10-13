<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Motif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Bouncer;

class AbsenceController extends Controller
{
    /**
     * Summary of index
     * @return mixed|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $user = auth()->user();

        // Check if the user is authenticated
        if (!$user) {
            return redirect()->route('login')->with('message', 'You need to login first.');
        }

        if (Bouncer::is($user)->a('admin')) {
            $motifs = Motif::all();
            $users = User::all();
            $absences = Absence::with('motif')->get();

            return view('absence.index', compact('absences', 'motifs', 'users'));
        }
        // Check for employee permissions
        elseif (Bouncer::is($user)->a('employee')) {
            $absencesUser = Absence::where('user_id', $user->id)->with('motif')->get();
            $motifs = Motif::all();

            return view('absence.index', compact('absencesUser', 'user', 'motifs'));
        }
        // Redirect if the user doesn't have the right permissions
        else {
            session()->flash('message', "You don't have the rights to access this page");
            return redirect()->route('home');
        }
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
        // $absence = new Absence();
        // $absence->leaveStart = $request->input('leavestart');
        // $absence->leaveEnd = $request->input('leaveend');
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
