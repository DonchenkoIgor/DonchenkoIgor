<?php

namespace Tests\Feature;

use App\Models\Animal;
use App\Models\AnimalData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnimalTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_data_count_method()
    {
        $animals = Animal::factory()->create();

        AnimalData::factory()->count(3)->create(['animals' => $animals -> id]);

        $dataCount = $animals->getDataCount();

        $this->assertEquals(3, $dataCount);
    }
}
