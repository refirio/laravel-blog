<?php

namespace Tests\Unit;

use Mockery as m;
use Tests\TestCase;

class EntryServiceTest extends TestCase
{
    /**
     * 作成者と編集者が異なる場合に、編集できないことをテスト
     */
    public function testUpdateEntryWithOtherUser()
    {
        // 認可でfalseを返したものとして、Gateクラスのallowsメソッドをモックする
        $gateMock = m::mock('Illuminate\Auth\Access\Gate');
        $gateMock->shouldReceive('allows')->andReturn(false);

        $entryService = new \App\Services\EntryService(
            // インターフェースを実装したスタブクラスへ差し替える
            new StubEntryRepository(),
            $gateMock
        );
        $result = $entryService->postEntry([
            'id' => 1,
            'user_id' => 1,
            'title' => 'testing',
            'body' => 'testing',
        ]);
        $this->assertNull($result);
    }

    /**
     * 作成者と編集者が同一の場合に、編集できることをテスト
     */
    public function testUpdateEntryWithAuthor()
    {
        // 認可でtrueを返したものとして、Gateクラスのallowsメソッドをモックする
        $gateMock = m::mock('Illuminate\Auth\Access\Gate');
        $gateMock->shouldReceive('allows')->andReturn(true);

        $entryService = new \App\Services\EntryService(
            // インターフェースを実装したスタブクラスへ差し替える
            new StubEntryRepository(),
            $gateMock
        );
        $result = $entryService->postEntry([
            'id' => 1,
            'user_id' => 1,
            'title' => 'testing',
            'body' => 'testing',
        ]);
        $this->assertInstanceOf('\App\DataAccess\Eloquent\Entry', $result);
    }
}

class StubEntryRepository implements \App\Repositories\EntryRepositoryInterface
{
   /**
    * @param array $params
    *
    * @return mixed
    */
   public function save(array $params)
   {
       return factory(\App\DataAccess\Eloquent\Entry::class)->make($params);
   }

   /**
    * @param $id
    *
    * @return mixed
    */
   public function find($id)
   {
   }

   /**
    * @return int
    */
   public function count()
   {
   }

   /**
    * @param int $page
    * @param int $limit
    *
    * @return mixed
    */
   public function byPage($limit = 10)
   {
   }

   /**
    * @param int $limit
    *
    * @return mixed
    */
   public function recent($limit = 10)
   {
   }
}
