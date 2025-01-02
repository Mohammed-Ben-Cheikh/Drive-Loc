<?php
require_once '../../app/controller/categories.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    try {
        $id = $_POST['id'];
        $result = Categorie::delete($id);
        require_once '../../app/controller/statistiquesManager.php';
        StatistiquesManager::calculerEtMettreAJour();
        
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Catégorie supprimée avec succès']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
    exit;
}