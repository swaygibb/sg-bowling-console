<?php
namespace App\Services;

class SessionService {

    /**
     * get - get session variable
     * @param string $config
     * @return mixed
     */
    public function get($config) {
        return (isset($_SESSION[$config]) && strlen($_SESSION[$config])) ? $_SESSION[$config] : null;
    }

    /**
     * clear - clear the session variable
     * @return mixed
     */
    public function clear($config) {
        $_SESSION[$config] = null;
        return (isset($_SESSION[$config]) && strlen($_SESSION[$config])) ? $_SESSION[$config] : null;
    }

    /**
     * set - set a session variable
     * @param string $config - session variable index
     * @param string $value - value of the variable
     * @return mixed
     */
    public function set($config, $value) {
        $_SESSION[$config] = $value;
        return (isset($_SESSION[$config]) && strlen($_SESSION[$config])) ? $_SESSION[$config] : null;
    }
}