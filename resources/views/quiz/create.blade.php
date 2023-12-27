<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pertanyaan</title>
</head>
<body>
    <h1>Tambah Pertanyaan</h1>
    <form method="POST" action="{{ route('quiz.store') }}">
        @csrf
        <div>
            <label for="question_text">Pertanyaan:</label>
            <textarea name="question_text" id="question_text" rows="3" required></textarea>
        </div>
        <button type="submit">Simpan Pertanyaan</button>
    </form>
</body>
</html>
