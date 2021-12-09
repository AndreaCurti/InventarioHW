<?php
	/**
	 * classe di un componente
	 */
	class Component
	{
		private $id;

		function __construct($id)
		{
			$this->id = $id;
		}

		function delete(){
			require 'application/libs/connection.php';
            $sql = "UPDATE componente SET is_enable=0 WHERE id = $this->id";
            $result = $conn->query($sql);
            if ($result) {
				return TRUE;
			}
			return FALSE;
        }

		function takeDescAndAula(){
			require 'application/libs/connection.php';
            $sql = "SELECT * FROM componente WHERE id=$this->id";
            $result = $conn->query($sql);
			$row = $result->fetch_assoc();
            if ($result->num_rows > 0) {
				$infos = array($row["descrizione"], $row["aula_id"]);
				return $infos;
            }else{ 
				throw new Exception("Componente non esistente");
            }   
		}

		function modifyDescAndAula($desc, $aula){
			require 'application/libs/connection.php';
			$aula = intval($aula);
			if(!$this->checkAula($aula)){
				$a = 1;
			}
			$sql = "UPDATE componente SET descrizione='$desc', aula_id=$aula WHERE id = $this->id";
			$result = $conn->query($sql);
			if ($result) {
				return TRUE;
			}
			return FALSE;
		}

		function checkAula($a){
			if($a > 0 && $a < 500){
				return TRUE;
			}
			return FALSE;
		}
	}
?>
