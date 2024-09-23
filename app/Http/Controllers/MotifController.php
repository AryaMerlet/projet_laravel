<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\MotifRequest;
use App\Models\Absence;
use App\Models\Motif;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Session;

class MotifController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware('CheckAdmin', except:['index','show'])];
    }
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
        if(Auth::user()->can('motif-create') || Auth::user()->isA('admin')){
            return view('motif.create');
        } else{
            session::put('message','vous n\'êtes pas autorisé a voir cette page');
            return redirect(route('dashboard'));
        }
    }

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        // Motif::create([
        //     'description' => $request->description
        // ]);
        $motif = new Motif;
        $motif->description = $request->input('description');
        $motif->save();
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
    public function update(MotifRequest $request, Motif $motif)
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
