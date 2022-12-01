<?php

namespace DuxDucisArsen\Phrases\Models;

use App\Models\User;

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
            Cache::store('redis')->forget('public_phrases');
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
    static public function getRandomPhrase()
    {
        $publicPhrases = Cache::store('redis')->rememberForever('public_phrases', function () {
            return self::getPublicPhrases();
        });

        $privatePhrases  = self::getPrivatePhrases(auth()->id());

        return $publicPhrases->merge($privatePhrases)->random();
    }

    /**
     * Frase que creadas por el usuario autenticado con nivel de privacidad 1
     */
    static public function getPrivatePhrases($userId)
    {
        return self::whereIsPrivate(1)
                    ->whereCreatedBy( $userId )
                    ->get();
    }

    /**
     * Frases con privacidad 0
     */
    static public function getPublicPhrases()
    {
        return self::whereIsPrivate(0)->get();
    }

    
}