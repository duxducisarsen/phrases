<?php

namespace DuxDucisArsen\Http\Controllers\HumanResources;

use Illuminate\Routing\Controller;
use DuxDucisArsen\Http\Requests\FraseInspiracionRequest;
use DuxDucisArsen\Models\FraseInspiracion;

class FraseInspiracionController extends Controller
{

    public function __construct()
    {
        $this->middleware('ajax')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', FraseInspiracion::class);
        $frases = FraseInspiracion::all();
        return view('humanResources.fraseInspiracion.index_frase_inspiracion', compact('frases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('createOrEdit', FraseInspiracion::class);
        $fraseInspiracion = new FraseInspiracion;
        return view('humanResources.fraseInspiracion.create_or_edit_frase_inspiracion', compact('fraseInspiracion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NeuperAp\Http\Requests\FraseInspiracionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FraseInspiracionRequest $request)
    {
        $this->authorize('createOrEdit', FraseInspiracion::class);
        FraseInspiracion::create( $request->validated() );
        return redirect()->route('fraseInspiracion.index')->with('success', 'Frase insertada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $fraseInspiracion, dejo el parámetro para ponerle algo, pero en realidad siempre trae valor 1
     * @return \Illuminate\Http\Response
     */
    public function show($fraseInspiracion)
    {
        $this->authorize('view', FraseInspiracion::class);
        return FraseInspiracion::getFraseAzar();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FraseInspiracion  $fraseInspiracion
     * @return \Illuminate\Http\Response
     */
    public function edit(FraseInspiracion $fraseInspiracion)
    {
        $this->authorize('createOrEdit', FraseInspiracion::class);
        $fraseInspiracion->load('createdBy:id,name');
        return view('humanResources.fraseInspiracion.create_or_edit_frase_inspiracion', compact('fraseInspiracion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NeuperAp\Http\Requests\FraseInspiracionRequest  $request
     * @param  \App\Models\FraseInspiracion  $fraseInspiracion
     * @return \Illuminate\Http\Response
     */
    public function update(FraseInspiracionRequest $request, FraseInspiracion $fraseInspiracion)
    {
        $fraseInspiracion->update( $request->validated() );
        return redirect()->route('fraseInspiracion.index')->with('success', 'Frase actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FraseInspiracion  $fraseInspiracion
     * @return \Illuminate\Http\Response
     */
    public function destroy(FraseInspiracion $fraseInspiracion)
    {
        $this->authorize('delete', FraseInspiracion::class);
        $fraseInspiracion->delete();
        return redirect()->route('fraseInspiracion.index')->with('success', 'Frase eliminada con éxito');
    }
}
