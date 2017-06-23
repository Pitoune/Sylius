<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\TaxonomyBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @author Pierre Ducoudray <ducoud@gmail.com>
 */
final class TaxonParentIsNotChild extends Constraint
{
    /**
     * @var string
     */
    public $message = 'sylius.taxon.parent_is_not_child';

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return 'sylius_taxon_parent_is_not_child';
    }

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
