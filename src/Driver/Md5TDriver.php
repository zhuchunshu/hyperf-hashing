<?php

namespace HyperfExt\Hashing\Driver;

use HyperfExt\Hashing\Contract\DriverInterface;

class Md5TDriver  extends AbstractDriver implements DriverInterface
{
    /**
     * Create a new driver instance.
     */
    public function __construct(array $options = [])
    {

    }

    /**
     * Hash the given value.
     *
     */
    public function make(string $value, array $options = []): string
    {
        return md5(md5($value));
    }

    /**
     * Check the given plain value against a hash.
     *
     */
    public function check(string $value, string $hashedValue, array $options = []): bool
    {
        if(md5(md5($value))===$hashedValue){
            return true;
        }
        return false;
    }

    /**
     * Check if the given hash has been hashed using the given options.
     */
    public function needsRehash(string $hashedValue, array $options = []): bool
    {
        return true;
    }
}