<?php

declare(strict_types=1);

namespace App\patterns\creational\Singleton\V1;

use Exception;

final class Singleton
{

    private static ?Singleton $instance = null;

    private function __construct() {}

    public static function getInstance(): Singleton
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __clone() {}

    /**
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception('Cannot unserialize singleton');
    }

}
