<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "testdb";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
   die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel person
$sql_person = "SELECT * FROM person";
$result_person = $conn->query($sql_person);

// Query untuk mengambil data dari tabel hobi
$sql_hobi = "SELECT * FROM hobi";
$result_hobi = $conn->query($sql_hobi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Data Person dan Hobi</title>
   <style>
      table {
         border-collapse: collapse;
         width: 50%;
      }

      th,
      td {
         border: 1px solid #dddddd;
         padding: 8px;
         text-align: left;
      }
   </style>
</head>

<body>
   <a href="laporan_hobi2a.php">Laporan Hobi</a>
   <br>
   </br>
   <h2>Data Person</h2>
   <table>
      <tr>
         <th>ID</th>
         <th>Nama</th>
         <th>Alamat</th>
      </tr>
      <?php
      // Menampilkan data dari tabel person
      if ($result_person->num_rows > 0) {
         while ($row_person = $result_person->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row_person["id"] . "</td>";
            echo "<td>" . $row_person["nama"] . "</td>";
            echo "<td>" . $row_person["alamat"] . "</td>";
            echo "</tr>";
         }
      } else {
         echo "<tr><td colspan='3'>Tidak ada data person</td></tr>";
      }
      ?>
   </table>

   <h2>Data Hobi</h2>
   <table>
      <tr>
         <th>ID</th>
         <th>Person ID</th>
         <th>Hobi</th>
      </tr>
      <?php
      // Menampilkan data dari tabel hobi
      if ($result_hobi->num_rows > 0) {
         while ($row_hobi = $result_hobi->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row_hobi["id"] . "</td>";
            echo "<td>" . $row_hobi["person_id"] . "</td>";
            echo "<td>" . $row_hobi["hobi"] . "</td>";
            echo "</tr>";
         }
      } else {
         echo "<tr><td colspan='3'>Tidak ada data hobi</td></tr>";
      }
      ?>
   </table>
</body>

</html>

<?php
// Menutup koneksi database
$conn->close();
?>