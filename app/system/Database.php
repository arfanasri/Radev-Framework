<?php

namespace Arfanasri\RadevFramework\System;

class Database
{
    private \mysqli $db = null;

    public function getConnection(string $hostname, string $dbname, string $username, string $password)
    {
        if (self::$db == null) {
            self::$db = new \mysqli($hostname, $username, $password, $dbname);
        }

        return self::$db;
    }
}