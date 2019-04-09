<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

Trait ApiResponser {

	private function successResponse($message , $data , $code)
	{
		return response()->json(["message" => $message , "data" => $data] , $code);
	}

	protected function errorResponse($message , $code)
	{
		return response()->json(['error' => $message], $code);
	}

	protected function showAll($message = "success", Collection $collection , $code = 200)
	{
		return $this->successResponse($message , $collection , $code);
	}

	protected function showOne($message , Model $instance , $code = 200)
	{
		return $this->successResponse($message , $instance , $code);
	}

	protected function showMessage($message , $code = 200)
	{
		return response()->json(["message" => $message] , $code);
	}

	protected function transformData($data , $transformer)
	{
		$transformation = fractal($data , new $transformer);
		return $transformation->toArray();
	}

	protected function showAllTransform($message = "success", Collection $collection , $code = 200)
	{
		if ($collection->isEmpty()) {
			return $this->successResponse($message , $collection , $code);
		}
		$transformer = $collection->first()->transformer;
		$collection = $this->transformData($collection , $transformer);
		return $this->successResponse($message , $collection , $code);
	}

	protected function showOneTransform($message , Model $instance , $code = 200)
	{
		$transformer = $instance->transformer;
		$instance = $this->transformData($instance , $transformer);
		return $this->successResponse($message , $instance , $code);
	}
}