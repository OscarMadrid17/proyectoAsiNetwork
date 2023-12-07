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
    const CUSTOMERS_API_BASE_URL        = 'http://10.200.248.122';
    const CUSTOMERS_API_LOGIN           = self::CUSTOMERS_API_BASE_URL . '/api/v1/auth/login';
    const CUSTOMERS_API_LOGOUT          = self::CUSTOMERS_API_BASE_URL . '/api/v1/logout';
    const CUSTOMERS_API_USER_DETAILS    = self::CUSTOMERS_API_BASE_URL . '/api/v1/customer/contacts';
    const CUSTOMERS_API_USER_SERVICES   = self::CUSTOMERS_API_BASE_URL . '/api/v1/customer/plans';

    /**
     * ------------------------------------------------------------------------------------------------
     * TICKETS
     * ------------------------------------------------------------------------------------------------
     */
    const REPORT_TYPES = [
        'Caída total',
        'Degradación',
        'Sin servicio Afectado',
        'Consulta Administrativa'
    ];

    const TICKET_STATUSES = [
        'ABIERTO',
        'En Proceso',
        'Cerrado'
    ];

    /**
     * ------------------------------------------------------------------------------------------------
     * MIME TYPES
     * ------------------------------------------------------------------------------------------------
     */
    const MIME_TYPES = [
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'png'   => 'image/png',
    ];
}
