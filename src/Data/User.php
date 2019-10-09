<?php

namespace Ultraleet\VerifyOnce\Data;

use Ultraleet\VerifyOnce\Types\UserStatus;
use Ultraleet\VerifyOnce\Exceptions\InvalidValueException;

/**
 * Class User
 *
 * @property UserStatus $status
 * @property array $scopes
 *
 * @todo Add required fields.
 */
class User extends AbstractData
{
    protected $id;
    protected $email;
    protected $role;
    protected $scopes;
    protected $status;
    protected $createdDate;
    protected $updatedDate;

    /**
     * @return UserStatus
     */
    public function getStatus(): UserStatus
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        if (! $status) {
            throw new InvalidValueException('status');
        }
        $this->status = UserStatus::$status();
    }

    /**
     * @return array
     */
    public function getScopes(): array
    {
        return $this->scopes;
    }

    /**
     * @param array $scopes
     */
    public function setScopes(array $scopes): void
    {
        $this->scopes = $scopes;
    }
}