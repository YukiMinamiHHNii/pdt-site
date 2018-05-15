<?php
  require('DAO.php');

  class AbilityDAO extends DAO{

    public function create(){

      try {
        $conn = $this->connect();

        if($conn){
          $abiityName= $_POST['abilityName'];
          $abiityDesc= $_POST['abilityDesc'];
          $query=$conn->prepare("INSERT INTO ability(name, description) VALUES (?,?)");
          $query->bind_param('ss', $abilityName, $abilityDesc);
          $query->execute();

          $res = array(
            'type'=>'Create ability',
            'data'=>"Ability '$abilityName' created successfully"
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
        $res = array(
            'type'=>'Create ability',
            'data'=>'Error while creating ability',
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
          $query=$conn->prepare('SELECT * FROM ability ORDER BY name');
          $query->execute();
          $result = $query->get_result();
          $data= array();

          while($row = $result->fetch_assoc()) {
            $row['pokemon']=$this->read_ability_species($row['ability_id']);
            array_push($data, $row);
          }

          $res = array(
            'type'=>'Read ability',
            'numRows' => $result->num_rows,
            'data' => $data
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }
      } catch (Exception $e) {
        $res = array(
            'type'=>'Read ability',
            'data'=>'Error while reading abilities',
            'message'=>$e->getMessage()
          );
      }finally{
        $conn=$this->disconnect();
      }

      return json_encode($res);

    }

    public function read_ability_species($ability_id){

      try {
        $conn = $this->connect();

        if($conn){
          $query=$conn->prepare('SELECT s.species_id as species FROM ability a
                                 INNER JOIN species_ability sa ON a.ability_id=sa.ability_id
                                 INNER JOIN species s ON s.species_id=sa.species_id
                                 WHERE a.ability_id= ?');
          
          $query->bind_param('i', $ability_id);
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
            'type'=>'Read ability species',
            'data'=>'Error while reading species from ability ${ability_id}',
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
          $abilityID= $_POST['ablilityID'];
          $abilityName= $_POST['abilityName'];
          $abilityDesc= $_POST['abilityDesc'];
          $query=$conn->prepare("UPDATE ability SET name=?, description=? WHERE ability_id=?");
          $query->bind_param('ssi', $abilityName, $abilityDesc, $typingID);
          $query->execute();

          $res = array(
            'type'=>'Edit ability',
            'data'=>"Ability: '$abilityName' edited successfully"
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
        $res = array(
            'type'=>'Edit ability',
            'data'=>'Error while editing ability',
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
          $abilityID= $_POST['abilityID'];
          $query=$conn->prepare("DELETE FROM ability WHERE ability_id=?");
          $query->bind_param('i', $abilityID);
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
