<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num_rows']) && isset($_POST['num_cols'])) {
   // Jika form disubmit, proses data
   $num_rows = $_POST['num_rows'];
   $num_cols = $_POST['num_cols'];
?>
   <!-- Tampilan no 2 -->
   <form method="post">
      <?php
      for ($i = 1; $i <= $num_rows; $i++) {
         echo "<br>";
         for ($j = 1; $j <= $num_cols; $j++) {
            $name = $i . "_" . $j;
            echo "$i.$j :<input type='text' name='data[$name]' required> ";
         }
      }
      ?>
      <br><br>
      <input type="submit" value="SUBMIT">
   </form>

<?php
} elseif (isset($_POST['data'])) {
   // Tampilan no 3
   $data = $_POST['data'];
   foreach ($data as $key => $value) {
      $keys = explode("_", $key);
      echo $keys[0] . "." . $keys[1] . " : " . $value . "<br>";
   }
} else {
?>
   <!-- Tampilan no 1 -->
   <form method="post">
      <div>
         <label for="num_rows">Jumlah Baris:</label>
         <input type="number" id="num_rows" name="num_rows" required>
      </div>
      <div>
         <label for="num_cols">Jumlah Kolom:</label>
         <input type="number" id="num_cols" name="num_cols" required>
      </div>
      <input type="submit" value="SUBMIT">
   </form>
<?php
}
?>