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
    <div class="container-fluid">
    <div class="multiple">
        <label for="">Upload nhiều</label>
         <div class="row">
            <?php   
            $multiple = glob('images/multiple/*');
            if($multiple != NULL){    
                foreach($multiple as $key => $val) {
            ?>
                <div class="col-auto">
                <button class="remove" type="button" onclick="xoa(this,'<?=$val ?>')" >XOÁ</button>
                    <img src="<?=$val ?>" alt="">
                </div>
             <?php  
                 }
            }
             ?>
         </div>
    </div>
    <div class="multiple">
        <label for="">Upload đơn</label>
         <div class="row">
            <?php   
            $single = glob('images/single/*');
            if($single != NULL){    
                foreach($single as $key => $val) {
            ?>
                <div class="col-auto">
                <button class="remove" type="button" onclick="xoa(this,'<?=$val ?>')" >XOÁ</button>
                    <img src="<?=$val ?>" alt="">
                </div>
             <?php  
                 }
            }
             ?>
         </div>
    </div>       
    </div>
   
  <style>
      .remove
      {
        padding: 8px 15px;
        background: gray;
        color: white;
        position: absolute;
        right: 15px;
        top: 0;
     }
      img{
          width: 100%;
          height: 250px;
          object-fit: cover;
      }
  </style>
    <script>
        function xoa(_this,filename) { 
            $(_this).parent().remove();
            $.ajax({
                type: "POST",
                url: "remove.php",
                data: {name: filename},
                success: function (response) {
                    
                }
            });
         }
    </script>
</body>
</html>