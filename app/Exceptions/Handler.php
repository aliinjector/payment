<?php

namespace App\Exceptions;

use Exception;
use App\ErrorLog;
use App\Events\ErrorLoged;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
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
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

      if (config('app.debug') == false){
      $controllerName = \Route::currentRouteAction();
      $massage = $exception->getMessage();
      $routeName = \Request::route()->getName();
      $methodName = \Request::route()->getActionMethod();
      $userAgent = \Request::header('user-agent');
      $userIp = \Request::ip();
      ErrorLog::firstOrCreate([
        'massage' =>  $massage,
        'controller' =>  $controllerName,
        'route' =>  $routeName,
        'method' =>  $methodName,
        'userAgent' =>  $userAgent,
        'userIp' =>  $userIp,
      ]);
    }
    event(new ErrorLoged());
      return parent::render($request, $exception);

    }
}
