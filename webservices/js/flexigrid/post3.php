<?

function runSQL($rsql) {

$connect = mysql_connect('localhost','root','mysql') or die ("Error: could not connect to database");
$db = mysql_select_db('SYSFRENOS');

$result = mysql_query($rsql) or die ('test');
return $result;
mysql_close($connect);
}

function countRec($fname,$tname) {
$sql = "SELECT count($fname) FROM $tname ";
$result = runSQL($sql);
while ($row = mysql_fetch_array($result)) {
return $row[0];
}
}
$page = $_POST['page'];
$rp = $_POST['rp'];
$sortname = $_POST['sortname'];
$sortorder = $_POST['sortorder'];

if (!$sortname) $sortname = 'name';
if (!$sortorder) $sortorder = 'desc';

$sort = "ORDER BY $sortname $sortorder";

if (!$page) $page = 1;
if (!$rp) $rp = 10;

$start = (($page-1) * $rp);

$limit = "LIMIT $start, $rp";

$sql = "SELECT iso,name,printable_name,iso3,numcode FROM country $sort $limit";
$result = runSQL($sql);

$total = countRec('iso','country');

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" );
header("Pragma: no-cache" );
header("Content-type: text/x-json");


$data['page'] = $page;
$data['total'] = $total;

while ($row = mysql_fetch_array($result)) {

		$rows[] = array(
				"id" => $row['iso'],
				"cell" => array(
				$row['iso']
				,$row['name']
				,$row['printable_name']
				,$row['iso3']
				,$row['numcode']
				)
			);


}

$data['rows'] = $rows;

echo json_encode($data);
?>
