<?php

if(!function_exists('flash')){

	function flash($message, $type = 'success')
	{
		session()->flash('notification.message', $message);
		session()->flash('notification.type', $type);
	}
}