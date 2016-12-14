<?php
declare(strict_types = 1);
/**
 * /tests/AppBundle/Traits/Rest/Methods/Count.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace AppBundle\Traits\Rest\Methods;

use App\Controller\Interfaces\RestController;
use App\Traits\Rest\Methods\Count as CountTrait;

/**
 * Class Count - just a dummy class so that we can actually test that trait.
 *
 * @package AppBundle\Traits\Rest\Methods
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
abstract class Count implements RestController
{
    use CountTrait;
}
