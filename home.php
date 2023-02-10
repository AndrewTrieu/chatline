<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION["unique_id"])) {
    header("location: start.php");
}
?>

<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="user">
            <header>
                <div class="content">
                    <?php
                    $sql = mysqli_query(
                        $conn,
                        "SELECT * FROM users WHERE unique_id = {$_SESSION["unique_id"]}"
                    );
                    if (mysqli_num_rows($sql) > 0) {
                        $current_user = mysqli_fetch_assoc($sql);
                    }
                    ?>
                    <img src="php/assets/<?php if ($current_user["img"]) {
                        echo $current_user["img"];
                    } else {
                        echo "default.png";
                    } ?>" alt="Profile photo">
                    <div class="details">
                        <span>
                            <?php echo $current_user['first_name'] . " " . $current_user['last_name'] ?>
                        </span>
                        <p>
                            <?php echo $current_user["status"]; ?>
                        </p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $current_user['unique_id']; ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">
                    Who do you want to chat with?
                </span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users">
            </div>
        </section>
    </div>
    <script src="js/home.js"></script>
</body>

</html>