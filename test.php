<?php
require "./vendor/autoload.php";
/**
 * Observer
 */
$subject = new Observer\NewsSubject();
$subject->addObserver(new Observer\StudentObserver());
$subject->addObserver(new Observer\TeacherObserver());

$subject->newsChanged("hello world");

/**
 * Chain of Responsibility
 */
$departmentManager = new ChainOfResponsibility\DepartmentManager("建军");
$companyManager = new ChainOfResponsibility\CompanyManager("鲍俊伟");
$superManager = new ChainOfResponsibility\SuperManager("苏璇");
$departmentManager->setSupervisor($companyManager);
$companyManager->setSupervisor($superManager);

$request = new ChainOfResponsibility\Request("施宏飞", 3, "我想回家回家回家");
$departmentManager->handle($request);

/**
 * Simple Factory
 */
try {
    $compute = SimpleFactory\computeFactory::create("add");
    $compute->number1 = 1;
    $compute->number2 = 2;
    echo $compute->getResult();
} catch (Throwable $e) {
    echo $e->getMessage();
}

try {
    $context = new Strategy\ComputeContext(new Strategy\Div());
    echo $context->getResult(1, 2);
} catch (Throwable $e) {
    echo $e->getMessage();
}