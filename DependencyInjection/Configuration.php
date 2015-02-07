<?php
namespace ProjectPunchclock\PunchclockBundle\DependencyInjection;

use \Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements \Symfony\Component\Config\Definition\ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('project_punchclock_punchclock');

        return $treeBuilder;
    }
}
