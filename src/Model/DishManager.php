<?php

namespace App\Model;

class DishManager extends AbstractManager
{
    public const TABLE = 'dish';

    public function selectAllWithCategory()
    {
        $query = 'SELECT d.*, c.name AS category_name  FROM ' . self::TABLE . ' d
            JOIN ' . CategoryManager::TABLE . ' c ON c.id = d.category_id';
        return $this->pdo->query($query)->fetchAll();
    }

    public function insert(array $dish): void
    {
        $query = "INSERT INTO " . self::TABLE . " (`name`, `description`, `image`, `category_id`, `price`)
            VALUES (:name, :description, :image, :category, :price)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('name', $dish['name'], \PDO::PARAM_STR);
        $statement->bindValue('description', $dish['description'], \PDO::PARAM_STR);
        $statement->bindValue('image', $dish['image'], \PDO::PARAM_STR);
        $statement->bindValue('category', $dish['category'], \PDO::PARAM_INT);
        $statement->bindValue('price', $dish['price']);
        $statement->execute();
    }

    public function update(array $dish): void
    {
        $query = "UPDATE " . self::TABLE . " 
            SET `name`=:name, `description`=:description, `image`=:image, `price`=:price, `category_id`=:category
            WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('name', $dish['name'], \PDO::PARAM_STR);
        $statement->bindValue('description', $dish['description'], \PDO::PARAM_STR);
        $statement->bindValue('image', $dish['image'], \PDO::PARAM_STR);
        $statement->bindValue('category', $dish['category'], \PDO::PARAM_INT);
        $statement->bindValue('price', $dish['price']);
        $statement->bindValue('id', $dish['id'], \PDO::PARAM_INT);
        $statement->execute();
    }
}
