<?php

/**
 * (c) 2011 - ∞ Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Vespolina\Entity\Brand\Brand;
use Vespolina\Entity\Product\Attribute;
use Vespolina\Entity\Product\Option;
use Vespolina\Entity\Product\OptionGroup;
use Vespolina\Entity\Product\BaseProduct;
use Vespolina\Entity\Product\Product;
use Vespolina\Entity\Identifier\SKUIdentifier;
use Vespolina\Media\Entity\Asset;
use Vespolina\Media\Entity\Media;

class BaseProductTest extends \PHPUnit_Framework_TestCase
{
    public function testDescriptions()
    {
        /** @var $product \Vespolina\Entity\Product\BaseProduct */
        $product = $this->getMockForAbstractClass('Vespolina\Entity\Product\BaseProduct');

        $product->setDescription('brief text', 'brief');
        $product->setDescription('simple introduction', 'intro');
        $product->setDescription('complex text', 'detail');
        $product->setDescription('default text');

        $this->assertEquals('brief text', $product->getDescription('brief'));
        $this->assertEquals('simple introduction', $product->getDescription('intro'));
        $this->assertEquals('complex text', $product->getDescription('detail'));
        $this->assertEquals('default text', $product->getDescription());
    }

    public function testAttributeMethods()
    {
        /** @var $product \Vespolina\Entity\Product\BaseProduct */
        $product = $this->getMockForAbstractClass('Vespolina\Entity\Product\BaseProduct');

        $feature1 = new Attribute();
        $feature1->setType('feature1');
        $product->addAttribute($feature1);
        $this->assertCount(1, $product->getAttributes());
        $this->assertSame($feature1, $product->getAttribute('feature1'));

        $feature2 = new Attribute();
        $feature2->setType('feature2');
        $product->addAttribute($feature2);
        $this->assertCount(2, $product->getAttributes());
        $this->assertSame($feature2, $product->getAttribute('feature2'));

        $product->removeAttribute($feature2);
        $this->assertCount(1, $product->getAttributes(), 'remove by feature');
        $this->assertNull($product->getAttribute('feature2'));

        $feature3 = new Attribute();
        $feature3->setType('feature3');

        $features = array();
        $features[] = $feature2;
        $features[] = $feature3;

        $product->addAttributes($features);
        $this->assertCount(3, $product->getAttributes());
        $this->assertSame($feature2, $product->getAttribute('feature2'));
        $this->assertSame($feature3, $product->getAttribute('feature3'));

        $product->setAttributes($features);
        $this->assertCount(2, $product->getAttributes());
        $this->assertNull($product->getAttribute('feature1'));
        $this->assertSame($feature2, $product->getAttribute('feature2'));
        $this->assertSame($feature3, $product->getAttribute('feature3'));


        $product->removeAttribute('feature3');
        $this->assertCount(1, $product->getAttributes(), 'feature should be removed by type');
        $product->removeAttribute('nada');
        $this->assertCount(1, $product->getAttributes());

        $product->clearAttributes();
        $this->assertEmpty($product->getAttributes());
    }

    public function testAssets()
    {
        $product = $this->getMockForAbstractClass('Vespolina\Entity\Product\BaseProduct');
        $this->assertNull($product->getAssets(), 'make sure we start out empty');

        $asset = new Asset();
        $product->addAsset($asset);
        $this->assertContains($asset, $product->getAssets());
        $this->assertCount(1, $product->getAssets());

        $assets = array();
        $assets[] = new Asset();
        $assets[] = new Asset();
        $product->mergeAssets($assets);
        $this->assertCount(3, $product->getAssets());
        $this->assertContains($asset, $product->getAssets());

        $product->removeAsset($asset);
        $this->assertNotContains($asset, $product->getAssets());
        $this->assertCount(2, $product->getAssets());

        $product->clearAssets();
        $this->assertEmpty($product->getAssets());

        $product->addAsset($asset);
        $product->setAssets($assets);
        $this->assertNotContains($asset, $product->getAssets(), 'this should have been removed on setting a new array of assets');
        $this->assertCount(2, $product->getAssets());
    }

    public function testBrands()
    {
        /** @var $product \Vespolina\Entity\Product\BaseProduct */
        $product = $this->getMockForAbstractClass('Vespolina\Entity\Product\BaseProduct');
        $this->assertEmpty($product->getBrands(), 'make sure we start out empty');

        $brand = new Brand();
        $product->addBrand($brand);
        $this->assertContains($brand, $product->getBrands());
        $this->assertCount(1, $product->getBrands());

        $brands = array();
        $brands[] = new Brand();
        $brands[] = new Brand();
        $product->mergeBrands($brands);
        $this->assertCount(3, $product->getBrands());
        $this->assertContains($brand, $product->getBrands());

        $product->removeBrand($brand);
        $this->assertNotContains($brand, $product->getBrands());
        $this->assertCount(2, $product->getBrands());

        $product->clearBrands();
        $this->assertEmpty($product->getBrands());

        $product->addBrand($brand);
        $product->setBrands($brands);
        $this->assertNotContains($brand, $product->getBrands(), 'this should have been removed on setting a new array of brands');
        $this->assertCount(2, $product->getBrands());
    }

    public function testIdentifiers()
    {
        /** @var $product \Vespolina\Entity\Product\BaseProduct */
        $product = $this->getMockForAbstractClass('Vespolina\Entity\Product\BaseProduct');
        $this->assertNull($product->getIdentifiers(), 'make sure we start out empty');

        $identifier = new SKUIdentifier();
        $product->addIdentifier($identifier);
        $this->assertContains($identifier, $product->getIdentifiers());
        $this->assertCount(1, $product->getIdentifiers());

        $identifiers = array();
        $identifiers[] = new SKUIdentifier();
        $identifiers[] = new SKUIdentifier();
        $product->mergeIdentifiers($identifiers);
        $this->assertCount(3, $product->getIdentifiers());
        $this->assertContains($identifier, $product->getIdentifiers());

        $product->removeIdentifier($identifier);
        $this->assertNotContains($identifier, $product->getIdentifiers());
        $this->assertCount(2, $product->getIdentifiers());

        $product->clearIdentifiers();
        $this->assertEmpty($product->getIdentifiers());

        $product->addIdentifier($identifier);
        $product->setIdentifiers($identifiers);
        $this->assertNotContains($identifier, $product->getIdentifiers(), 'this should have been removed on setting a new array of identifiers');
        $this->assertCount(2, $product->getIdentifiers());
    }
    
    public function testMedia()
    {
        $product = $this->getMockForAbstractClass('Vespolina\Entity\Product\BaseProduct');
        $this->assertNull($product->getAllMedia(), 'make sure we start out empty');

        $media = new Media();
        $product->addMedia($media);
        $this->assertContains($media, $product->getAllMedia());
        $this->assertCount(1, $product->getAllMedia());

        $medias = array();
        $medias[] = new Media();
        $medias[] = new Media();
        $product->addMediaCollection($medias);
        $this->assertCount(3, $product->getAllMedia());
        $this->assertContains($media, $product->getAllMedia());

        $product->removeMedia($media);
        $this->assertNotContains($media, $product->getAllMedia());
        $this->assertCount(2, $product->getAllMedia());

        $product->clearMedia();
        $this->assertEmpty($product->getAllMedia());

        $product->addMedia($media);
        $product->setMedia($medias);
        $this->assertNotContains($media, $product->getAllMedia(), 'this should have been removed on setting a new array of items');
        $this->assertCount(2, $product->getAllMedia());
    }

    public function testOptionMatrix()
    {
        $product = $this->getMockForAbstractClass('Vespolina\Entity\Product\BaseProduct');

        $colorGroup = new OptionGroup();
        $colorBlue = $this->createOption('blue', 'color', 'colorBlue');
        $colorGreen = $this->createOption('green', 'color', 'colorGreen');
        $colorRed = $this->createOption('red', 'color', 'colorRed');
        $colorGroup->addOption($colorBlue);
        $colorGroup->addOption($colorGreen);
        $colorGroup->addOption($colorRed);

        $materialGroup = new OptionGroup();
        $materialCotton = $this->createOption('cotton', 'material', 'materialCotton');
        $materialSmall = $this->createOption('polyester', 'material', 'materialSmall');
        $materialGroup->addOption($materialCotton);
        $materialGroup->addOption($materialSmall);

        $sizeGroup = new OptionGroup();
        $sizeLarge = $this->createOption('large', 'size', 'sizeLarge');
        $sizeSmall = $this->createOption('small', 'size', 'sizeSmall');
        $sizeGroup->addOption($sizeLarge);
        $sizeGroup->addOption($sizeSmall);
    }

    public function testVariations()
    {
        $product = new VariationProduct();

        $this->assertFalse($product->hasVariations(), 'there should not be any variations when initialized');
        $this->assertEmpty($product->getVariations(), 'there should not be any variations when initialized');

        $product->setPrice(3);
        $product->useVariation('variant1')->setPrice(4);
        $product->useVariation('variant2')->setPrice(7);
        $this->assertSame(3, $product->getPrice());
        $this->assertSame(4, $product->useVariation('variant1')->getPrice());
        $this->assertSame(7, $product->useVariation('variant2')->getPrice());

        $this->assertTrue($product->hasVariations());
        $variations = $product->getVariations();
        $this->assertCount(2, $variations);
        $this->assertInstanceof('VariationProduct', $variations['variant1']);
    }

    protected function createOption($display, $type, $value)
    {
        $option = new Option();

        $option->setType($type);
        $option->setDisplay($display);
        $option->setValue($value);

        return $option;
    }
}

class VariationProduct extends BaseProduct
{

}
