<?php

namespace Multifinger\SettingsBundle\Service;

use \Doctrine\Bundle\DoctrineBundle\Registry;
use Multifinger\SettingsBundle\Entity\Setting;

/**
 * Handles read-write methods to settings database
 * @author Maksim Borisov <maksim.i.borisov@gmail.com> 25.04.17 17:29
 */
class SettingsService
{

    protected $doctrine;

    /**
     * AppSettingsService constructor.
     * @param Registry $doctrine
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @author Maksim Borisov <maksim.i.borisov@gmail.com> 19.11.13 17:18
     */
    public function getRecord($name)
    {
        return $this->doctrine->getRepository(Setting::class)->findOneBy(['name' => $name]);
    }

    /**
     * @author Maksim Borisov <maksim.i.borisov@gmail.com> 19.11.13 17:18
     * @param $name
     * @param null $default
     * @return null|string
     */
    public function get($name, $default = null)
    {
        $record = $this->getRecord($name);

        return $record ? $record->getValue() : $default;
    }

    /**
     * @author Maksim Borisov <maksim.i.borisov@gmail.com> 19.11.13 17:18
     * @param $name
     * @param $value
     * @param bool $flush
     */
    public function set($name, $value, $flush = true)
    {
        $setting = $this->getRecord($name);

        if (!$setting) {
            $setting = new Setting();
            $setting->setName($name);
            $setting->setDescription('');
            $this->doctrine->getManager()->persist($setting);
        }

        $setting->setValue($value);

        if ($flush) {
            $this->doctrine->getManager()->flush();
        }
    }

}
