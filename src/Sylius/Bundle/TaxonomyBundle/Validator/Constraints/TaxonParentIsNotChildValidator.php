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

use Sylius\Component\Taxonomy\Model\TaxonInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Webmozart\Assert\Assert;

/**
 * @author Pierre Ducoudray <ducoud@gmail.com>
 */
class TaxonParentIsNotChildValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($taxon, Constraint $constraint)
    {
        Assert::isInstanceOf($taxon, TaxonInterface::class);
        Assert::isInstanceOf($constraint, TaxonParentIsNotChild::class);

        if (!$parent = $taxon->getParent()) {
            return;
        }

        if ($parent->getRoot() === $taxon->getRoot()
            && $parent->getLeft() > $taxon->getLeft()
            && $parent->getRight() < $taxon->getRight()
        ) {
            $this->context->buildViolation($constraint->message)
                ->atPath('parent')
                ->addViolation()
            ;
        }
    }
}
