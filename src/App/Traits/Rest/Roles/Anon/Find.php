<?php
declare(strict_types=1);
/**
 * /src/App/Traits/Rest/Roles/User/Find.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Traits\Rest\Roles\Anon;

use App\Traits\Rest\Methods\Find as FindMethod;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Trait to add 'Find' action for REST resources for 'anonymous' users.
 *
 * @see \App\Traits\Rest\Methods\Find for detailed documents.
 *
 * @package App\Traits\Rest
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
trait Find
{
    use FindMethod;

    /**
     * Find action for current resource.
     *
     * @Route("")
     * @Route("/")
     *
     * @Method({"GET"})
     *
     * @throws  \LogicException
     * @throws  MethodNotAllowedHttpException
     * @throws  HttpException
     *
     * @param   Request $request
     *
     * @return  Response
     */
    public function find(Request $request): Response
    {
        return $this->findMethod($request);
    }
}