<?php
session_start();
session_destroy();
session_abort();
session_unset();

?>
<script>
    window.setTimeout(function(){
        window.location.href = 'login.php';
    });
</script>