<?php 

function create($class, $attributes = [], $quantity = 1)
{
	if ($quantity > 1)
		return factory ($class, $quantity)->create($attributes);
	return factory ($class)->create($attributes);
}

function make($class, $attributes = [])
{
	return factory ($class)->make($attributes);
}
?>

