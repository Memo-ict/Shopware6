<?php

namespace Kiener\MolliePayments\Exception;

class CouldNotCancelMollieRefundException extends \RuntimeException
{
    public function __construct(string $mollieOrderId, string $orderNumber, string $refundId)
    {
        $message = sprintf("Could not cancel the refund with id %s for order %s (Order number %s)",
            $refundId,
            $mollieOrderId,
            $orderNumber
        );

        parent::__construct($message);
    }
}
