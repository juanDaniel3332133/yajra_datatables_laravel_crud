<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

if (!function_exists('saveImageAndReturnSavePath'))
{
	function saveImageAndReturnSavePath($image, $directory)
	{
		$image_name = Str::random(15).'_'.$image->getClientOriginalName();
		$save_path = "{$directory}/{$image_name}";

		if (!File::exists($directory))
			File::makeDirectory($directory, $mode = 0777, true, true);

		File::copy($image->path(), $save_path);

		return $save_path;		
	}
}

if (!function_exists('removeImage'))
{
	function removeImage($path)
	{
		return File::exists($path) ? File::delete($path) : false;
	}
}