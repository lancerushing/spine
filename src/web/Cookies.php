<?php
/**
 * @author: lance
 * @since 20140-02-22
 */

namespace Spine\Web;

/**
 * Class Cookies, wraps up the Cookie super globals
 *
 * @package Spine\Web
 */
class Cookies
{

    /**
     * @param string $name
     *
     * @return mixed cookie value or NULL if cookie doesn't exist
     */
    public function get($name)
    {
        if (isset($_COOKIE[$name])) {
            return $_COOKIE[$name];
        }
        return null;
    }

    /**
     * @param string $name
     * @param string $value
     * @param null   $expire
     */
    public function set($name, $value, $expire = null)
    {
        setcookie($name, $value, $expire, "/");
    }

    public function delete($name)
    {
        unset($_COOKIE[$name]);
        $this->set($name, null, -1);
    }
} 