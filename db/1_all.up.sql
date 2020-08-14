CREATE TABLE User
(
  user_id INT NOT NULL,
  name VARCHAR(10) NOT NULL,
  org VARCHAR(20),
  profile VARCHAR(50),
  img VARCHAR(200) NOT NULL,
  PRIMARY KEY (user_id)
);

CREATE TABLE Post
(
  post_id INT NOT NULL,
  url VARCHAR(200) NOT NULL,
  title VARCHAR(100) NOT NULL,
  description VARCHAR(300) NOT NULL,
  pick_count INT NOT NULL,
  pv_count INT NOT NULL,
  PRIMARY KEY (post_id)
);

CREATE TABLE Pick
(
  pick_id INT NOT NULL,
  comment VARCHAR(100),
  like_count INT NOT NULL,
  created_at DATE NOT NULL,
  user_id INT NOT NULL,
  post_id INT NOT NULL,
  PRIMARY KEY (pick_id),
  FOREIGN KEY (user_id) REFERENCES User(user_id),
  FOREIGN KEY (post_id) REFERENCES Post(post_id)
);

CREATE TABLE Reply
(
  reply_id INT NOT NULL,
  comment VARCHAR(100) NOT NULL,
  like_count INT NOT NULL,
  created_at DATE NOT NULL,
  post_id INT NOT NULL,
  user_id INT NOT NULL,
  PRIMARY KEY (reply_id),
  FOREIGN KEY (post_id) REFERENCES Post(post_id),
  FOREIGN KEY (user_id) REFERENCES User(user_id)
);

CREATE TABLE Like_
(
  like_id INT NOT NULL,
  user_id INT NOT NULL,
  pick_id INT,
  reply_id INT,
  PRIMARY KEY (like_id),
  FOREIGN KEY (user_id) REFERENCES User(user_id),
  FOREIGN KEY (pick_id) REFERENCES Pick(pick_id),
  FOREIGN KEY (reply_id) REFERENCES Reply(reply_id)
);

CREATE TABLE Follow
(
  follow_id INT NOT NULL,
  from_user_id INT NOT NULL,
  to_user_id INT NOT NULL,
  PRIMARY KEY (follow_id)
);

CREATE TABLE Notification
(
  notification_id INT NOT NULL,
  user_id INT NOT NULL,
  pick_id INT NOT NULL,
  PRIMARY KEY (notification_id),
  FOREIGN KEY (user_id) REFERENCES User(user_id),
  FOREIGN KEY (pick_id) REFERENCES Pick(pick_id)
);
