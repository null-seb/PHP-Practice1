<?php

/**
 * PHP version 7.4
 * tests/Entity/UserTest.php
 *
 * @category EntityTests
 * @package  MiW\Results\Tests
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.etsisi.upm.es/ ETS de Ingeniería de Sistemas Informáticos
 */

namespace MiW\Results\Tests\Entity;

use MiW\Results\Entity\User;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 *
 * @package MiW\Results\Tests\Entity
 * @group   users
 */
class UserTest extends TestCase
{
    /**
     * @var User $user
     */
    private $user;

    /**
     * Sets up the fixture.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->user = new User('Jiaxin','wangjiaxin6667@gmail.com','123456');
    }

    /**
     * @covers \MiW\Results\Entity\User::__construct()
     */
    public function testConstructor(): void
    {
        self::assertEquals('Jiaxin', $this->user->getUsername());
        self::assertEquals('wangjiaxin6667@gmail.com', $this->user->getEmail());
        self::assertEquals(true, $this->user->validatePassword('123456'));
    }

    /**
     * @covers \MiW\Results\Entity\User::getId()
     */
    public function testGetId(): void
    {
        self::assertEquals(0, $this->user->getId());
    }

    /**
     * @covers \MiW\Results\Entity\User::setUsername()
     * @covers \MiW\Results\Entity\User::getUsername()
     */
    public function testGetSetUsername(): void
    {
        $this->user->setUsername('Jiaxin');
        self::assertEquals('Jiaxin', $this->user->getUsername());
    }

    /**
     * @covers \MiW\Results\Entity\User::getEmail()
     * @covers \MiW\Results\Entity\User::setEmail()
     */
    public function testGetSetEmail(): void
    {
        $this->user->setEmail('wangjiaxin6667@gmail.com');
        self::assertEquals('wangjiaxin6667@gmail.com', $this->user->getEmail());
    }

    /**
     * @covers \MiW\Results\Entity\User::setEnabled()
     * @covers \MiW\Results\Entity\User::isEnabled()
     */
    public function testIsSetEnabled(): void
    {
        $this->user->setEnabled(true);
        self::assertEquals(true, $this->user->isEnabled());
    }

    /**
     * @covers \MiW\Results\Entity\User::setIsAdmin()
     * @covers \MiW\Results\Entity\User::isAdmin
     */
    public function testIsSetAdmin(): void
    {
        $this->user->setIsAdmin(true);
        self::assertEquals(true, $this->user->isAdmin());
    }

    /**
     * @covers \MiW\Results\Entity\User::setPassword()
     * @covers \MiW\Results\Entity\User::validatePassword()
     */
    public function testSetValidatePassword(): void
    {
        self::assertEquals(true, $this->user->validatePassword('123456'));
    }

    /**
     * @covers \MiW\Results\Entity\User::__toString()
     */
    public function testToString(): void
    {
        $this->user -> setUsername('Jiaxin');
        $this->user -> setEmail('wangjiaxin6667@gmail.com');
        $this->user -> setEnabled(false);
        $this->user -> setIsAdmin(false);

        $testToString = '  0 -               Jiaxin -       wangjiaxin6667@gmail.com - 0 - 0';
        self::assertSame(
            $testToString,
            $this->user->__toString()
        );
    }

    /**
     * @covers \MiW\Results\Entity\User::jsonSerialize()
     */
    public function testJsonSerialize(): void
    {
        $jsonSerialize = $this->user->jsonSerialize();
        self::assertTrue(is_array($jsonSerialize));
    }
}
