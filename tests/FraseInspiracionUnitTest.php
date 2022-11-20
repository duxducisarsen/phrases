<?php

namespace Tests\Unit;

use App\Models\{
    FraseInspiracion,
    User
};
use Illuminate\Database\Eloquent\Factories\Sequence;
use Tests\TestCase;

class FraseInspiracionUnitTest extends TestCase
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

        $frases = FraseInspiracion::factory()
            ->count($cantPrivados)
            // ->privada()
            // ->for(User::factory()->state([
            //     'createdBy' => $authUserId,
            //     'username' => 'adpalarich'
            // ]))
            ->make([ 'createdBy' => $authUserId ]);

        // Act
        $frasesPrivada = FraseInspiracion::getFrasesPrivadas();
        $frasesPublica = FraseInspiracion::getFrasesPublicas();


        // Assert
        // Misma cantidad de registros creados X que lo recuperados
        $this->assertTrue(true);
    }

    public function test_getFrasesPublicas()
    {
        $this->assertTrue(true);
    }
}
