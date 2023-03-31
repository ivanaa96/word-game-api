<?php

namespace App\Tests\Application;

use App\Application\Points;
use App\Domain\Dictionary\DictionaryInterface;
use App\Domain\Dictionary\NotEnglishWordException;
use Exception;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PointsTest extends KernelTestCase
{
    private MockObject $mockDictionary;
    private ContainerInterface $container;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockDictionary = $this->getMockBuilder(DictionaryInterface::class)
            ->getMock();
        $this->container = static::getContainer();
        $this->container->set(DictionaryInterface::class, $this->mockDictionary);
    }

    public function testGetPointsShouldRejectRequestIfWordIsNotInADictionary()
    {
        $this->mockDictionary->method('isInDictionary')->willReturn(false);

        $pointsApp = $this->container->get(Points::class);
        $this->expectException(NotEnglishWordException::class);

        $pointsApp->getPointsForWord('routeri');
    }

    public function testGetPointsShouldAcceptRequestIfWordIsInDictionary()
    {
        $this->mockDictionary->method('isInDictionary')->willReturn(true);

        $pointsApp = $this->container->get(Points::class);
        $result = $pointsApp->getPointsForWord('level');

        $this->assertEquals(6, $result);
    }

}
