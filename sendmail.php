<?php

if ($_POST['email'] != '') {
    //echo 'WIN!!' . $_POST['email'];
    if ($_POST['message'] != '') {
        //echo 'WIN!!' . $_POST['message'];
        
            ?>
               <form action='/#contact' method='post' name="frm">
                <input type='hidden' name='message' value='success'>";
            </form>
            <script language="JavaScript">
            document.frm.submit();
            </script>
            <?php
        
    } else {
        ?>
        <form action='/#contact' method='post' name="frm">
            <input type='hidden' name='message' value='empty_message'>";
        </form>
        <script language="JavaScript">
        document.frm.submit();
        </script>
        <?php
    }
    
} else {
    ?>
    <form action='/#contact' method='post' name="frm">
        <input type='hidden' name='message' value='empty_email'>";
    </form>
    <script language="JavaScript">
    document.frm.submit();
    </script>
    <?php
}


?>