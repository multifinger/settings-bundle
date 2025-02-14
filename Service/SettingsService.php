<?php

namespace Multifinger\SettingsBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use Multifinger\SettingsBundle\Entity\Setting;

/**
 * Handles read-write methods to settings database
 */
class SettingsService
{
    public function __construct(
        private readonly EntityManagerInterface $em
    )
    {
    }

    /**
     * @author Maksim Borisov <maksim.i.borisov@gmail.com> 19.11.13 17:18
     */
    public function getRecord($name)
    {
        return $this->em->getRepository(Setting::class)->findOneBy(['name' => $name]);
    }

    public function get(string $name, mixed $default = null): ?string
    {
        $record = $this->getRecord($name);

        return $record ? $record->getValue() : $default;
    }

    public function set(string $name, mixed $value, bool $flush = true): void
    {
        $setting = $this->getRecord($name);

        if (!$setting) {
            $setting = new Setting();
            $setting->setName($name);
            $setting->setDescription('');
            $this->em->persist($setting);
        }

        $setting->setValue($value);

        if ($flush) {
            $this->em->flush();
        }
    }
}
