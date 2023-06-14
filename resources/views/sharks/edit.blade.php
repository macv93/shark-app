<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('sharks') }}">shark Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('sharks') }}">View All sharks</a></li>
        <li><a href="{{ URL::to('sharks/create') }}">Create a shark</a>
    </ul>
</nav>

<h1>Edit {{ $shark->name }}</h1>

<!-- Blade Form: Shark Level Submission -->
<form method="POST" action="{{ route('sharks.update', $shark->id) }}">
    @method('PUT')
    @csrf

    <!-- Name Field -->
    <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name" value="{{ $shark->name }}" required>
    </div>

    <!-- Email Field -->
    <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" value="{{ $shark->email }}" required>
    </div>

    <!-- Shark Level Dropdown -->
    <div class="form-group">
        <label for="shark_level">Select your preferred shark level:</label>
        <select name="shark_level" id="shark_level" required>
            <option {{$shark->shark_level == 0 ? 'selected' : ''}} value="0">Select a Level</option>
            <option {{$shark->shark_level == 1 ? 'selected' : ''}} value="1">Sees Sunlight</option>
            <option {{$shark->shark_level == 2 ? 'selected' : ''}} value="2">Foosball Fanatic</option>
            <option {{$shark->shark_level == 3 ? 'selected' : ''}} value="3">Basement Dweller</option>
       
        </select>
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit">Submit</button>
    </div>
</form>

</div>
</body>
</html>