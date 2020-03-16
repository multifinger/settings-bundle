<?php

namespace Multifinger\AppSettingsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Maksim Borisov <maksim.i.borisov@gmail.com> 25.04.17 17:48
 */
class Setting
{

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $value
     */
    private $value;

    /**
     * @var string $description
     */
    private $description;

    /**
     * Set name
     *
     * @param string $name
     * @return Setting
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Setting
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Setting
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

}