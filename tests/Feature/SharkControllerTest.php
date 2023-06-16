<?php

namespace Tests\Feature;

use App\Models\Shark;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SharkControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function test_create_shark(){
        //Arreglar, Actuar y Acertar

        //Arreglar -> Crear info de prueba
        $shark = Shark::factory()->make();

        $this->post(route('sharks.store'), $shark);


        //Actuar -> crear un shark nuevo
        //Acertar -> Obtener uno o todos los shark en BD
    }


    public function test_shark_index(){
        //Arreglar, Actuar y Acertar

        //Arreglar -> Crear info de prueba
        $shark = Shark::factory()->create();

        $response = $this->get(route('sharks'), $shark);

        $response->assertStatus(204);
        $this->assertEquals($shark, $response);
        //Actuar -> crear un shark nuevo
        //Acertar -> Obtener uno o todos los shark en BD
    }
}
