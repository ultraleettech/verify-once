<?php

namespace Ultraleet\VerifyOnce\Types;

use MyCLabs\Enum\Enum;

class VerificationStatus extends Enum
{
    private const UNINITIATED = 'UNINITIATED';
    private const INITIATED = 'INITIATED';
    private const PENDING = 'PENDING';
    private const VERIFIED = 'VERIFIED';
    private const FAILED = 'FAILED';
    private const LOCKED = 'LOCKED';
}
