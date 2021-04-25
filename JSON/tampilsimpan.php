<?php
include 'koneksi.php';
          $query = '';
          $table_data = '';
          $filename = "data.json";
          $data = file_get_contents($filename); 
          $array = json_decode($data, true); 
          foreach($array as $row)
          {
           $query .= "INSERT INTO listdrakor (judul, genre, episode, keterangan) VALUES ('".$row["judul"]."', '".$row["genre"]."', '".$row["episode"]."', '".$row["keterangan"]."'); ";  // Make Multiple Insert Query 
           $table_data .= '
            <tr>
               <td>'.$row["judul"].'</td>
               <td>'.$row["genre"].'</td>
               <td>'.$row["episode"].'</td>
               <td>'.$row["keterangan"].'</td>
           </tr>
           '; 
          }
          if(mysqli_multi_query($koneksi, $query)) 
    {
     echo '<h3 style="text-align:center">Data berhasil disimpan ke Database</h3><br />';
     echo '<table style="margin-left:auto;margin-right:auto" border="1">
        <tr>
         <th>Judul</th>
         <th>Gnere</th>
         <th>Episode</th>
         <th>Keterangan</th>
        </tr>';
     echo $table_data;  
     echo '</table>';
   }
?>