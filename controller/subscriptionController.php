<?php
  require_once APP_PATH . '/libs/model/FormHandler.class.php';
  require_once APP_PATH . '/libs/model/Subscription.class.php';

  class subscriptionController {
    private $FormHandler;
    private $Subscription;

    public function __construct() {
      $this->FormHandler = new FormHandler();
      $this->Subsciption = new Subsciption();
    }
    /**
     * The default method of the controller that present the default view
     */
    public function index() {
      $this->overview();
    }

    public function overview() {
      $subscriptions = $this->Subsciption->getClientSubscriptions();
      loadHeader();
      if ($subscriptions === false) {
        // We don't have them
        include APP_PATH . '/view/subscription/no-subsciption.php';
      }
      else {
        // we have
        include APP_PATH . '/view/subscription/overview.php';
      }
      loadFooter();
    }

    public function addSubscription() {
      $this->FormHandler->setRequired('name');
      $this->FormHandler->setRequired('date');

      if ($this->FormHandler->run() === true) {
        $clientName = $this->FormHandler->getPostValue('name');
        $clientDate = $this->FormHandler->getPostValue('date');

        $this->Subsciption->addSubscription($clientName, $clientDate);
      }

      loadHeader();
        include APP_PATH . '/view/subscription/add-subscription.php';
      loadFooter();
    }

  }

?>
