                  <?php
error_reporting(10);
require_once '../controllers/notification_connect.php';

/**
 * Created by CAS Team.
 */
?>
<form  action="">
    <div class="home-tabheader disaster-notify">
        <div class="col-lg-4">
            <ul>
                <li><a href="../app/controllers/disaster_tabs.php?id=earthquake"><i class="dis-cracked2" style=""></i> <span>EARTHQUAKES - <?php  echo $edata;?></span></a></li>
                <li><a href="../app/controllers/disaster_tabs.php?id=landslide"> <i class="dis-snowslide" style=""></i> <span>LANDSLIDES - <?php  echo$ldata;?></span></button></li>

            </ul>
        </div>
        <div class="col-lg-4">
            <ul>
                <li><a href="../app/controllers/disaster_tabs.php?id=cyclone"> <i class="dis-hurricane" style=""></i> <span>CYCLONES - <?php  echo$cdata;?></span></button></li>
                <li><a href="../app/controllers/disaster_tabs.php?id=flood"> <i class="dis-waves8" style=""></i> <span>FLOODS -<?php echo$fdata;?></span></button></li>

            </ul>
        </div>
        <div class="col-lg-4">
            <ul>
                <li><a href="../app/controllers/disaster_tabs.php?id=tsunami"> <i class="dis-tsunami1" style=""></i> <span>TSUNAMI -<?php echo$tdata;?></span></button></li>
                <li><a href="../app/controllers/disaster_tabs.php?id=reservoir"><i class="dis-fire14" style=""></i> <span>RESERVOIR - <?php  echo$rdata;?></span></button></li>
            </ul>
        </div>

    </div>
</form>



</div>