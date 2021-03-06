<?php
/**
 * Factory for Mage_Webhook_Model_Job
 *
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Webhook
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Mage_Webhook_Model_Job_Factory implements Magento_PubSub_Job_FactoryInterface
{
    /**
     * @var Magento_ObjectManager
     */
    protected $_objectManager;

    /**
     * Initialize the class
     *
     * @param Magento_ObjectManager $objectManager
     */
    public function __construct(Magento_ObjectManager $objectManager)
    {
        $this->_objectManager = $objectManager;
    }

    /**
     * Create Job
     *
     * @param Magento_PubSub_SubscriptionInterface $subscription
     * @param Magento_PubSub_EventInterface $event
     * @return Magento_PubSub_JobInterface
     */
    public function create(Magento_PubSub_SubscriptionInterface $subscription, Magento_PubSub_EventInterface $event)
    {
        return $this->_objectManager->create('Mage_Webhook_Model_Job', array(
            'data' => array(
                'event' => $event,
                'subscription' => $subscription,
                'status' => Magento_PubSub_JobInterface::READY_TO_SEND
            )
        ));
    }
}
