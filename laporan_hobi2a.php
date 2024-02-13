<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "testdb";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
   die("Koneksi gagal: " . $conn->connect_error);
}

$sql_hobi = "SELECT hobi, COUNT(person_id) AS jumlah_person FROM hobi GROUP BY hobi ORDER BY jumlah_person DESC";
$result_hobi = $conn->query($sql_hobi);

if (isset($_GET['search'])) {
   $search_hobi = $_GET['search'];
   $sql_search = "SELECT hobi, COUNT(person_id) AS jumlah_person FROM hobi WHERE hobi LIKE '%$search_hobi%' GROUP BY hobi ORDER BY jumlah_person DESC";
   $result_hobi = $conn->query($sql_search);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laporan Hobi</title>
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
   <h2>Laporan Hobi</h2>
   <form action="" method="GET">
      <label for="search">Search by Hobi:</label>
      <input type="text" name="search" id="search" value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>">
      <button type="submit">Search</button>
   </form>
   <br>
   <table>
      <tr>
         <th>Hobi</th>
         <th>Jumlah Person</th>
      </tr>
      <?php
      if ($result_hobi->num_rows > 0) {
         while ($row_hobi = $result_hobi->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row_hobi["hobi"] . "</td>";
            echo "<td>" . $row_hobi["jumlah_person"] . "</td>";
            echo "</tr>";
         }
      } else {
         echo "<tr><td colspan='2'>Tidak ada data hobi</td></tr>";
      }
      ?>
   </table>
</body>

</html>

<?php
// Menutup koneksi database
$conn->close();
?>