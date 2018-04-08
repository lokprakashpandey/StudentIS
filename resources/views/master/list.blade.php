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
                <a class="navbar-brand" href="{!! url('masterlogout') !!}">Logout</a>
            </div>
            <!-- /.navbar-header -->            
        </nav>

        <div>
            <div class="row">
                <div class="col-lg-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {!! session('status') !!}
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">                
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div>
        
            <div class="container">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>S.N.</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Full Name</td>
                        <td>Gender</td>
                        <td>Program</td>
                        <td>Semester</td>
                        <td>Section</td>
                        <td>Picture</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>  
                    @foreach($joinedusers as $index=>$user)
                    <tr>
                        <td>{!! $index+1 !!}</td>
                        <td>{!!$user->name!!}</td>
                        <td>{!!$user->email!!}</td>
                        <td>{!!$user->fullname!!}</td>
                        <td>{!!$user->gender!!}</td>
                        <td>@if($user->fk_programid === 1)
                            BIT
                            @else
                            BSc CSIT
                            @endif
                        </td>
                        <td>@if($user->fk_semesterid === 1)
                            Sem I
                            @elseif($user->fk_semesterid === 2)
                            Sem II
                            @elseif($user->fk_semesterid === 3)
                            Sem III
                            @elseif($user->fk_semesterid === 4)
                            Sem IV
                            @elseif($user->fk_semesterid === 5)
                            Sem V
                            @elseif($user->fk_semesterid === 6)
                            Sem VI
                            @elseif($user->fk_semesterid === 7)
                            Sem VII
                            @else
                            Sem VIII
                            @endif
                        </td>
                        <td>@if($user->fk_sectionid === 1)
                            A
                            @else
                            B
                            @endif
                        </td>
                        <td><img src="{!! URL::asset('/uploads/'.$user->path) !!}" height="100" width="100"></td>
                        <td>
                            <a href="{!!url('editStudent')!!}/{!!$user->id!!}">Edit</a> |
                            <a href="{!!url('deleteStudent')!!}/{!!$user->id!!}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
