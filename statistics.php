  <?php
    include("connect.php");
     include("includes/header.html");
    include("includes/adminnavbar.html");
  ?>
  <html>
  <div class="bat-chart">
  <div class="bat-header">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Total Bats sold', 'Income'],

          <?php
            $bat ="SELECT * from batsales";
            $results = $conn ->query($bat);
        if($results->num_rows> 0)
        {

          while($batdata =$results->fetch_assoc())
          {
              $year = $batdata['Year'];
              $batsold = $batdata['itemsold'];
              $batincome = $batdata['Income'];
          ?>
              ['<?php echo $year;?>',<?php echo $batsold;?>,<?php echo $batincome;?>],
              <?php } }?>
        ]);

        var options = {
          title: 'Cricket-Bat sales',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_bat'));

        chart.draw(data, options);
      }
    </script>
  </div>
  <div class="chartbody">
    <div id="curve_bat" style="width: 900px; height: 500px"></div>
  </div>
  </div>
  </html>
<?php
    include("includes/footer.html");
?>