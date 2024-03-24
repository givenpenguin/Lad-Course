<?php

namespace db;

use Exception;

class JsonDataBase
{
    private readonly string $path;
    private array $entities;

    /**
     * @throws Exception
     */
    public function __construct(string $entities)
    {
        $this->path = __DIR__ . "/{$entities}.json" ?? false;

        if(file_exists($this->path)) {
            $this->entities = json_decode(file_get_contents($this->path), true);
        } else {
            throw new Exception('Путь к БД не найден');
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

    public function insert(array $product): bool
    {
        if(!$this->uploadImage($product))
        {
            return false;
        }
        unset($product['image']['tmpPath']);

        $updatedData = array_merge($this->entities, [$product]);
        return file_put_contents($this->path, json_encode($updatedData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    public function delete(array $product): bool
    {
        $needle = $this->where('id', $product['id']);
        $index = array_search($needle, $this->entities);
        unset($this->entities[$index]);

        return file_put_contents($this->path, json_encode($this->entities, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    public function uploadImage(array $product): bool
    {
        $pathName = 'D:/web/back/backup/lesson8/' . $product['image']['fileName'];
        return move_uploaded_file($product['image']['tmpPath'], $pathName);
    }

    public function selectAll(): array
    {
        return $this->entities;
    }

    public function getLastId(): int
    {
        return $this->entities[count($this->entities) - 1]['id'];
    }
}