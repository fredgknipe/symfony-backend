<?php
/**
 * /tests/AppBundle/Repository/UserLoginTest.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace AppBundle\Repository;

use App\Entity\UserLogin as Entity;
use App\Repository\UserLogin as Repository;
use App\Tests\RepositoryTestCase;

/**
 * Class AuthorTest
 *
 * @package AppBundle\Entity
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class UserLoginTest extends RepositoryTestCase
{
    /**
     * @var Entity
     */
    protected $entity;

    /**
     * @var Repository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $entityName = 'App\Entity\UserLogin';
}
