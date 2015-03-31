<?php
include_once 'health_action.php';
    session_start();
    if(!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Central~HealthMS | Register Patient</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
        <?php
                    $id = null;
                    if (isset($_REQUEST['id'])) {
                        $id = $_REQUEST['id'];
                        $row = get_health_official_by_id($id);
                    }
                    

                ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php"><font size="5" color="#cdbfe3">Central~HealthMS</font></a>

                <a class="navbar-brand" href="dashboard.php"><font size="5" color="gold">
                    <?php 
                                echo $_SESSION['h_name'];
                ?></font></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                    <div align="right">
                            <form align="right" action='search_patient.php' method="POST" enctype="multipart/form-data" class="navbar-form" role="search">
                            <div class="input-group add-on">
                              <input style="min-width:300px; max-width:300px;" type="text" class="form-control" placeholder="Search by patient PIN or name..." name="search" id="search">
                              <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                            </div>
                          </form>
                </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div style="color:white;"><i class="fa fa-user"></i> Welcome, 
                            <?php 
                                echo $_SESSION['o_fname'] . " " . $_SESSION['o_lname'];
                            ?> 
                            <b class="caret"></b></div></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="health_official_details.php?id=<?php echo $_SESSION['o_id']?> "><i class="fa fa-fw fa-user"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="dashboard.php"><div style="color:white;">
                            <i class="fa fa-fw fa-dashboard"></i> Dashboard</div></a>
                    </li>
                    <li style="background-color: #663399;">
                        <a href="register_patient.php"><div style="color:white;"><i class="fa fa-fw fa-edit">
                        </i> Register New Patient</div></a>
                    </li>
                    <li>
                        <a href="manage_patients.php"><div style="color:white;"><i class="fa fa-fw fa-wrench">
                        </i> Manage Patient Details</div></a>
                    </li>
                    <li style="background-color: white;">
                        <a href="admin/"><div style="color:black;"><i class="fa fa-fw fa-desktop">
                        </i> Administrator Login</div></a>
                    </li>
                    <!-- <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Register Patient <small></small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-7">

                        <!-- <form action='health_action.php?register_patient' method='POST' class='form-horizontal'> -->
                            <form action='health_action.php?register_patient' method='POST' class="form-inline">
                              <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="">
                              </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                        <div style="min-height: 20px">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-1">
                                  </div>
                                <div class="col-lg-3">
                                <!-- </div> -->
                                        
                              <?php
                            display_gender();?>
                                    </div>
                                    <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="birthDate">Date of Birth</label>
                                        <input type="date" class="form-control" id="birthDate" name="birthDate">
                                      </div>
                              </div>
                                </div>
                                  <div class="row">
                                        <div class="col-lg-12">
                                            <div style="min-height: 20px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class='form-group'>
                                              <label for="address">Address</label>
                                              <textarea style="min-height:100px;max-height:100px; min-width:400px" type='text' 
                                              class='form-control' name='address' id='address' aria-describedby='basic-addon1'></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div style="min-height: 20px">
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                echo "<div class='row'>
                                        <div class='col-lg-6'>";
                                            display_nationality();
                                echo "</div>
                                        <div class='col-lg-6'>";
                                            display_regions();
                                echo "</div>
                                        </div>";

                                echo "<div class='row'>
                                        <div class='col-lg-12'>
                                            <div style='min-height: 20px'>
                                            </div>
                                        </div>
                                    </div>";

                                echo "<div class='row'>
                                        <div class='col-lg-6'>";
                                            display_districts();
                                echo "</div>
                                        <div class='col-lg-6'>";
                                            display_sub_districts();
                                echo "</div>
                                        </div>";
                            ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div style="min-height: 20px">
                                            </div>
                                        </div>
                                    </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class='form-group'>
                                      <label for="contact">Contact</label>
                                      <input type='text' class='form-control' name='contact' id='contact' placeholder='phone' aria-describedby='basic-addon1'>
                                    </div>
                                <div class='form-group'>
                                    <label for="email">Email</label>
                                    <input type='email' class='form-control' name='email' id='email' placeholder='example@gmail.com' aria-describedby='basic-addon1'>
                            </div>
                                </div>
                            </div>
                            <div class="row">
                                        <div class="col-lg-12">
                                            <div style="min-height: 20px">
                                            </div>
                                        </div>
                                    </div> 
                            <button type='submit' name='submit' class='btn btn-success'>Register Patient</button>
                        </form>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div style="min-height: 100px">
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
