<?php

/**
 * (c) 2011 - ∞ Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\Entity;

/**
 * Interface to tie items to order and invoices
 *
 * @author Luis Cordova <cordoval@gmail.com>
 */
interface ItemableInterface
{
    function addItem(ItemInterface $item);

    function removeItem(ItemInterface $item);

    function clearItems();

    /**
     * Retrieve all items in the order
     *
     * @return \Vespolina\Entity\ItemInterface[]
     */
    function getItems();

    /**
     * Set the items for this order
     *
     * @param Array of Vespolina\Entity\ItemInterface
     */
    function setItems($items);

    /**
     * Merge an array of items to the items already in the order
     *
     * @param \Vespolina\Entity\ItemInterface[] $items
     */
    function mergeItems(array $items);
}