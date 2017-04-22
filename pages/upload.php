<?php
  @session_start();
  //echo $_SESSION["name"];
  if (!isset($_SESSION["email"])) {
    header("location:../index.html");
  }
  include '../Scripts/classes/users.php';
        $userObj = new Users();
        $userObj->connect();
        $emails = $userObj->getAllEmail($_SESSION["email"]);
        $count = count($emails);
        $i=0;
       // echo $count;


    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Pict Cafe | Upload</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
      .cardL{
        height: 360px;
      }
    </style>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIKvH7BAJKyear-OmyQhmWSSRWF_NfuLM&v=3.exp&libraries=places"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $('.search-box input[type="text"]').on("keyup input", function(){
              /* Get input value on change */
              var term = $(this).val();
              var resultDropdown = $(this).siblings(".result");
              if(term.length){
                  $.get("../Scripts/backend-search.php", {query: term}).done(function(data){
                      // Display the returned data in browser
                      resultDropdown.html(data);
                  });
              } else{
                  resultDropdown.empty();
              }
          });

          // Set search input value on click of result item
          $(document).on("click", ".result p", function(){
              $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
              $(this).parent(".result").empty();
          });
      });
    </script>
  </head>
  <body class="skin-blue">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo"><b>Pict </b>Cafe</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu"><a href="upload.php"><i class="fa fa-plus-square-o"></i></a></li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src='<?=$_SESSION["pic"]?>' class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?=$_SESSION["name"]?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src='<?=$_SESSION["pic"]?>' class="img-circle" alt="User Image" />
                    <p>
                      <?=$_SESSION["name"]?>
                      <small><?=$_SESSION["email"]?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="../Scripts/signOut.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src='<?=$_SESSION["pic"]?>' class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?=$_SESSION["name"]?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Verified</a>
            </div>
          </div>
          <form action="../Scripts/searchMediatorForEvents.php" method="get" class="sidebar-form">

            <div class="input-group search-box">

              <input type="text" autocomplete="off" name="q" class="form-control" placeholder="Search..."/>
              <div class="result" style="background-color: white !important;"></div>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>

            </div>
            <!-- <div class="result"></div> -->
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="dash.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

            <li class="active">
              <a href="upload.php">
                <i class="fa fa-plus-square-o "></i> <span>Upload</span>
              </a>
            </li>
            <li>
              <a href="timeline.php">
                <i class="fa fa-user"></i> <span>Timeline</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            EVENT -
            <small>UPLOAD</small>
          </h1>
        </section>

        <!--  -->

        <!-- Main content -->
        <form role="form" action="../Scripts/eventAdd.php" method="Post" enctype="multipart/form-data">
          <section class="content">
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- general form elements disabled -->
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Event Description</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <!-- <form role="form" action="../Scripts/eventAdd.php" method="Post"> -->
                    <!-- text input -->
                    <div class="form-group">
                      <label>Even Name</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-bookmark"></i></span>
                        <input required="true" type="text" class="form-control" placeholder="Name" name="eventName">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Event Description</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                        <input required="true" type="text" class="form-control" placeholder="One line desc..." name="eventDesc">
                      </div>
                    </div>

                    <div class="form-group">
                    <label>Event Date</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div>
                    <input required="true" type="date" class="form-control" name="eventDate" />
                    </div><!-- /.input group -->
                    </div><!-- /.form group -->

                    <div class="form-group">
                    <label>Members</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <input type="email" class="form-control" placeholder="Add Members" name="eventMembers[]" list="emails" multiple>
                    <datalist id="emails">
                      <?php
                           while ($i<$count) {
                              echo "<option value='".$emails[$i]."'>";
                              $i++;
                          }
                      ?>
                  </datalist>
                    </div>
                    </div>
                    <!--  </form> -->
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!--/.col (left) -->



              <!-- RIGHT COL  -->

              <div class="col-md-6">
                <!-- general form elements disabled -->
                <div class="box box-primary cardL">
                  <div class="box-header">
                    <h3 class="box-title">Event Description</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <!-- <form role="form"> -->
                    <!-- text input -->
                    <div class="form-group">
                      <label>Even Location</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input type="text" id="locationTextField" class="form-control" placeholder="Location" name="eventLocation">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">Image uploads</label>
                     <input required="true" type="file" name="eventPhotos[]" multiple="" />
                      <p></p>
                      <p class="help-block" style="padding-left:2px;">Attach all the images of the repsective events</p>
                      <p class="help-block">&nbsp</p>
                      <p class="help-block">&nbsp</p>
                      <p class="help-block">&nbsp</p>
                    </div>

                    <div class="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    <!-- </form> -->
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!--/.col (right) -->
            </div>   <!-- /.row -->
          </section><!-- /.content -->
        </form>
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>P</b>C
        </div>
        <strong>Copyright &copy; 2017 <a href="">Pict Cafe</a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../plugins/chartjs/Chart.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>
     <script>
                        function init() {
                var input = document.getElementById('locationTextField');
                var autocomplete = new google.maps.places.Autocomplete(input);
            }
            google.maps.event.addDomListener(window, 'load', init);
  </script>
  </body>
</html>
