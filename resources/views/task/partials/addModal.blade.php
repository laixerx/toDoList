<!-- Modal -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add task</h4>
      </div>
      <div class="modal-body">
        <div class="">
          {!! Form::open(array('route' => 'task.add')) !!}
          <div class="row">
            <div class="col-md-3">
              <label class="text-right" for="title"><b>Title :</b></label>
            </div>
            <div class="col-md-9">
              <input class="form-control" type="text" placeholder="Enter Title" name="title" required>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-md-3">
              <label   class="text-right" for="description"><b>Description :</b></label>
            </div>
            <div class="col-md-9">
              <input class="form-control" type="text" placeholder="Enter Description" name="description" required>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-sm">Add</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>
