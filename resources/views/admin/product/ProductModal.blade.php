
<!-- Modal -->
<div class="modal fade" id="myModal_category" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">

      <form class="form-horizontal" id="myForm_category" action="" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
           <label for="category_name" class="control-label col-md-3">Name *</label>
           <span class="col-md-1"> : </span>
           <div class="col-md-8">
                <input type="text" class="form-control" id="category_name" name="categoryName" required="">
                <p class="help-block" id="category_null" style="display: none;"></p>
            </div>
        </div>
        <div class="form-group">
           <label for="categoryDescription" class="control-label col-md-3">Description *</label>
           <span class="col-md-1"> : </span>
           <div class="col-md-8">
                <textarea class="form-control" id="categoryDescription" name="categoryDescription" required=""></textarea>
                <p class="help-block" id="desc_null" style="display: none;"></p>
            </div>
        </div>
      </form>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="btnSaveCategory">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal_manufacture" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">

      <form class="form-horizontal" id="myForm_manufacture" action="" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
           <label for="manufacture_name" class="control-label col-md-3">Name *</label>
           <span class="col-md-1"> : </span>
           <div class="col-md-8">
                <input type="text" class="form-control" id="manufacture_name" name="manufactureName" required="">
                <p class="help-block" id="manufacture_null" style="display: none;"></p>
            </div>
        </div>
        <div class="form-group">
           <label for="manufactureDescription" class="control-label col-md-3">Description *</label>
           <span class="col-md-1"> : </span>
           <div class="col-md-8">
                <textarea class="form-control" id="manufactureDescription" name="manufactureDescription" required=""></textarea>
                <p class="help-block" id="desc_null" style="display: none;"></p>
            </div>
        </div>
      </form>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="btnSaveManufacture">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  
</div>
</div>