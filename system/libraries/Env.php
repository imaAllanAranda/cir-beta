<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// file: application/libraries/Env.php
class CI_Env
{
    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createUnsafeImmutable(FCPATH);
        //$dotenv = Dotenv\Dotenv::create(FCPATH);
        /**
         * If you are using vulcas/phpdotenv >= 4.x.x then use below code, and comment above line.
         *
         * $dotenv = Dotenv\Dotenv::createUnsafeImmutable(FCPATH);
         */
        $dotenv->load();
    }
}