<?php
/**
 * (c) 2012 Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\Entity\Order;

final class OrderEvents
{
    /**
     * The order initialization order is is triggered after a new order is created and initialized
     */
    const INIT_ORDER = 'vespolina_order.order_init';

    /**
     * INIT_ITEM is triggered when an product is added to the order
     */
    const INIT_ITEM = 'vespolina_order.item_init';

    /**
     * After a pricing context has been created, following event is called to initialize the pricing context.
     * The pricing context is typically used to inject context dependent pricing parameters
     *
     * For instance one could inject an explicit discount or tax percentage, possible
     * overriding default parameters.
     */
    const INIT_PRICING_CONTEXT = 'vespolina_order.init_pricing_context';

    /**
     * The order finished event is triggered  when all basic operations on a order have been completed
     * For instance one first adds three items, adjust quantity and then triggers the order finished event
     */
    const FINISHED = 'vespolina_order.order_finished';

    /**
     * REMOVE_ITEM is triggered a product has been completely removed from a order
     */
    const REMOVE_ITEM = 'vespolina_order.item_remove';

    /**
     * UPDATE_ORDER is triggered to alert that an update to the order is needed
     */
    const UPDATE_ORDER = 'vespolina_order.order_update';

    /**
     * UPDATE_ORDER_PRICE is triggered to alert that the prices in the order are needed
     */
    const UPDATE_ORDER_PRICE = 'vespolina_order.order_update_price';

    /**
     * UPDATE_ORDER_STATE is triggered when the state of the order has changed
     */
    const UPDATE_ORDER_STATE = 'vespolina_order.order_update_state';

    /**
     * UPDATE_ITEM is triggered when the a quantity or options in a item as changed
     */
    const UPDATE_ITEM = 'vespolina_order.item_update';

    /**
     * UPDATE_ITEM_STATE is triggered when the state of an item in the order has changed
     */
    const UPDATE_ITEM_STATE = 'vespolina_order.item_update_state';
}