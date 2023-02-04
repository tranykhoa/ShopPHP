  <div style="display: flex;justify-content: center;align-items: center;background-color: #fff;">
    <div id="piechart"></div>
  </div>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    // Load google charts
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Danh mục', 'Số lượng sản phẩm'],
        <?php
        $tongdm = count($listhongke);
        $i = 1;
        foreach ($listhongke as $thongke) {
          extract($thongke);
          if ($i == $tongdm) $dauphay = "";
          else $dauphay = ",";
          echo '["' . $tendanhmuc . '", ' . $countsp . ']' . $dauphay;
          $i++;
        }
        ?>
        // ['Work', 8],
        // ['Eat', 2],
        // ['TV', 4],
        // ['Gym', 2],
        // ['Sleep', 8]
      ]);

      // Optional; add a title and set the width and height of the chart
      var options = {
        'title': 'Thống kê số lượng sản phẩm theo danh mục',
        'width': 550,
        'height': 400
      };

      // Display the chart inside the <div> element with id="piechart"
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
  </script>
