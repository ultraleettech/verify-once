<?php

namespace Tests\Unit\Data;

use TypeError;
use Tests\TestCase;
use BadMethodCallException;
use Ultraleet\VerifyOnce\Types\IdentityId;
use Ultraleet\VerifyOnce\Types\VerificationStatus;
use Ultraleet\VerifyOnce\Data\IdentityCallbackInfo;
use Ultraleet\VerifyOnce\Types\IdentityRejectReason;

class IdentityCallbackInfoTest extends TestCase
{
    public function testValidData()
    {
        $info = new IdentityCallbackInfo([
            'status' => 'FAILED',
            'idType' => 'PASSPORT',
            'rejectReason' => 'ID_INVALID_DATA',
        ]);
        $this->assertInstanceOf(VerificationStatus::class, $info->status);
        $this->assertInstanceOf(IdentityId::class, $info->idType);
        $this->assertInstanceOf(IdentityRejectReason::class, $info->rejectReason);
    }

    public function testValidDataWithAllowedNullValues()
    {
        $info = new IdentityCallbackInfo([
            'status' => 'FAILED',
            'idType' => null,
            'rejectReason' => null,
        ]);
        $this->assertInstanceOf(VerificationStatus::class, $info->status);
        $this->assertNull($info->idType);
        $this->assertNull($info->rejectReason);
    }

    public function testNullStatusIsInvalid()
    {
        $this->expectException(TypeError::class);
        $info = new IdentityCallbackInfo([
            'status' => null,
        ]);
    }

    public function testInvalidStatus()
    {
        $this->expectException(BadMethodCallException::class);
        $info = new IdentityCallbackInfo([
            'status' => 'invalid',
        ]);
    }

    public function testInvalidIdType()
    {
        $this->expectException(BadMethodCallException::class);
        $info = new IdentityCallbackInfo([
            'status' => 'FAILED',
            'idType' => 'invalid',
        ]);
    }

    public function testInvalidRejectReason()
    {
        $this->expectException(BadMethodCallException::class);
        $info = new IdentityCallbackInfo([
            'status' => 'FAILED',
            'rejectReason' => 'invalid',
        ]);
    }
}
