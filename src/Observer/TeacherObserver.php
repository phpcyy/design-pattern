<?php

namespace Observer;
class TeacherObserver implements Observer
{
    private $news;

    public function update($news)
    {
        $this->news = $news;
        $this->display();
    }

    public function display()
    {
        echo "hello everyone, today's news is: {$this->news}\n";
    }
}
