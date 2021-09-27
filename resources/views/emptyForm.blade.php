<form id="" action="" method="">
    @csrf
    <div class="card-body">
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label required">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" name="" value="" placeholder="">
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="" name="" placeholder="" rows="4" cols="50"></textarea>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-default btn-sm">Create <i class="fa fa-plus fa-xs" aria-hidden="true"></i></button>
        <a href="#" type="submit" class="btn btn-default btn-sm ml-2">Back <i class="fa fa-arrow-left fa-xs" aria-hidden="true"></i></a>
    </div>
</form>