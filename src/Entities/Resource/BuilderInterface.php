<?php
/**
 * @file
 * Contains lrackwitz\mite\Entities\Resource\BuilderInterface.php.
 */

namespace lrackwitz\mite\Entities\Resource;

interface BuilderInterface
{
    public function create();

    public function getResult();
}
