<?php

function create_table_row($row)
{
	$formated_row = '<tr>';
	foreach($row as $item)
	{
		$formated_row .= '<td>';
		$formated_row .= $item;
		$formated_row .= '</td>';
	}
	$formated_row .= '</tr>';
	return $formated_row;
}

?>