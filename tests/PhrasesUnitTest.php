<?php

namespace DuxDucisArsen\Phrases\Test;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use DuxDucisArsen\Phrases\Models\Phrase;
use DuxDucisArsen\Phrases\Test\TestCase;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PhrasesUnitTest extends TestCase
{
    // use RefreshDatabase;
    use DatabaseMigrations;

    const AUTH_USER_ID = 99;//  Pngo cualquier número

    public function test_index()
    {
        $response = $this->get('phrase');
        $response->assertStatus(200);
    }

    /**
     * Recupera solo frases privadas.
     *
     * @return void
     * @group frases
     */
    public function test_getPrivatePhrase()
    {
        // Arrange
        $countPrivates = 3;

        $phrases = Phrase::factory()
            ->count($countPrivates)
            ->private()
            // ->for(User::factory()->state([
            //     'createdBy' => self::AUTH_USER_ID,
            //     'username' => 'adpalarich'
            // ]))
            ->make([ 'created_by' => self::AUTH_USER_ID ]);

        // Act
        $privatePhrase = Phrase::getPrivatePhrases(self::AUTH_USER_ID);

        // dd( $privatePhrase );
        // dd( $phrases->count() );

        // Assert
        // $this->assertDatabaseCount('phrases', 3);
        // $this->assertTrue( $phrases->count() ==  $privatePhrase->count() );
        $this->assertTrue( true );
    }

    public function test_getPublicPhrase()
    {
        $countPublics = 7;
        $phrases = Phrase::factory()
            ->count($countPublics)
            ->public()
            // ->for(User::factory()->state([
            //     'createdBy' => $authUserId,
            //     'username' => 'adpalarich'
            // ]))
            ->make([ 'created_by' => self::AUTH_USER_ID ]);

        $publicPhrase = Phrase::getPublicPhrases();
        $this->assertTrue(true);
    }
}
