<?php

namespace App\Services\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserControllerService
{ 
    protected $userRepository;

    public function __construct(    
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function store(CreateUserRequest $request)
    {
        $data = $this->processAndReturnDataToCreate($request);

        $user = $this->userRepository->create($data);

        return $user;
    }

    private function processAndReturnDataToCreate(CreateUserRequest $request)
    {
        $data = $request->all();

        $data['profile_image_path'] = $request->has('profile_image') ?
        saveImageAndReturnSavePath($request->profile_image,"assets/img/avatars/") :
        "assets/img/avatars/default.png";

        $data['name'] = "{$request->first_name} {$request->last_name}";

        $data['status'] = $request->has('status') ? 'activo' : 'inactivo';

        return $data;
    }

    public function find($id)
    {
        $user = $this->userRepository->find($id);

        return $user;
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->find($id);

        $data = $this->processAndReturnDataToUpdate($request, $user);

        $user->update($data);
    }

    private function processAndReturnDataToUpdate(UpdateUserRequest $request, $user)
    {
        $data = $request->except('profile_image');

        $data['name'] = "{$request->first_name} {$request->last_name}";

        $data['status'] = $request->has('status') ? 'activo' : 'inactivo';

        if ($request->has('profile_image'))
        {
            $user->removeProfileImage();

            $data['profile_image_path'] = saveImageAndReturnSavePath($request->profile_image,"assets/img/avatars/");
        }

        return $data;
    }

    public function destroy($id)
    {
        return $this->userRepository->destroy($id);
    }
}
