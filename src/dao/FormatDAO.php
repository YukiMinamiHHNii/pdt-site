<?php
  require('DAO.php');

  class FormatDAO extends DAO{

    public function create(){

      try {
        $conn = $this->connect();

        if($conn){
          $formatName= $_POST['formatName'];
          $formatDesc= $_POST['formatDesc'];
          $query=$conn->prepare("INSERT INTO battle_format(name, description) VALUES (?,?)");
          $query->bind_param('ss', $formatName, $formatDesc);
          $query->execute();

          $res = array(
            'type'=>'Create typing',
            'data'=>"Typing '$typingName' created successfully"
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
        $res = array(
            'type'=>'Create typing',
            'data'=>'Error while creating typing',
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
          $query=$conn->prepare('SELECT format_id, name FROM battle_format limit 10');
          $query->execute();
          $result = $query->get_result();
          $data= array();

          while($row = $result->fetch_assoc()) {
            $row['pokemon']=$this->read_format_species($row['format_id']);
            array_push($data, $row);
          }

          $res = array(
            'type'=>'Read battle format',
            'numRows' => $result->num_rows,
            'data' => $data
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
        $res = array(
            'type'=>'Read battle format',
            'data'=>'Error while reading battle_format',
            'message'=>$e->getMessage()
          );
      }finally{
        $conn=$this->disconnect();
      }

      return json_encode($res);

    }

    public function read_format_species($format_id){

      try {
        $conn = $this->connect();

        if($conn){
          $query=$conn->prepare('SELECT s.species_id AS species
                                 FROM battle_format bf
                                 INNER JOIN format_species fs ON bf.format_id=fs.format_id
                                 INNER JOIN species s ON s.species_id=fs.species_id
                                 WHERE bf.format_id= ?');
          
          $query->bind_param('i', $format_id);
          $query->execute();
          $result = $query->get_result();
          $data= array();

          while($row = $result->fetch_assoc()) {
            array_push($data, $row);
          }

        }else{
          throw new Exception("Error Processing Request", 1);
        }
      } catch (Exception $e) {
        $data = array(
            'type'=>'Read format species',
            'data'=>'Error while reading species from format ${format_id}',
            'message'=>$e->getMessage()
          );
      }finally{
        $conn=$this->disconnect();
      }

      return $data;

    }

    public function update(){

      try {
        $conn = $this->connect();

        if($conn){
          $typingID= $_POST['typingID'];
          $typingName= $_POST['typingName'];
          $query=$conn->prepare("UPDATE typing SET name=? WHERE typing_id=?");
          $query->bind_param('si', $typingName, $typingID);
          $query->execute();

          $res = array(
            'type'=>'Edit typing',
            'data'=>"Typing: '$typingName' edited successfully"
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
        $res = array(
            'type'=>'Edit typing',
            'data'=>'Error while editing typing',
            'message'=>$e->getMessage()
          );
      }finally{
        $conn=$this->disconnect();
      }

      return json_encode($res);

    }

    public function delete(){

      try {
        $conn = $this->connect();

        if($conn){
          $typingID= $_POST['typingID'];
          $query=$conn->prepare("DELETE FROM typing WHERE typing_id=?");
          $query->bind_param('i', $typingID);
          $query->execute();

          $res = array(
            'type'=>'Delete typing',
            'data'=>"Typing: '$typingID' deleted successfully"
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
        $res = array(
            'type'=>'Delete typing',
            'data'=>'Error while editing typing',
            'message'=>$e->getMessage()
          );
      }finally{
        $conn=$this->disconnect();
      }

      return json_encode($res);

    }

}
