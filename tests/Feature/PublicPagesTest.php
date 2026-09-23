<?php

namespace Tests\Feature;

use App\Models\Section;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_homepage_renders_the_designed_landing_page(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('hero-section', false)
            ->assertSee('Tentang Kami')
            ->assertSee('Products');
    }

    public function test_public_navigation_pages_render_successfully(): void
    {
        foreach (['/about', '/products', '/articles'] as $uri) {
            $this->get($uri)->assertOk();
        }
    }

    public function test_homepage_handles_empty_content_without_broken_image_tags(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertDontSee('src=""', false)
            ->assertSee('Produk sedang disiapkan')
            ->assertSee('Artikel segera hadir');
    }

    public function test_external_section_images_keep_their_original_url(): void
    {
        $section = Section::where('section_key', 'carousel')->firstOrFail();

        $this->assertStringStartsWith('https://', $section->image_url);
    }
}
