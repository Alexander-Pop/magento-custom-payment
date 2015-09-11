<?php

class Cegeka_Paymentgateway_Helper_Data extends Mage_Core_Helper_Abstract
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
	return Mage::getUrl("payget/paygateway/success");
}

public function getCancelUrl()
{
	return Mage::getUrl("payget/paygateway/cancel");
}
    
}