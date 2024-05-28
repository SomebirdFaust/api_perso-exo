<?php
class Controller {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getItems() {
        $stmt = $this->db->prepare("SELECT * FROM items");
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($items);
    }

    public function createItem() {
        $data = json_decode(file_get_contents('php://input'), true);
        $stmt = $this->db->prepare("INSERT INTO items (name, description) VALUES (:name, :description)");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->execute();

        echo json_encode(['message' => 'Item created successfully']);
    }
}
