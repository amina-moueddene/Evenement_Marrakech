<?php
namespace Tests\Feature;

use Tests\TestCase;

class EventDetailsTest extends TestCase
{
    public function test_event_details_page_loads()
    {
        $response = $this->get('/event/1'); // Remplacez par un ID valide
        $response->assertStatus(200);
    }
}