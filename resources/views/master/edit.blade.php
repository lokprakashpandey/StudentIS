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
                <form method="post" action="{!!url('updateStudent')!!}/{!!$user->id!!}" enctype="multipart/form-data">
                    {{csrf_field()}}
                <label>Username:</label>
                    <input type="text" name="username" value="{{$user->name}}">
                    <br/>
                <label>Email:</label>
                    <input type="email" name="email" value="{{$user->email}}">
                    <br/>
                <label>Password:</label>
                    <input type="password" name="password" value="{{$user->password}}">
                    <br/>
                <label>Full Name:</label>
                    <input name="fullname" type="text" value="{{$profile->fullname}}" />
                    <br/>          
                <label>Gender:</label>
                @if($profile->gender === "M")
                    <input type="radio" name="gender" value="M" checked="checked">Male
                    <input type="radio" name="gender" value="F">Female
                @else
                    <input type="radio" name="gender" value="M">Male
                    <input type="radio" name="gender" value="F" checked="checked">Female
                @endif

                    <br/>
                <label>Program</label>
                    <select name="programid">
                        @foreach($programs as $program)
                            @if($program->id == $profile->fk_programid)
                                <option value="{{$program->id}}" selected="selected">{{$program->programname}}</option>
                            @else
                                <option value="{{$program->id}}">{{$program->programname}}</option>
                            @endif
                        @endforeach
                    </select>
                    <br/>
                <label>Semester</label>
                    <select name="semesterid">                
                        @foreach($semesters as $semester)
                            @if($semester->id == $profile->fk_semesterid)
                                <option value="{{$semester->id}}" selected="selected">{{$semester->semestername}}</option>
                            @else
                                <option value="{{$semester->id}}">{{$semester->semestername}}</option>
                            @endif
                        @endforeach
                    </select>
                    <br/>
                <label>Section</label>
                    <select name="sectionid"> 
                        @foreach($sections as $section)
                            @if($section->id == $profile->fk_sectionid)
                                <option value="{{$section->id}}" selected="selected">{{$section->sectionname}}</option>
                            @else
                                <option value="{{$section->id}}">{{$section->sectionname}}</option>
                            @endif
                        @endforeach
                    </select>
                    <br/>

                    <img src="{{ URL::asset('uploads/'.$picture->path) }}" height="100" width="100">
                    <br/>
                    <label>Update picture:</label>
                        <input type="file" name="pic"/>
                        <br/>
                <button>Update</button>
            </form>
                <button onclick="location.href='{{url('listStudent')}}'">It's fine</button> 
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
