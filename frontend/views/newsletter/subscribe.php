<?php


if ($model-> hasErrors()){
    echo "<pre>";
    print_r($model->getErrors());
    echo "</pre>";
}


?>
<form method="post">

    <p> Email: </p>
    <input type="text" name="email" />
    <br><br>
    <input type="submit" />

</form>
