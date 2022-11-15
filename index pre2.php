<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery Close Bootstrap Modal Window on Button Click</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<style>
    .bs-example{
        margin: 20px;
    }
</style>
</head>
<body>
<div class="bs-example">
    <div id="fontGroupEditModal" class="modal fade" tabindex="-1">
        <div style="width:90%;margin:20px auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>This is a simple Bootstrap modal. Click the "Close button", "cross icon" or "dark gray area" to close or hide the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Close Modal</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="script.js"></script>
<script>
    $(document).ready(function(){
        // Open modal on page load
        $("#fontGroupEditModal").modal('show');
 
        // Close modal on button click
        $(".btn").click(function(){
            $("#fontGroupEditModal").modal('hide');
        });
    });
</script>
</body>
</html>