<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    
  <!-- Font add section -->
  <div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fontAddModal">Add Font</button>
    <!-- Font list -->
    <h2>Our Fonts</h2>    
    <div id="fontTable"> 
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Font Name</th>
            <th>Preview</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="fontdata">
        </tbody>
      </table>
    </div>
  </div>
  <br><br>
  <!-- Create Font Group Section -->
  <div>
    <h2>Create Font Group</h2>
    <form id="createFontGroup" method="post">
    <div> 
      <div class="alert alert-warning d-none error"></div>
      <div class="form-group">
        <input type="text" class="form-control" name="group_title" id="group_title" placeholder="Group Title">
        <input type="hidden" name="confirm_status" id="confirm_status" value="0">
      </div>
      <table class="table table-striped font-group-table" id="fontGroupTable">
        <!-- <thead>
          <tr>
            <th>Font Name</th>
            <th>Preview</th>
            <th></th>
          </tr>
        </thead> -->
        <!-- <tbody class="font_group_data"> -->
          <tr class="line-row" id="lineBranch1">
            <td class="form-group">
              <input type="text" class="form-control" name="font_name[]" id="font_name-1" placeholder="Font Name">
            </td>
            <td class="form-group">
              <select class="form-select form-control select-font" aria-label="Default select example" name="font_id[]" id="font_id-1">
               
              </select>
            </td>
            <td class="form-group">
              <input type="text" readonly class="form-control" name="specific_size[]" placeholder="Specific Size">
            </td>
            <td class="form-group">
              <input type="text" readonly class="form-control" name="price_change[]" placeholder="Price Chage">
            </td>
          </tr>
        <!-- </tbody> -->
      </table>
      <div class="row">
        <div class="col-md-6">
          <button type="button" class="btn btn-primary" style="color:#000;background-color:#fff" onclick="add_row()">+ Add Row</button>
        </div>
        <div class="col-md-6">
          <button type="button" class="btn btn-primary" style="float:right;" onclick="createFontGroup()">Create</button>
        </div>
      </div>
    </div>
    </form>
  </div>
  <br><br>
  <!-- Font group section -->
  <div>
    <h2>Our Font Groups</h2>    
    <div id="fontGroupListTable">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Fonts</th>
            <th>Count</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="font-group-data">
        </tbody>
      </table>
    </div>
  </div>

</div>





<!-- Font add Modal -->
<div class="modal fade" id="fontAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="addFont" enctype="multipart/form-data" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Font</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning d-none"></div>
        <!-- <div class="form-group">
          <label for="exampleInputEmail1">Font Name</label>
          <input type="text" class="form-control" name="font_name" id="font_name" placeholder="Enter Font Name">
        </div> -->
        <div class="form-group">
          <input type="file" class="form-control dropify_" name="font" id="font" placeholder="Enter Font">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="addFont()" data-dismiss="modal">Save changes</button>
      </div>
    </div>
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
    </form>
  </div>
</div>



<!-- Font group edit Modal -->
<div class="modal fade" id="fontGroupEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="fontGroupEditId" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Font Group</h5>
        <button type="button" class="close" data-dismiss="modal" onclick="hideFontGroupEditModal(event.preventDefault())" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning d-none"></div>
        <form id="editFontGroup" method="post">
        <div> 
          <div class="form-group">
            <input type="text" class="form-control" name="group_title_edit" id="group_title_edit" placeholder="Group Title">
            <input type="hidden" class="form-control" name="group_id" id="group_id">
          </div>
          <table class="table table-striped font-group-table" id="fontGroupEditTable">
            
              <!-- <tr class="line-row-edit" id="lineBranchEdit1">
                <td class="form-group">
                  <input type="text" class="form-control" name="font_name_edit[]" id="font_name_edit-1" placeholder="Font Name">
                </td>
                <td class="form-group">
                  <select class="form-select form-control select-font" aria-label="Default select example" name="font_id_edit[]" id="font_id_edit-1">
                  
                  </select>
                </td>
                <td class="form-group">
                  <input type="text" readonly class="form-control" name="specific_size_edit[]" placeholder="Specific Size">
                </td>
                <td class="form-group">
                  <input type="text" readonly class="form-control" name="price_change_edit[]" placeholder="Price Chage">
                </td>
              </tr> -->
          </table>
          <div class="row">
            <div class="col-md-6">
              <button type="button" class="btn btn-primary" style="color:#000;background-color:#fff" onclick="add_row_edit()">+ Add Row</button>
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-primary" style="float:right;" onclick="updateFontGroup()" data-dismiss="modal">Update</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>