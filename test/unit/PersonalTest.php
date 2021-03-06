<?php

namespace Test\Unit;

use RuntimeException;
use Test\TestCase;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\RequestManager;
use Web3\RequestManagers\HttpRequestManager;

class PersonalTest extends TestCase
{
    /**
     * personal
     * 
     * @var Web3\Personal
     */
    protected $personal;

    /**
     * setUp
     * 
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->personal = $this->web3->personal;
    }

    /**
     * testInstance
     * 
     * @return void
     */
    public function testInstance()
    {
        $personal = $this->personal;

        $this->assertTrue($personal->provider instanceof HttpProvider);
        $this->assertTrue($personal->provider->requestManager instanceof RequestManager);
    }

    /**
     * testSetProvider
     * 
     * @return void
     */
    public function testSetProvider()
    {
        $personal = $this->personal;
        $requestManager = new HttpRequestManager('http://localhost:8545');
        $personal->provider = new HttpProvider($requestManager);

        $this->assertEquals($personal->provider->requestManager->host, 'http://localhost:8545');
    }
}