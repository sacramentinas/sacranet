<?php
namespace Sacranet;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class ShaHasher implements HasherContract{


    public function make($value, array $options = [])
    {
       $value = env('APP_KEY','').$value;
       return sha1($value);
    }


    public function check($value, $hashedValue, array $options = [])
    {
        return $this->make($value) === $hashedValue;
    }


    public function needsRehash($hashedValue, array $options = [])
    {
       return false;
    }
}