<?php

namespace CountryZilla;

class CountryCodes
{
    protected $key = 'alpha2';

    protected $countries = [];

    public function __construct($key = null)
    {
        if (!empty($key)) {
            $this->key = $key;
        }

        $list = include(__DIR__ . '/../config/countries.php');

        $this->initialize($list);
    }

    protected function initialize($list = [])
    {
        $result = [];
        if (!empty($list)) {
            foreach ($list as $row) {
                $key = $row[$this->key];
                $result[$key] = $row;
            }

            $this->countries = $result;
        }
    }

    public function getPrefix($countryCode)
    {
        return $this->countries[$countryCode]['prefix'];
    }

    public function getNumCode($countryCode)
    {
        return $this->countries[$countryCode]['iso_num'];
    }

    public function getName($countryCode)
    {
        return $this->countries[$countryCode]['name'];
    }
}
