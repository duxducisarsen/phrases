<?php

namespace DuxDucisArsen\Phrases\Http\Controllers;

use DuxDucisArsen\Phrases\Http\Requests\PhraseRequest;
use DuxDucisArsen\Phrases\Models\Phrase;

class PhraseController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('ajax')->only('show');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Phrase::class);
        $phrases = Phrase::all();
        return view('phrases::index_phrases', compact('phrases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Phrase::class);
        $phrase = new Phrase;
        return view('phrases::create_or_edit_phrase', compact('phrase'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NeuperAp\Http\Requests\PhraseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhraseRequest $request)
    {
        $this->authorize('create', Phrase::class);
        Phrase::create( $request->validated() );
        return redirect()->route('phrase.index')->with('success', 'Frase insertada con éxito');
    }

    /**
     * Toma una frase al azar entre las públicas y las del usuario
     * No require autorización, cualquiera auth puede utilizar
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return 'prueba';
        return Phrase::getRandomPhrase();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function edit(Phrase $phrase)
    {
        $this->authorize('edit', Phrase::class);
        $phrase->load('createdBy:id,name');
        return view('phrases::create_or_edit_phrase', compact('phrase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NeuperAp\Http\Requests\PhraseRequest  $request
     * @param  \App\Models\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function update(PhraseRequest $request, Phrase $phrase)
    {
        $phrase->update( $request->validated() );
        return redirect()->route('phrase.index')->with('success', 'Frase actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phrase $phrase)
    {
        $this->authorize('delete', Phrase::class);
        $phrase->delete();
        return redirect()->route('phrase.index')->with('success', 'Frase eliminada con éxito');
    }
}
