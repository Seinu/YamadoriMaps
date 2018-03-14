<?php
require_once("connectToDB.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Select all the rows in the markers table
$query = "SELECT * FROM markers WHERE 1";
$sql = $_db->query($query);


header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
  // Add to XML document node
  // todo add informaton about plant varieties found
  echo '<marker ';
  echo 'id="' . $row['id'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo 'name="' . parseToXML($row['owner']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'phone="' . parseToXML($row['phone']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>
