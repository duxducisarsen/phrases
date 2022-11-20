<?php

namespace DuxDucisArsen\Phrases\Test;

use App\Models\User;
use DuxDucisArsen\Phrases\Models\Phrase;
use DuxDucisArsen\Phrases\Test\TestCase;
use Illuminate\Database\Eloquent\Factories\Sequence;

class PhrasesUnitTest extends TestCase
{

    /**
     * Recupera solo frases privadas.
     *
     * @return void
     * @group frases
     */
    public function test_getFrasesPrivadas()
    {
        // Arrange
        $cantPrivados = 3;
        $cantPublicos = 7;
        $authUserId = 99;//  Pngo cualquier número

        $frases = Phrase::factory()
            ->count($cantPrivados)
            // ->privada()
            // ->for(User::factory()->state([
            //     'createdBy' => $authUserId,
            //     'username' => 'adpalarich'
            // ]))
            ->make([ 'createdBy' => $authUserId ]);

        // Act
        $frasesPrivada = Phrase::getFrasesPrivadas();
        $frasesPublica = Phrase::getFrasesPublicas();


        // Assert
        // Misma cantidad de registros creados X que lo recuperados
        $this->assertTrue(true);
    }

    public function test_getFrasesPublicas()
    {
        $this->assertTrue(true);
    }
}
