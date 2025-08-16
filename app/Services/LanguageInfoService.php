<?php

namespace App\Services;
use App\Reposotories\LanguagesInfo\LanguageInfoDTO;
use App\Reposotories\LanguagesInfo\LanguagesInfoRepository;

class LanguageInfoService implements LanguageInfoServiceInterface
{
    private ?LanguagesInfoRepository $repository = null;

    private function getRepository() {
        if ($this->repository == null) {
            $this->repository = new LanguagesInfoRepository();
        }
    }

    public function getAll(): array
    {
        $this -> getRepository();

        return $this->repository->getAll();
    }
    
    public function get(string $name): object
    {
        $this -> getRepository();

        $dto = new LanguageInfoDTO($name);
        return $this->repository->get($dto);
    }

    public function add(string $name, string $type, string|null $text = null): object
    {
        $this -> getRepository();
        $dto = new LanguageInfoDTO($name, $type, $text);
        /** @var LanguageInfo $newLanguageInfo */
        $newLanguageInfo = $this->repository->add($dto);
        return $newLanguageInfo;
    }

    public function remove(string $name)
    {
        $this -> getRepository();

        $dto = new LanguageInfoDTO($name);
        $this->repository->remove($dto);
    }

    public function has(string $name): bool
    {
        $this -> getRepository();
        $dto = new LanguageInfoDTO($name);

        return $this -> repository -> has($dto);
    }

    public function edit(string $name, string $changedProperty, string $propertyName): object
    {
        $this -> getRepository();
        $dto = new LanguageInfoDTO($name, null, null, $changedProperty, $propertyName);
        return $this->repository->edit($dto);
    }
}