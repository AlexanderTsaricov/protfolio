<?php

namespace App\Reposotories\LanguagesInfo;

use App\Models\LanguageInfo;
use App\Reposotories\RepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;

class LanguagesInfoRepository implements RepositoryInterface
{
    private function dtoCheck($dto) 
    {
        if (!$dto instanceof LanguageInfoDTO) 
        {
            throw new InvalidArgumentException('wrong DTO');
        }
    }

    private function hasModelCheck ($dto)
    {
        if (!$this->has($dto)) 
        {
            throw new ModelNotFoundException("Language with name {$dto->name} not found");
        }
    }

    /**
     * @inheritDoc
     */
    public function add(object $dto):object 
    {
        $this->dtoCheck($dto);

        if ($this->has($dto)) 
        {
            throw new InvalidArgumentException("this name {$dto->name} have in base");
        }

        $newLanguageInto = new LanguageInfo();
        $newLanguageInto->name = $dto->name;
        $newLanguageInto->type = $dto->type;
        $newLanguageInto->text = $dto->text;
        $newLanguageInto->save();

        return $newLanguageInto;
    }

    /**
     * @inheritDoc
     */
    public function edit(object $dto): object 
    {
        $this->dtoCheck($dto);
        $this->hasModelCheck($dto);
        if (empty($dto->changedArg) || empty($dto->changedArgName))
        {
            throw new InvalidArgumentException('Required arguments (changedArg or changedArgName) don`t found in dto');
        }

        $languageInfo = $this->get($dto);
        switch ($dto->changedArgName) 
        {
            case "name":
                $languageInfo->name = $dto->changedArg;
                break;
            case "text":
                $languageInfo->text = $dto->changedArg;
                break;
            case "type":
                $languageInfo->type = $dto->changedArg;
                break;
            default:
                throw new InvalidArgumentException('Invalid argument changedArgName');
        }
        $languageInfo->save();
        return $languageInfo;
    }

    /**
     * @inheritDoc
     */
    public function get(object $dto): object 
    {
        $this->dtoCheck($dto);
        $this->hasModelCheck($dto);

        $laguageInfo = LanguageInfo::where('name', $dto->name)->firstOrFail();
        return $laguageInfo;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array 
    {
        $languagesInfo = LanguageInfo::all()->toArray();

        return $languagesInfo;
    }

    /**
     * @inheritDoc
     */
    public function has(object $dto): bool 
    {
        $this->dtoCheck($dto);

        $laguageInfo = LanguageInfo::where('name', $dto->name)->first();

        if ($laguageInfo) 
        {
            return true;
        } else {
            return false;
        }

    }

    /**
     * @inheritDoc
     */
    public function remove(object $dto) 
    {
        $this->dtoCheck($dto);
        $this->hasModelCheck($dto);
        
        $languageInfo = $this->get($dto);
        $languageInfo->remove();
    }
}