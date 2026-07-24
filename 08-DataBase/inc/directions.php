<?php
require_once __DIR__ . '/create_table_row.php';
//phpinfo();

$server_name = "Smetank\SQLEXPRESS";
$connection_info = array("Database" => "PD_321", "UID" => "PHP", "PWD" => "111", "CharacterSet" => "UTF-8");
$connection = sqlsrv_connect($server_name, $connection_info);

var_dump($connection);

$query = "SELECT * FROM Directions";
$results = sqlsrv_query($connection, $query);

print_r($results);

echo $table_header = '<table><tr><th>ID</th><th>Направление обучения</th></tr>';

while ($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC)) {
	echo create_table_row($row);
}
echo '</table>';


?>