<!-- Blade Form: Shark Level Submission -->
<form method="POST" action="{{ route('sharks.store') }}">
    @csrf

    <!-- Name Field -->
    <div>
        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    </div>

    <!-- Email Field -->
    <div>
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>

    <!-- Shark Level Dropdown -->
    <div>
        <label for="shark_level">Select your preferred shark level:</label>
        <select name="shark_level" id="shark_level" required>
            <option value="0">Select a Level</option>
            <option value="1">Sees Sunlight</option>
            <option value="2">Foosball Fanatic</option>
            <option value="3">Basement Dweller</option>
       
        </select>
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
