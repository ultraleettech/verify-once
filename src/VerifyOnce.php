<?php

namespace Ultraleet\VerifyOnce;

use Ultraleet\VerifyOnce\Exceptions\InvalidConfigException;

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
}
