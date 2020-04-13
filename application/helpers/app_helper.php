<?php

function money_format($number){
	return number_format($number,2);
}

function zero_fill($variable, $zerofill)
{
	return str_pad($variable, $zerofill, '0', STR_PAD_LEFT);
}
