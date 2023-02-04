<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ChatLine - Real-time Messaging App</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>
    <div class="wrapper">
      <section class="chat-area">
        <header>
            <a href="#" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="assets/default.png" alt="Profile photo" />
          <div class="details">
            <span>User</span>
            <p>Active now</p>
          </div>
        </header>
        <div class="chat-box">
            <div class="chat post">
                <div class="details">
                    <p>
                        This is an outgoing message. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam facilis fugiat reiciendis adipisci iste assumenda error nemo quos nisi asperiores officiis voluptatibus, cumque laudantium. Praesentium aperiam rerum quisquam voluptate tempore!
                    </p>
                </div>
            </div>
            <div class="chat get">
                <img src="assets/default.png" alt="Profile photo" />
                <div class="details">
                    <p>
                        This is an incoming message. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem consectetur illo nam! Veritatis odio consectetur delectus doloribus dolores rem, hic, id molestias odit cupiditate laboriosam, facere commodi eius officia repudiandae?
                    </p>
                </div>
            </div>
        </div>
        <form action="#" class="message-input">
            <input type="text" placeholder="Send a message..." />
            <button type="submit"><i class="fab fa-telegram-plane"></i></button>
        </form>
      </section>
    </div>
  </body>
</html>
