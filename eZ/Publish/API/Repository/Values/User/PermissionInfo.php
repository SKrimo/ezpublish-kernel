<?php

/**
 * File containing the eZ\Publish\API\Repository\Values\User\PermissionInfo class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace eZ\Publish\API\Repository\Values\User;

use eZ\Publish\API\Repository\Values\ValueObject;

/**
 * This class represents permission info for a given User and a given Value object.
 *
 * This value object does not represent an entity, but the info is calculated using relevant policies and Role
 * limitations that are applicable for the relationship between a given user and a value object (like Content).
 *
 * @see \eZ\Publish\API\Repository\PermissionResolver::getUserPermissionInfo()
 *
 * @property-read string $function  Name of the module function Or all functions with '*'
 * @property-read string $access  One of ACCESS_GRANTED, ACCESS_LIMITED or ACCESS_DENIED constants.
 * @property-read array $limitations an array of \eZ\Publish\API\Repository\Values\User\Limitation
 */
abstract class PermissionInfo extends ValueObject
{
    const ACCESS_GRANTED = true;
    const ACCESS_LIMITED = null;
    const ACCESS_DENIED = false;

    /**
     * Name of the module function.
     *
     * Eg: read
     *
     * @var string
     */
    protected $function;

    /**
     * Indicates access rights for the user on a value object on the current module function.
     *
     * @var mixed One of ACCESS_GRANTED, ACCESS_LIMITED or ACCESS_DENIED constants.
     */
    protected $access;

    /**
     * Limitation Values here are combinations of limitation values on policies relevant to given module function that
     * are directly or indirectly assigned to current user.
     *
     *
     * @return \eZ\Publish\API\Repository\Values\User\Limitation[]
     */
    abstract public function getLimitations();
}
