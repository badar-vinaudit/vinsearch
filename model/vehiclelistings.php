<?php

class VehicleListings {
  public $db;

  public function __construct() {
    $this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DATABASE);
  }

  public function getRecordByVin($vin) {
    $sql = "SELECT * FROM vehicle_listings WHERE vin = '" . $vin . "' LIMIT 1";
    $result = $this->db->query($sql);
    $row = $result->fetch_assoc();
    return $row;
  }
}