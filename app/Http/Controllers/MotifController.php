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
        return redirect()->route('motif.index');
    }

    /**
     * Summary of destroy
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy(Motif $motif)
    {
        $nb = Absence::where('motif_id', $motif->id)->count();
        if ($nb === 0) {
            $motif->delete();
            return redirect()->route('motif.index');
        } else {
            session::put('message', "Le motif est encore utilisé par {$nb} absence(s)");
            return redirect()->route('motif.index');
        }
    }

    // /**
    //  * Summary of restore
    //  * @param mixed $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function restore($id)
    // {
    //     $motif = Motif::withTrashed()->findOrFail($id);
    //     $motif->restore();

    //     return redirect()->route('motif.index')->with('success', 'Motif restored successfully');
    // }
}
