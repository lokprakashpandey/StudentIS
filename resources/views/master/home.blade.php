<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Master Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../public/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../public/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../public/admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../public/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('masterlogout')}}">Logout</a>
            </div>
            <!-- /.navbar-header -->            
        </nav>

        <div>
            <div class="row">
                <div class="col-lg-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">                
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="col-xs-9 text-left">
                        <!-- Trigger the modal with a button -->
                            <button class="btn btn-default btn-lg" type="button" data-toggle="modal" data-target="#addModal"><i class="fa fa-edit fa-5x"></i> Add Student</button>


                            <!-- Modal -->
                              <div class="modal fade" id="addModal" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Add Student</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="post" action="{{url('addStudent')}}" enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                                <label class="control-label col-sm-3">Full Name :</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="fullname" placeholder="Enter full name:" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-3">Gender :</label>
                                                <div class="col-sm-9">
                                                    <div class="radio">
                                                      <label><input type="radio" name="gender" value="M" required>Male</label>
                                                    </div>
                                                    <div class="radio">
                                                      <label><input type="radio" name="gender" value="F">Female</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-3">Username :</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="name" placeholder="Enter username:" required>
                                                </div>
                                            </div>                                            
                                            <div class="form-group">                    
                                                <div class="input-group">
                                                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                </div>
                                                <div class="input-group">
                                                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="control-label col-sm-3">Select Program :</label>
                                               <div class="col-sm-9">
                                                  <select class="form-control" name="programid">
                                                    <option value="1">BIT</option>
                                                    <option value="2">BSc CSIT</option>
                                                  </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="control-label col-sm-3">Select Semester :</label>
                                               <div class="col-sm-9">
                                                  <select class="form-control" name="semesterid">
                                                    <option value="1">Semester I</option>
                                                    <option value="2">Semester II</option>
                                                    <option value="3">Semester III</option>
                                                    <option value="4">Semester IV</option>
                                                    <option value="5">Semester V</option>
                                                    <option value="6">Semester VI</option>
                                                    <option value="7">Semester VII</option>
                                                    <option value="8">Semester VIII</option>
                                                  </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="control-label col-sm-3">Select Section :</label>
                                               <div class="col-sm-9">
                                                  <select class="form-control" name="sectionid">
                                                    <option value="1">Section A</option>
                                                    <option value="2">Section B</option>
                                                  </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-3">Picture :</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="pic" class="btn btn-default" required>
                                                </div>
                                            </div>

                                            <div class="form-group"> 
                                                <div class="col-sm-offset-3 col-sm-9">
                                                  <button type="submit" class="btn btn-default">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="col-xs-9 text-left">
                        <form class="form-horizontal" method="post" action="{{url('listStudent')}}">
                            {!! csrf_field() !!}
                            <button class="btn btn-default btn-lg" type="submit"><i class="fa fa-table fa-5x"></i> List Students</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="col-xs-9 text-left">
                        <button class="btn btn-default btn-lg" type="button" data-toggle="modal" data-target="#search"><i class="fa fa-search fa-5x"></i> Search</button>

                        <div class="modal fade" id="search" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Search</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="post" action="{{url('countorlist')}}">
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                               <label class="control-label col-sm-2">Find the </label>
                                               <div class="col-sm-4">
                                                  <input type="radio" name="choice" value="number" onclick="myFunction1()"> number
                                                  <input type="radio" name="choice" value="name" onclick="myFunction2()"> name of
                                               </div>
                                               <div class="col-sm-3">
                                                <select class="form-control" name="gender">
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                    <option value="A">All</option>
                                                  </select>
                                               </div>
                                               <label class="control-label col-sm-3"> students in</label>
                                            </div>

                                            <div class="form-group">
                                               <label class="control-label col-sm-3">Program :</label>
                                               <div class="col-sm-9">
                                                  <select class="form-control" name="programid">
                                                    <option value="1">BIT</option>
                                                    <option value="2">BSc CSIT</option>
                                                    <option value="3">All</option>
                                                  </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="control-label col-sm-3">Semester :</label>
                                               <div class="col-sm-9">
                                                  <select class="form-control" name="semesterid">
                                                    <option value="1">Semester I</option>
                                                    <option value="2">Semester II</option>
                                                    <option value="3">Semester III</option>
                                                    <option value="4">Semester IV</option>
                                                    <option value="5">Semester V</option>
                                                    <option value="6">Semester VI</option>
                                                    <option value="7">Semester VII</option>
                                                    <option value="8">Semester VIII</option>
                                                    <option value="9">All</option>
                                                  </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="control-label col-sm-3">Section :</label>
                                               <div class="col-sm-9">
                                                  <select class="form-control" name="sectionid">
                                                    <option value="1">Section A</option>
                                                    <option value="2">Section B</option>
                                                    <option value="3">All</option>
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-offset-3 col-sm-9">
                                                  <button id="nameornumber" class="btn btn-default" type="submit">Count</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- nav pachhi ko -->
    </div><!-- /#wrapper -->

    <script>
      function myFunction1() {
          document.getElementById("nameornumber").innerHTML = "Count";
      }

      function myFunction2() {
          document.getElementById("nameornumber").innerHTML = "List";
      }

    </script>

    <!-- jQuery -->
    <script src="../public/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../public/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../public/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../public/admin/vendor/raphael/raphael.min.js"></script>
    <script src="../public/admin/vendor/morrisjs/morris.min.js"></script>
    <script src="../public/admin/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../public/admin/dist/js/sb-admin-2.js"></script>

</body>
</html>
