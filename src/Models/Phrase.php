<?php

namespace DuxDucisArsen\Phrases\Models;

use Database\Factories\PhraseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Phrase extends Model
{
    use HasFactory;
    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PhraseFactory::new();
    }

    protected $guarded = ['id'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * EVENTS
         */
        self::creating( function ($model) {// Se podría hacer con Event y Listener, pero cuando es algo simple más fácil acá
            $model->created_by = auth()->id();
        });

        self::saved( function () { // Se podría hacer con Event y Listener, pero cuando es algo simple más fácil acá
            Cache::store('redis')->forget('frases_inspiracion_publicas');
        });
    }

    
    /**
     * RELATIONS
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    /**
     * Busca una frase al azar
     *
     */
    static public function getFraseAzar()
    {
        $frasesPublicas = Cache::store('redis')->rememberForever('frases_inspiracion_publicas', function () {
            return self::getFrasesPublicas();
        });

        $frasesPrivadas  = self::getFrasesPrivadas();

        return $frasesPublicas->merge($frasesPrivadas)->random();
    }

    /**
     * Frase que creadas por el usuario autenticado con nivel de privacidad 1
     */
    static public function getFrasesPrivadas()
    {
        return self::whereNivelPrivacidad(1)
                    ->whereCreatedBy( auth()->id() )
                    ->get();
    }

    /**
     * Frases con privacidad 0
     */
    static public function getFrasesPublicas()
    {
        return self::whereNivelPrivacidad(0)->get();
    }

    
}