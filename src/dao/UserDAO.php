<?php
  require('DAO.php');

  class UserDAO extends DAO{

    public function create(){

      try {
        $conn = $this->connect();

        if($conn){
          $username= $_POST['username'];
          $mail= $_POST['mail'];
          $password= $_POST['pass'];

          $query=$conn->prepare("INSERT INTO users(username, mail, pass) VALUES (?, ?, PASSWORD(?))");
          $query->bind_param('sss', $username, $mail, $password);
          $query->execute();

          $res = array(
            'type'=>'Create new user',
            'data'=>"New user created successfully"
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
          $res = array(
            'type'=>'Create new user',
            'data'=>"Error while creating user"
          );
      }finally{
        $conn=$this->disconnect();
      }

      return json_encode($res);

    }

    public function read(){

      try {
        $conn = $this->connect();

        if($conn){
          $mail= $_POST['mail'];
          $password= $_POST['pass'];

          $query=$conn->prepare("SELECT true FROM users WHERE mail=? and pass=PASSWORD(?)");
          $query->bind_param('ss', $mail, $password);
          $query->execute();

          $result= $query->get_result();
          $data= array();

          while($row = $result->fetch_assoc()) {
            array_push($data, $row);
          }

          if($result->num_rows>0){
            $res= array(
              'type'=>'Read user',
              'data' => "User with mail ${mail} logged successfully",
              'result'=>true
            );
          }else{
            $res= array(
              'type'=>'Read user',
              'data' => "Error while logging in user with mail: ${mail}",
              'result'=>false
            );
          }

        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
          $res = array(
            'type'=>'Read user',
            'data'=>"Error while reading user ${mail}",
            'message'=>$e->getMessage()
        );
      }finally{
        $conn=$this->disconnect();
      }

      return $res;

    }

    public function update(){}

    public function delete(){}

    public function create_comment(){

      try {
        $conn = $this->connect();

        if($conn){
          $username= $_POST['username'];
          $email= $_POST['mail'];
          $subject= $_POST['subject'];
          $comment= $_POST['comment'];

          $query=$conn->prepare("INSERT INTO user_comment(username, mail, subject, comment, comment_date) VALUES (?, ?, ?, ?, now())");
          $query->bind_param('ssss', $username, $email, $subject, $comment);
          $query->execute();

          $res = array(
            'type'=>'Create comment',
            'data'=>"New comment created successfully",
            'mailStatus'=> $this->send_mail($username, $email, $subject, $comment)
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
        $res = array(
            'type'=>'Create comment',
            'data'=>'Error while creating comment',
            'message'=>$e->getMessage()
          );
      }finally{
        $conn=$this->disconnect();
      }

      return json_encode($res);

    }

    private function send_mail($username, $email, $subject, $comment){
        $domain = $_SERVER['HTTP_HOST'];
        $to = "$name < $email >";
        $message = "
          <html>
            <body>
              Your comments have been sent</p>
            <ul>
              <li>Username: <b>$username</b></li>
              <li>Mail: <b>$mail</b></li>
              <li>Subject: <b>$subject</b></li>
              <li>Comment: <b>$comment</b></li>
            </ul>
            </body>
          </html>
        ";
        $headers = "MIME-Version 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        $headers .= "From: $to";
        if (mail($to, $subject, $message, $headers)) {
          return "Mail has been sent";
        } else {
          return "Error while sendidng mail";
        }
    }

}
