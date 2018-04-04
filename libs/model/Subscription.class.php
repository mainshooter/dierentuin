<?php

  class Subsciption {
    private $clientSubscription;

    public function __construct() {
      if ($this->checkIfClientHasSubscriptions() === true) {
        $this->clientSubscription = $_SESSION['subsciption'];
      }
      $this->clientSubscription = false;
    }

    public function getClientSubscriptions() {
      return($this->clientSubscription);
    }

    public function addSubscription($clientName, $clientDate) {

    }

    private function getSubsciptionPrice($clientAge) {

    }

    private function getAge($clientDate) {

    }

    private function checkIfClientHasSubscriptions() {
      if (ISSET($_SESSION['subscription']) === true) {
        return(true);
      }
      return(false);
    }

  }



?>
