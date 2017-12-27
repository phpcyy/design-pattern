
<?php
class ObserverTest extends \PHPUnit\Framework\TestCase
{
    public function test()
    {
        $subject = new Observer\NewsSubject();
        $subject->addObserver(new \Observer\TeacherObserver());
        $subject->addObserver(new \Observer\TeacherObserver());
        $subject->addObserver(new \Observer\StudentObserver());
        $subject->addObserver(new \Observer\TeacherObserver());

        $subject->newsChanged("hello world");
    }
}