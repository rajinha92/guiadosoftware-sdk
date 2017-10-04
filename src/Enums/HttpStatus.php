<?php
/**
 * Created by PhpStorm.
 * User: Rafae
 * Date: 06/06/2017
 * Time: 15:32
 */

namespace GuiaDoSoftwareSdk\Enums;


abstract class HttpStatus
{
    const HTTP_STATUS_CONTINUE = 100;
    const HTTP_STATUS_OK = 200;
    const HTTP_STATUS_CREATED = 201;
    const HTTP_STATUS_ACCEPTED = 202;
    const HTTP_STATUS_NO_CONTENT = 204;
    const HTTP_STATUS_MOVED_PERMANENTLY = 301;
    const HTTP_STATUS_TEMPORARY_REDIRECT = 307;
    const HTTP_STATUS_BAD_REQUEST = 400;
    const HTTP_STATUS_UNAUTHORIZED = 401;
    const HTTP_STATUS_PAYMENT_REQUIRED = 402;
    const HTTP_STATUS_FORBIDDEN = 403;
    const HTTP_STATUS_NOT_FOUND = 404;
    const HTTP_STATUS_INTERNAL_SERVER_ERROR = 500;
}