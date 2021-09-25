<form id="surveyForm" action="{{$form_action}}" method="{{$form_method}}">
    @csrf
    <div class="card-body">
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label required">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="{{@$survey->title}}" placeholder="Enter title..">
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" placeholder="Enter description.." rows="4" cols="50">{{@$survey->description}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="display_order" class="col-sm-2 col-form-label required">Display Order</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="display_order" name="display_order" value="{{@$survey->display_order}}" placeholder="Enter display order..">
            </div>
        </div>
    
    </div>

    <div class="card-footer">
        <button type="submit" class="btn {{$form_btn_class}} btn-sm">{{$form_btn}} <i class="fa {{$form_btn_icon}} fa-xs" aria-hidden="true"></i></button>
        <a href="{{ url('admin/survey') }}" type="submit" class="btn btn-default btn-sm ml-2">Back <i class="fa fa-arrow-left fa-xs" aria-hidden="true"></i></a>
    </div>
</form>