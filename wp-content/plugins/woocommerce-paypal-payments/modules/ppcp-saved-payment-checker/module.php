<?php

/**
 * The SavedPaymentChecker module.
 *
 * @package WooCommerce\PayPalCommerce\SavedPaymentChecker
 */
declare (strict_types=1);
namespace WooCommerce\PayPalCommerce\SavedPaymentChecker;

return static function (): \WooCommerce\PayPalCommerce\SavedPaymentChecker\SavedPaymentCheckerModule {
    return new \WooCommerce\PayPalCommerce\SavedPaymentChecker\SavedPaymentCheckerModule();
};
