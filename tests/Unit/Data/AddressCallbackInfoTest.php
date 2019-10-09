<?php

namespace Tests\Unit\Data;

use TypeError;
use Tests\TestCase;
use BadMethodCallException;
use Ultraleet\VerifyOnce\Types\CountryCode;
use Ultraleet\VerifyOnce\Types\VerificationStatus;
use Ultraleet\VerifyOnce\Data\AddressCallbackInfo;
use Ultraleet\VerifyOnce\Exceptions\InvalidValueException;

class AddressCallbackInfoTest extends TestCase
{
    public function testValidData()
    {
        $info = new AddressCallbackInfo([
            'status' => 'FAILED',
            'countryCode' => 'EST',
        ]);
        $this->assertInstanceOf(VerificationStatus::class, $info->status);
        $this->assertInstanceOf(CountryCode::class, $info->countryCode);
    }

    public function testNullStatusIsInvalid()
    {
        $this->expectException(TypeError::class);
        $info = new AddressCallbackInfo([
            'status' => null,
        ]);
    }

    public function testInvalidStatus()
    {
        $this->expectException(BadMethodCallException::class);
        $info = new AddressCallbackInfo([
            'status' => 'invalid',
        ]);
    }

    public function testNullCountryCodeIsInvalid()
    {
        $this->expectException(TypeError::class);
        $info = new AddressCallbackInfo([
            'countryCode' => null,
        ]);
    }

    public function testInvalidCountryCode()
    {
        $this->expectException(BadMethodCallException::class);
        $info = new AddressCallbackInfo([
            'status' => 'FAILED',
            'countryCode' => 'invalid',
        ]);
    }
}
