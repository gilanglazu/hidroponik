<?php 
$conn = new mysqli('localhost', 'root', '', 'otomasi');
if ($conn->connect_error) {
	die("Connection error: " . $conn->connect_error);
}
$result = $conn->query("SELECT suhu, kelembaban, ph FROM sensor ORDER BY id DESC LIMIT 1");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		?>

		<div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Suhu</p>
                          <p class="card-title"><?php echo $row['suhu'] . '<br>' ?></p>
                        
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <!-- <div class="stats">
                  <i class="fa fa-refresh"></i> Update Now
                </div> -->
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Kelembaban</p>

                          <p class="card-title"><?php echo $row['kelembaban'] . '<br>' ?></p>
  
                        
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <!-- <div class="stats">
                  <i class="fa fa-calendar-o"></i> Last day
                </div> -->
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-vector text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">PH</p>
                          <p class="card-title"><?php echo $row['ph'] . '<br>' ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-favourite-28 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category"></p>
                      <p class="card-title">
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>

		<?php
	}
}
?>
