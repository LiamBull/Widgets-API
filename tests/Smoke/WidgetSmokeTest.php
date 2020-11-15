<?php

namespace Tests\Smoke;

use App\Models\Widget;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WidgetSmokeTest extends TestCase
{
    use RefreshDatabase;

    private $responseWithHeaders;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->responseWithHeaders = $this->withHeaders([
            'Authorization' => 'Bearer dBaxcSrjzbn1dEiHnKYhFuNQsaAC6MtG',
        ]);
    }

    public function testIndex()
    {
        $response = $this->responseWithHeaders->json('GET', '/widgets');

        $response->assertStatus(200)
            ->assertHeader('X-Day');
    }

    public function testGet()
    {
        $widget = Widget::factory()->create();

        $response = $this->responseWithHeaders->json('GET', "/widgets/$widget->id");

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $response = $this->responseWithHeaders->json('POST', '/widgets', [
            'name' => 'Widget Test',
            'description' => 'Widget Test Description',
        ]);

        $response->assertStatus(201)
            ->assertHeader('Location');
    }

    public function testUpdate()
    {
        $widget = Widget::factory()->create();

        $response = $this->responseWithHeaders->json('PATCH', "/widgets/$widget->id", [
            'name' => 'Widget Patch',
        ]);

        $response->assertStatus(204);
    }

    public function testDelete()
    {
        $widget = Widget::factory()->create();

        $response = $this->responseWithHeaders->json('DELETE', "/widgets/$widget->id");

        $response->assertStatus(204);
    }
}