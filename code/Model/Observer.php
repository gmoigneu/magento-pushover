<?php
class Nls_Pushover_Model_Observer
{

    protected $_token;
    protected $_userkey;

    public function __construct()
    {
      $this->_token = Mage::getStoreConfig('nlspushover/nls_group/nls_token',Mage::app()->getStore());
      $this->_userkey = Mage::getStoreConfig('nlspushover/nls_group/nls_userkey',Mage::app()->getStore());
    }

    /**
     * Send notification when an order is placed
     * @param   Varien_Event_Observer $observer
     * @return  Nls_PushNotifications_Sender
     */
    public function sendOrderSuccessNotification($observer)
    {
      $event = $observer->getEvent();
      $order = $observer->getEvent()->getOrder(); 
      $this->sendNotification(__("New Order #%s from %s. Total : %s", $order->getIncrementId(), $order->getCustomerFirstname().' '.$order->getCustomerLastname(), $order->getGrandTotal().' '.$order->getOrderCurrencyCode()));
    }

    /**
     * Generic curl call to pushover.net
     * @param  string $message The message to send
     */
    public function sendNotification($message)
    {
      $call = curl_setopt_array($ch = curl_init(), array(
        CURLOPT_URL => "https://api.pushover.net/1/messages.json",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT_MS => 1000,
        CURLOPT_POSTFIELDS => array(
          "token" => $this->_token,
          "user" => $this->_userkey,
          "message" => $message
        )));
      curl_exec($ch);
      curl_close($ch);
    }
}