<!DOCTYPE html>
<html>
<head>
    <title>Create Note</title>
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
        <h2>Create New Note</h2>
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            
            <label>Title:</label>
            <input type="text" name="title" required>

            <label>Content:</label>
            <textarea name="content" rows="4" required></textarea>

            <label>Color:</label>
            <select name="color" required>
                <option value="yellow">Yellow</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="pink">Pink</option>
            </select>

            <button type="submit">Save Note</button>
            <a href="{{ route('notes.index') }}" class="cancel">Cancel</a>
        </form>
    </div>
</body>
</html>