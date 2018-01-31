<?php

namespace Mares29\IpFilter;

use Closure;

class FilterIp
{

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$whiteList = config('ip-filter.allowed', []);
		$blackList = config('ip-filter.denied', []);
		$ip = $request->ip();

		if (
			(!count($whiteList) && !count($blackList)) ||
			count($whiteList) > 0 && in_array($ip, $whiteList) ||
			count($blackList) > 0 && !in_array($ip, $blackList)
		) {
			return $next($request);
		}
	}
}
