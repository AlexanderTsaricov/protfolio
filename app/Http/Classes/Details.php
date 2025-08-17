<?php

namespace App\Http\Classes;

class Details {
    private string $name;
    private ?array $smallDetails;
    private ?array $elements;

    public function __construct(string $name, ?array $elements = null, ?array $smallDetails = null) {
        $this->name = $name;
        $this->elements = $elements;
        $this->smallDetails = $smallDetails;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getElements()
    {
        return $this->elements;
    }

    public function getSmallDetails()
    {
        return $this->smallDetails;
    }
}