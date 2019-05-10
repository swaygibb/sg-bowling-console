<?php
namespace App\Services;

class SessionService {
    public function get($config) {
        return (isset($_SESSION[$config]) && strlen($_SESSION[$config])) ? $_SESSION[$config] : null;
    }

    public function clear($config) {
        $_SESSION[$config] = null;
        return (isset($_SESSION[$config]) && strlen($_SESSION[$config])) ? $_SESSION[$config] : null;
    }

    public function set($config, $value) {
        $_SESSION[$config] = $value;
        return (isset($_SESSION[$config]) && strlen($_SESSION[$config])) ? $_SESSION[$config] : null;
    }
}