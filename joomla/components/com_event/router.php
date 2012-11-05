<?php

jimport( 'joomla.filter.output' );

function EventBuildRoute(&$query)
{
	$segments = array();

	if (isset($query['view'])) {
		$segments[] = $query['view'];
		unset($query['view']);
	}
	if (isset($query['id'])) {
		$segments[] = $query['id'];
		unset($query['id']);
	}
	if (isset($query['name'])) {
		$segments[] = JFilterOutput::stringURLSafe($query['name']);
		unset($query['name']);
	}

	return $segments;
}

function EventParseRoute($segments)
{
	$vars = array();

	// view is always the first element of the array
	$count = count($segments);

	if ($count)
	{
		$count--;
		$segment = array_shift($segments);
		if (is_numeric($segment)) {
			$vars['id'] = $segment;
		} else {
			$vars['view'] = $segment;
		}
	}

	if ($count)
	{
		$count--;
		$segment = array_shift($segments) ;
		if (is_numeric($segment)) {
			$vars['id'] = $segment;
		}
	}

	return $vars;
}