<?php
declare(strict_types=1);

namespace Assessment\RegisterValidation\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class NewUserLogger implements ObserverInterface
{

    private LoggerInterface $logger;

    /**
     * New Users logger.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * Log user after register
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        $customer = $observer->getEvent()->getData('customer');
        $this->logger->info(
            "Customer Info", [
             "First Name" => $customer->getFirstname(),
             "Last Name" => $customer->getLastname(),
             "Email" => $customer->getEmail(),
             "Creation time" => $customer->getCreatedAt(),
            ]
        );

    }
}
