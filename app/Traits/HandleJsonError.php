<?php

namespace App\Traits;

use Exception;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

trait HandleJsonError
{
    public function render($request, Exception $exception)
    {
        if($request->expectsJson()) {
            if ($exception instanceof ModelNotFoundException) {
                return response()->json([
                    'error' => [
                        'code'   => 404,
                        'title'  => "NotFoundHttpException",
                        'errors' => [
                            'title'   => 'NotFoundHttpException',
                            'message' => 'Not Found'
                        ]
                    ]
                ], 404);
            }

            if ($exception instanceof FatalThrowableError) {
                return response()->json([
                    'error' => [
                        'code'   => 500,
                        'title'  => "FatalThrowableError",
                        'errors' => [
                            'title'   => 'FatalThrowableError',
                            'message' => 'Server Error'
                        ]
                    ]
                ], 500);
            }

            if ($exception instanceof AuthenticationException) {
                return response()->json([
                    'error' => [
                        'code'   => 401,
                        'title'  => "Unauthenticated",
                        'errors' => [
                            'title'   => 'Auth',
                            'message' => 'Unauthenticated'
                        ]
                    ]
                ], 401);
            }
        }

        return parent::render($request, $exception);
    }

    /**
     * Convert a validation exception into a JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Validation\ValidationException  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        return response()->json([
            'code'    => $exception->status,
            'message' => $exception->getMessage(),
            'errors'  => $this->errorException($exception),
        ], $exception->status);
    }
    
    public function errorException(ValidationException $exception)
    {
        $errors = [];

        foreach ($exception->errors() as $field => $value) {
            $errors[] = [
                'title'   => $field,
                'message' => $value[0]
            ];
        }

        return $errors;
    }
}