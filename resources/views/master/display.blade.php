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
                	<table class="table">
                		<tr>
                			<td>Name</td>
                			<td>Gender</td>
                		</tr>
                		@foreach($result as $r)
                		<tr>
                			<td>{{$r->fullname}}</td>
                			<td>{{$r->gender}}</td>
                		</tr>
                		@endforeach
                	</table>    
                </div>
            </div><!-- /.row -->
        </div><!-- nav pachhi ko -->
    </div><!-- /#wrapper -->

</body>
</html>
