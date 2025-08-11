<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Product::class)
            ->assertStatus(200);
    }
}
