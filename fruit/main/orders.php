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
          <li class="active"><a href="orders.php"><i class="icon-list-alt icon-2x"></i> Orders</a></li>
          <li><a href="orderitem.php"><i class="icon-list-alt icon-2x"></i> Order Items</a></li>
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
        <i class="icon-list-alt"></i> Orders
      </div>
      <ul class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li> /
        <li class="active">Orders</li>
      </ul>
      <div style="margin-top: -19px; margin-bottom: 21px;">
        <a href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
        <div style="text-align:center;">
          <h4>Orders</h4>
        </div>
      </div>
      <table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th>Address</th>
            <th>City</th>
            <th>Country</th>
            <th>Postcode</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Notes</th>
            <th>Order Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT id, first_name, last_name, company, address, city, country, postcode, mobile, email, notes, order_date FROM orders ORDER BY id DESC";
          $result = $conn->query($sql);
          if ($result && $result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>".htmlspecialchars($row['id'])."</td>";
                  echo "<td>".htmlspecialchars($row['first_name'])."</td>";
                  echo "<td>".htmlspecialchars($row['last_name'])."</td>";
                  echo "<td>".htmlspecialchars($row['company'])."</td>";
                  echo "<td>".htmlspecialchars($row['address'])."</td>";
                  echo "<td>".htmlspecialchars($row['city'])."</td>";
                  echo "<td>".htmlspecialchars($row['country'])."</td>";
                  echo "<td>".htmlspecialchars($row['postcode'])."</td>";
                  echo "<td>".htmlspecialchars($row['mobile'])."</td>";
                  echo "<td>".htmlspecialchars($row['email'])."</td>";
                  echo "<td>".nl2br(htmlspecialchars($row['notes']))."</td>";
                  echo "<td>".htmlspecialchars($row['order_date'])."</td>";
                  echo '<td>
                          <a href="edit_order.php?id='.urlencode($row['id']).'" class="btn btn-success btn-mini"><i class="icon-edit"></i> Edit</a>
                          <a href="delete_order.php?id='.urlencode($row['id']).'" class="btn btn-danger btn-mini" onclick="return confirm(\'Are you sure you want to delete this order?\')"><i class="icon-trash"></i> Delete</a>
                        </td>';
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='13'>No orders found.</td></tr>";
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