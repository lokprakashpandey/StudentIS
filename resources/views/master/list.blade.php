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
            <table class="table table-bordered table-condensed table-hover">
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
                @foreach($joinedusers as $index=>$user)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->fullname}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->fk_programid}}</td>
                    <td>{{$user->fk_semesterid}}</td>
                    <td>{{$user->fk_sectionid}}</td>
                    <td><img src="{{ URL::asset('/uploads/'.$user->path) }}" height="100" width="100"></td>
                    <td>
                        <a href="{{url('edit')}}/{{$user->id}}">Edit</a>
                        <a href="{{url('delete')}}/{{$user->id}}">Delete</a>
                    </td>s
                </tr>
                @endforeach
            </table>
    </div>
</body>

</html>
