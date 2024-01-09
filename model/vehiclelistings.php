<?php

class VehicleListings {
  public $db;

  public function __construct() {
    $this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DATABASE);
  }

  public function getRecordByVin($vin) {
    $stmt = $this->db->prepare("SELECT * FROM vehicle_listings WHERE vin = ? LIMIT 1");
    $stmt->bind_param("s", $vin);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
  }
}