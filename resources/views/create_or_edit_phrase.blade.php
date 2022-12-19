@extends('commons::layouts.app')

@section('title', __('HR'))

@section('subtitle', 'Frase Inspiración #'.$phrase->id)

@section('breadcrumb')
    <a href="{{ route('phrase.index') }}">Frases Inspiración</a>
@endsection

@section('content')
    @if( $phrase->exists )
        <form action="{{ route('phrase.update', $phrase->id ) }}" method="post">
            @method('PUT')
            <input type="hidden" name="id" value="{{ $phrase->id }}">
            <div class="col-12">
                <label>Creada por: </label> {{ $phrase->createdBy->name }}
            </div>
    @else
        <form action="{{ route('phrase.store') }}" method="post">
    @endif
        @csrf
        <div class="container">
            <div class="row">


                <div class="col-6">
                    <label for="phrase">Frase:</label>
                    <textarea class="form-control" required name="phrase" rows="9" cols="80" placeholder="Frase Markdown">{{ $phrase->phrase ?? old('phrase' )}}</textarea>
                </div>

                <div class="col-6">
                    
                    <label for="is_private">Nivel Privacidad</label>
                    <select name="is_private" id="is_private" class="form-control">
                        <option value="1" @selected( in_array('1', [$phrase->is_private, old('is_private')]) )
                            >
                            Privada (solo quien la creó puede verla)
                        </option>
                        <option value="0" @selected( in_array('0', [$phrase->is_private, old('is_private')]) )
                            >
                            Pública
                        </option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-secondary btn-neuper">GUARDAR</button>
                </div>
            </div>
        </div>
    </form>
@endsection
