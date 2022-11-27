<?php

declare(strict_types=1);

namespace App\Support\Enums;

use Symfony\Component\HttpFoundation\Response;

final class ErrorCodes
{
    public const BAD_REQUEST = Response::HTTP_BAD_REQUEST;
    public const UNAUTHORIZED = Response::HTTP_UNAUTHORIZED;
    public const FORBIDDEN = Response::HTTP_FORBIDDEN;
    public const NOT_ACCEPTABLE = Response::HTTP_NOT_ACCEPTABLE;
    public const UNPROCESSABLE_ENTITY = Response::HTTP_UNPROCESSABLE_ENTITY;
    public const NOT_FOUND = Response::HTTP_NOT_FOUND;
    public const DEFAULT_HTTP_CODE = self::BAD_REQUEST;
    public const SERVER_ERROR = Response::HTTP_INTERNAL_SERVER_ERROR;

    public const CODES = [
        self::BAD_REQUEST,
        self::UNAUTHORIZED,
        self::FORBIDDEN,
        self::NOT_ACCEPTABLE,
        self::UNPROCESSABLE_ENTITY,
        self::DEFAULT_HTTP_CODE,
        self::NOT_FOUND,
        self::SERVER_ERROR,
    ];
}
