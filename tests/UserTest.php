<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();

        $user->setEmail('true@test.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword('password')
            ->setFirstname('firstname')
            ->setLastname('lastname')
            ->setPhoneNumber('06')
            ->setAbout('It\'s me !')
            ->setLinkedin('https://linkedin.com/true/')
            ->setGithub('https://github.com/true/');

        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getRoles() === array('ROLE_ADMIN', 'ROLE_USER'));
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getFirstname() === 'firstname');
        $this->assertTrue($user->getLastname() === 'lastname');
        $this->assertTrue($user->getPhoneNumber() === '06');
        $this->assertTrue($user->getAbout() === 'It\'s me !');
        $this->assertTrue($user->getLinkedin() === 'https://linkedin.com/true/');
        $this->assertTrue($user->getGithub() === 'https://github.com/true/');
    }

    public function testIsFalse(): void
    {
        $user = new User();

        $user->setEmail('false@test.com')
            ->setPassword('not_password')
            ->setFirstname('not_firstname')
            ->setLastname('not_lastname')
            ->setPhoneNumber('00')
            ->setAbout('It\'s not me !')
            ->setLinkedin('https://linkedin.com/false/')
            ->setGithub('https://github.com/false/');

        $this->assertFalse($user->getEmail() === 'true@test.com');
        $this->assertFalse($user->getRoles() === array('ROLE_ADMIN', 'ROLE_USER'));
        $this->assertFalse($user->getPassword() === 'password');
        $this->assertFalse($user->getFirstname() === 'firstname');
        $this->assertFalse($user->getLastname() === 'lastname');
        $this->assertFalse($user->getPhoneNumber() === '06');
        $this->assertFalse($user->getAbout() === 'It\'s me !');
        $this->assertFalse($user->getLinkedin() === 'https://linkedin.com/true/');
        $this->assertFalse($user->getGithub() === 'https://github.com/true/');
    }

    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getLastname());
        $this->assertEmpty($user->getPhoneNumber());
        $this->assertEmpty($user->getAbout());
        $this->assertEmpty($user->getLinkedin());
        $this->assertEmpty($user->getGithub());
    }
}
