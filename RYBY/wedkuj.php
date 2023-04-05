<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
  </head>
  <body>
    <?php
      $con = mysqli_connect("localhost", "root", "", "wedkowanie");
      $ryby_z_rzek = [];
      $sql = "SELECT r.nazwa, l.akwen, l.wojewodztwo FROM `ryby` AS `r` JOIN lowisko AS `l` ON r.id = l.Ryby_id WHERE `rodzaj` = 3;";
      if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $ryby_z_rzek[] = $row;
        }
        mysqli_free_result($result);
      }
      $drapiezniki = [];
      $sql = "SELECT `id`, `nazwa`, `wystepowanie` FROM `ryby` WHERE `styl_zycia` = 1;";
      if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $drapiezniki[] = $row;
        }
        mysqli_free_result($result);
      }
      mysqli_close($con);
    ?>
    <div class="baner">
      <h1>Portal dla wędkarzy</h1>
    </div>
    <div class="lewe">
      <div class="lewy1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
          <?php foreach ($ryby_z_rzek as $ryba): ?>
            <li><?= $ryba['nazwa'] ?> pływa w rzece <?= $ryba['akwen'] ?>, <?= $ryba['wojewodztwo'] ?></li>
          <?php endforeach; ?>
        </ol>
      </div>
      <div class="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
          <tr>
            <th>L.p.</th>
            <th>Gatunek</th>
            <th>Występowanie</th>
          </tr>
          <?php foreach ($drapiezniki as $index => $ryba): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= $ryba['nazwa'] ?></td>
              <td><?= $ryba['wystepowanie'] ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
    <div class="prawy">
      <img src="ryba1.jpg" alt="Sum">
      <p><a href="kwerendy.txt" target="_blank">Pobierz kwerendy</a></p>
    </div>
    <div class="stopka">
      Stronę wykonał: Bartosz Kowalski
    </div>
  </body>
</html>

         
                         
`