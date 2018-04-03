{!!Form::open(array('url'=>'update','method'=>'post','enctype'=>'multipart/form-data'))!!}

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


            <img src="{{ URL::asset('uploads/'.$picture->path) }}">
            <label>Update picture:</label>
                <input type="file" name="pic"/>
                <br/>
            <input type="hidden" name="id" value="{{$id}}">
        <button>Update</button> 
    {!!Form::close()!!}