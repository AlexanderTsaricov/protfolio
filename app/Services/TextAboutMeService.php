<?php

namespace App\Services;

use App\Exeptions\DontHaveModelExeption;
use App\Exeptions\TableHaveThisExeption;
use App\Reposotories\AboutMe\TextsAboutMeRepository;
use Illuminate\Database\Eloquent\Model;

class TextAboutMeService implements TextAboutMeServiceInterface
{
    private ?TextsAboutMeRepository $repository = null;

    private function getRepository() {
        if ($this->repository == null) {
            $this->repository = new TextsAboutMeRepository();
        }
    }

    /**
     * @inheritDoc
     */
    public function add(string $name, string $text, string $type, string $subtype) 
    {
        $this->getRepository();

        if($this->has($name)) {
            throw new TableHaveThisExeption();
        }

        $textAboutMe = $this->repository->add($text, $name, $type,  $subtype);
        return $textAboutMe;
    }

    /**
     * @inheritDoc
     */
    public function delete(string $name) 
    {
        $this->getRepository();

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
        $this->getRepository();

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
        $this->getRepository();

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
        $this->getRepository();

        $textAboutMe = $this->repository->get($name);

        if($textAboutMe !== null) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll()
    {
        $this->getRepository();
        return $this->repository->getAll();
    }
}