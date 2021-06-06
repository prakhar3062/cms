<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stellar Create Post</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="shortcut icon" href="../images/favicon.png" />
 </head>
  <script src="../ckeditor/ckeditor.js"></script> 
  <script src="../ckfinder/ckfinder.js"></script>
 <body> 
 <?php 
   require_once('../includes/config.php');
   include_once('../../vendor/copyleaks/php-plagiarism-checker/autoload.php');
   use Copyleaks\Copyleaks; 
   
   if(isset($_POST['submit'])){ 
    $copyleaks = new Copyleaks();
    $loginResult = $copyleaks->login('bestteamtrando@gmail.com','cd5c3440-2c38-44e5-9bd6-2439681d15e5');
    echo json_encode($loginResult);
     extract($_POST);
     $content=$_POST['editor'];
     $title=$_POST['articleTitle'];
     $desc=$_POST['articleDescription'];
     try{
       $sql='INSERT INTO `post` (`content`, `title`, `desc`, `added_on`, `name`) VALUES (:content, :title, :desc,current_timestamp(), :name)';
       echo $sql;
      $stmt=$db->prepare($sql);
      $stmt->execute(array(
        ':content'=>$content,
        ':title'=>$title,
        ':desc'=>$desc,
        ':name'=>$_SESSION['username'],
      )); 
      var_dump($db->errorInfo());
      header('Location:index2.php?action=added');
      exit;
    } 
    catch(PDOException $e){
        echo $e->getMessage();
    }
   }
 ?>
    <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create Post</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <h2><label for="exampleInputUsername1">Article Title</label>
                        <input type="text" name="articleTitle" style="width:100%;height:40px;" class="form-control" id="exampleInputUsername1" placeholder=""></h2>
                      </div>
                      <div class="form-group">
                        <h2><label for="exampleInputEmail1">Short Description(Meta Description)</label>
                        <textarea name="articleDescription" cols="120" rows="6" class="form-control" id="exampleInputEmail1" placeholder=""></textarea></h2>
                      </div>
                      <div class="form-group">
                        <h2><label for="exampleInputPassword1">Long Description(Body Content)</label>
                        <textarea name="editor" cols="120" rows="20" class="" id="editor" placeholder=""></textarea></h2>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Publish</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div> 
  <script>
   var editor=CKEDITOR.replace('editor');
   CKFinder.setupCKEditor(editor);
  </script>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../vendors/select2/select2.min.js"></script>
    <script src="../vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../js/typeahead.js"></script>
    <script src="../js/select2.js"></script>
    <!-- End custom js for this page -->          

</body>
</html>