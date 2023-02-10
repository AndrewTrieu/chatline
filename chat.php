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
    <section class="chat-area">
      <header>
        <?php
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query(
          $conn,
          "SELECT * FROM users WHERE unique_id = {$user_id}"
        );
        if (mysqli_num_rows($sql) > 0) {
          $selected_user = mysqli_fetch_assoc($sql);
        }
        ?>
        <a href="home.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/assets/<?php if ($selected_user["img"]) {
          echo $selected_user["img"];
        } else {
          echo "default.png";
        } ?>" alt="Profile photo">
        <div class="details">
          <span>
            <?php echo $selected_user['first_name'] . " " . $selected_user['last_name'] ?>
          </span>
          <p>
            <?php echo $selected_user["status"]; ?>
          </p>
        </div>
      </header>
      <div class="chat-box">
      </div>
      <form action="#" class="message-input">
        <input type="text" class="selected-id" name="selected_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" class="message-text" name="message_text" placeholder="Send a message..." />
        <button type="submit"><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  <script src="js/chat.js"></script>
</body>

</html>