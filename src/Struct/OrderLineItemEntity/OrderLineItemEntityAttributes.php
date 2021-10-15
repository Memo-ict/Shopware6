<?php

namespace Kiener\MolliePayments\Struct\OrderLineItemEntity;


use Shopware\Core\Checkout\Cart\LineItem\LineItem;
use Shopware\Core\Checkout\Order\Aggregate\OrderLineItem\OrderLineItemEntity;

class OrderLineItemEntityAttributes
{

    /**
     * @var string
     */
    private $voucherType;


    /**
     * @param OrderLineItemEntity $lineItem
     */
    public function __construct(OrderLineItemEntity $lineItem)
    {
        $this->voucherType = '';

        if ($lineItem->getPayload() === null) {
            return;
        }

        if (!array_key_exists('customFields', $lineItem->getPayload())) {
            return;
        }

        $customFields = $lineItem->getPayload()['customFields'];

        if ($customFields === null) {
            return;
        }

        if (!array_key_exists('mollie_payments', $customFields)) {
            return;
        }

        $mollieData = $customFields['mollie_payments'];

        if (array_key_exists('voucher_type', $mollieData)) {
            $this->voucherType = (string)$mollieData['voucher_type'];
        }

    }

    /**
     * @return string
     */
    public function getVoucherType()
    {
        if ($this->voucherType !== '1' && $this->voucherType !== '2' & $this->voucherType !== '3') {
            return '';
        }

        return $this->voucherType;
    }

}
