<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 11:33
 */

namespace GuiaDoSoftwareSdk\Http;


class Requester {
	protected $base_url;
	protected $token;
	protected $content_type = 'application/json';

	public function __construct( $url, $token ) {
		$this->base_url = $url . '/api';
		$this->token    = $token;
	}

	public function request( $method, $endpoint, array $data = [] ) {
		try {
			$ch                = curl_init( $this->base_url . $endpoint );
			$data['api_token'] = $this->token;

			if ( $method == 'POST' ) {
				curl_setopt( $ch, CURLOPT_POST, true );
				curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $data ) );
				curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
				curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			} else if ( $method == 'PUT' ) {
				curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'PUT' );
				curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $data ) );
				curl_setopt( $ch, CURLOPT_HEADER, false );
				curl_setopt( $ch, CURLOPT_HTTPHEADER, [ "Content-Type: $this->content_type" ] );
			} else if ( $method == 'GET' ) {
				$ch = curl_init( $this->base_url . $endpoint . '?' . http_build_query( $data ) );
				curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
				curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			} else if ( $method == 'DELETE' ) {
				curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'DELETE' );
				curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $data ) );
				curl_setopt( $ch, CURLOPT_HEADER, false );
				curl_setopt( $ch, CURLOPT_HTTPHEADER, [ "Content-Type: $this->content_type" ] );
				curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			} else {
				throw new \Exception( "the method should be PUT or POST" );
			}

			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			$result        = curl_exec( $ch );
			$response_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

			curl_close( $ch );
			$response = json_decode( $result );

			if ( ! $response ) {
				throw new \Exception( json_encode( $data ) );
			}

			if ( $response_code !== 200 && $response_code !== 201 ) {
				throw new \Exception( json_encode( [ 'http_code' => $response_code, 'response' => $result ] ) );
			}

			return $response;
		}
		catch ( \Exception $ex ) {
			throw new $ex;
		}
	}
}