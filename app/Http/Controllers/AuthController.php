<?php
namespace App\Http\Controllers;

use App\Helpers\JsonStd;
use App\Http\BaseControllers\AuthorizationController;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class AuthController extends AuthorizationController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'reCaptcha', 'login']]);
    }

    public function index()
    {
        if (auth()->check()) return redirect(RouteServiceProvider::HOME);
        
        $this->setSubtitle('Login');
        return $this->render('login');
    }

    public function reCaptcha()
    {
        return response()->json(['captcha' => captcha_img('flat')]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);
        if ($validator->fails()) {
            return JsonStd::error($validator->getMessageBag())->setStatusCode(401);
        }

        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('web')->attempt($credentials, true)) {
            return JsonStd::errorMsg('Invalid email or password', 401);
        }
        Cookie::queue('token', $token, 600);

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return JsonStd::success(auth()->payload());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return JsonStd::successMsg('Successfully logged out');
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return JsonStd::success([
            'user' => auth()->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ], 'Login success');
    }
}