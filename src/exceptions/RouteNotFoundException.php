<?php declare(strict_types=1);

namespace ddd\aviation\exceptions;

use ddd\aviation\interfaces\RouteExceptionInterface;
use ddd\domain\exceptions\EntityNotFoundExceptionInterface;

final class RouteNotFoundException extends \RuntimeException implements RouteExceptionInterface, EntityNotFoundExceptionInterface
{

}