<?php

namespace Ultraleet\VerifyOnce\Data;

class Transaction extends AbstractData
{
    protected $id;
    protected $integratorId;
    protected $userId;
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
            'integratorId',
            'userId',
            'createdDate',
            'updatedDate',
        ];
    }
}
