<?php
include ('koneksi.php');
$xml = simplexml_load_file('data.xml'); //parse the xml file into object
foreach( $xml->children() as $kelasa) 
{
$nama = $kelasa->nama; //get the childnode nama
$npm = $kelasa->npm; //get the child node npm
$alamat = $kelasa->alamat; //get the child node alamat
echo 'Nama : '.$nama.'<br />';
echo 'NPM : '.$npm.'<br />';
echo 'Alamat : '.$alamat.'<br />';
echo '<br>';
$query = "INSERT INTO datamhs
        VALUES ('', '$nama', '$npm', '$alamat') ";
   mysqli_query($koneksi, $query);
}
?>
