<?php
namespace PayoutAdapter\Contracts;


interface PayoutContract
{
    /**
     * @param $driver
     * @return mixed
     */
    public static function driver($driver);
}
