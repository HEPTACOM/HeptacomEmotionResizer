<?php

namespace KskEmotionResizer\Subscribers;

use Doctrine\Common\Collections\ArrayCollection;
use Enlight\Event\SubscriberInterface;
use Enlight_Template_Manager;

class TemplateRegistration implements SubscriberInterface
{
    /**
     * @var string
     */
    private $pluginDirectory;

    /**
     * @var Enlight_Template_Manager
     */
    private $templateManager;

    /**
     * @param $pluginDirectory
     * @param Enlight_Template_Manager $templateManager
     */
    public function __construct($pluginDirectory, Enlight_Template_Manager $templateManager)
    {
        $this->pluginDirectory = $pluginDirectory;
        $this->templateManager = $templateManager;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PreDispatch' => 'onPreDispatch',
            'Theme_Compiler_Collect_Plugin_Javascript' => 'addJavascript',
        ];
    }

    /**
     * @return ArrayCollection
     */
    public function addJavascript()
    {
        return new ArrayCollection([
            implode(DIRECTORY_SEPARATOR, [
                $this->pluginDirectory,
                'Resources',
                'views',
                'frontend',
                '_public',
                'src',
                'js',
                'jquery.unify-height.js'
            ]),
        ]);
    }

    public function onPreDispatch()
    {
        $this->templateManager->addTemplateDir(implode(DIRECTORY_SEPARATOR, [
            $this->pluginDirectory,
            'Resources',
            'views'
        ]));
    }
}
