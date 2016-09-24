<?php
declare(strict_types=1);
/**
 * /src/App/Traits/Rest/Update.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Traits\Rest;

use App\Controller\Interfaces\RestController;
use App\Services\Rest\Helper\Interfaces\Response as RestHelperResponseInterface;
use App\Services\Rest\Interfaces\Base as ResourceServiceInterface;
use App\Utils\JSON;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Trait for generic 'Update' action for REST controllers. Trait will add following route definition to your controller
 * where you use this:
 *
 *  PUT /_your_controller_path_/_your_entity_id_
 *
 * Request must contain body that present your endpoint entity, note that only JSON is supported atm.
 *
 * Response of this request is presentation of your requested entity as in JSON or XML format depending your request
 * headers. By default response is JSON. If entity is not found from your resource service you will get 404 response.
 * Examples of responses (JSON / XML) below assuming that your resource service entity has 'id', 'name' and
 * 'description' properties.
 *
 * JSON response:
 *  {
 *      "id": "60b0333b-b10e-48b7-982b-a217d031e6bb",
 *      "name": "new author",
 *      "description": "description"
 *  }
 *
 * XML response:
 *  <?xml version="1.0" encoding="UTF-8"?>
 *  <result>
 *      <id>
 *          <![CDATA[7a68f126-d46f-4c54-82c8-df71d6a3d6cf]]>
 *      </id>
 *      <name>
 *          <![CDATA[new author]]>
 *      </name>
 *      <description>
 *          <![CDATA[description]]>
 *      </description>
 *  </result>
 *
 * Note that controllers that uses this trait _must_ implement App\Controller\Interfaces\RestController interface.
 *
 * @method  RestHelperResponseInterface getResponseService()
 * @method  ResourceServiceInterface    getResourceService()
 *
 * @package App\Traits\Rest
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
trait Update
{
    /**
     * Generic 'update' method for REST endpoints.
     *
     * @Route(
     *      "/{id}",
     *      requirements={
     *          "id" = "^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$"
     *      }
     *  )
     *
     * @Method({"PUT"})
     *
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @param   Request $request
     * @param   integer $id
     *
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        // Make sure that we have everything we need to make this  work
        if (!($this instanceof RestController)) {
            throw new \LogicException(
                'You cannot use App\Traits\Rest\Count trait within class that does not implement ' .
                'App\Controller\Interfaces\RestController interface.'
            );
        }

        // Determine entity / DTO data from request
        $data = JSON::decode($request->getContent());

        // Update entity
        $entity = $this->getResourceService()->update($id, $data);

        return $this->getResponseService()->createResponse($request, $entity);
    }
}
