<?php
    $user_nic = $_SESSION['user_session'];
    $u = $user->user_details($user_nic);
?>
<div class="sidemenu hidden-xs" id="sidemenu">
    <div class="sidemenu-content" id="sidemenu-content">
        <div class="profile">
            <div class="image">
                <img src="" alter=""/>
            </div>
            <div class="details">
                <div class="name"><h4><?php echo $u['E_name']; ?></h4></div>
                <div class="title"><strong><?php echo $u['role']; ?></strong></div>
            </div>
        </div>

        <div class="menu">
            <ul class="nav">
                <li><a href="<?php echo SCRIPT_ROOT ?>/public/index.php">
                        <i class="fa fa-home fa-fw pull-left"></i>
                        Home</a></li>
                <li><a href="#">
                        <i class="fa fa-globe fa-fw pull-left"></i>
                        Disasters</a></li>
                <li><a href="#">
                        <i class="fa fa-exclamation-triangle fa-fw pull-left"></i>
                        Alerts</a></li>
                <li><a href="#">
                        <i class="fa fa-envelope fa-fw pull-left"></i>
                        Message</a></li>
                <?php if($u['role'] == 'Administrator') { ?>
                <li><a href="#">
                        <i class="fa fa-dashboard fa-fw pull-left"></i>
                            Admin Panel</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>