<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Motif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MotifController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $motifs = Motif::all();
        return view('motif.index', compact('motifs'));
    }

    /**
     * Summary of create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('motif.create');
    }

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        // dd($request);
        // new motif($request->description);

        return $this->index();
    }

    /**
     * Summary of show
     * @param \App\Models\Motif $motif
     * @return void
     */
    public function show(Motif $motif)
    {
    }

    /**
     * Summary of edit
     * @param \App\Models\Motif $motif
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Motif $motif)
    {
        return view('motif.edit', compact('motif'));
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Motif $motif
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, Motif $motif)
    {
        $motif->description = $request->description;
        $motif->save();

        return $this->index();
    }

    /**
     * Summary of destroy
     * @param \App\Models\Motif $motif
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy(Motif $motif)
    {
        $nb = Absence::where('motif_id', $motif->id)->count();
        if ($nb === 0) {
            $motif->delete();
        } else {
            session::put('message', "Le motif est encore utilisé par {$nb} absence(s)");
        }

        return $this->index();
    }
    /**
     * @return mixed
     * Summary of restore
     * @param \App\Models\Motif $motif
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function restore(Motif $motif)
    {
        $motif->restore();

        return $this->index();
    }
}
