<?php

function pp($v, $return = false)
{
	$s = "";
	$s .= "<pre>";
	$s .= print_r($v, true);
	$s .= "</pre>";

	if($return) {
		return $s;
	} else {
		echo $s;
	}
}

function ppv($v, $return = false)
{
	ob_start();
	var_dump($v);
	return pp(ob_get_clean(), $return);
}

function ppd()
{
	$trace = (new \Exception)->getTrace();
	ppv($trace);
}

function ppc($v, $return = false)
{
	return ppv(get_class($v), $return);
}

function dateSql($time = null)
{
	return date("Y-m-d H:i:s", (isset($time)) ? $time : time());
}
