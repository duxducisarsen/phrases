@extends('layouts.app')

@section('title', __('HR'))

@section('subtitle', 'Frases Inspiración')

@section('contentVue')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <button-plus link="{{ route('fraseInspiracion.create') }}"></button-plus>

                <x-table-standard id="table_frases_inspiracion" :heads="['Frase', 'Privacidad', '']" :datatable="true">
                    @foreach ($frases as $frase)
                        <tr>
                            <td>{{ $frase->frase }}</td>
                            <td>{{ $frase->nivel_privacidad == 1 ? 'Privada' : 'Pública'  }}</td>
                            <td>
                                <form-edit-delete   urldelete="{{ route('fraseInspiracion.destroy', $frase->id) }}" urledit="{{ route('fraseInspiracion.edit', $frase->id )}}" frase="Seguro quiere eliminar esta frase?" id="{{ 'form_delete_'.$frase->id }}"></form-edit-delete>
                            </td>
                        </tr>
                    @endforeach
                </x-table-standard>

            </div>
        </div>
    </div>
@endsection
