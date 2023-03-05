<?php

namespace Tests\Feature\Controller;

use App\OpenWeather\Weather;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Mockery\MockInterface;
use Tests\TestCase;


class WeatherControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testShouldGetWeather() : void
    {
        $request = ['city' => 'Tokyo'];

        $this->mock(Weather::class, function (MockInterface $mock) use ($request) {
            $mock->shouldReceive('setCity')
                 ->with($request['city'])
                 ->andReturnSelf();
            $mock->shouldReceive('buildUrl')
                 ->andReturnSelf();
            $mock->shouldReceive('getData')
                 ->andReturnSelf();
            $mock->shouldReceive('json')
                 ->andReturn(json_decode(json_encode([
                    'weather' => json_decode(json_encode([
                        'id'          => '500',
                        'main'        => 'Rain',
                        'description' => 'light rain',
                        'icon'        => '10n'
                    ])),
                    'coord' => json_decode(json_encode([
                        'lon' => 139.6917,
                        'lat' => 35.6895
                    ])),
                    'main' => json_decode(json_encode([
                        'temp'       => 9.23,
                        'feels_like' => 7,
                        'temp_min'   => 6.53,
                        'temp_max'   => 11.46,
                        'pressure'   => 1025,
                        'humidity'   => 73,
                    ])),
                    'name' => 'Tokyo',
                    'id' => 1850144
                 ])));
        });

        $response = $this->json('GET', '/api/weather', $request);

        $this->assertEquals(500, $response->original->weather->id);
    }
}
