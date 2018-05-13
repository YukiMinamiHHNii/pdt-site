<?php
  require('DAO.php');

  class SpeciesDAO extends DAO{

    public function create(){}

	  public function read(){

      try {
        $conn = $this->connect();

        if($conn){
          $query=$conn->prepare("SELECT * FROM species ORDER BY
	                               CAST(SUBSTRING_INDEX(species_id, '-', 1) AS INTEGER),
	                               CAST(SUBSTRING_INDEX(species_id, '-', -1) AS INTEGER)
                                 LIMIT 60");
          $query->execute();
          $result = $query->get_result();
          $data= array();

          while($row = $result->fetch_assoc()) {
            $row['typing']=$this->read_species_typing($row['species_id']);
            $row['ability']=$this->read_species_ability($row['species_id']);
            array_push($data, $row);
          }

          $res = array(
            'type'=>'Read species',
            'numRows' => $result->num_rows,
            'data' => $data
          );
        }else{
          throw new Exception("Error Processing Request", 1);
        }

      } catch (Exception $e) {
        $res = array(
            'type'=>'Read species',
            'data'=>'Error while reading species',
            'message'=>$e->getMessage()
        );
      }finally{
        $conn=$this->disconnect();
      }

      return json_encode($res);

    }

    public function read_species_typing($species_id){

      try {
        $conn = $this->connect();

        if($conn){
          $query=$conn->prepare('SELECT t.typing_id, t.name FROM species s
                                 INNER JOIN species_typing st ON s.species_id=st.species_id
                                 INNER JOIN typing t ON st.typing_id=t.typing_id
                                 WHERE s.species_id= ?');

          $query->bind_param('s', $species_id);
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
          'type'=>'Read species typing',
          'data'=>'Error while reading species typing',
          'message'=>$e->getMessage()
        );
      }finally{
        $conn=$this->disconnect();
      }

      return $data;

    }

    private function read_species_ability($species_id){

      try {
        $conn = $this->connect();

        if($conn){
          $query=$conn->prepare('SELECT a.ability_id, a.name FROM species s
                                 INNER JOIN species_ability sa ON s.species_id=sa.species_id
                                 INNER JOIN ability a ON sa.ability_id=a.ability_id
                                 WHERE s.species_id= ?');

          $query->bind_param('s', $species_id);
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
          'type'=>'Read species typing',
          'data'=>'Error while reading species typing',
          'message'=>$e->getMessage()
        );
      }finally{
        $conn=$this->disconnect();
      }

      return $data;

    }

    public function update(){}

    public function delete(){}

  }
