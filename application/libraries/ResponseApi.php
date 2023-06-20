<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ResponseApi
{
	/**
	 * Respon default
	 */
	protected static $response = [
		'meta' => [
			'code' => 200,
			'status' => 'success',
			'message' => null,
		],
		'result' => null,
	];

	/**
	 * Respon Sukses
	 */
	public static function success($data = null, $message = null)
	{
		self::$response['meta']['message'] = $message;
		self::$response['result'] = $data;

		return json_encode(self::$response, self::$response['meta']['code']);
	}

	/**
	 * Respon Error
	 */
	public static function error($message = null, $code = 400)
	{
		self::$response['meta']['status'] = 'error';
		self::$response['meta']['code'] = $code;
		self::$response['meta']['message'] = $message;

		return json_encode(self::$response, self::$response['meta']['code']);
	}
}
