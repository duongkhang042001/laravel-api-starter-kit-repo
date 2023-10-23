<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

trait ResponseTraits
{
    protected function jsonResponse($data, $statusCode = 200)
    {
        return new JsonResponse($data, $statusCode);
    }

    protected function jsonSuccessResponse($data, $statusCode = 200)
    {
        return new JsonResponse(["success" => true, "data" => $data], $statusCode);
    }

    protected function jsonErrorResponse($data, $statusCode = 400)
    {
        return new JsonResponse(["success" => false, "data" => $data], $statusCode);
    }

    protected function jsonCreateResponse($data)
    {
        return new JsonResponse(["success" => true, "data" => $data], 201);
    }

    protected function jsonUpdateResponse($data)
    {
        return new JsonResponse(["success" => true, "data" => $data], 200);
    }

    protected function jsonDeleteResponse()
    {
        return new JsonResponse(["success" => true, "message" => "Resource deleted"], 204);
    }

    protected function jsonNotFoundResponse($message = 'Not found')
    {
        return $this->jsonErrorResponse(['success' => false, "message" => $message], 404);
    }

    protected function jsonArrayResponse(array $data, $statusCode = 200)
    {
        return new JsonResponse($data, $statusCode);
    }

    protected function jsonCollectionResponse(Collection $data, $statusCode = 200)
    {
        return new JsonResponse(["success" => true, "data" => $data], $statusCode);
    }
}
