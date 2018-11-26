<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Leads</title>
      <!-- Bootstrap core CSS-->
      {{ Html::style('css/bootstrap.min.css') }}
      <!-- Custom fonts for this template-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
      <!-- Page level plugin CSS-->
      <!-- Custom styles for this template-->
      {{ Html::style('css/sb-admin.css') }}
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/javascript">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
      <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
      <link rel="stylesheet" tyle="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css" type="text/javascript">
      <style>
         html{
         scroll-behavior: smooth;
         }
         .bg-blue{
         background-color: #0C75CB;
         }
         .hidden {
         display: none;
         }
      </style>
   </head>
   <body id="page-top">
      @include('layouts.nav')
      <div id="wrapper">
         <!-- Sidebar -->
         @include('layouts.sidebar')
         <div id="content-wrapper" style="padding:10px;">
            <div class="container-fluid">
               <!-- Breadcrumbs-->
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Overview</li>
               </ol>
               {{ Html::script('js/script.js') }}
               <style>
                  .dataTables_length {
                  margin-top:20px;
                  }
                  div.dt-buttons {
                  position: relative;
                  float: left;
                  margin-left: 20px;
                  margin-top:12px;
                  font-size:16px;
                  font-weight:bold;
                  }
                  .dataTables_filter {
                  margin-top:20px;
                  }
                  .tbl{
                  overflow-x:scroll;
                  }
                  ::-webkit-scrollbar{
                  height: 7px;
                  width: 7px;
                  color:#1275C9;
                  background: #1275C9;
                  }
                  ::-webkit-scrollbar-thumb:horizontal{
                  background: #97CB18;
                  border-radius: 10px;
                  }
                  ::-webkit-scrollbar-thumb:vertical{
                  background: #97CB18;
                  border-radius: 10px;
                  }
                  tr {
                  font-weight: normal;  
                  }
                  #myDIV {
                  width: 700px;
                  padding: 50px 30px;
                  text-align: center;
                  margin-top: 20px;
                  display: inline-block;
                  border-radius: 10px;
                  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                  }
               </style>
               <!-- <button class="btn btn-success" onclick="myFunction()">Send CSV</button> -->
               <center>
                  <div id="myDIV" style="display: none;">
                     <h2 style="font-family: 'Raleway';font-size: 50px;">Send CSV File</h2>
                     <br><br>
                     <form method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                           <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                           <div class="col-sm-10" style="margin-bottom: 30px;">
                              <input type="email" name="email"class="form-control form-control-lg" id="colFormLabelLg" placeholder="recipient@mail.com">
                           </div>
                           <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Subject</label>
                           <div class="col-sm-10" style="margin-bottom: 30px;">
                              <input type="text" name="subject"class="form-control form-control-lg" id="colFormLabelLg" placeholder="Subject">
                           </div>
                           <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Message</label>
                           <div class="col-sm-10" style="margin-bottom: 30px;">
                              <input type="text" name="message"class="form-control form-control-lg" id="colFormLabelLg" placeholder="Message...">
                           </div>
                           <label for="csv" class="col-sm-2 col-form-label col-form-label-lg">Select CSV</label>
                           <div class="col-sm-10">
                              <input type="file" name="csv" id="csv">
                           </div>
                        </div>
                        <input class="btn btn-primary" name="submit" type="submit" onclick="display()" value="Submit">
                     </form>
                  </div>
                  <br><br>
               </center>
               <div class="row tbl">
                  <table id="example" class="display table table-striped table-bordered" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Service Region</th>
                           <th>Partner ID</th>
                           <th>Created Date</th>
                           <th>Priority</th>
                           <th>Activity Number</th>
                           <th>Activity Status</th>
                           <th>Reason Code</th>
                           <th>Dwelling Type</th>
                           <th>Activity Created Date(MT)</th>
                           <th>Last Updated Date(MT)</th>
                           <th>Early Start Date(Rgn)</th>
                           <th>Activity Due Date</th>
                           <th>Order Sub Type</th>
                           <th>Account Type</th>
                           <th>Cust Acct Number</th>
                           <th>Cust Full Name</th>
                           <th>Main Phone</th>
                           <th>Service Addr #</th>
                           <th>Service Address</th>
                           <th>Service Address Line 2</th>
                           <th>Service Address Line 3</th>
                           <th>Service City</th>
                           <th>Service State</th>
                           <th>Service Zip5</th>
                           <th>Email</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>ID</th>
                           <th>Service Region</th>
                           <th>Partner ID</th>
                           <th>Created Date</th>
                           <th>Priority</th>
                           <th>Activity Number</th>
                           <th>Activity Status</th>
                           <th>Reason Code</th>
                           <th>Dwelling Type</th>
                           <th>Activity Created Date(MT)</th>
                           <th>Last Updated Date(MT)</th>
                           <th>Early Start Date(Rgn)</th>
                           <th>Activity Due Date</th>
                           <th>Order Sub Type</th>
                           <th>Account Type</th>
                           <th>Cust Acct Number</th>
                           <th>Cust Full Name</th>
                           <th>Main Phone</th>
                           <th>Service Addr #</th>
                           <th>Service Address</th>
                           <th>Service Address Line 2</th>
                           <th>Service Address Line 3</th>
                           <th>Service City</th>
                           <th>Service State</th>
                           <th>Service Zip5</th>
                           <th>Email</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
         <!-- Sticky Footer -->
         <footer class="sticky-footer">
            <div class="container my-auto">
               <div class="copyright text-center my-auto">
                  <span>Copyright ©Corporate Services Direct</span>
               </div>
            </div>
         </footer>
      </div>
      <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body" style="font-weight: normal;">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="logout.php">Logout</a>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      {{ Html::script('js/bootstrap.min.js') }}
      <!-- Custom scripts for all pages-->
      {{ Html::script('js/sb-admin.min.js') }}
   </body>
</html>