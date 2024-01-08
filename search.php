<?php

require_once('root.inc.php');
require_once($ROOT . 'includes/autoload.php');

$vehicleData = null;
if (isset($_POST['search'])) {
  $vin = stripslashes($_POST['vin']);
  $obj = new VehicleListings();
  $vehicleData = $obj->getRecordByVin($vin);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vinsearch</title>
  <link rel="stylesheet" href="assets/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/style.css" />
</head>

<body>
  <div class="container">
    <div class="row height">
      <div class="col-md-8 offset-md-2 col-xl-6 offset-xl-3">
        <form action="" method="post">
          <div class="form">
            <label>Vin</label>
            <input type="text" class="form-control form-input" placeholder="Search..." name="vin" value="<?php echo @$_POST['vin']; ?>" required />
            <span class="left-pan"><button type="submit" name="search"><i class="fa fa-search"></i></button></span>
          </div>
        </form>
      </div>
      <?php if (isset($_POST['vin'])) {?>
        <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 mt-5">
          <div class="vinrecord p-md-4 p-2">
            <h2>VIN: <?php echo @$_POST['vin']; ?></h2>
            <?php if (!empty($vehicleData)) {?>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <tr>
                  <td>Stock</td>
                  <td><?php echo $vehicleData['stock'];?></td>
                  <td>Year</td>
                  <td><?php echo $vehicleData['year'];?></td>
                </tr>
                <tr>
                  <td>Make</td>
                  <td><?php echo $vehicleData['make'];?></td>
                  <td>Modal</td>
                  <td><?php echo $vehicleData['model'];?></td>
                </tr>
                <tr>
                  <td>Trim</td>
                  <td><?php echo $vehicleData['trim'];?></td>
                  <td>Price</td>
                  <td><?php echo $vehicleData['price'];?></td>
                </tr>
                <tr>
                  <td>Body Type</td>
                  <td><?php echo $vehicleData['body_type'];?></td>
                  <td>Exterior</td>
                  <td><?php echo $vehicleData['exterior'];?></td>
                </tr>
                <tr>
                  <td>Door</td>
                  <td><?php echo $vehicleData['door'];?></td>
                  <td>Cylinders</td>
                  <td><?php echo $vehicleData['cylinders'];?></td>
                </tr>
                <tr>
                  <td>Engine</td>
                  <td><?php echo $vehicleData['engine'];?></td>
                  <td>Displacement</td>
                  <td><?php echo $vehicleData['displacement'];?></td>
                </tr>
                <tr>
                  <td>Miles</td>
                  <td><?php echo $vehicleData['miles'];?></td>
                  <td>Transmission</td>
                  <td><?php echo $vehicleData['transmission'];?></td>
                </tr>
                <tr>
                  <td>Amenities</td>
                  <td colspan="3">
                    <ul class="amenities">
                      <?php
                        $amenities = explode("|", $vehicleData['amenities']);
                        foreach ($amenities as $key => $value) {
                          echo '<li>' . $value . '</li>';
                        }
                      ?>
                    </ul>
                  </td>
                </tr>
              </table>
            </div>
            <?php }
            else {
              echo '<p>No Record Found! </p>';
            } ?>
          </div>
        </div>
      <?php }?>
    </div>
  </div>

  <script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>