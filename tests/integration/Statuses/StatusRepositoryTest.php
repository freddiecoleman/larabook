<?php


use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;

    protected function _before()
    {
        $this->repo = new StatusRepository();
    }

    /** @test */
    public function it_gets_all_statuses_for_a_user()
    {
        $users = TestDummy::times(2)->create('Larabook\Users\User');

        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[0]->id
        ]);

        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[1]->id
        ]);

        $statusesForUser = $this->repo->getAllForUser($users[0]);

        $this->assertCount(2, $statusesForUser);

    }

}