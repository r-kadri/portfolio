<?php

namespace App\Tests;

use App\Entity\Skill;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class SkillTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();
        $skill = new Skill();

        $skill->setLevel('Expert')
            ->setDescription('Expert in PHP')
            ->setUser($user);

        $this->assertEquals('Expert', $skill->getLevel());
        $this->assertEquals('Expert in PHP', $skill->getDescription());
        $this->assertEquals($user, $skill->getUser());
    }

    public function testIsFalse(): void
    {
        $user1 = new User();
        $user2 = new User();
        $skill = new Skill();

        $skill->setLevel('Intermediate')
            ->setDescription('Intermediate in PHP')
            ->setUser($user1);

        $this->assertFalse($skill->getLevel() === 'Expert');
        $this->assertFalse($skill->getDescription() === 'Expert in PHP');
        $this->assertFalse($user2 === $skill->getUser());
    }

    public function testIsEmpty(): void
    {
        $skill = new Skill();

        $this->assertEmpty($skill->getLevel());
        $this->assertEmpty($skill->getDescription());
        $this->assertEmpty($skill->getUser());
    }
}
