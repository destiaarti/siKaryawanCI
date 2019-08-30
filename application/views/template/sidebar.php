<?php error_reporting(E_ALL ^ E_DEPRECATED);
                $user1 = $_SESSION['nama'];
                include "koneksi.php";
                $query = mysql_query("SELECT * from admin where username = '$user1'");
                
                if($query === FALSE) { 
                    die(mysql_error()); // TODO: better error handling
                }

                while($row = mysql_fetch_array($query))
                { 
                    $foto = $row['foto'];
                    $hak = $row['privileges'];
                    ?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left">
                <img src="<?php echo base_url('gambar/'.$foto) ?>" class="img-circle" alt="User Image" height="55"/>
            </div>
            <div class="pull-left info">
                <p><?php 

				
					
                    echo $row['nama'];
				
				?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="<?php echo site_url('dashboard1') ?>">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>                
            </li>
            <?php if($hak == 'admin'){ ?>
			<li class="treeview">
                <a href="<?php echo site_url('user') ?>">
                    <i class="fa fa-user"></i> <span>User</span>
                </a>                
            </li> <?php }} ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder text-red"></i>
                    <span>Data Pegawai</span>
                   <span class="label label-primary pull-right">3</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('karyawan') ?>"><i class="fa fa-male text-yellow"></i> Data Karyawan</a></li>
                    <li><a href="<?php echo site_url('manager') ?>"><i class="fa fa-paperclip text-yellow"></i> Data Manager</a></li>
                    <li><a href="<?php echo site_url('gaji') ?>"><i class="fa fa-print text-yellow"></i> Gaji</a></li>
                </ul>
            </li>
            

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">