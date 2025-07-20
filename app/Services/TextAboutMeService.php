<?php

namespace App\Services;

use App\Exeptions\DontHaveModelExeption;
use App\Exeptions\TableHaveThisExeption;
use App\Reposotories\AboutMe\TextsAboutMeRepository;
use Illuminate\Database\Eloquent\Model;

class TextAboutMeService implements TextAboutMeServiceInterface
{
    private ?TextsAboutMeRepository $repository = null;

    /**
     * @inheritDoc
     */
    public function add(string $name, string $text) 
    {
        if($this->has($name)) {
            throw new TableHaveThisExeption();
        }

        $textAboutMe = $this->repository->add($text, $name);
        return $textAboutMe;
    }

    /**
     * @inheritDoc
     */
    public function delete(string $name) 
    {
        if (!$this->has($name)) {
            throw new DontHaveModelExeption();
        }

        $this->repository->remove($name);
    }

    /**
     * @inheritDoc
     */
    public function edit(Model $textAboutMe, string $parameter, string $changedData) 
    {
        $name = $textAboutMe->getName();
        if (!$this->has($name)) {
            throw new DontHaveModelExeption();
        }
        $this->repository->edit($textAboutMe, $parameter, $changedData);
        return $textAboutMe;
    }

    /**
     * @inheritDoc
     */
    public function get(string $name): Model 
    {
        if (!$this->has($name)) {
            throw new DontHaveModelExeption();
        }

        $textAboutMe = $this->repository->get($name);
        return $textAboutMe;
    }

    /**
     * @inheritDoc
     */
    public function has(string $name): bool 
    {
        $textAboutMe = $this->repository->get($name);

        if($textAboutMe !== null) {
            return true;
        } else {
            return false;
        }
    }
}