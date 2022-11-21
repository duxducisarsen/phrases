@extends('layouts.app')

@section('title', __('HR'))

@section('subtitle', 'Frases Inspiración')

@section('contentVue')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <button-plus link="{{ route('phrase.create') }}"></button-plus>

                <x-table-standard id="table_phrases" :heads="['Frase', 'Privacidad', '']" :datatable="true">
                    @foreach ($phrases as $phrase)
                        <tr>
                            <td>{{ $phrase->phrase }}</td>
                            <td>{{ $phrase->is_private == 1 ? 'Privada' : 'Pública'  }}</td>
                            <td>
                                <form-edit-delete   urldelete="{{ route('phrase.destroy', $phrase->id) }}" urledit="{{ route('phrase.edit', $phrase->id )}}" frase="Seguro quiere eliminar esta frase?" id="{{ 'form_delete_'.$phrase->id }}"></form-edit-delete>
                            </td>
                        </tr>
                    @endforeach
                </x-table-standard>

            </div>
        </div>
    </div>
@endsection
