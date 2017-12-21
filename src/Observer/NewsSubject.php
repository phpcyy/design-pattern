<?php

namespace Observer;
class NewsSubject implements Subject
{
    public $observers = [];

    public function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function deleteObserver(Observer $observer)
    {
        $key = array_search($observer, $this->observers);
        array_splice($this->observers, $key, 1);
    }

    public function notifyObservers($message)
    {
        foreach ($this->observers as $key => &$observer) {
            $pid = pcntl_fork();
            if ($pid == -1) {
                echo "fork failed";
            } else if ($pid === 0) {
                $observer->update($message);
                die;
            } else {
                echo '执行成功' . PHP_EOL;
            }
        }
    }

    public function newsChanged($news)
    {
        $this->notifyObservers($news);
    }
}
