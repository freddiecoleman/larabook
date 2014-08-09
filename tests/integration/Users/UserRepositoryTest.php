<?php

use Larabook\Users\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class UserRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected function _before()
    {
        $this->repo = new UserRepository;
    }

    /** @test */
    public function it_paginates_all_users()
    {
        TestDummy::times(4)->create('Larabook\Users\User');

        $results = $this->repo->getPaginated(2);

        $this->assertCount(2, $results);
    }

    /** @test */
    public function it_finds_a_user_with_statuses_by_their_username()
    {
        // given
        $statuses = TestDummy::times(3)->create('Larabook\Statuses\Status');
        $username = $statuses[0]->user->username;

        // when
        $user = $this->repo->findByUsername($username);

        // then
        $this->assertEquals($username, $user->username);
        $this->assertCount(3, $user->statuses);
    }

    /** @test */
    public function it_follows_another_user()
    {
        // given i have two users, john and susan
        list($john, $susan) = TestDummy::times(2)->create('Larabook\Users\User');

        // and susan follows john
        $this->repo->follow($john->id, $susan);

        // then I should see john in the list of those that susan follows
        $this->tester->seeRecord('follows', [
            'follower_id' => $susan->id,
            'followed_id' => $john->id
        ]);
    }

    /** @test */
    public function it_unfollows_another_user()
    {
        // given i have two users, john and susan
        list($john, $susan) = TestDummy::times(2)->create('Larabook\Users\User');

        // and susan follows john
        $this->repo->follow($john->id, $susan);

        // when susan unfollows john
        $this->repo->unfollow($john->id, $susan);

        // then I should NOT see john in the list of those that susan follows
        $this->tester->dontSeeRecord('follows', [
            'follower_id' => $susan->id,
            'followed_id' => $john->id
        ]);
    }
}