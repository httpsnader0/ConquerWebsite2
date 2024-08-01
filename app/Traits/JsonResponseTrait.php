<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

trait JsonResponseTrait
{
    public function responseAsMessage($message = '', $status = 200, $headers = []): JsonResponse
    {
        return response()->json(
            [
                'status' => $status,
                'message' => $message,
            ],
            $status,
            $headers
        );
    }

    public function responseAsJson($data = [], $message = '', $status = 200, $headers = []): JsonResponse
    {
        return response()->json(
            [
                'status' => $status,
                'message' => $message,
                ...$this->getData($data),
            ],
            $status,
            $headers
        );
    }

    protected function getData($data)
    {
        if (request('id')) {
            return [
                'data' => $data->getCollection(),
            ];
        }

        if ($data instanceof LengthAwarePaginator) {
            return [
                'data' => $data->getCollection(),
                'meta' => [
                    'currentPage' => $data->currentPage(),
                    'lastPage' => $data->lastPage(),
                    'total' => $data->total(),
                ],
            ];
        }

        return [
            'data' => $data,
        ];
    }
}
