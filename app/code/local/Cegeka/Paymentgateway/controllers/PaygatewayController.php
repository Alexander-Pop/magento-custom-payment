<?php
 class Cegeka_Paymentgateway_PaygatewayController extends Mage_Core_Controller_Front_Action
{
    // redirect action method 
	public function redirectAction() 
    {
	    $this->loadLayout();
        $block = $this->getLayout()->createBlock('Mage_Core_Block_Template','paymentgatewaytemplate',array('template' => 'paymentgatewaytemplate/redirect.phtml'));
		$this->getLayout()->getBlock('content')->append($block);
        $this->renderLayout();
	}
	
	public function  successAction()
    {
        $this->_redirect('checkout/onepage/success', array('_secure'=>true));
    }
		
	// cancel action will hit when someone cancels the order and state changes to canceled	
	public function cancelAction() 
    {
        if (Mage::getSingleton('checkout/session')->getLastRealOrderId()) {
            $order = Mage::getModel('sales/order')->loadByIncrementId(Mage::getSingleton('checkout/session')->getLastRealOrderId());
            if($order->getId()) {
				// Flag the order as 'cancelled' and save it
				$order->cancel()->setState(Mage_Sales_Model_Order::STATE_CANCELED, true, 'Gateway has declined the payment.')->save();
				
			}
        }
        
        $this->_redirect('checkout/onepage/failure', array('_secure'=>true));
	}
}
?>