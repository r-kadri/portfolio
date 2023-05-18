<?php

namespace App\Tests;

use App\Entity\Language;
use PHPUnit\Framework\TestCase;

class LanguageTest extends TestCase
{
    public function testIsTrue(): void
    {
        $language = new Language();

        $language->setName('PHP')
            ->setLogo('php.png');

        $this->assertEquals('PHP', $language->getName());
        $this->assertEquals('php.png', $language->getLogo());
    }

    public function testIsFalse(): void
    {
        $language = new Language();

        $language->setName('Python')
            ->setLogo('python.png');

        $this->assertFalse($language->getName() === 'PHP');
        $this->assertFalse($language->getLogo() === 'php.png');
    }

    public function testIsEmpty(): void
    {
        $language = new Language();

        $this->assertEmpty($language->getName());
        $this->assertEmpty($language->getLogo());
    }
}
