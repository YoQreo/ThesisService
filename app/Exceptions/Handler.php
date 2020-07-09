<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use DB;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {
        DB::rollback();
        if($exception instanceof HttpException){
            $code = $exception->getStatusCode();
            $message = Response::$statusTexts[$code];

            return $this->errorResponse($message,$code,null);

        }

        if($exception instanceof ModelNotFoundException){
            $model =strtolower(class_basename($exception->getModel()));

            return $this->errorResponse('The specified resource was not found',
            Response::HTTP_NOT_FOUND, null);

        }

        if($exception instanceof AuthorizationException){
                
            return $this->errorResponse('You have no permission to access',
             Response::HTTP_FORBIDDEN, null);
    
        }

        if($exception instanceof AuthenticationException){
                
            return $this->errorResponse($exception->getMessage(),
            Response::HTTP_UNAUTHORIZED, null);
    
        }

        if($exception instanceof ValidationException){
            $errors = $exception->validator->errors()->getMessages();

            return $this->errorResponse($errors,
            Response::HTTP_UNPROCESSABLE_ENTITY,'E001');
 
        }

        if(env('APP_DEBUG',false)){
            return parent::render($request, $exception);
        }

        return $this->errorResponse('Unexpected error.TryLater',
        Response::HTTP_INTERNAL_SERVER_ERROR, null);
    }
}