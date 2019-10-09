<?php

namespace Ultraleet\VerifyOnce\Data;

/**
 * Class InitiateResponse
 *
 * @property string $transactionId
 * @property string $url
 */
class InitiateResponse extends AbstractData
{
    protected $transactionId;
    protected $url;

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId(string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}
