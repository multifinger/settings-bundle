<?php

namespace Multifinger\SettingsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Multifinger\SettingsBundle\Repository\SettingRepository;

#[ORM\Entity(repositoryClass: SettingRepository::class)]
#[ORM\Table(name: 'multi__settings__setting')]
class Setting
{

    #[ORM\Id, ORM\Column(type: 'string', length: 255)]
    private string $name = 'unnamed';

    #[ORM\Column(type: 'text')]
    private ?string $value = null;

    #[ORM\Column(type: 'string', length: 1024)]
    private ?string $description = null;

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

}
