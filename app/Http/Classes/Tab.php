<?php
namespace App\Http\Classes;

class Tab {
    private $id;
    private $name;

    public function __construct(string $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }


    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }
}