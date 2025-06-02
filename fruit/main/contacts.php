<?php 
require_once('auth.php');
?>
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<style type="text/css">
  body {
    padding-top: 60px;
    padding-bottom: 40px;
  }
  .sidebar-nav {
    padding: 9px 0;
  }
</style>
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
<body>
<?php include('navfixed.php');?>
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
          <li class="active"><a href="contacts.php"><i class="icon-envelope icon-2x"></i> Contacts</a></li>
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
        <i class="icon-envelope"></i> Contacts
      </div>
      <ul class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li> /
        <li class="active">Contacts</li>
      </ul>
      <div style="margin-top: -19px; margin-bottom: 21px;">
        <a href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
        <div style="text-align:center;">
          <h4>Contact Form Submissions</h4>
        </div>
      </div>
      <table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
        <thead>
          <tr>
            <th width="5%">ID</th>
            <th width="15%">Name</th>
            <th width="20%">Email</th>
            <th width="40%">Message</th>
            <th width="20%">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $host = "localhost";
          $user = "root";
          $pass = "";
          $dbname = "sale";
          $conn = new mysqli($host, $user, $pass, $dbname);
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          $sql = "SELECT id, name, email, message, created_at FROM contacts ORDER BY created_at DESC";
          $result = $conn->query($sql);
          if ($result && $result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>".htmlspecialchars($row['id'])."</td>";
                  echo "<td>".htmlspecialchars($row['name'])."</td>";
                  echo "<td>".htmlspecialchars($row['email'])."</td>";
                  echo "<td>".nl2br(htmlspecialchars($row['message']))."</td>";
                  echo "<td>".htmlspecialchars($row['created_at'])."</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='5'>No submissions found.</td></tr>";
          }
          $conn->close();
          ?>
        </tbody>
      </table>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<?php include('footer.php');?>
</body>
</html>