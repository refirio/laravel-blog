<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RootTest extends TestCase
{
    /**
     * トップページへのアクセスをテスト
     *
     * @return void
     */
    public function testVisitRootPage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
