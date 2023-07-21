<?php

namespace Content\Migrations\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Api\BlockRepositoryInterface;


class AddCmsBlocks implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var BlockFactory
     */
    private $blockFactory;

    /**
     * @var BlockRepositoryInterface
     */
    private $blockRepository;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param BlockFactory $blockFactory
     * @param BlockRepositoryInterface|null $blockRepository
     *
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory $blockFactory,
        BlockRepositoryInterface $blockRepository

    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockFactory = $blockFactory;
        $this->blockRepository = $blockRepository
        ?: \Magento\Framework\App\ObjectManager::getInstance()->get(BlockRepositoryInterface::class);
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $bannersCategorias = [
            'title' => 'banners-categorias',
            'identifier' => 'banners-categorias',
            'content' => '<style>#html-body [data-pb-style=V363E2F]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=ORG4WL4]{text-align:center}</style><div data-content-type="row" data-appearance="contained" data-element="main"><div data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="V363E2F"><div data-content-type="html" data-appearance="default" data-element="main" data-pb-style="ORG4WL4">&lt;div id="#banners_category"&gt;
            &lt;div&gt;
                &lt;a href="https://www.google.com"&gt;&lt;image id="images_category" src="http://magentostore.test/media/wysiwyg/download.png"&gt;&lt;/image&gt;&lt;/a&gt;
                &lt;a href="https://www.google.com"&gt;&lt;image id="images_category" src="http://magentostore.test/media/wysiwyg/download.png"&gt;&lt;/image&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;div&gt;
                &lt;a href="https://www.google.com"&gt;&lt;image id="images_category" src="http://magentostore.test/media/wysiwyg/download.png"&gt;&lt;/image&gt;&lt;/a&gt;
                &lt;a href="https://www.google.com"&gt;&lt;image id="images_category" src="http://magentostore.test/media/wysiwyg/download.png"&gt;&lt;/image&gt;&lt;/a&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;style&gt;
        #banners_category {
        display: grid; 
        justify-content: center; 
        align-content: center;
        }
        #images_category {
        max-height: 200px;
        width: 600px;
        }
        
        &lt;/style&gt;</div></div></div>',
            'is_active' => 1
        ];

        $advantagesBanners = [
            'title' => 'advantage-banners',
            'identifier' => 'advantage-banners',
            'content' => '<style>#html-body [data-pb-style=N2QV21B],#html-body [data-pb-style=YP9L0VB]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=YP9L0VB]{justify-content:flex-start;display:flex;flex-direction:column}#html-body [data-pb-style=N2QV21B]{align-self:stretch}#html-body [data-pb-style=BP7P2KC]{display:flex;width:100%}#html-body [data-pb-style=HYU7T9R],#html-body [data-pb-style=J1IMWUC],#html-body [data-pb-style=LNAXLIX],#html-body [data-pb-style=SOJ0DP1]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:25%;align-self:stretch}#html-body [data-pb-style=MJ9T6EE]{border-style:none}#html-body [data-pb-style=QKKINC5],#html-body [data-pb-style=UP6NTSQ]{max-width:100%;height:auto}#html-body [data-pb-style=KVNMQOB]{border-style:none}#html-body [data-pb-style=BQX86EF],#html-body [data-pb-style=WXB6UDV]{max-width:100%;height:auto}#html-body [data-pb-style=RTH0CSC]{border-style:none}#html-body [data-pb-style=BIBNF7H],#html-body [data-pb-style=TK2PNIG]{max-width:100%;height:auto}#html-body [data-pb-style=F7YQBYH]{border-style:none}#html-body [data-pb-style=HGBPDD1],#html-body [data-pb-style=MYW6TYA]{max-width:100%;height:auto}@media only screen and (max-width: 768px) { #html-body [data-pb-style=F7YQBYH],#html-body [data-pb-style=KVNMQOB],#html-body [data-pb-style=MJ9T6EE],#html-body [data-pb-style=RTH0CSC]{border-style:none} }</style><div data-content-type="row" data-appearance="contained" data-element="main"><div data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="YP9L0VB"><div class="pagebuilder-column-group" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="N2QV21B"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="BP7P2KC"><div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="HYU7T9R"><figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="MJ9T6EE"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/Captura_de_tela_de_2023-07-18_19-39-25_2.png}}" alt="" title="" data-element="desktop_image" data-pb-style="QKKINC5"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/Captura_de_tela_de_2023-07-18_19-39-25_2.png}}" alt="" title="" data-element="mobile_image" data-pb-style="UP6NTSQ"></figure></div><div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="J1IMWUC"><figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="KVNMQOB"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/Captura_de_tela_de_2023-07-18_19-39-42_2.png}}" alt="" title="" data-element="desktop_image" data-pb-style="WXB6UDV"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/Captura_de_tela_de_2023-07-18_19-39-42_2.png}}" alt="" title="" data-element="mobile_image" data-pb-style="BQX86EF"></figure></div><div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="SOJ0DP1"><figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="RTH0CSC"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/Captura_de_tela_de_2023-07-18_19-39-50_2.png}}" alt="" title="" data-element="desktop_image" data-pb-style="BIBNF7H"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/Captura_de_tela_de_2023-07-18_19-39-50_2.png}}" alt="" title="" data-element="mobile_image" data-pb-style="TK2PNIG"></figure></div><div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="LNAXLIX"><figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="F7YQBYH"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/Captura_de_tela_de_2023-07-18_19-39-57_2.png}}" alt="" title="" data-element="desktop_image" data-pb-style="MYW6TYA"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/Captura_de_tela_de_2023-07-18_19-39-57_2.png}}" alt="" title="" data-element="mobile_image" data-pb-style="HGBPDD1"></figure></div></div></div></div></div>',
            'is_active' => 1
        ];

        $this->moduleDataSetup->startSetup();

        /** @var \Magento\Cms\Model\Block $block */
        $block = $this->blockFactory->create();
        $block->setData($bannersCategorias);
        $this->blockRepository->save($block);
        $block->setData($advantagesBanners);
        $this->blockRepository->save($block);
      /*$block->setData($blockExemplo2);
        $this->blockRepository->save($block);
        $block->setData($blockExemplo2);
        $this->blockRepository->save($block);
        $block->setData($blockExemplo2);
        $this->blockRepository->save($block);
        $block->setData($blockExemplo2);
        $this->blockRepository->save($block);
        $block->setData($blockExemplo2);
        $this->blockRepository->save($block); exemplos*/
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
