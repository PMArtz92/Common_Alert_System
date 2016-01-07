<?php include "../templates/header.php";

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
    <div><?php include "../templates/topmenu.php"; ?></div>
    <div>
        <aside class="left-side"><?php include "../templates/sidemenu.php"; ?></aside>
        <div class="right-side">
            <div class="container-fluid">

            <?php
            $data=$db->query("SELECT * FROM employee");
            $db_result=$data->result();
            var_dump($db_result);
            $count=$data->count();

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
                    $update =$db->query("SELECT E_job_role FROM employee WHERE E_nic='$del_id'");
                    $job=$update->result();
                    $c_job=$job[$i]->E_job_role;
                        ?>

                        <script type="text/javascript">
                            $(document).ready(function () {
                                $("#myModaledit").modal('show');
                            });
                        </script>

                        <!--edit_form-->
                        <div class="modal fade " id="myModaledit" action="../controller/update.php">
                            <div class="modal-dialog">
                                <div class="row" style=" margin-top: 150px;margin-left: 90px;">
                                    <div class="col-md-8 col-md-offset-2 model_addnew" style="width: 450px; height: 270px;">
                                        <h4 style="color:white;text-align:left;">Edit User Job Role</h4>
                                        <form class="form-horizontal" action="../controller/update.php?emp_id=<?php echo $del_id?>" method="post">
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

                    <div id="content" scrolling="yes"><!--table with users-->
                        <div class="row">
                        <form name="table" method="post" onsubmit="return validate();">
                            <table class="table table_striped" id="table" action="load_table.php">

                                <div class="row">
                                    <div style="float: right;">
                                        <button class="div_button" data-toggle="modal" type="submit" id="update" name="update" onclick="validate()"><img src="../../../public/images/refresh.png" class="div_button_img">Update</button>
                                    </div>
                                    <div style="float: right;">
                                        <button class="div_button" data-toggle="modal" type="submit" id="delete" name="delete" onclick="validate()"><img src="../../../public/images/remove.png" class="div_button_img">Remove</button>
                                    </div>
                                    <div style="float: right;">
                                        <button class="div_button" data-toggle="modal" data-target="#myModal" type="button" id="add_new" name="add_new"><img src="../../../public/images/add.png" class="div_button_img">New User</button>
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

                                for($i=0; $i<$count; $i++){
                                    //$name=$db_result[$i]->E_name;
                                    echo
                                        "<tr>
                                        <td>{$db_result[$i]->E_nic}</td>
                                        <td>{$db_result[$i]->E_name}</td>
                                        <td>{$db_result[$i]->E_email}</td>
                                        <td>{$db_result[$i]->E_job_role}</td>
                                        <td>" . "<input name='checkbox[]' type='checkbox' id='checkbox[]' class='box' data-toggle='modal' data-target='#myModal2' value={$db_result[$i]->E_nic}>"."</td>
		                            </tr>\n";
                                }
                                ?>

                                </tbody>
                            </table>
                        </form>
                        </div>
                    </div>

                    <div class="modal fade" id="myModal" role="dialog" action="../controller/addnew.php" >
                        <div class="modal-dialog">

                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 model_addnew " style="width: 510px;margin-top: 0px;margin-left:150px;" >
                                    <h4 style="color:white;text-align:left;">ADD USER</h4>
                                    <form class="form-horizontal" action="../controller/addnew.php"  onSubmit="return formValidation();" data-toggle="validator" method="post">
                                        <div class="form-group ext_form">
                                            <div class="col-xs-10">
                                                <label for="inputName" class="control-label" style="color:white;">Name :</label>
                                                <input type="name" name="formName" class="form-control modal_input" id="inputName" align="center"  style="margin-left: 120px;" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group ext_form">
                                            <div class="col-xs-10">
                                                <label for="inputEmail" class="control-label" style="color:white;">Email :</label>
                                                <input type="email" name="formEmail" class="form-control modal_input" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="inputEmail" style="margin-left: 120px;" align="center" placeholder="Email" data-error="Brush, that email address is invalid" required>
                                            </div>
                                        </div>
                                        <div class="form-group ext_form">
                                            <div class="col-xs-10">
                                                <label for="inputnic" class="control-label" style="color:white;">NIC :</label>
                                                <input type="nic" name="formNIC" class="form-control modal_input" id="inputnic" align="center" style="margin-left: 120px;" placeholder="NIC number" pattern="[0-9A-Za-z]{10}" title="Format: XXXXXXXXXV" required maxlength="10">
                                            </div>
                                        </div>
                                        <div class="form-group ext_form">
                                            <div class="col-xs-10">
                                                <label for="inputmobile" class="control-label" style="color:white;">Contact Number:</label>
                                                <input type="Mobile" class="form-control modal_input" name="formMobile" id="inputmobile" align="center" style="margin-left: 120px;" placeholder="Mobile number" pattern="^\d{10}$" title="Required 10 numbers" required maxlength="10">
                                            </div>
                                        </div>
                                        <div class="form-group ext_form">
                                            <div class="col-xs-10">
                                                <label for="inputAddress" class="control-label" style="color:white;">Address :</label>
                                                <input type="address" class="form-control modal_input" name="formAddress" id="inputAddress" align="center" style="margin-left: 120px;" placeholder="Adress" required>
                                            </div>
                                        </div>
                                        <div class="form-group ext_form">
                                            <div class="col-xs-10">
                                                <label style="color:white;">Job Role :</label>
                                                <select class="form-control modal_input " name="size" align="center" style="margin-left: 120px;">
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="General User">General User</option>
                                                    <option value="Operational User">Operational User</option>
                                                    <option value="Executive User">Executive User</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="fileupload fileupload-new" data-provides="fileupload" style="margin-left: 40px;">
                                            <div class="fileupload-preview thumbnail" style="width: 100px; height: 100px;margin-left: 80px;margin-top: 115px;">
                                                <div style="margin-left: 100px;">
                                                    <span class="fileupload-exists" style=" color:white;">Change</span><input type="file" /></span>
                                                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" >
                                            <!--<div class="col-xs-offset-2 col-xs-10" style="margin-left: 280px;margin-top: 10px;">-->
                                            <button type="Submit" class="btn modal_btn" id="submit"  value="Submit" >Add</button>
                                            <button type="button" class="btn modal_btn" data-dismiss="modal" style="margin-left: 10px;margin-top: -11px;">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>