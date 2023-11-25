<?php

namespace App;

class AppConstants {
    /**
     * ------------------------------------------------------------------------------------------------
     * App Contants
     * ------------------------------------------------------------------------------------------------
     */
    const HTTP_GET = 'GET';
    const HTTP_POST = 'POST';

    /**
     * ------------------------------------------------------------------------------------------------
     * CUSTOMERS API
     * ------------------------------------------------------------------------------------------------
     */
    const CUSTOMERS_API_BASE_URL    = 'http://10.200.248.122';
    const CUSTOMERS_API_LOGIN       = self::CUSTOMERS_API_BASE_URL . '/api/v1/auth/login';
    const CUSTOMERS_API_LOGOUT      = self::CUSTOMERS_API_BASE_URL . '/api/v1/logout';

}
