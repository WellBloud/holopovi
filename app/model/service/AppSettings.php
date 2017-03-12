<?php

namespace Model\Service;

use Nette\Object,
    Nette\DI\Container,
    Exception;

/**
 * Application settings service
 *
 * @author Zuzana Kreizlova
 * @author Peter Holop <holop@sovanet.cz>
 */
class AppSettings extends Object
{

    /** @var array */
    private $parameters;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->parameters = $container->parameters;
    }

    /**
     * Returns parameters.
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Returns parameter if exists.
     * An exception is thrown by getParameterByName method if parameter is not found.
     * @param mixed $key single key or array of keys
     * @return mixed
     */
    public function getParameter($key)
    {
        return $this->searchForParameter($this->parameters, $key);
    }

    /**
     * Recursive parameter search.
     * @param array $array parameters array
     * @param mixed $key single key or array of keys
     * @return mixed
     */
    public function searchForParameter(array $array, $key)
    {
        if (is_array($key) && count($key) == 1) {
            $key = reset($key);
        }

        if (is_array($key)) {
            $currentKey = array_shift($key);
            $subArray = $this->getParameterByName($array, $currentKey);

            if (!is_array($subArray)) {
                throw new Exception('Pokoušíte se hledat parametry v rámci proměnné, která není pole. '
                . 'Zadali jste příliš mnoho klíčů pro hledání parametru.');
            }

            return $this->searchForParameter($subArray, $key);
        } else {
            return $this->getParameterByName($array, $key);
        }
    }

    /**
     * Returns config parameter value if exists.
     * @param array $array
     * @param mixed $key
     * @return mixed
     * @throws Exception
     */
    public function getParameterByName(array $array, $key)
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        throw new Exception("Parameter '$key' nebyl nalezen.");
    }

}
