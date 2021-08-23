<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Upload-image/Uploads.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="./Upload-image/Uploads.js" ></script>
</head>

<body>
    <form action="upload.php" enctype="multipart/form-data" method="post">
      <div class="container">
          <button class="send" type="submit">Upload</button>
          <a class="view" target="_blank" href="images.php">Xem hình</a>
            <div class="row mb-20 ">
                <div class="col-md-4">
                    <label for="">DEMO 1 (Upload 1 hình), tối đa 1MB</label>
                    <div class="logo_image">
                        <div>
                            <input type="file" name="image1" class="UploadImage"  />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">DEMO 2 (Upload 1 hình), tối đa 4MB</label>
                    <div class="logo_image">
                        <div>
                            <input type="file" name="image2" class="UploadImage2"  />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">DEMO 3 (Upload 1 file), tối đa 2MB</label>
                    <div class="logo_image">
                        <div>
                            <input type="file" name="file" class="UploadFile3"  />
                        </div>
                    </div>
                </div>
            </div>       
            <div class="box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">DEMO 1 (Upload nhiều hình), tối đa 2MB</label>
                            <div  class="Test">
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>   
      </div>
    </form>
    <style>
    .view,.send
    {
        padding: 8px 15px;
        background: gray;
        color: white;
    }
    form
    {
        padding: 20px 0px;
    }
    .mb-20 
    {
        margin-bottom: 20px;
    }
    </style>
    <script>
       
        $(document).ready(function() {
            $('.UploadImage').Upload_Single(
            {
                inputFileName   : "image",
                urlValidate     : "validate.php",
                defaultValidate : true,     // true là validate bằng ajax request tới server
                allowExtension  : [{ext: "jpg",mime:"image/jpeg"},{ext: "png",mime:"image/png"}],
                alertExtension  : "Vui lòng chọn jpg, png",
                alertMaxsize    : "File không vượt quá 0.2MB",
                maxSize         : 1
            });
        //=======================
        $('.UploadImage2').Upload_Single(
        {
            inputFileName   : "image2",
            urlValidate     : "validate.php",
            defaultValidate : true,         // true là validate bằng ajax request tới server
            allowExtension  : [{ext: "jpg",mime:"image/jpeg"},{ext: "png",mime:"image/png"}],
            alertExtension  : "Vui lòng chọn jpg, png",
            alertMaxsize    : "File không vượt quá 2MB",
            maxSize         : 4
        });
        //=======================
        $('.UploadFile3').Upload_Single(
        {
            inputFileName   : "file",
            urlValidate     : "validate.php",
            defaultValidate : true,         // true là validate bằng ajax request tới server
            allowExtension  : [{ext: "pdf",mime:"application/pdf"},{ext: "xls",mime:"application/vnd.ms-excel"}],
            alertExtension  : "Vui lòng chọn pdf, docx",
            alertMaxsize    : "File không vượt quá 2MB",
            maxSize         : 2
        });

        //============== UPLOAD NHIỀU HÌNH ==============
            $('.Test').Upload_Multiple({
                maxImage: 8,
                classInputFile: "multileImage",
                inputName: "image_more",                 // input name phải khác
                urlValidate: "validate.php",
                inputCountFiles: "input1_count",    // input name cho bộ đếm phải khác
                defaultValidate: true,
                textUpload: "(click để tải ảnh hoặc kéo thả vào đây)",
                allowExtension: [{ ext: "jpg",  mime: "image/jpeg" }, { ext: "png", mime: "image/png" }],
                alertExtension: "Vui lòng chọn file hình png,jpg",
                alertMaxsize: "File không vượt quá 2MB",
                maxSize: 10
            });

        });
      
    </script>
</body>
</html>