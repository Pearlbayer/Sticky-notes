<!DOCTYPE html>
<html>
<head>
    <title>Sticky Notes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }
        .note-card {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
        }
        .note-card.yellow { background-color: #fef08a; }
        .note-card.blue { background-color: #bfdbfe; }
        .note-card.green { background-color: #bbf7d0; }
        .note-card.pink { background-color: #fbcfe8; }
        .note-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            padding-bottom: 5px;
        }
        .note-content {
            font-size: 14px;
            margin-bottom: 15px;
        }
        .actions {
            text-align: right;
        }
        .btn-edit, .btn-delete {
            margin-left: 10px;
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }
        .btn-edit { color: #2b6cb0; }
        .btn-delete { color: #c53030; }
        .alert-success {
            padding: 10px;
            background-color: #c6f6d5;
            margin-bottom: 15px;
            border-left: 4px solid #38a169;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sticky Notes</h1>
        <a href="{{ route('notes.create') }}">+ New Note</a>
    </div>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="grid">
        @foreach ($notes as $note)
        <div class="note-card {{ $note->color }}">
            <div class="note-title">{{ $note->title }}</div>
            <div class="note-content">{{ $note->content }}</div>
            <div class="actions">
                <a href="{{ route('notes.edit', $note->id) }}" class="btn-edit">Edit</a>
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this note?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>