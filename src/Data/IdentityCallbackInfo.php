<?php

namespace Ultraleet\VerifyOnce\Data;

use InvalidArgumentException;
use Ultraleet\VerifyOnce\Types\IdentityId;
use Ultraleet\VerifyOnce\Types\VerificationStatus;
use Ultraleet\VerifyOnce\Types\IdentityRejectReason;
use Ultraleet\VerifyOnce\Exceptions\InvalidValueException;

/**
 * Class IdentityCallbackInfo
 *
 * @property VerificationStatus $status
 * @property IdentityId $idType
 * @property IdentityRejectReason $rejectReason
 *
 * @todo Add required fields.
 */
class IdentityCallbackInfo extends AbstractData
{
    protected $id;
    protected $userId;
    protected $transactionId;
    protected $status;
    protected $idType;
    protected $idNumber;
    protected $idCountry;
    protected $idFirstName;
    protected $idLastName;
    protected $idDob;
    protected $idExpiry;
    protected $rejectReason;
    protected $isManualReview;
    protected $callbackJSON;
    protected $transactionDate;
    protected $callbackDate;
    protected $createdDate;
    protected $updatedDate;

    /**
     * Set required field names.
     *
     * @return array
     */
    protected function required(): array
    {
        return [
            'id',
            'userId',
            'transactionId',
            'status',
            'isManualReview',
        ];
    }

    /**
     * @return VerificationStatus
     */
    public function getStatus(): VerificationStatus
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
        $this->status = VerificationStatus::$status();
    }

    /**
     * @return IdentityId|null
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * @param string|null $idType
     */
    public function setIdType($idType): void
    {
        $this->idType = $idType ? IdentityId::$idType() : null;
    }

    /**
     * @return IdentityRejectReason|null
     */
    public function getRejectReason()
    {
        return $this->rejectReason;
    }

    /**
     * @param string|null $rejectReason
     */
    public function setRejectReason($rejectReason): void
    {
        $this->rejectReason = $rejectReason ? IdentityRejectReason::$rejectReason() : null;
    }
}
