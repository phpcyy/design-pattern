<?php

namespace ChainOfResponsibility;
class Request
{
    /**
     * @var string
     */
    public $requester;
    /**
     * @var int
     */
    public $dayCount;
    /**
     * @var string
     */
    public $reason;

    /**
     * Request constructor.
     * @param $requester string
     * @param $dayCount int
     * @param $reason string
     */
    public function __construct($requester, $dayCount, $reason)
    {
        $this->requester = $requester;
        $this->dayCount = $dayCount;
        $this->reason = $reason;
    }
}