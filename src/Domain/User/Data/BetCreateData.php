<?php
namespace App\Domain\User\Data;

final class BetCreateData
{
    /** @var string */
    public $betPlacer;

    /** @var string */
    public $betDescription;

    /** @var array */
    public $betTakers;

    /** @var boolean */
    public $betSecret;
}