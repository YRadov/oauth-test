<?php

namespace App\Controllers;

use App\Components\View;
use GuzzleHttp\Client;

class AppController {

	public function actionIndex() {
		$auth_url     = AUTH_URL;
		$redirect_uri = REDIRECT_URL;
		$get_code_2   = APP_URL . 'app/code';

		$fb_auth_url = FB_OAUTH;
		$client_id   = FB_APP_ID;


		View::render( 'index', [
			'auth_url'     => $auth_url,
			'redirect_uri' => $redirect_uri,
			'fb_auth_url'  => $fb_auth_url,
			'client_id'    => $client_id,
			'get_code_2'   => $get_code_2,
		] );
	}//actionIndex


	public function actionConfirmed() {
		debug( $_GET );
		$code = $_GET['code'];
		if ( $code ) {
			$params = [
				'client_id'     => FB_APP_ID,
				'client_secret' => FB_APP_SECRET,
				'grant_type'    => 'client_credentials',
				'code'          => $code,
			];

			$access_token = json_decode( @file_get_contents(
				'https://graph.facebook.com/v2.3/oauth/access_token?'
				. urldecode( http_build_query( $params ) )
			), true );
			debug( $access_token );
		}


//		$http = new Client();
//		$response = $http->post(TOKEN_URL, [
//			'form_params' => [
//				'grant_type' => 'authorization_code',
//				'client_id' => CLIENT_ID,
//				'client_secret' => CLIENT_SECRET,
//				'redirect_uri' => REDIRECT_URL,
//				'code' => $code,
//			],
//		]);
//
//		$tokens = json_decode((string) $response->getBody(), true);
//		debug( $tokens );
	}//actionConfirmed


	public function actionCode() {
		$query = http_build_query( [
			'redirect_url'  => REDIRECT_URL,
			//'response_type' => 'code',
			//'client_id'     => CLIENT_ID,
		] );

		$url = AUTH_URL . '?' . $query;

		header( 'Location: ' . $url );
		exit();
	}//actionCode
}//AppController