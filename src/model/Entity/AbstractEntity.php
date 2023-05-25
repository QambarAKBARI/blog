<?php

namespace App\Entity;

abstract class AbstractEntity
{
    /**
     * @param mixed $property
     * @param mixed $value
     *
     * @return [type]
     */
    public function __set($property, $value)
    {
        $tab = explode('_', $property);

        if (isset($tab[1]) && $tab[1] === 'id') {
            $table = $tab[0];
            $managerFQCN = 'App\\Manager\\'.ucfirst($table).'Manager';
            $manager = new $managerFQCN();
            $property = $table;
            $value = $manager->findOneById($value);
            $this->$property = $value;
        }
    }

    /**
     * @param mixed $date
     * @param mixed $format
     *
     * @return [type]
     */
    protected static function formatDate($date, $format)
    {
        $date = new \DateTime($date);

        return $date->format($format);
    }
}
