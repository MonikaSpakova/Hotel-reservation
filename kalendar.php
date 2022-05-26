<?php
include_once "index_top.php";
?>

<form action="kalendar.php" method="get">
<div class="vyber_izba">
            <div class="pevne_kal">
                <label>Číslo izby</label>
            </div>
            <div class="dopln_kal">
                <select id="drow" name="drow" required>
                    <option value=""></option>
                        
                    <?php
                    if(isset($_GET['num_rez'])){
	                    $num_rez = intval($_GET['num_rez']);}
                    $sql = "SELECT * FROM izby";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                            if(isset($_GET['drow'])){
                                $drow = intval($_GET['drow']);
                                $Cislo_izba = $drow;
                            }
                            if($row['Cislo_izby'] == $Cislo_izba)
                                echo '<option value="' . $row['Cislo_izby'] . '" selected>';
                           
                            else 
                                echo '<option value="' . $row['Cislo_izby'] . '">';
                            echo 'Č.' . $row['Cislo_izby'];
                            echo '</option>' . PHP_EOL;
                        }
                      } else {
                        echo "0 results";
                      }
                      
               // value="<?php echo $c_izby; 
               $sql = "SELECT Cislo_izby FROM izby WHERE id_izby = $Cislo_izba";
               $result = mysqli_query($conn, $sql);

               $s_izba = mysqli_fetch_assoc($result);
                    ?>
                    </select>
            </div>
            
            <button type="submit" class="sub_dost">Dostupnosť izby</button>            
        </form>
</div>


  <div class="content">
    <div id='calendar'></div>
  </div>
    
  <script src="calendar/js/jquery-3.3.1.min.js"></script>
    <script src="calendar/js/popper.min.js"></script>
    <script src="calendar/js/bootstrap.min.js"></script>

    <script src='calendar/fullcalendar/packages/core/main.js'></script>
    <script src='calendar/fullcalendar/packages/interaction/main.js'></script>
    <script src='calendar/fullcalendar/packages/daygrid/main.js'></script>

    <p id="currentDate"></p>

    <script>
    var today = new Date();
    var datum = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    //document.getElementById("currentDate").value = datum;

    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      defaultDate: today,
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        <?php
        $sql = "SELECT * 
                FROM rezervacia 
                INNER JOIN izby 
                ON rezervacia.id_izby=izby.id_izby 
                WHERE izby.Cislo_izby=$Cislo_izba";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            echo '
                {title: "Rezervácia č. ' . $row['id_rezervacie'] . '", 
                url: "faktura_pdf.php?num_rez=' . intval($row['id_rezervacie']) . '",
                start: "' . $row['Prichod'] . 'T15:00:00", 
                end: "' . $row['Odchod'] . 'T10:00:00"},
                ';
            }
        }
        else {
        echo "{}";
        }
        ?>
      ]
    });
    $('#drow').change(function() {
    $('form').submit();});

    calendar.render();
  });


    </script>   

    <p id="vysledok"></p>

    <script src="calendar/js/main.js"></script>
  </body>
</html>