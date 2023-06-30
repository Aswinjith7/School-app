<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>

<body>
    <form action="{{route('student.update', $student->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="p-2">
            <label for="fname">First Name: </label>
            <input type="text" name="fname" id="fname" value="{{ $student->first_name }}"><br>
        </div>
        <div class="p-2">
            <label for="lname">Last Name: </label>
            <input type="text" name="lname" id="lname" value="{{ $student->last_name }}"><br>
        </div>
        <div class="p-2">
            <label for="school">School: </label>
            <select name="school" id="school">
                <option value=" " disabled selected>Select</option>
                @foreach ($schools as $school)
                    <option value="{{$school->id}}" @if($student->school_id == $school->id) selected @endif>{{$school->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="p-2">
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" value="{{ $student->email }}"><br>
        </div>
        <div class="p-2">
            <label for="phone">Phone: </label>
            <input type="text" name="phone" id="phone" value="{{ $student->phone }}"><br>
        </div>
        <button class="p-2 btn btn-success">UPDATE</button>
    </form>
</body>

</html>
