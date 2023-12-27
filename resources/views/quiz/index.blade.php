<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
</head>
<body>
    <h1>Quiz</h1>
    <form method="POST" action="{{ route('quiz.submit') }}">
        @csrf
        @foreach ($questions as $question)
            <div>
                <p>{{ $question->question_text }}</p>
                <select name="answer[{{ $question->id }}]">
                    <option value="" selected disabled>Select an answer</option>
                    @foreach ($question->answers as $answer)
                        <option value="{{ $answer->answer_text }}">{{ $answer->answer_text }}</option>
                    @endforeach
                </select>
            </div>
        @endforeach
        <button type="submit">Submit</button>
    </form>
</body>
</html>
