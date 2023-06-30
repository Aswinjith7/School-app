<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>

<body>
    <form action="{{route('school.update', $school->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="p-2">
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" value="{{ $school->name }}"><br>
        </div>
        <div class="p-2">
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" value="{{ $school->email }}"><br>
        </div>
        <div class="p-2">
            <label for="website">Website: </label>
            <input type="text" name="website" id="website" value="{{ $school->website }}"><br>
        </div>
        <button class="p-2 btn btn-success">UPDATE</button>
    </form>
</body>

</html>
