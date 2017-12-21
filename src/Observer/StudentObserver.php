<?php

namespace Observer;
class StudentObserver implements Observer
{
    private $news;

    public function update($news)
    {
        $this->news = $news;
        $this->display();
    }

    public function display()
    {
        echo "today I read the news: {$this->news}\n";
    }
}
