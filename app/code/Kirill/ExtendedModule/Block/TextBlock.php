<?php

namespace Kirill\ExtendedModule\Block;

use Magento\Catalog\Model\Product;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

use Magento\Catalog\Model\ResourceModel\Category\Collection;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Catalog\Model\CategoryRepository;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;

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
     * @var string
     */
    public $unused_text;
    /**
     * @var false|string
     */
    public $current_time;
    /**
     * @var CollectionFactory
     */
    private $collection_factory;
    /**
     * @var CategoryRepository
     */
    private $category_repository;
    /**
     * @var ProductCollectionFactory
     */
    private $product_collection;
    /**
     * TextBlock constructor.
     * @param Template\Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(Template\Context $context,
                                Registry $registry,
                                CollectionFactory $collection_factory,
                                CategoryRepository $category_repository,
                                ProductCollectionFactory $product_collection,
                                array $data)
    {
        parent::__construct($context, $data);
        $this->registry = $registry;
        $this->unused_text = "Bla bla";
        $this->current_time = date("F j, Y, g:i a");
        $this->collection_factory = $collection_factory;
        $this->category_repository = $category_repository;
        $this->product_collection = $product_collection;
    }

    public function getHelloWorld()
    {
        return 'Hello world';
    }
    public function getBlaBla()
    {
        return $this->unused_text;
    }

    public function getCurrentTime()
    {
        return $this->current_time;
    }
    /**
     * @return Product
     */
    private function getProduct()
    {
        if (is_null($this->product)) {
            $this->product = $this->registry->registry('product');

            if (!$this->product->getId()) {
                throw new LocalizedException(__('Failed to initialize product'));
            }
        }

        return $this->product;
    }

    /**
     * @return string
     * @throws LocalizedException
     */
    public function getProductName()
    {
        return $this->getProduct()->getName();
    }

    /**
     * @return \Magento\Catalog\Model\Category
     * @throws LocalizedException
     */
    public function getProductPrice()
    {
        return $this->getProduct()->getPrice();
    }
    public function getMenuList()
    {
        $collection_arr = [];
        $collection = $this->collection_factory->
            create()->
            addAttributeToFilter('include_in_menu', true)->
            addAttributeToSelect('*');
        foreach ($collection as $col_el) {
            $collection_arr[] = $col_el->getData('name');
        }
        return $collection_arr;
    }
    public function getProdList() {
        $prod_array = [];
        $cat_obj = $this->category_repository->get('41');
        $products = $this->product_collection->
            create()->
            addCategoryFilter($cat_obj)->
            addAttributeToSelect('*');
        foreach ($products as $prod) {
            $prod_array[] = $prod->getData('name');
        }
        return $prod_array;
    }
}
