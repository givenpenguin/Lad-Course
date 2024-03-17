<?php

namespace App\db;

use App\exceptions\CustomException;

class JsonDataBase
{
    private readonly string $path;
    private array $entities;

    /**
     * @throws CustomException
     */
    public function __construct(string $entities)
    {
        $this->path = __DIR__ . "/{$entities}.json" ?? false;

        if(file_exists($this->path)) {
            $this->entities = json_decode(file_get_contents($this->path), true);
        } else {
            throw new CustomException('Путь к БД не найден');
        }
    }

    public function where(string $key, $value): array | false
    {
        foreach($this->entities as $entity) {
            if(isset($entity[$key]) && $entity[$key] === $value) {
                return $entity;
            }
        }
        return false;
    }

    /**
     * @param array $user
     * @return bool
     * @uses \App\Model\User::setUserToDataBase()
     */
    public function insert(array $user): bool
    {
        $updatedData = array_merge($this->entities, [$user]);
        return file_put_contents($this->path, json_encode($updatedData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    /**
     * @param array $user
     * @return bool
     * @uses \App\Model\User::updateUser()
     */
    public function update(array $user): bool
    {
        $needle = $this->where('id', $user['id']);
        $index = array_search($needle, $this->entities);
        $this->entities[$index] = $user;

        return file_put_contents($this->path, json_encode($this->entities, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    public function getLastId()
    {
        return $this->entities[count($this->entities) - 1]['id'];
    }
}