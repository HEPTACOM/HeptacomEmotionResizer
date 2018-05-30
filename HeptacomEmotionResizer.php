<?php

namespace HeptacomEmotionResizer;

use Exception;
use Shopware\Bundle\AttributeBundle\Service\CrudService;
use Shopware\Bundle\AttributeBundle\Service\TypeMapping;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UpdateContext;

class HeptacomEmotionResizer extends Plugin
{
    const ATTRIBUTE_PREFIX = 'heptacom_emotion_resizer_';

    /**
     * @param InstallContext $context
     * @throws Exception
     */
    public function install(InstallContext $context)
    {
        $this->updateAttributes();
    }

    /**
     * @param UpdateContext $context
     * @throws Exception
     */
    public function update(UpdateContext $context)
    {
        $this->updateAttributes();
    }

    /**
     * @throws Exception
     */
    private function updateAttributes()
    {
        /** @var CrudService $crud */
        $crud = $this->container->get('shopware_attribute.crud_service');

        $crud->update(
            's_emotion_attributes',
            static::ATTRIBUTE_PREFIX . 'unify_height',
            TypeMapping::TYPE_BOOLEAN,
            [
                'translatable' => false,
                'displayInBackend' => true,
                'custom' => false,
            ],
            null,
            null,
            0
        );
    }
}
