<form id="answerForm" class="p-4">

    @foreach ($survey->surveyQuestions as $question)

        <div class="form-group">
            <label for="answer">{{$question->title}}</label>
            <textarea class="form-control" name="answer[{{$question->id}}][]" placeholder="Write your answer" rows="4" cols="50"></textarea>
        </div>
    
    @endforeach
        
    <button type="submit" class="btn btn-info mt-3">Submit</button>
</form>