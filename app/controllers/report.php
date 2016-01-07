<?php

require_once '../core/init.php';
require_once '../models/dbConfig.php';
if($user->is_loggedin()==""){
    $user->redirect('../../public/index.php');
}

$db = DB::getInstance();
?>
</head>
<script type="text/javascript">
    window.onload = loadTabContent('../app/controller/tab.php?id=1');
</script>
<body>
<div>
    <div style="background-color: #ecf0f1; border: 2px solid black;">
<?php


$db = DB::getInstance();
$rd=date('y-m-d-l');
/*$data=$db->query("SELECT * FROM disaster");
$db_result=$data->result();
var_dump($db_result);
$count=$data->count();*/

if (isset($_GET['type'])){
    $type = $_GET['type'];
    $Dtype = $_GET['dis_type'];}
else{$type ='';
    $Dtype ='';}
$today=date('y-m-d-l');

$dbt='disaster';
switch ($type) {
    case "D":
        $Date=date("y-m-d");
        $rd=$Date;
        if($Dtype){
        $data=$db->query("SELECT * FROM $dbt WHERE date='$Date' AND Type='$Dtype'");}
        else{$data=$db->query("SELECT * FROM $dbt WHERE date='$Date'");}
        $db_result=$data->result();
        $count=$data->count();
        break;
    case "W":
        $Date3=date('y-m-d');
        $Date2=date('y-m-d',strtotime("-7 days"));
        $rd=$Date2 ."   to   ".$Date3;
        if($Dtype){$data=$db->query("SELECT * FROM disaster WHERE date between '$Date2' AND  '$Date3' AND Type='$Dtype'");}
        else{$data=$db->query("SELECT * FROM disaster WHERE date between '$Date2' AND  '$Date3'");}
        $db_result=$data->result();
        $count=$data->count();
        break;
    case "M":
        $end=date('y-m-d');
        $st=date('y-m-d',strtotime("-31 days"));
        $rd=$st ."   to   ".$end;
        if($Dtype){$data=$db->query("SELECT * FROM disaster WHERE date between '" . $st . "' AND  '" . $end . "' AND Type='$Dtype'");}
        else{$data=$db->query("SELECT * FROM disaster WHERE date between '" . $st . "' AND  '" . $end . "'");}
        $db_result=$data->result();
        $count=$data->count();
        break;
    case "Yearly":
        $yend=date('y-m-d');
        $yst=date('y-m-d',strtotime("-365 days"));
        $rd=$yst."   to   ".$yend;
        if($Dtype){$data=$db->query("SELECT * FROM disaster WHERE date between '" . $yst . "' AND  '" . $yend . "' AND Type='$Dtype'");}
        else{$data=$db->query("SELECT * FROM disaster WHERE date between '" . $yst . "' AND  '" . $yend . "'");}
        $db_result=$data->result();
        $count=$data->count();
        break;
    case "O":
        $fd= $_GET['fd'];
        $td= $_GET['td'];
        $rd=$fd . " to ". $td;
        if($Dtype){$data=$db->query("SELECT * FROM disaster WHERE date between ' $fd ' AND  '$td ' AND Type='$Dtype'");}
        else{$data=$db->query("SELECT * FROM disaster WHERE date between ' $fd ' AND  '$td '");}
        $db_result=$data->result();
        $count=$data->count();

        break;
    default:
        $data=$db->query("SELECT * FROM $dbt WHERE date='$today'");
        $db_result=$data->result();
        $count=$data->count();
}


?>
                    <!--<div>
                        <div  style="text-align: center" ><h1 > DISASTER MANAGEMENT CENTER</h1>
    <h2 > Daily Situation Report</h2>
    <p><b> Report Period:</b> <?php /*echo $rd */?></p>

        <form name="myForm" action="" onsubmit="return Printpage()" method="post">
            <button class="btn1" value="print">print</button>

        </form>
    </div>
    <table  class="table table-striped th" style="font-size: medium;height:50%;width: 100%">
        <col width="220">
        <col width="220">
        <col width="220">
        <col width="220">
        <col width="220">
        <col width="220">
    <thead>
    <tr>
        <th>DATE</th>
        <th>TIME</th>
        <th>DISASTER TYPE</th>
        <th>LATITUDE</th>
        <th>LONGITUDE</th>
        <th>LOCATION</th>
    </tr>
    </thead>
    <tbody>

    <?php
/*if($count>0) {
    for ($i = 0; $i < $count; $i++) {
        //$name=$db_result[$i]->E_name;
        echo
        "<tr>
                                        <td>{$db_result[$i]->date}</td>
                                        <td>{$db_result[$i]->time}</td>
                                        <td>{$db_result[$i]->Type}</td>
                                        <td>{$db_result[$i]->latitude}</td>
                                        <td>{$db_result[$i]->longitude}</td>
                                        <td>{$db_result[$i]->location}</td>
                                        </tr>\n";
    }
}else{echo "<tr> <td colspan='6'><span style='font-size: xx-large;text-align: center;'>No Disaster</span></td> </tr>";}
    */?>

    </tbody>
    </table>
                        </div>-->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function Printpage() {
        var alphaExp = /^[a-zA-Z]+$/;
        if(document.myForm.name.match(alphaExp)){
            print();
            document.myForm.name.focus();
            return false;
        }
    };
    $(document).ready(function(){
        $(".btn1").click(function(){
            $(".btn1").hide();
            $('#sidemenu').animate({width:'toggle'},350);
            $('.left-side').toggleClass("collapse-left");
            $(".right-side").toggleClass("strech");
        });
    });

</script>
</body>