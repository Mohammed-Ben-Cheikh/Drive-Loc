<?php
require_once __DIR__ . '/../database/Database.php';

class Reservation
{
    private $id_reservation;
    private $id_user_fk;
    private $id_vehicule_fk;
    private $date_reservation;
    private $statut;
    private $commentaire;
    private $date_creation;
    private $if_reser_modif;
    private $date_modification;
    private $date_limite;

    public function __construct(
        $id_reservation = null,
        $id_user_fk,
        $id_vehicule_fk,
        $date_reservation,
        $statut = 'en attente',
        $commentaire = null,
        $if_reser_modif = 'no',
        $date_limite
    ) {
        $this->id_reservation = $id_reservation;
        $this->id_user_fk = $id_user_fk;
        $this->id_vehicule_fk = $id_vehicule_fk;
        $this->date_reservation = $date_reservation;
        $this->statut = $statut;
        $this->commentaire = $commentaire;
        $this->if_reser_modif = $if_reser_modif;
        $this->date_limite = $date_limite;
    }

    public function create()
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "INSERT INTO reservations (
            id_user_fk, id_vehicule_fk, date_reservation,
            statut, commentaire, if_reser_modif, date_limite
        ) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $this->id_user_fk,
            $this->id_vehicule_fk,
            $this->date_reservation,
            $this->statut,
            $this->commentaire,
            $this->if_reser_modif,
            $this->date_limite
        ]);
        $database->disconnect();
        return $db->lastInsertId();
    }

    public static function getAll()
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "SELECT r.*, u.username, v.nom as vehicule_nom 
                FROM reservations r 
                JOIN users u ON r.id_user_fk = u.id_user
                JOIN vehicules v ON r.id_vehicule_fk = v.id_vehicule";
        $stmt = $db->query($sql);
        $database->disconnect();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "SELECT r.*, u.username, v.nom as vehicule_nom 
                FROM reservations r 
                JOIN users u ON r.id_user_fk = u.id_user
                JOIN vehicules v ON r.id_vehicule_fk = v.id_vehicule
                WHERE r.id_reservation = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $database->disconnect();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getByUser($userId)
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "SELECT r.*, v.nom as vehicule_nom 
                FROM reservations r 
                JOIN vehicules v ON r.id_vehicule_fk = v.id_vehicule
                WHERE r.id_user_fk = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$userId]);
        $database->disconnect();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByVehicle($vehicleId)
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "SELECT r.*, u.username 
                FROM reservations r 
                JOIN users u ON r.id_user_fk = u.id_user
                WHERE r.id_vehicule_fk = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$vehicleId]);
        $database->disconnect();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "UPDATE reservations SET 
                date_reservation = ?, statut = ?,
                commentaire = ?, if_reser_modif = ?,
                date_limite = ?
                WHERE id_reservation = ?";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([
            $this->date_reservation,
            $this->statut,
            $this->commentaire,
            $this->if_reser_modif,
            $this->date_limite,
            $this->id_reservation
        ]);
        $database->disconnect();
        return $result;
    }

    public static function delete($id)
    {
        $database = new Database();
        $db = $database->connect();
        $sql = "DELETE FROM reservations WHERE id_reservation = ?";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$id]);
        $database->disconnect();
        return $result;
    }
}



