<form method="post">
    <p> First name </p>
    <input type="text" name="firstName" />
    <br><br>


    <p> Last name </p>
    <input type="text" name="lastName" />
    <br><br>


    <p> Middle name </p>
    <input name="middleName" type = "text" />
    <br><br>

    <p> Id </p>
    <input name="id" type = "text" />
    <br><br>

    <input type = 'submit'/>

</form>


<?php

return Yii::$app->db->createCommand($sql)->execute();