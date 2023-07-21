<?php

namespace Content\Migrations\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\PageFactory;
use Magento\Cms\Api\PageRepositoryInterface;

class AddHomeCmsPage implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var PageRepositoryInterface
     */
    private $pageRepository;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param PageFactory $pageFactory
     * @param PageRepositoryInterface|null $pageRepository
     *
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        PageFactory $pageFactory,
        PageRepositoryInterface $pageRepository

    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->pageFactory = $pageFactory;
        $this->pageRepository = $pageRepository
        ?: \Magento\Framework\App\ObjectManager::getInstance()->get(PageRepositoryInterface::class);
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {

    $this->moduleDataSetup->startSetup();

    /** @var \Magento\Cms\Model\Page $page */
    $page = $this->pageFactory->create();
    $page->setTitle('pagina inicial alternativa')
    ->setIdentifier('pagina-inicial-alternativa')
    ->setStores([0])
    ->setIsActive(1)
    ->setContent('<style>#html-body [data-pb-style=UIU86HJ]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=G57KBTA]{width:100%;border-width:1px;border-color:#fff;display:inline-block}#html-body [data-pb-style=ABEOB2N]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=KA2A8HA]{width:100%;border-width:1px;border-color:#fff;display:inline-block}#html-body [data-pb-style=CRW0ONP]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=DIQ0O3V]{width:100%;border-width:1px;border-color:#fff;display:inline-block}#html-body [data-pb-style=NIIRK3P]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=P66YCEO]{width:100%;border-width:1px;border-color:#fff;display:inline-block}</style><div data-content-type="row" data-appearance="full-bleed" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="main" data-pb-style="UIU86HJ"><div data-content-type="html" data-appearance="default" data-element="main">{{block class="Magento\Framework\View\Element\Template" template="Magento_Cms::custom_slider.phtml"}}</div><div data-content-type="divider" data-appearance="default" data-element="main"><hr data-element="line" data-pb-style="G57KBTA"></div></div><div data-content-type="row" data-appearance="contained" data-element="main"><div data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="ABEOB2N"><div data-content-type="html" data-appearance="default" data-element="main">{{block class="Magento\Framework\View\Element\Template" template="Magento_Cms::commercial_advantages.phtml"}}</div><div data-content-type="divider" data-appearance="default" data-element="main"><hr data-element="line" data-pb-style="KA2A8HA"></div></div></div><div data-content-type="row" data-appearance="contained" data-element="main"><div data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="CRW0ONP"><div data-content-type="html" data-appearance="default" data-element="main">{{block class="Magento\Framework\View\Element\Template" template="Magento_Cms::product_carousel.phtml"}}</div><div data-content-type="divider" data-appearance="default" data-element="main"><hr data-element="line" data-pb-style="DIQ0O3V"></div></div></div><div data-content-type="row" data-appearance="full-bleed" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="main" data-pb-style="NIIRK3P"><div data-content-type="html" data-appearance="default" data-element="main">{{block class="Magento\Framework\View\Element\Template" template="Magento_Cms::four-banners.phtml"}}</div><div data-content-type="divider" data-appearance="default" data-element="main"><hr data-element="line" data-pb-style="P66YCEO"></div><div data-content-type="html" data-appearance="default" data-element="main"></div></div>')
    ->setContentHeading('')
    ->setMetaTitle('')
    ->setMetaKeywords('')
    ->setMetaDescription('')
    ->setPageLayout('cms-full-width');
    $this->pageRepository->save($page);
    $this->moduleDataSetup->endSetup();

    return [];

    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }
    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
