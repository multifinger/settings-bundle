<?php

namespace Multifinger\AppSettingsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 * @author Maksim Borisov <maksim.i.borisov@gmail.com> 25.04.17 17:25
 */
class MultifingerAppSettingsExtension extends Extension
{

    /**
     * @author Maksim Borisov <maksim.i.borisov@gmail.com> 25.04.17 17:25
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

}
