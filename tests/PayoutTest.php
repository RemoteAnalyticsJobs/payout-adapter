<?php namespace PayoutAdapter\Test;

use PayoutAdapter\Payout;
use Tests\TestCase;

class PayoutTest extends TestCase
{

    /** @test */
    public function it_tests_if_payout_class_is_instantiable()
    {
        $this->assertInstanceOf(Payout::Class, new Payout('some driver'));
    }

    public function it_tests_if_payout_can_work_with_Driver()
    {
    }

}
