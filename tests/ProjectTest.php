<?php

namespace App\Tests;

use App\Entity\Language;
use App\Entity\Project;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    public function testIsTrue(): void
    {
        $project = new Project();
        $user = new User();
        $language = new Language();

        $project->setName('Project 1')
            ->setDescription('Description of Project 1')
            ->setImage('image.jpg')
            ->setUser($user)
            ->addLanguage($language);

        $this->assertEquals('Project 1', $project->getName());
        $this->assertEquals('Description of Project 1', $project->getDescription());
        $this->assertEquals('image.jpg', $project->getImage());
        $this->assertEquals($user, $project->getUser());
        $this->assertContains($language, $project->getLanguages());
    }

    public function testIsFalse(): void
    {
        $project = new Project();
        $user2 = new User();
        $language2 = new Language();

        $project->setName('Project 2')
            ->setDescription('Description of Project 2')
            ->setImage('image2.jpg')
            ->setUser($user2)
            ->addLanguage($language2);

        $user = new User();
        $language = new Language();

        $this->assertFalse($project->getName() === 'Project 1');
        $this->assertFalse($project->getDescription() === 'Description of Project 1');
        $this->assertFalse($project->getImage() === 'image.jpg');
        $this->assertFalse($project->getUser() === $user);
        $this->assertNotContains($language, $project->getLanguages());
    }

    public function testIsEmpty(): void
    {
        $project = new Project();
        
        $this->assertEmpty($project->getName());
        $this->assertEmpty($project->getDescription());
        $this->assertEmpty($project->getImage());
        $this->assertEmpty($project->getUser());
        $this->assertEmpty($project->getLanguages());
    }
}
