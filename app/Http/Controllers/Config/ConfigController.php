<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Config;


class ConfigController extends Controller
{
	public function getLocale()
	{
		$langs = Config\Config::where('name','lang')->first();
		return reponse()->json($langs);
	}
	public function setLocale($lang)
	{
		$lang_record = Config\Config::where('name','lang')->first();
		$lang_record['value'] = $lang;
		$lang_record->save();
	}
}