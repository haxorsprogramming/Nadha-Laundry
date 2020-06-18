<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="fupForm" enctype="multipart/form-data">
    <div class="form-group">
        <label for="file">File</label>
        <input type="file" class="form-control" id="file" name="file" required />
    </div>
    <input type="submit" name="submit" class="btn btn-success submitBtn" value="SUBMIT"/>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 
$(document).ready(function(e){
    // Submit form data via Ajax
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'http://localhost/Nadha-Laundry/utility/prosesUpload',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(data){ 
                console.log(data);
            }
        });
    });
});
</script>
</body>
</html>