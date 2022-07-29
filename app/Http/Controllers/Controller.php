<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	private $projects = [
		'cam-finder',
		'cam-finder-web',
		'portfolio',
		'nvim',
		'dotfiles',
	];

	private function checkProject($project)
	{
		return in_array($project, $this->projects);
	}

	public function index()
	{
		return Inertia::render('Home', [
			'projects' => $this->projects,
		]); 
	}

	public function view($project)
	{
		if(!$this->checkProject($project))
			return abort(404);

		return Inertia::render('View', [
			'project' => $project,
		]);
	}

	function humanTiming ($time)
	{
		$time = strtotime($time);
		$time = time() - $time; // to get the time since that moment
		$time = ($time<1)? 1 : $time;
		$tokens = array (
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
		);

		foreach ($tokens as $unit => $text) {
			if ($time < $unit) continue;
			$numberOfUnits = floor($time / $unit);
			return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
		}
	}

	protected function cacheTime($key)
	{
		$parts = array_slice(str_split($hash = sha1($key), 2), 0, 2);
		$path = storage_path('framework/cache/data') . Config::get('cache.path') .'/'.join('/', $parts).'/'.$hash;
		return $this->humanTiming(date('d M Y H:i:s', filemtime($path)));
	}

	public function getCachedTime($project)
	{
		return [
			"readme" => $this->cacheTime('readme:' . $project), 
			"language" => $this->cacheTime('language:' . $project), 
			"info" => $this->cacheTime('info:' . $project), 
		];
	}

	private function getCache($key, $url)
	{
		if(Cache::has($key)) {
			return Cache::get($key);
		}
		$response = Http::get($url);
		return Cache::remember($key, 43200, function() use ($response)
		{
			return $response->body();
		});
	}
	
	public function getReadme($project)
	{
		if(!$this->checkProject($project))
			return abort(404);

		return $this->getCache('readme:' . $project, 'https://raw.githubusercontent.com/member87/' . $project . '/main/README.md');
	}

	public function getInfo($project)
	{
		if(!$this->checkProject($project))
			return abort(404);
		return $this->getCache('info:' . $project, 'https://api.github.com/repos/member87/' . $project);
	}

	public function getLanguage($project)
	{
		if(!$this->checkProject($project))
			return abort(404);
		return $this->getCache('language:' . $project, 'https://api.github.com/repos/member87/' . $project . '/languages');
	}
}
