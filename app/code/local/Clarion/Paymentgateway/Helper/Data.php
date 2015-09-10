<?php

class Clarion_Paymentgateway_Helper_Data extends Mage_Core_Helper_Abstract
{

public function getPaymentmethodPaymentgatewayurl()
{
	return Mage::getStoreConfig("payment/paymentgateway/cgi_url");
}

public function getAccountEmail()
{
	return Mage::getStoreConfig("payment/paymentgateway/account_email");
}

public function getReturnUrl()
{
	return Mage::getUrl("checkout/onepage/success");
}

public function getCancelUrl()
{
	return Mage::getUrl("checkout/onepage/failure");
}
    
}