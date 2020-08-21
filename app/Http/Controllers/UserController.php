<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

use App\Services\Controllers\UserControllerService;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\Routing\ResponseFactory;

class UserController extends Controller
{
    private $userControllerService;
    private $view;

    public function __construct(
        UserControllerService $userControllerService,
        ResponseFactory $response,
        ViewFactory $view
    )
    {
        $this->userControllerService = $userControllerService;
        $this->view = $view;
        $this->response = $response;
    }

    public function create()
    {
        return $this->view->make('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $this->userControllerService->store($request);

        return $this->response->json([
            'message' => 'Usuario registrado!'
        ]);
    }

    public function show($id)
    {
       $user = $this->userControllerService->find($id);

       return $this->view->make('users.show',compact('user'));
    }

    public function edit($id)
    {
       $user = $this->userControllerService->find($id);

       return $this->view->make('users.edit',compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userControllerService->update($request, $id);

        return $this->response->json([
            'message' => 'Usuario actualizado!'
        ]);
    }

    public function destroy($id)
    {
       $this->userControllerService->destroy($id);

       return $this->response->json([
           'message' => 'Usuario eliminado!',
       ]);
   }
}
