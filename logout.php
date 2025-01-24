<?php
session_start();
$_SESSION = [];
?>
<script>
    document.cookie = 'id=; Max-Age=-1;';
    document.cookie = 'username=; Max-Age=-1;';
    document.cookie = 'description=; Max-Age=-1;';
    document.cookie = 'created=; Max-Age=-1;';
    window.location.href = 'login.php';
</script>
