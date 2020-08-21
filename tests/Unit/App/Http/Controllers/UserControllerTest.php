<?php

namespace Tests\Unit\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use \Mockery;

use App\Http\Controllers\UserController;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    
    private $controllerService;
    private $view;
    private $response;
    private $controller;

    public function setUp():void
    {
        parent::setUp();

        $this->controllerService = Mockery::mock('App\Services\Controllers\UserControllerService');

        $this->view = Mockery::mock('Illuminate\Contracts\View\Factory');

        $this->response = Mockery::mock('Illuminate\Routing\ResponseFactory');

        $this->controller = new UserController($this->controllerService, $this->response, $this->view);
    }

    public function tearDown():void
    {
        parent::tearDown();
        
        Mockery::close();
    }

    /**
     *
     * @test
     */
    public function create()
    {
        $this->view->shouldReceive('make')
             ->once()
             ->with('users.create');

        $this->controller->create();
    }

    /**
    *
    * @test
    */
    public function store()
    {
        $createUserRequest = Mockery::mock('App\Http\Requests\User\CreateUserRequest');
        
        $this->controllerService->shouldReceive('store')
                            ->once()
                            ->with($createUserRequest);

        $this->response->shouldReceive('json')
                        ->once()
                        ->andReturn([
                            'message' => 'Usuario registrado!'
                        ]);

        $this->controller->store($createUserRequest);
   }

    /**
    *
    * @test
    */
    public function show()
    {        
        $id = 1;

        $this->controllerService->shouldReceive('find')
                            ->once()
                            ->with($id)
                            ->andReturn('user');

        $this->view->shouldReceive('make')
                    ->once()
                    ->with('users.show',['user' => 'user']);

        $this->controller->show($id);
    }

    /**
    *
    * @test
    */
    public function edit()
    {        
        $id = 1;

        $this->controllerService->shouldReceive('find')
                            ->once()
                            ->with($id)
                            ->andReturn('user');

        $this->view->shouldReceive('make')
                    ->once()
                    ->with('users.edit',[
                        'user' => 'user'
                    ]);

        $this->controller->edit($id);
    }

     /**
     *
     * @test
     */
     public function update()
     {
        $id = 1;

        $updateUserRequest = Mockery::mock('App\Http\Requests\User\UpdateUserRequest');
         
         $this->controllerService->shouldReceive('update')
                             ->once()
                             ->with($updateUserRequest, $id);

        $this->response->shouldReceive('json')
                        ->once()
                        ->andReturn([
                            'message' => 'Usuario actualizado!'
                        ]);

         $this->controller->update($updateUserRequest, $id);
    }   

     /**
     *
     * @test
     */
     public function destroy()
     {
        $id = 1;
         
         $this->controllerService->shouldReceive('destroy')
                             ->once()
                             ->with($id);

         $this->response->shouldReceive('json')
                        ->once();

        $this->controller->destroy($id);
    }

}
