<?php

namespace ChainOfResponsibility;
class DepartmentManager implements Manager
{
    /**
     * @var Manager
     */
    private $supervisor;
    /**
     * @var string
     */
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function handle(Request $request)
    {
        if ($request->dayCount > 3) {
            $this->supervisor->handle($request);
        } else {
            echo $this->name . "批准了" . $request->requester . "的请假, 共" . $request->dayCount . "天";
            echo "\r\n原因是:" . $request->reason;
        }
    }

    public function setSupervisor(Manager $manager)
    {
        $this->supervisor = $manager;
    }
}