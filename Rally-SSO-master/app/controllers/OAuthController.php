<?php

use Illuminate\Routing\Controller;
use LucaDegasperi\OAuth2Server\Authorizer;

class OAuthController extends Controller
{
    protected $authorizer;

    public function __construct(Authorizer $authorizer)
    {
        $this->authorizer = $authorizer;

        $this->beforeFilter('auth', ['only' => ['getAuthorize', 'postAuthorize']]);
        $this->beforeFilter('csrf', ['only' => 'postAuthorize']);
        $this->beforeFilter('check-authorization-params', ['only' => ['getAuthorize', 'postAuthorize']]);
    }

    public function postAccessToken()
    {
        // Rely on the built-in Input class to get
        // input from whichever format it was sent as.
        $input = \Input::all();

        // Get the current Request and replace
        // its POST parameters
        $request = \Request::instance();

        $request->request->replace($input);

        // Make sure the OAuth2 Authorizer uses our custom
        // Request which has the parameters filled in

        $this->authorizer->setRequest($request);

        return Response::json($this->authorizer->issueAccessToken());
    }

    public function getAuthorize()
    {
        $authParams = $this->authorizer->getAuthCodeRequestParams();

//        dd($authParams);

        return View::make('authorization-form', compact('authParams'));
    }

    public function postAuthorize()
    {
        // get the user id
        $params['user_id'] = Auth::user()->id;

        $redirectUri = '';

        if (Input::get('approve') !== null) {
            $redirectUri = $this->authorizer->issueAuthCode('user', $params['user_id'], $params);
        }

        if (Input::get('deny') !== null) {
            $redirectUri = $this->authorizer->authCodeRequestDeniedRedirectUri();
        }

        return Redirect::to($redirectUri);
    }
}
