<?php


namespace App;


class Cookie
{
    private $name;
    private $value;
    private $lifetime;
    private $data;

    /**
     * Constructor
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * Create or Update cookie.
     *
     */
    public function create()
    {
        return setcookie($this->name, $this->getValue(), $this->getTime());
    }

    /**
     * Get cookie
     * @return string
     */
    public function get(): string
    {
        return $_COOKIE[$this->getName()];
    }

    /**
     * Delete cookie.
     */
    public function delete()
    {
        return setcookie($this->name, null, -1);
    }

    /**
     * set name of the cookie
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * get that name
     * @return bool
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * set cookie expiration date
     */
    public function setTime()
    {
        $date = time() + 3600;
        $this->lifetime = $date;
    }

    /**
     * get that time of expiration
     *
     * @return bool|int
     */
    public function getTime()
    {
        return $this->lifetime;
    }


    /**
     * set encoded array value which cookie will contain
     * @param array $value
     */
    public function setValue($value)
    {
        $json = json_encode($value);
        $this->value = $json;
    }

    /**
     * function for getting that value from cookie
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * fucntions converts json to array
     *
     * @return array
     */
    public function getData()
    {
        return $this->data = json_decode($this->get(), true);
    }
}