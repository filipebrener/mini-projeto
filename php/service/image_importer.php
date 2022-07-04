<?php
$arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
  
if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
    http_response_code(500);
    echo "Imagem não enviada ou tipo da imagem não aceito";
    return;
}
  
if (!file_exists('../utils/uploads')) {
    mkdir('../utils/uploads', 0777);
}
  
$filename = time().'_'.$_FILES['file']['name'];
  
move_uploaded_file($_FILES['file']['tmp_name'], '../utils/uploads/'.$filename);
  
echo '../utils/uploads/'.$filename;
die;