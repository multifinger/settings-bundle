<?php

namespace Multifinger\SettingsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from app/config files
 * @author Maksim Borisov <maksim.i.borisov@gmail.com> 25.04.17 17:23
 */
class Configuration implements ConfigurationInterface
{

    /**
     * @author Maksim Borisov <maksim.i.borisov@gmail.com> 25.04.17 17:23
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('multifinger_settings');

        return $treeBuilder;
    }

}
