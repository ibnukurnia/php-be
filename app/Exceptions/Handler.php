<?php

namespace App\Exceptions;

use Error;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Psy\Exception\TypeErrorException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, \Throwable $th)
    {
        if($th instanceof ShipperNotFoundException){
            return $this->sendResponseJson($th->getMessage(),400);
        }

        if($th instanceof ModelNotFoundException){
            return $this->sendResponseJson('Data Not Found',404);
        }

        if($th instanceof Error || $th instanceof Exception){
            if (env('APP_DEBUG','true')) {
                return $this->sendResponseJson($th->getMessage());
                
            }
            return $this->sendResponseJson('Internal Sever Error');
        }
        return parent::render($request,$th);
    }

    private function sendResponseJson(string $message, int $status = 500)
    {
        return response()->json([
            'message' => $message
        ],$status);
    }
}
