<?php
declare(strict_types = 1);
/**
 * /tests/AppBundle/functional/Services/Rest/AuthorTest.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace AppBundle\functional\Services\Rest;

use App\Services\Rest\Author;
use App\Tests\RestServiceTestCase;

/**
 * Class AuthorTest
 *
 * @package AppBundle\functional\Services\Rest
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class AuthorTest extends RestServiceTestCase
{
    /**
     * @var Author
     */
    protected $service;

    /**
     * @var string
     */
    protected $serviceName = 'app.services.rest.author';

    /**
     * @var string
     */
    protected $entityName = 'App\Entity\Author';

    /**
     * @var string
     */
    protected $repositoryName = 'App\Repository\Author';
}