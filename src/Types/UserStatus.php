<?php

namespace Ultraleet\VerifyOnce\Types;

use MyCLabs\Enum\Enum;

class UserStatus extends Enum
{
    const ACTIVE = 'ACTIVE';
    const BLOCKED = 'BLOCKED';
}
