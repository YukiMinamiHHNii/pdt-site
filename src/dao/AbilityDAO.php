<?php
  require('DAO.php');

  class AbilityDAO extends DAO{

    public function create(){

    }

    public function read(){

      try {
        $conn = $this->connect();

        if($conn){
          $query=$conn->prepare('SELECT * FROM ability');
          $query->execute();
          $result = $query->get_result();
          $data= array();

          while($row = $result->fetch_assoc()) {
            array_push($data, $row);
          }

          $res = array(
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
