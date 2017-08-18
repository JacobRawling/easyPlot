<?php 
  function clean_string($str){
   $str = str_replace('_', ' ',     $str);
   $str = str_replace('.png', ' ',  $str);
   $str = str_replace('.jpg', ' ',  $str);
   $str = str_replace('.jpeg', ' ', $str);
   $str = str_replace('.eps', ' ',  $str);
   $str = str_replace('.pdf', ' ',  $str);
   return $str; 
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>easyPLOT | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
 <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo"><b>easy</b>PLOT</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
           <ul class="nav navbar-nav">
             <li class="messages-menu">
                <a href="#" >
                 About
                </a>              
              </li>
             <li class="messages-menu">
                <a href="#" >
                 My Research
                </a>              
              </li>
                <li class="messages-menu">
                <a href="#" >
                 Contact
                </a>              
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <?php
              $dir    = '../pages/plots/';
              $files1 = scandir($dir);
              foreach($files1 as $proj )
              {  
                if($proj == '.' or $proj == '..')
                  continue;
                if (is_dir($dir.$proj))
                {
            ?>
              <li class="header"><?php echo clean_string($proj); ?></li>   
            <?php
              $files2 = scandir($dir.$proj);

              foreach($files2 as $subfolder )
              {
                if($subfolder == '.' or $subfolder == '..')
                  continue;
            ?>
            <li class="treeview">
             <a href="#">
                  <i class="fa fa-pie-chart"></i>
                  <span><?php echo $subfolder; ?></span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <!-- TODO: Put loop here over subfolders in this directoyry -->
                <?php
              $files3 = scandir($dir.$proj.'/'.$subfolder);
              foreach($files3 as $ssubfolder )
              {
                if($ssubfolder == '.' or $ssubfolder == '..')
                  continue;
                if(!is_dir($dir.$proj.'/'.$subfolder.'/'.$ssubfolder))
                  continue;
                ?>
                <li><a href="index.php?project=<?php echo  $proj.'&subfolder='.$subfolder.'/'.$ssubfolder; ?>"><i class="fa fa-circle-o"></i><?php echo clean_string($ssubfolder); ?> </a></li>
              <?php
               // }
             }
               ?>
              </ul>
            </li>

            <?php
              }
              ?>
            <?php
             }
            }
            ?>

             <?php
              $dir    = '../pages/public_plots/';
              $files1 = scandir($dir);
              foreach($files1 as $proj )
              {  
                if($proj == '.' or $proj == '..')
                  continue;
                if (is_dir($dir.$proj))
                {
            ?>
              <li class="header"><?php echo $proj; ?></li>   
            <?php
              $files2 = scandir($dir.$proj);

              foreach($files2 as $subfolder )
              {
                if($subfolder == '.' or $subfolder == '..')
                  continue;
            ?>
            <li class="treeview">
             <a href="#">
                  <i class="fa fa-pie-chart"></i>
                  <span><?php echo clean_string($subfolder); ?></span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <!-- TODO: Put loop here over subfolders in this directoyry -->
                <?php
              $files3 = scandir($dir.$proj.'/'.$subfolder);
              foreach($files3 as $ssubfolder )
              {
                if($ssubfolder == '.' or $ssubfolder == '..')
                  continue;
                if(!is_dir($dir.$proj.'/'.$subfolder.'/'.$ssubfolder))
                  continue;
                ?>
                <li><a href="https://jrawling.web.cern.ch/jrawling/index.php?project=<?php echo  $proj.'&subfolder='.$subfolder.'/'.$ssubfolder.'&public=1'; ?>"><i class="fa fa-circle-o"></i><?php echo clean_string($ssubfolder); ?> </a></li>
              <?php
               // }
             }
               ?>
              </ul>
            </li>

            <?php
              }
              ?>
            <?php
             }
            }
            ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo clean_string($_GET["project"]); ?>
            <small><?php echo $_GET["subfolder"]; ?></small>
          </h1>
          
        </section>

        <!-- Main content -->
        
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">

          
             <?php 
                if ( isset( $_GET['project'] ) && !empty( $_GET['project'] ) )
                  $p = str_replace("%20"," ",$_GET["project"]);

                if ( isset( $_GET['subfolder'] ) && !empty( $_GET['subfolder'] ) )
                  $s = str_replace("%20"," ",$_GET["subfolder"]);

                $dir    = '../pages/plots/'.$p.'/'.$s;
              
                if( (!isset( $_GET['project'] ))
                   && (!isset( $_GET['subfolder'] )) )
                   $dir = '../pages/info';
            
                $files1 = scandir($dir);
                $myfile = "";

                foreach($files1 as $file)
                { 
                  if(strcmp($file,"info.txt")==0){

                    $myfile = file_get_contents($dir.'/'.$file, FILE_USE_INCLUDE_PATH);
                    ?>
                      <div class="col-md-12">
                        <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="fa fa-info"></i>
                            <h3 class="box-title">Info</h3>
                          </div><!-- /.box-header -->
                        <div class="box-body">
                          <?php 
                          echo $myfile; ?>
                        </div><!-- /.box-body -->  
                    </div><!-- /.box -->
                  </div><!-- ./col -->
          
                    <?php
                  }
                }                    
            ?>  
              
           <?php
              $project = str_replace("%20"," ",$_GET["project"]);
              $subfolder = str_replace("%20"," ",$_GET["subfolder"]);
              $dir    = '../pages/plots/'.$project.'/'.$subfolder;
              if( $_GET["public"] === '1'){
                $dir    = '../pages/public_plots/'.$project.'/'.$subfolder;
              }
              else{
                $dir    = '../pages/plots/'.$project.'/'.$subfolder;
              }

              $files1 = scandir($dir);
              foreach($files1 as $file)
              {
              if (is_dir($dir.'/'.$file))
              {
                if($file == '.' or $file == '..')
                  continue;
              ?>
            <!-- Small boxes (Stat box) -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
             
                <div class="small-box bg-green">
                  <div class="inner">
                    <h2><?php echo clean_string($file)."<br/>"; ?></h2>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="index.php?project=<?php echo  $project.'&subfolder='.$subfolder.'/'.$file; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->
          <?php
              }   
          else if(is_file($dir.'/'.$file) and (strpos($file, '.png') !== FALSE) ){
          ?>

             <!-- Left col -->
            <div class="col-md-6" >
              <!-- MAP & BOX PANE -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title"><strong>
                  <?php
                   echo clean_string($file); ?></strong></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <!-- Map will be created here -->
                       <a target="_blank" href="https://jrawling.web.cern.ch/jrawling/easyPlot/<?php echo $dir.'/'.$file;?>"><img src="<?php echo $dir.'/'.$file;?>"
                              width="130%" height="130%" /></a>
                    </div><!-- /.col --> 
                  </div><!-- /.box-body -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          <?php
           }
          }
          ?>
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2017 <a href="http://jrawling.web.cern.ch/jrawling/">Jacob Rawling</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparklin../e -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectorm../ap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery K../nob Chart -->
    <script src="../plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterang../epicker -->
    <script src="../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepick../er -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstra../p WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscro/ll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClic../k -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE../ App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>

       