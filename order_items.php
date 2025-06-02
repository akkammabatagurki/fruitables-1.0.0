<?php
require_once('db_connect.php');
?>
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<style type="text/css">
  body { padding-top: 60px; padding-bottom: 40px; }
  .sidebar-nav { padding: 9px 0; }
</style>
<body>
<?php include('navfixed.php'); ?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <div class="well sidebar-nav">
        <!-- ... your sidebar code ... -->
      </div>
    </div>
    <div class="span10">
      <div class="contentheader">
        <i class="icon-list-alt"></i> Order Items
      </div>
      <ul class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li> /
        <li class="active">Order Items</li>
      </ul>
      <div style="margin-top: -19px; margin-bottom: 21px;">
        <a href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
        <div style="text-align:center;">
          <h4>Order Items</h4>
        </div>
      </div>
      <table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
        <thead>
          <tr>
            <th>ID</th>
            <th>Order ID</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT id, order_id, product_id, product_name, product_price, quantity, total_price FROM order_items ORDER BY id DESC";
          $result = $conn->query($sql);
          if ($result && $result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>".htmlspecialchars($row['id'])."</td>";
                  echo "<td>".htmlspecialchars($row['order_id'])."</td>";
                  echo "<td>".htmlspecialchars($row['product_id'])."</td>";
                  echo "<td>".htmlspecialchars($row['product_name'])."</td>";
                  echo "<td>₹".number_format($row['product_price'],2)."</td>";
                  echo "<td>".htmlspecialchars($row['quantity'])."</td>";
                  echo "<td>₹".number_format($row['total_price'],2)."</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='7'>No order items found.</td></tr>";
          }
          ?>
        </tbody>
      </table>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>