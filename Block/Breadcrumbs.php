<?php declare(strict_types=1);


namespace Webidea24\StructuredDataBreadcrumb\Block;


use Magento\Framework\View\Element\Template;

class Breadcrumbs extends Template
{

    public function toHtml()
    {
        if ($block = $this->getBreadcrumbBlock()) {
            $oldTemplate = $block->getTemplate();
            $block->setTemplate('Webidea24_StructuredDataBreadcrumb::breadcrumb.phtml');
            $return = $block->toHtml();
            $block->setTemplate($oldTemplate);

            return $return;
        }

        return null;
    }

    /**
     * @return bool|\Magento\Theme\Block\Html\Breadcrumbs
     */
    private function getBreadcrumbBlock()
    {
        return $this->getLayout()->getBlock('breadcrumbs');
    }

    public function getCacheKeyInfo()
    {
        if ($block = $this->getBreadcrumbBlock()) {
            return $block->getCacheKeyInfo() + ['seo-block'];
        }

        return [];
    }
}
