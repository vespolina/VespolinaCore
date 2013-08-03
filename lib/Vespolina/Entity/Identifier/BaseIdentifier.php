<?php

/**
 * (c) 2011 - ∞ Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\Entity\Identifier;

use Vespolina\Exception\IdentifierCheckDigitException;
use Vespolina\Entity\Identifier\IdentifierInterface;

/**
 * @author Richard D Shank <develop@zestic.com>
 */
abstract class BaseIdentifier implements IdentifierInterface
{
    protected $code;

    /**
     * @inheritdoc
     */
    public function checkDigit($code = null)
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function setCode($code)
    {
        if (!$this->checkDigit($code)) {
            throw new IdentifierCheckDigitException(sprintf('%s is not a valid %s code', $code, $this->getName()));
        }
        $this->code = $code;
    }

    /**
     * @inheritdoc
     */
    public function getCode()
    {
        return $this->code;
    }


}
