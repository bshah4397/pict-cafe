<html>
  <head>

    <?php
        include '../Scripts/classes/users.php';
        $userObj = new Users();
        $userObj->connect();
        $emails = $userObj->getAllEmail();
        $count = count($emails);
        $i=0;
       // echo $count;
        while ($i<$count) {
            //echo "<option value='".$emails[$i]."'>";
            
    ?>

  </head>
  <body>
    <form action="test.php" method="post">
            <input type="submit" name="">
            <input type="email" list="emails" name="id[]" multiple>
            <datalist id="emails">
                <?php
                        echo "<option value='".$emails[$i]."'>";
                        $i++;
                    }
                ?>
            </datalist>
           

    </form>
  </body>
</html>
