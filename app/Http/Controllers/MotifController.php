<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Motif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\session;

class MotifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motifs = Motif::all();

        return view('motif.index', compact('motifs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('motif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        new motif($request->description);

        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(Motif $motif)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motif $motif)
    {
        return view('motif.edit', compact('motif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Motif $motif)
    {
        $motif->description = $request->description;
        $motif->save();

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
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
