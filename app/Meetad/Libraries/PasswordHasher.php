<?php

namespace App\Meetad\Libraries;

use Illuminate\Contracts\Hashing\Hasher;

class PasswordHasher implements Hasher
{
    protected string $_salt;

    public function __construct()
    {
        $this->_salt = config('hashing.meetad.salt');
    }

    /**
     * Get information about the given hashed value
     *
     * @param string $hashedValue
     * @return void
     */
    public function info($hashedValue)
    {
        return [
            'algo' => 'meetad.custom_hash'
        ];
    }

    /**
     * Hash the given value.
     *
     * @param string $value
     * @param array $options
     * @return void
     */
    public function make($value, array $options = [])
    {
        return hash('sha512', sha1($this->_salt . ':' . $value));
    }

    /**
     * Check the given plain value against a hash
     *
     * @param string $value
     * @param string $hashedValue
     * @param array $options
     * @return bool
     */
    public function check($value, $hashedValue, array $options = [])
    {
        return $this->make($value, $options) == $hashedValue;
    }

    /**
     * Check if the given hash has been hashed using the given option
     *
     * @param string $hashedValue
     * @param array $options
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }
}