<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Traits\MyHelper;
use GuzzleHttp\Client;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use MyHelper;

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        try {
            $token = $this->token($email, $password);
            if($token == NULL)
            {
                return redirect(route('login'))->with('error', 'Something was wrong! User Verification Failed');
            }

            $api_login = $this->url_api() . '/api/auth/login';

            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => $token->authorization->token_type . ' ' . $token->authorization->token
            ];

            $client = new Client([
                'headers' => $headers
            ]);

            $data_string = [
                'email' => $email,
                'password' => $password
            ];

            $request = $client->request('POST', $api_login, [
                'form_params' => $data_string
            ]);

            $response = $request->getBody()->getContents();
            $response_decode = json_decode($response);

            if($response_decode)
            {
                if($response_decode->status == true)
                {
                    if (Auth::attempt(['email' => $email, 'password' => $password])) {
                        return redirect()->intended(route('dashboard'))->with('success', 'Welcome Back! ' . $response_decode->data->name);
                    } else {
                        return redirect(route('login'))->with('error', 'Login Failed!');
                    }
                }

                return redirect(route('login'))->with('error', $response_decode->msg);
            } else {
                return redirect(route('login'))->with('error', 'Login Failed!');
            }

        } catch(QueryException $e)
        {
            return redirect(route('login'))->with('error', 'Something was wrong! Error Detail : ' . $e);
        }
    }
}
