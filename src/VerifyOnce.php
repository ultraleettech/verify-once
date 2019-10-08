<?php

namespace Ultraleet\VerifyOnce;

use Ultraleet\VerifyOnce\Exceptions\InvalidConfigException;
use Ultraleet\VerifyOnce\Exceptions\AuthenticationException;

/**
 * VerifyOnce integration library main class.
 *
 * @package ultraleet/verify-once
 */
final class VerifyOnce
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var API
     */
    private $api;

    /**
     * VerifyOnce constructor.
     *
     * @param array $config
     * @throws InvalidConfigException
     */
    public function __construct(array $config)
    {
        $this->configure($config);
    }

    /**
     * Initiate verification and return the response from VerifyOnce API.
     *
     * @return array
     * @throws AuthenticationException
     */
    public function initiate(): array
    {
        return $this->getApi()->initiate();
    }

    /**
     * Verify configuration and merge with defaults.
     *
     * @param array $config
     * @throws InvalidConfigException
     */
    private function configure(array $config)
    {
        $this->validateConfig($config);
        $defaults = [
            'baseUrl' => 'https://app.verifyonce.com/api/verify',
        ];
        $this->config = array_merge($defaults, $config);
    }

    /**
     * Make sure required parameters are provided.
     *
     * @param array $config
     * @throws InvalidConfigException
     */
    private function validateConfig(array $config)
    {
        $required = [
            'username',
            'password',
        ];
        foreach ($required as $key) {
            if (empty($config[$key])) {
                throw new InvalidConfigException("Missing required configuration parameter: $key");
            }
        }
    }

    /**
     * @return API
     */
    private function getApi(): API
    {
        if (!isset($this->api)) {
            $this->api = new API($this->config);
        }
        return $this->api;
    }
}
