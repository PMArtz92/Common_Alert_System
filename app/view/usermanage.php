<?php include "../templates/header.php";

require_once '../core/init.php';
require_once '../models/dbConfig.php';
if($user->is_loggedin()==""){
    $user->redirect('../../public/index.php');
}

$db = DB::getInstance();
?>
<script src="../../public/js/user/singup.js"></script>
</head>
<body>
<div>
    <div><?php include "../templates/topmenu.php"; ?></div>
    <div>
        <aside class="left-side"><?php include "../templates/sidemenu.php"; ?></aside>
        <div class="right-side">
            <div class="container-fluid">

            <?php
            $data_check=$db->query("SELECT * FROM employee WHERE Admin_auth='1'");
            $db_result=$data_check->result();
            $count2=$data_check->count();

            if(isset($_POST['delete'])){
                for($i=0; $i<count($_POST['checkbox']); $i++){
                    $del_id = $_POST['checkbox'][$i];
                    $delete=$db->query("DELETE FROM employee WHERE E_nic='$del_id'");
                }
            }

            if(isset($_POST['update'])) {
                for($i=0; $i<count($_POST['checkbox']); $i++){
                    $del_id = $_POST['checkbox'][$i];
                    echo $del_id;
                    $update =$db->query("SELECT E_jobrole FROM employee WHERE E_nic='$del_id'");
                    $job=$update->result();
                    $c_job=$job[$i]->E_jobrole;
                        ?>

                        <script type="text/javascript">
                            $(document).ready(function () {
                                $("#myModaledit").modal('show');
                            });
                        </script>

                        <!--edit_form-->
                        <div class="modal fade " id="myModaledit"  action="../controllers/update.php">
                            <div class="modal-dialog">
                                <div class="row" style=" margin-top: 150px;margin-left: 90px;">
                                    <div class="col-md-8 col-md-offset-2 model_addnew" style="width: 450px; height: 270px;">
                                        <h4 style="color:white;text-align:left;">Edit User Job Role</h4>
                                        <form class="form-horizontal" action="../controllers/update.php?emp_id=<?php echo $del_id?>" method="post">
                                            <div class="form-group ext_form">
                                                <div class="col-xs-10">
                                                    <div class="input_box" >
                                                        <label style="color:white;">Current Job Role :</label>
                                                        <input type="text" class="form-control modal_input" name="jobrole"
                                                               id="currentjob" align="center"
                                                               style="margin-left: 125px;width: 276px;margin-top: -25px;"
                                                               value="<?php echo $c_job ?>">
                                                    </div>
                                                    <label style="color:white;margin-top: 20px;">New Job Role :</label>
                                                    <select class="form-control modal_input " name="size" align="center"
                                                            style="margin-left: 125px;width: 276px;margin-top: -25px;">
                                                        <option value="">Role</option>
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="General User">General User</option>
                                                        <option value="Operational User">Operational User</option>
                                                        <option value="Executive User">Executive User</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                            <div class="form-group">
                                                <div class="col-xs-offset-2 col-xs-10 move" style="margin-left: 260px;margin-top: 25px;">
                                                    <button type="Submit" class="btn modal_btn" id="submit" value="Submit">
                                                        Save
                                                    </button>
                                                    <?php $_SESSION['varname'] = $del_id; ?>
                                                    <button type="button" class="btn modal_btn" data-dismiss="modal"
                                                            style="margin-left: 10px;">Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!--edit_form-->

                    <?php
                    }
            }
            ?>

                <div id="layout">
                    <div id="recent">
                        <H2 style="color: #000000; float: left">User Accounts</H2>
                    </div>

                    <div id="content" scrolling="yes"><!--table with checked users-->
                        <div class="row">
                        <form name="table" method="post">
                            <table class="table table_striped" id="table" action="load_table.php">

                                <div>
                                    <div style="float: right;">
                                        <button class="div_button" data-toggle="modal" type="submit" id="update" name="update" onclick="validate()">Update</button>
                                    </div>
                                    <div style="float: right;">
                                        <button class="div_button" data-toggle="modal" type="submit" id="delete" name="delete" onclick="validate()">Remove</button>
                                    </div>
                                    <div style="float: right;">
                                        <button class="div_button" data-toggle="modal" data-target="#myModal" type="button" id="add_new" name="add_new">New User</button>
                                    </div>
                                </div>

                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Job Role</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                for($i=0; $i<$count2; $i++){
                                    $F_name=$db_result[$i]->F_Name;
                                    $L_name=$db_result[$i]->L_Name;
                                    $space=" ";
                                    $E_name= $F_name.$space. $L_name;

                                    //$name=$db_result[$i]->E_name;
                                    echo
                                        "<tr>
                                        <td>{$db_result[$i]->E_nic}</td>
                                        <td>{$E_name}</td>
                                        <td>{$db_result[$i]->E_email}</td>
                                        <td>{$db_result[$i]->E_jobrole}</td>
                                        <td>" . "<input name='checkbox[]' type='checkbox' id='checkbox[]' class='box' data-toggle='modal' data-target='#myModal2' value={$db_result[$i]->E_nic}>"."</td>
		                            </tr>\n";
                                }
                                ?>

                                </tbody>
                            </table>
                        </form>
                        </div>
                    </div><!--end table with checked users-->

                    <div class="modal fade" id="myModal" role="dialog" action="../controller/addnew.php" ><!--pop up addnew modal-->
                        <div class="modal-dialog">

                            <div>
                                <div class="col-lg-10 col-lg-offset-2 model_addnew">
                                    <h4 style="color:white;text-align:left;">ADD USER</h4>
                                    <form class="form-horizontal" action="../controllers/addnew.php"  data-toggle="validator" method="post" id="admin-adduser">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">First Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="Fname" class="form-control" id="Fname" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Last Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="Lname" class="form-control" id="Lname" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">NIC Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nic" class="form-control" id="nic" placeholder="NIC">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Title</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="job-role" name="job_role">
                                                    <option value="General User">General User</option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Operational User">Operational User</option>
                                                    <option value="Executive User">Executive User</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Mobile No</label>
                                            <div class="col-sm-8">
                                                <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="ex:- 0719514235">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-sm-offset-7 controls">
                                            <button type="submit" id="btn-signup" name="btn-adduser" class="btn btn-default btn-primary">
                                                <i class="fa fa-hand-o-right"></i>&nbsp;Add
                                            </button>

                                            <button type="button" name="btn-cancel" class="btn btn-default btn-primary" data-dismiss="modal">
                                                <i class="fa fa-ban"></i>&nbsp;Cancel
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!--end pop up add new modal-->

                    <div class="row">
                        <div id="recent">
                            <H2 style="color: #000000; float: left">New Users</H2>
                        </div>
                    </div>

                    <div id="content" scrolling="yes"><!--table with new users-->
                        <div class="row">
                            <form method="post">
                                <table class="table table_striped" id="table">

                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $data_notcheck=$db->query("SELECT * FROM employee WHERE Admin_auth='0'");
                                    $db_result=$data_notcheck->result();
                                    $count1=$data_notcheck->count();

                                    for($j=0; $j<$count1; $j++) {
                                        $F_name = $db_result[$j]->F_Name;
                                        $L_name = $db_result[$j]->L_Name;
                                        $space = " ";
                                        $E_name = $F_name . $space . $L_name;
                                        $mail = $db_result[$j]->E_email;
                                        $tel = $db_result[$j]->E_tel;
                                        $nic = $db_result[$j]->E_nic;
                                        $rol = $db_result[$j]->E_jobrole;

                                        echo
                                            "<tr>
                                        <td>{$db_result[$j]->E_nic}</td>
                                        <td>{$E_name}</td>
                                        <td>{$db_result[$j]->E_email}</td>
                                        <td>{$db_result[$j]->E_tel}</td>
                                        <td>" . "<input data-toggle='modal' data-target='#viewModal' id='view' name='view' type='button'>View</input>" . "</td>
		                            </tr>\n";
                                    }
                                    ?>


                                    </tbody>
                                </table>
                                </form>
                        </div>
                    </div>
                    <!--end table with new users-->
                    <!--<script>
                        $(document).ready(function () {
                            $('#view').click(function(){
                                var v = document.getElementById('view').value;
                                console.log(v);
                            });
                        });
                    </script>-->

                    <div class="modal fade" id="viewModal" role="dialog" action="../controller/admin_accept_user.php">
                        <!--pop up modal for view-->
                        <div class="modal-dialog">

                            <div>
                                <div class="col-lg-10 col-lg-offset-2 model_addnew">
                                    <h4 style="color:white;text-align:left;">NEW USER REQUEST</h4>

                                    <form class="form-horizontal"
                                    <!--action="../controllers/admin_accept_user.php?user_id=--><?php /*echo $db_result[$j]->E_nic */ ?>
                                    "
                                    data-toggle="validator" method="post" id="admin-adduser">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Name:</label>
                                        <label class="col-sm-4 control-label"><?php echo $E_name ?></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Email:</label>
                                        <label
                                            class="col-sm-4 control-label"><?php echo $mail ?></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Contact Number:</label>
                                        <label
                                            class="col-sm-4 control-label"><?php echo $tel ?></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">NIC Number:</label>
                                        <label
                                            class="col-sm-4 control-label"><?php echo $nic ?></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Job Title:</label>
                                        <label
                                            class="col-sm-4 control-label"><?php echo $rol ?></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Acess Level:</label>

                                        <div class="col-sm-8">
                                            <select class="form-control" id="job-role" name="job_role">
                                                <option value="General User">General User</option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Operational User">Operational User</option>
                                                <option value="Executive User">Executive User</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-sm-offset-7 controls">
                                        <button type="submit" name="accept_btn"
                                                formaction="../controllers/admin_accept_user.php?user_id=<?php echo $db_result[0]->E_nic ?>"
                                                id="btn-signup" name="btn-acceptuser"
                                                class="btn btn-default btn-primary">
                                            <i class="fa fa-hand-o-right"></i>&nbsp;Accept
                                        </button>
                                        <button type="submit" name="reject_btn"
                                                formaction="../controllers/admin_reject_user.php?user_id=<?php echo $db_result[0]->E_nic ?>"
                                                type="submit" id="btn-signup"
                                                class="btn btn-default btn-primary">
                                            <i class="fa fa-hand-o-right"></i>&nbsp;Reject
                                        </button>
                                        <button type="button" name="btn-cancel" class="btn btn-default btn-primary"
                                                data-dismiss="modal">
                                            <i class="fa fa-ban"></i>&nbsp;Cancel
                                        </button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end pop up modal for view-->

                    <!--authenticate users-->
                    <div>

                    </div>
                    <!--end authenticate users-->

                </div>
            </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>