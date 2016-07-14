<?php
/**
 * A console application that allows mite users to track their time.
 * Copyright (C) <2016>  <Lars Rackwitz-Rosenberg>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @file
 * Contains lrackwitz\mite\Entities\Loggable.php.
 */
namespace lrackwitz\mite\Entities;

use lrackwitz\mite\Entities\Resource\ResourceInterface;

/**
 * Class Loggable.
 *
 * @package lrackwitz\mite\Entities
 */
class Loggable implements LoggableInterface
{
    public function toString($className, array $attributes)
    {
        $output = $className . ' [';
        foreach ($attributes as $key => $value) {
            if ($value instanceof \DateTime) {
                /** @var \DateTime $dateTime */
                $dateTime = $value;
                if ($dateTime) {
                    $value = $dateTime->format('Y-m-d\TH:i:sO');
                }
            } elseif (is_object($value) && $value instanceof ResourceInterface) {
                $value = $value->__toString();
            } elseif (is_array($value) && !empty($value)) {
                $value = str_replace(
                    ["\n    ", "\n"],
                    [' ', ''],
                    print_r($value, true)
                );
            }
            $output .= sprintf('%s: "%s", ', $key, $value);
        }

        // Remove the last two chars).
        $output = substr($output, 0, strlen($output) - 2);

        // Add the closing bracket.
        $output .= ']';

        return $output;
    }
}
