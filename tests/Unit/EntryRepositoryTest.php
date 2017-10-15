<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EntryRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    const CACHE_SECTION_KEY = 'testing';

    /**
     * データの登録と参照をテスト
     */
    public function testInsertAndRead()
    {
        $repository = $this->getRepositoryInstance();

        $this->assertSame(0, $repository->count());

        $repository->save([
            'title' => 'testing',
            'body' => 'testing',
            'user_id' => 1
        ]);
        $this->assertSame(1, $repository->count());

        $result = $repository->find(1);
        $this->assertSame('testing', $result->title);
        $this->assertSame('testing', $result->body);
        $this->assertSame('1', $result->user_id);
    }

    /**
     * @return \App\Repositories\EntryRepository
     */
    protected function getRepositoryInstance()
    {
        return new \App\Repositories\EntryRepository(
            new \App\DataAccess\Eloquent\Entry,
            $this->getCacheInstance()
        );
    }

    /**
     * @return \App\DataAccess\Cache\DataCache
     */
    protected function getCacheInstance()
    {
        return new \App\DataAccess\Cache\DataCache(
            new \Illuminate\Cache\CacheManager($this->app),
            self::CACHE_SECTION_KEY
        );
    }
}
