<?php

/**
 * 职责链模式：避免请求发送者和请求接收者的耦合关系。将接受者连成一条链，直到有接收者处理请求。
 *
 * 例如，假设你要请假，请假3天以内部门领导可以批准，7天以内需要部门领导和总监批准，7天以上需要部门领导、总监和董事长批准。
 * 你只需向部门领导，部门领导如果察觉超出权限，自动向上级报告并交由上级处理。
 *
 */

/**
 * Class Request
 * @author
 */
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

interface Manager
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request);
}


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

class CompanyManager implements Manager
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
        if ($request->dayCount > 7) {
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

class SuperManager implements Manager
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
        echo $this->name . "批准了" . $request->requester . "的请假, 共" . $request->dayCount . "天";
        echo "\r\n原因是:" . $request->reason;
    }

    public function setSupervisor(Manager $manager)
    {
        $this->supervisor = $manager;
    }
}

$departmentManager = new DepartmentManager("建军");
$companyManager = new CompanyManager("鲍俊伟");
$superManager = new SuperManager("苏璇");
$departmentManager->setSupervisor($companyManager);
$companyManager->setSupervisor($superManager);

$request = new Request("施宏飞", 3, "我想回家回家回家");
$departmentManager->handle($request);

