<!DOCTYPE html>
<html>
<head>
    <title>Edit Note</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .form-box {
            max-width: 500px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            margin-top: 15px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .cancel {
            margin-left: 10px;
            text-decoration: none;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Edit Note</h2>
        <form action="{{ route('notes.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label>Title:</label>
            <input type="text" name="title" value="{{ $note->title }}" required>

            <label>Content:</label>
            <textarea name="content" rows="4" required>{{ $note->content }}</textarea>

            <label>Color:</label>
            <select name="color" required>
                <option value="yellow" {{ $note->color == 'yellow' ? 'selected' : '' }}>Yellow</option>
                <option value="blue" {{ $note->color == 'blue' ? 'selected' : '' }}>Blue</option>
                <option value="green" {{ $note->color == 'green' ? 'selected' : '' }}>Green</option>
                <option value="pink" {{ $note->color == 'pink' ? 'selected' : '' }}>Pink</option>
            </select>

            <button type="submit">Update Note</button>
            <a href="{{ route('notes.index') }}" class="cancel">Cancel</a>
        </form>
    </div>
</body>
</html>