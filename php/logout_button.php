<form action="logout.php" method="post">
    <input type="submit" name="logout" value="Log Out" style="margin: 0; padding: 0; border: none;color: #FFEC2B;
    background-color: transparent;
    text-decoration: underline;">
    <?php $_SESSION['return_to'] = $_SERVER['PHP_SELF']; ?>
</form>
