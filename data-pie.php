

  <?php
  $dbh = new PDO('mysql:host=localhost; dbname=angular', "root","");
  $rows=array();
  $sql = $dbh->query("SELECT*FROM city JOIN pie ON city.id_city=pie.id_city");
  while ($chart=$sql->fetch()) {
    $row[0] = $chart['nama_kota'];
    $row[1] = $chart['data'];
    array_push($rows,$row);
  }
  print_r( json_encode($rows, JSON_NUMERIC_CHECK));
  ?>
