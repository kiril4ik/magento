<?php

namespace Kirill\ExtendedModule\TextBlock;

use Magento\Catalog\Model\Product;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

class TextBlock extends Template
{
    /**
     * @var Registry
     */
    protected $registry;
    /**
     * @var Product
     */
    private $product;

    /**
     * TextBlock constructor.
     * @param Template\Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(Template\Context $context,
//                                Registry $registry,
                                array $data)
    {
//        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    public function getHelloWorld()
    {
        return 'Hello world';
    }
    public function getCurrentTime()
    {
        return date("F j, Y, g:i a");
    }
    /**
     * @return Product
     */
//    private function getProduct()
//    {
//        if (is_null($this->product)) {
//            $this->product = $this->registry->registry('product');
//
//            if (!$this->product->getId()) {
//                throw new LocalizedException(__('Failed to initialize product'));
//            }
//        }
//
//        return $this->product;
//    }

    /**
     * @return string
     * @throws LocalizedException
     */
//    public function getProductName()
//    {
//        return $this->getProduct()->getName();
//    }

    /**
     * @return \Magento\Catalog\Model\Category
     * @throws LocalizedException
     */
//    public function getProductCategory() {
//        return $this->getProduct()->getCategory();
//    }
}
