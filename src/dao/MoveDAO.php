<?php
  require('DAO.php');

  class MoveDAO extends DAO{

    public function create(){

      try {
        $conn = $this->connect();

        if($conn){
          $moveName= $_POST['moveName'];
          $movePower= $_POST['movePower'];
          $moveAcc= $_POST['moveAcc'];
          $moveDesc= $_POST['moveDesc'];
          $query=$conn->prepare("INSERT INTO move(name, power, accuracy, description) VALUES (?,?,?,?)");
          $query->bind_param('siis', $moveName, $movePower, $moveAcc, $moveDesc);
          $query->execute();

          $res = array(
            'type'=>'Create move',
            'data'=>"Move '$moveName' created successfully"
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
        $res = array(
            'type'=>'Create move',
            'data'=>'Error while creating move',
            'message'=>$e->getMessage()
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
          $query=$conn->prepare('SELECT m.move_id, m.name, c.name AS category, t.name AS typing, m.power, 
                                        m.accuracy, m.description
                                 FROM move m
                                 INNER JOIN move_move_cat mc ON m.move_id=mc.move_id
                                 INNER JOIN move_category c ON c.move_category_id=mc.move_category_id
                                 INNER JOIN move_typing mt ON m.move_id=mt.move_id
                                 INNER JOIN typing t ON t.typing_id=mt.typing_id');
          $query->execute();
          $result = $query->get_result();
          $data= array();

          while($row = $result->fetch_assoc()) {
            array_push($data, $row);
          }

          $res = array(
            'type'=>'Read moves',
            'numRows' => $result->num_rows,
            'data' => $data
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }
      } catch (Exception $e) {
        $res = array(
            'type'=>'Read moves',
            'data'=>'Error while reading moves',
            'message'=>$e->getMessage()
          );
      }finally{
        $conn=$this->disconnect();
      }

      return json_encode($res);

    }

    public function read_move_species($move_id){

      try {
        $conn = $this->connect();

        if($conn){
          $query=$conn->prepare('SELECT species_id FROM species_move_origin WHERE move_id=?');
          $query->bind_param('i', $move_id);
          $query->execute();
          $result = $query->get_result();
          $data= array();

          while($row = $result->fetch_assoc()) {
            array_push($data, $row);
          }

          $res = array(
            'type'=>'Read move species',
            'numRows' => $result->num_rows,
            'data' => $data
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }
      } catch (Exception $e) {
        $res = array(
            'type'=>'Read move species',
            'data'=>"Error while reading species which learn ${move_id}",
            'message'=>$e->getMessage()
          );
      }finally{
        $conn=$this->disconnect();
      }

      return json_encode($res);

    }

    public function update(){

    }

    public function delete(){
    }

}
