{!!Form::open(array('url'=>'store','method'=>'post','enctype'=>'multipart/form-data'))!!}
        <label>Full Name:</label>
            <input placeholder="Full Name" name="fullname" type="text"/>
            <br/>          
        <label>Gender:</label>
            <input type="radio" name="gender" value="M">Male
            <input type="radio" name="gender" value="F">Female  
            <br/>
        <label>Program</label>
            <select name="programid"> 
                <option>Select Program</option>
                
                @foreach($programs as $program)
                <option value="{{$program->id}}">{{$program->programname}}</option>
                @endforeach
            </select>
            <br/>
        <label>Semester</label>
            <select name="semesterid"> 
                <option>Select Semester</option>
                
                @foreach($semesters as $semester)
                <option value="{{$semester->id}}">{{$semester->semestername}}</option>
                @endforeach
            </select>
            <br/>
        <label>Section</label>
            <select name="sectionid"> 
                <option>Select Section</option>
                
                @foreach($sections as $section)
                <option value="{{$section->id}}">{{$section->sectionname}}</option>
                @endforeach
            </select>
            <br/>
            <label>Upload picture:</label>
                <input type="file" name="pic"/>
                <br/>
            <input type="hidden" name="id" value="{{$id}}">
        <button>Add</button> 
    {!!Form::close()!!}