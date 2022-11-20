@extends('layouts.app')

@section('title', __('HR'))

@section('subtitle', 'Frase Inspiración #'.$fraseInspiracion->id)

@section('breadcrumb')
    <a href="{{ route('fraseInspiracion.index') }}">Frases Inspiración</a>
@endsection
@section('content')
    @if( $fraseInspiracion->exists )
        <form action="{{ route('fraseInspiracion.update', $fraseInspiracion->id ) }}" method="post">
            @method('PUT')
            <input type="hidden" name="id" value="{{ $fraseInspiracion->id }}">
            <div class="col-12">
                <label>Creada por: </label> {{ $fraseInspiracion->createdBy->name }}
            </div>
    @else
        <form action="{{ route('fraseInspiracion.store') }}" method="post">
    @endif
        @csrf
        <div class="container">
            <div class="row">


                <div class="col-6">
                    <label for="frase">Frase:</label>
                    <textarea class="form-control" required name="frase" rows="9" cols="80" placeholder="Frase Markdown">{{ $fraseInspiracion->frase ?? old('frase' )}}</textarea>
                </div>

                <div class="col-6">
                    <label for="nivel_privacidad">Nivel Privacidad</label>
                    <select name="nivel_privacidad" id="nivel_privacidad" class="form-control">
                        <option value="1"
                            @if ( $fraseInspiracion->nivel_privacidad == '1' || old('nivel_privacidad') == '1') selected  @endif>
                            Privada (solo quien la creó puede verla)
                        </option>
                        <option value="0" @if ( $fraseInspiracion->nivel_privacidad == '0' || old('nivel_privacidad') == '0') selected @endif>
                            Pública
                        </option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <br>
                    <button type="submit" class="btn btn-secondary btn-neuper">GUARDAR</button>
                </div>
            </div>
        </div>
    </form>
@endsection
