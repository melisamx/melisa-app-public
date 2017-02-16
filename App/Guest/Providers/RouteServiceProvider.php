<?php namespace App\Guest\Providers;

use Melisa\Laravel\Providers\RouteServiceProvider as RouteService;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class RouteServiceProvider extends RouteService
{
    
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    public $namespace = 'App\Guest\Http\Controllers';
    
}
