<?php
require_once __DIR__ . '/../database/Database.php';
require_once __DIR__ . '/statistiques.php';

class StatistiquesManager 
{
    private static $queries = [
        'total_clients' => "SELECT COUNT(*) FROM users WHERE id_role_fk = 2",
        'total_categories' => "SELECT COUNT(*) FROM categories",
        'total_vehicules' => "SELECT COUNT(*) FROM vehicules",
        'total_reservations' => "SELECT COUNT(*) FROM reservations",
        'reservations_en_attente' => "SELECT COUNT(*) FROM reservations WHERE statut = 'en attente'",
        'reservations_approuvees' => "SELECT COUNT(*) FROM reservations WHERE statut = 'approuvée'",
        'reservations_refusees' => "SELECT COUNT(*) FROM reservations WHERE statut = 'refusée'",
        'reservations_terminee' => "SELECT COUNT(*) FROM reservations WHERE statut = 'terminée'"
    ];

    private static function calculateStats($db)
    {
        $values = [];
        foreach (self::$queries as $key => $query) {
            $stmt = $db->query($query);
            $values[$key] = $stmt->fetchColumn();
        }
        return $values;
    }

    private static function checkExistingStats($db)
    {
        $stmt = $db->query("SELECT id_statistique FROM statistiques LIMIT 1");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function calculerEtMettreAJour()
    {
        $database = new Database();
        $db = $database->connect();

        try {
            $values = self::calculateStats($db);
            $existing = self::checkExistingStats($db);

            $statistique = new Statistique(
                $existing ? $existing['id_statistique'] : null,
                $values['total_clients'],
                $values['total_categories'],
                $values['total_vehicules'],
                $values['total_reservations'],
                $values['reservations_en_attente'],
                $values['reservations_approuvees'],
                $values['reservations_refusees'],
                $values['reservations_terminee']
            );

            return $existing ? $statistique->update() : $statistique->create();

        } catch (Exception $e) {
            error_log("Erreur lors de la mise à jour des statistiques: " . $e->getMessage());
            return false;
        } finally {
            $database->disconnect();
        }
    }

    public static function getLatestStats()
    {
        $database = new Database();
        $db = $database->connect();
        
        try {
            $sql = "SELECT * FROM statistiques ORDER BY date_mise_a_jour DESC LIMIT 1";
            $stmt = $db->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } finally {
            $database->disconnect();
        }
    }

    public static function getDashboardStats()
    {
        $latestStats = self::getLatestStats();
        if (!$latestStats) {
            self::calculerEtMettreAJour();
            $latestStats = self::getLatestStats();
        }
        return $latestStats;
    }
}
