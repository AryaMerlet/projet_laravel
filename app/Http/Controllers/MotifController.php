<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotifRequest;
use App\Mail\infomail;
use App\Models\Absence;
use App\Models\Motif;
use App\Repositories\MotifRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MotifController extends Controller
{
    /**
     * Summary of __construct
     */
    public function __construct(protected MotifRepository $motifRepository)
    {
        $this->motifRepository = $motifRepository;
    }

    /**
     * Summary of index
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // $motifs = new Motif();
        // $motifs->getMotifWithCache();
        $motifs = cache::remember('motif', 3600, function () {
            return Motif::all();
        });

        return view('motif.index', compact('motifs'));
    }

    /**
     * Summary of create
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('motif.create');

        // if (Auth::user()->can('motif-create') || Auth::user()->isA('admin')) {
        //     return view('motif.create');
        // } else {
        //     session::put('message', 'vous n\'êtes pas autorisé a voir cette page');
        //     return redirect(route('dashboard'));
        // }
    }

    /**
     * Summary of store
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(MotifRequest $request)
    {
        $data = $request->all();
        $motif = $this->motifRepository->store($data);
        // $motif = new Motif();
        // $motif->description = $request->input('description');
        // $motif->save();
        cache::forget('motif');
        Mail::to(Auth::user()->email)->send(new infomail($motif));

        return $this->index();
    }

    /**
     * Summary of show
     *
     * @return void
     */
    public function show(Motif $motif)
    {
    }

    /**
     * Summary of edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Motif $motif)
    {
        return view('motif.edit', compact('motif'));
    }

    /**
     * Summary of update
     *
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(MotifRequest $request, Motif $motif)
    {
        $data = $request->all();
        $motif = $this->motifRepository->update($motif, $data);

        // $motif->description = $request->description;
        // $motif->save();
        // cache::forget('motif');
        return redirect()->route('motif.index');
    }

    /**
     * Summary of destroy
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy(Motif $motif)
    {
        $nb = Absence::where('id_motif', $motif->id)->count();
        if ($nb === 0) {
            $motif->delete();
        } else {
            session::put('message', "Le motif est encore utilisé par {$nb} absence(s)");
        }

        return $this->index();
    }

    /**
     * Summary of restore
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function restore(Motif $motif)
    {
        $motif->restore();

        return $this->index();
    }
}
