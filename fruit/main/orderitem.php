<?php
require_once('auth.php');
require_once('../../db_connect.php');
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
        <ul class="nav nav-list">
          <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li>
          <li><a href="sales.php"><i class="icon-shopping-cart icon-2x"></i> Sales</a></li>
          <li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Products</a></li>
          <li><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a></li>
          <li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a></li>
          <li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a></li>
          <li><a href="contacts.php"><i class="icon-envelope icon-2x"></i> Contacts</a></li>
          <li><a href="display_reg.php"><i class="icon-user icon-2x"></i> Users</a></li>
          <li><a href="orders.php"><i class="icon-list-alt icon-2x"></i> Orders</a></li>
          <li class="active"><a href="orderitem.php"><i class="icon-list-alt icon-2x"></i> Order Items</a></li>
          <br><br><br><br><br><br>
          <li>
            <div class="hero-unit-clock">
              <form name="clock">
                <font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
              </form>
            </div>
          </li>
        </ul>
      </div><!--/.well -->
    </div><!--/span-->
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