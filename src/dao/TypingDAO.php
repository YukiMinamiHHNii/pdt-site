<?php
  require('DAO.php');

  class TypingDAO extends DAO{

    public function create(){

      try {
        $conn = $this->connect();

        if($conn){
          $typingName=$_POST['typingName'];
          $query=$conn->prepare("INSERT INTO typing(name) VALUES (?)");
          $query->bind_param('s', $typingName);
          $query->execute();
          
          $res = array(
            'type'=>'Create typing',
            'data'=>"Typing '$typingName' created successfully";
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
        // will not work like this obviously log.debug($e.getMessage());
        $res = array(
            'type'=>'Create typing',
            'data'=>"Error while creating typing",
            'message'=>$e.getMessage()
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
          $query=$conn->prepare('SELECT * FROM typing');
          $query->execute();
          $result = $query->get_result();
          $data= array();

          while($row = $result->fetch_assoc()) {
            array_push($data, $row);
          }
          
          $res = array(
            'type'=>'Read typing',
            'numRows' => $result->num_rows,
            'data' => $data
          );
          return json_encode($res);
        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
        // will not work like this obviously log.debug($e.getMessage());
        return null;
      }finally{
        $conn=$this->disconnect();
      }

    }

    public function update(){

    }

    public function delete(){

    }

  }
