<?php

/**
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        
        // Default home page route - changed to Tasks index
        $builder->connect('/', ['controller' => 'Tasks', 'action' => 'index']);

        // Default pages route
        $builder->connect('/pages/*', 'Pages::display');

        // --- Task Tracker Routes (ADDED THESE ROUTES) ---
        $builder->connect('/tasks', ['controller' => 'Tasks', 'action' => 'index']);
        $builder->connect('/tasks/add', ['controller' => 'Tasks', 'action' => 'add']);
        $builder->connect('/tasks/edit/:id', 
            ['controller' => 'Tasks', 'action' => 'edit'], 
            ['pass' => ['id'], 'id' => '\d+'] // Ensures ID is a number
        );
        $builder->connect('/tasks/delete/:id', 
            ['controller' => 'Tasks', 'action' => 'delete'], 
            ['pass' => ['id'], 'id' => '\d+'] // Ensures ID is a number
        );
        // --- End of Task Tracker Routes ---

        $builder->fallbacks();
    });

};
