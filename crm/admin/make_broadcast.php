<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Admin | User Broadcast </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="assets/vendor/select2/css/select2.css">
<link rel="stylesheet" href="assets/vendor/summernote/css/summernote-bs4.css">
<link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
<link rel="stylesheet" href="assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />

</head>
<body class="">
<?php include("header.php");?>
<div class="page-container row">

      <?php include("leftbar.php");?>

      <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
      <ul class="breadcrumb">
        <li>
          <a href ="#">YOU ARE HERE</a>
        </li>
        <li><a href="broadcast.php" class="active">Broadcast Email</a> </li>
        <li><a href="#" class="active">Buat Broadcast</a> </li>
      </ul>
      <!-- <div class="page-title"> <i href ="broadcast.php"class="icon-custom-left"></i>
        <h3>Manage Broadcast Email</h3>
      </div> -->
      <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="main-content container-fluid p-0">
                <div style="padding: 5px 30px;">
                  <h1>Compose New Broadcast</h1>
                  <hr />
                  <form method="post" action="send2_broadcast.php" enctype="multipart/form-data">
                    <div class="to">
                        <div class="form-group row pt-2">
                            <label class="col-md-1 control-label">To:</label>
                            <div class="col-md-11">ALL CUSTOMER
                                <!-- <input class="form-control" style="margin-top:0.10em" type="email" name="email_penerima" placeholder="Email Penerima"> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div style="margin-bottom: 10px;">
                <label>Kepada : </label>
                <input type="email" name="email_penerima" placeholder="Email Penerima" style="margin-top: 5px;width: 400px" />
              </div> -->
              <div class="subject">
                  <div class="form-group row pt-2">
                      <label class="col-md-1 control-label">Subject:</label>
                      <div class="col-md-11">
                          <input class="form-control" style="margin-top:0.10em" type="text" name="subjek" placeholder="Subjek">
                      </div>
                  </div>
              </div>
              <!-- <div style="margin-bottom: 10px;">
                <label>Subjek : </label>
                <input type="text" name="subjek" placeholder="Subjek" style="margin-top: 5px;width: 400px" />
              </div> -->
              <div class="email editor">
                  <div class="col-md-12 p-0">
                      <div class="form-group">
                          <label class="control-label sr-only" for="summernote">Descriptions </label>
                          <div class="container-fluid">
                              <textarea class="form-control" id="summernote" name="pesan" rows="6" placeholder="Pesan"></textarea>
                          </div>
                      </div>
                  </div>
                </div>
              <!-- <div style="margin-bottom: 10px;">
                <label>Pesan</label><br />
                <textarea name="pesan" placeholder="Pesan" rows="8" style="margin-top: 5px;width: 400px"></textarea>
              </div> -->
              <div class="attachment">
                  <div class="form-group row pt-2">
                      <label class="col-md-1 control-label">Attachment:</label>
                      <div class="col-md-11">
                          <input style="margin-top:0.10em" type="file" name="attachment">
                      </div>
                  </div>
              </div>
              <!-- <div style="margin-bottom: 20px;">
                <label>Attachment</label><br />
                <input type="file" name="attachment" style="margin-top: 5px;width: 400px" />
              </div> -->
              <hr />
              <button type="submit"class="btn btn-info">KIRIM BROADCAST</button>
              </form>
            </div>




                <!-- <div class="email-compose-fields">
                    <div class="to">
                        <div class="form-group row pt-0">
                            <label class="col-md-1 control-label">To:</label>
                            <div class="col-md-11">
                                <form action="send_broadcast.php" method="POST">
                                    <div class="row" style="margin-top:0.5em;">
                                       -->
                                      <!-- <label class="custom-control custom-checkbox pt-0">
                                          <input type="checkbox" name="email_penerima" value=all class="custom-control-input">
                                          <span class="custom-control-label">All
                                          </span>
                                      </label>
                                      <label class="custom-control custom-checkbox pt-0">
                                          <input type="checkbox" name="email_penerima" value=priority class="custom-control-input">
                                          <span class="custom-control-label">Priority Customer
                                          </span>
                                      </label>
                                      <label class="custom-control custom-checkbox pt-0">
                                          <input type="checkbox" name="email_penerima" value=average class="custom-control-input">
                                          <span class="custom-control-label">Average Customer
                                          </span>
                                      </label>
                                      <label class="custom-control custom-checkbox pt-0">
                                          <input type="checkbox" name="email_penerima" value=low class="custom-control-input">
                                          <span class="custom-control-label">Low Customer
                                          </span>
                                      </label> -->
                                        <!-- <php
                                        $user_sql = "SELECT id, name FROM `user`";
                                        $user_query = mysqli_query($con, $user_sql);
                                        while ($user_object = mysqli_fetch_assoc($user_query)) {
                                            ?>

                                            <div class="col-md-4">
                                                <label class="custom-control custom-checkbox pt-0">
                                                    <input type="checkbox" name="email_penerima" value=<php echo $user_object["id"] ?> class="custom-control-input">
                                                    <span class="custom-control-label">
                                                        <php echo $user_object['name']; ?>
                                                    </span>
                                                </label>
                                            </div>

                                        <php
                                        }
                                        ?> -->
                                    <!-- </div>
                            </div>
                        </div>
                    </div>
                    <div class="subject">
                        <div class="form-group row pt-2">
                            <label class="col-md-1 control-label">Subject:</label>
                            <div class="col-md-11">
                                <input class="form-control" style="margin-top:0.10em" type="text" name="subject">
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="form-group row pt-3">
                        <label class="col-md-1">Date: </label>
                        <div class="input-group date col-md-5" id="start_date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#start_date" name="tanggal_start" placeholder="Tanggal mulai Campaign" />
                                <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                    </div> -->
                <!-- </div>

                <div class="email editor">
                    <div class="col-md-12 p-0">
                        <div class="form-group">
                            <label class="control-label sr-only" for="summernote">Descriptions </label>
                            <div class="container-fluid">
                                <textarea class="form-control" id="summernote" name="editordata" rows="6" placeholder="Write Descriptions"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="email action-send">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <button class="btn btn-primary btn-space" type="submit"><i class="icon s7-mail"></i> Send</button>
                                <button class="btn btn-secondary btn-space" type="button"><i class="icon s7-close"></i> Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div> -->
     </div>
  </div>
<!-- BEGIN CHAT -->

</div>

<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="assets/js/datatables.js" type="text/javascript"></script>
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/chat.js" type="text/javascript"></script>
<script src="assets/js/demo.js" type="text/javascript"></script>
<script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="./assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="./assets/vendor/select2/js/select2.min.js"></script>
<script src="./assets/vendor/summernote/js/summernote-bs4.js"></script>
<script src="./assets/libs/js/main-js.js"></script>
<script src="./assets/vendor/datepicker/moment.js"></script>
<script src="./assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
<script src="./assets/vendor/datepicker/datepicker.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            tags: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300

        });
    });
</script>
<script>
<?php
  if(isset($_GET["alert"])){
    echo("alert('The broadcast message has been sent')");
  }
?>
</script>
</body>
</html>
