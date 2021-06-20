<?php


namespace App\Http\Controllers\CustomAuth;

use App\Helper\ResponseMessageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Redirect;

class RegisterController  extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showRegistrationPage()
    {
        return view('admin.auth.register');
    }

    public function registration(RegisterRequest $registerRequest)
    {
        try {
            $this->userRepository->create($registerRequest->validated());
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return Redirect::to("dashboard")->withSuccess(ResponseMessageHelper::$response_message['registration_successful']);
    }
}
