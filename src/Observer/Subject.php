<?php

namespace Observer;
interface Subject
{
    public function addObserver(Observer $observer);

    public function deleteObserver(Observer $observer);

    public function notifyObservers($message);
}
