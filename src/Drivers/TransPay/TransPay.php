<?php

namespace PayoutAdapter\Drivers\TransPay;

class TransPay extends TransPayAbstract
{
    /**
     * @return Transaction
     */
    public function transaction()
    {
        return new Transaction();
    }
}
