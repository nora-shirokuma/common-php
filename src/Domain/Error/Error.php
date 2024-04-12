<?php

namespace NoraShirokuma\CommonPhp\Domain\Error;

class Error
{
    private Subject $subject;

    private Description $description;

    public function __construct(Subject $subject, Description $description)
    {
        $this->subject = $subject;
        $this->description = $description;
    }

    public function getSubject(): Subject
    {
        return $this->subject;
    }

    public function getDescription(): Description
    {
        return $this->description;
    }
}