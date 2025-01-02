<?php
require_once __DIR__ . '/../database/Database.php';

class Categorie
{
    private $id_categorie;
    private $nom;
    private $description;
    private $image_url;
    private $created_at;
    private $updated_at;

    public function __construct(
        $nom,
        $description = null,
        $image_url = null,
        $id_categorie = null
    ) {
        $this->nom = $nom;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->id_categorie = $id_categorie;
    }

    public function create()
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "INSERT INTO categories (nom, description, image_url) 
                VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $this->nom,
            $this->description,
            $this->image_url
        ]);
        $database->disconnect();
        return $db->lastInsertId();
    }

    public static function getAll()
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "SELECT * FROM categories";
        $stmt = $db->query($sql);
        $database->disconnect();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "SELECT * FROM categories WHERE id_categorie = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $database->disconnect();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $database = new Database();
        $db = $database->connect();
           $sql = "UPDATE categories SET nom = ?, description = ?, 
                image_url = ? WHERE id_categorie = ?";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([
            $this->nom,
            $this->description,
            $this->image_url,
            $this->id_categorie
        ]);
        $database->disconnect();
        return $result;
    }

    public static function delete($id)
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "DELETE FROM categories WHERE id_categorie = ?";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$id]);
        $database->disconnect();
        return $result;
    }
}



