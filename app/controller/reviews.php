<?php
require_once __DIR__ . '/../database/Database.php';

class Review
{
    private $id;
    private $id_user_fk;
    private $id_vehicule_fk;
    private $statut;
    private $rating;
    private $comment;
    private $created_at;
    private $updated_at;

    public function __construct(
        $id = null,
        $id_user_fk,
        $id_vehicule_fk,
        $statut = 'en attente',
        $rating,
        $comment
    ) {
        $this->id = $id;
        $this->id_user_fk = $id_user_fk;
        $this->id_vehicule_fk = $id_vehicule_fk;
        $this->statut = $statut;
        $this->rating = $rating;
        $this->comment = $comment;
    }

    public function create()
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "INSERT INTO reviews (id_user_fk, id_vehicule_fk, statut, rating, comment) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $this->id_user_fk,
            $this->id_vehicule_fk,
            $this->statut,
            $this->rating,
            $this->comment
        ]);
        $database->disconnect();
        return $db->lastInsertId();
    }

    public static function getAll()
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "SELECT * FROM reviews";
        $stmt = $db->query($sql);
        $database->disconnect();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "SELECT * FROM reviews WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $database->disconnect();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getByVehicle($vehicleId)
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "SELECT r.*, u.username FROM reviews r 
                JOIN users u ON r.id_user_fk = u.id_user 
                WHERE r.id_vehicule_fk = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$vehicleId]);
        $database->disconnect();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByUser($userId)
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "SELECT r.*, v.nom as vehicle_name FROM reviews r 
                JOIN vehicules v ON r.id_vehicule_fk = v.id_vehicule 
                WHERE r.id_user_fk = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$userId]);
        $database->disconnect();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "UPDATE reviews SET rating = ?, comment = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([
            $this->rating,
            $this->comment,
            $this->id
        ]);
        $database->disconnect();
        return $result;
    }

    public static function delete($id)
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "DELETE FROM reviews WHERE id = ?";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$id]);
        $database->disconnect();
        return $result;
    }

    public static function updateStatut($id, $statut)
    {

        $database = new Database();
        $db = $database->connect();
        $sql = "UPDATE reviews SET statut = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$statut, $id]);
        $database->disconnect();
        return $result;
    }
}



