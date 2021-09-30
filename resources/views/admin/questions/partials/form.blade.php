<form id="questionsForm" action="{{$form_action}}" method="{{$form_method}}">
    @csrf
    <div class="card-body">

        <input type="hidden" name="survey_id" value="{{$_GET['survey_id']}}">

        <div class="form-group row">
            <label for="question_type" class="col-sm-2 required col-form-label">Type</label>
            <div class="col-sm-10">
                <select id="question_type" name="question_type" class="form-control">
                    <option value="">--Select--</option>
                    <option value="TextArea" {{ (@$survey_question->question_type) == 'TextArea' ? 'selected' : '' }} >TextArea</option>                        
                    <option value="Checkbox" disabled {{ (@$survey_question->question_type) == 'Checkbox' ? 'selected' : '' }}>Checkbox</option>
                    <option value="RadioButtons" disabled {{ (@$survey_question->question_type) == 'RadioButtons' ? 'selected' : '' }}>RadioButtons</option>                        
                </select>
            </div>
        </div>

        <div id="textarea_hidden" class="form-group row" style="display: none">
            <label for="title" class="col-sm-2 col-form-label">TextArea</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="title" name="title" placeholder="Enter text area.." rows="4" cols="50">{{@$survey_question->title}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="display_order" class="col-sm-2 required col-form-label">Display order</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="display_order" name="display_order" value="{{@$survey_question->display_order}}" placeholder="Enter display order..">
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn {{$form_btn_class}} btn-sm">{{$form_btn}} <i class="fa {{$form_btn_icon}} fa-xs" aria-hidden="true"></i></button>

        @if (@$survey_question)
            <a href="{{url('admin/survey_questions?survey_id='.$survey_question->getSurvey->id)}}" type="button" class="btn btn-default btn-sm">Back to Questions <i class="fa fa-arrow-left fa-xs" aria-hidden="true"></i></a>
        @else
            <a href="{{url('admin/survey_questions?survey_id='.$survey->id)}}" type="button" class="btn btn-default btn-sm">Back to Questions <i class="fa fa-arrow-left fa-xs" aria-hidden="true"></i></a>
        @endif
    </div>
</form>