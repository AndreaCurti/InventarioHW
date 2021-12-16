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

		static function getComponents($idCategoria){
			require 'application/libs/connection.php';
			$sql = "";
			if($idCategoria != 6){
				$sql = "SELECT * FROM componente WHERE tipo_id='$idCategoria' && is_enable=1";
			}else{
				$sql = "SELECT * FROM componente WHERE is_enable=0";
			}
            $result = $conn->query($sql);
			$out = array();
            if ($result->num_rows > 0) {
				foreach ($result as $row) {
					unset($row['utente_id']);
					unset($row['tipo_id']);
					unset($row['is_enable']);
					$out[] = $row;
				}
				return $out;
			}else{
				throw new Exception();
			}
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
			if(!Component::checkAula($aula)){
				$a = 1;
			}
			$sql = "UPDATE componente SET descrizione='$desc', aula_id=$aula WHERE id = $this->id";
			$result = $conn->query($sql);
			if ($result) {
				return TRUE;
			}
			return FALSE;
		}

		static function checkAula($a){
			if($a > 0 && $a < 500){
				return TRUE;
			}
			return FALSE;
		}

		static function getCategories(){
			require 'application/libs/connection.php';
            $sql = "SELECT * FROM tipo";
            $result = $conn->query($sql);
			$out = array();
			while($out[] = $result->fetch_assoc()){}
			return $out;
		}

		static function addComponent($marca, $desc, $nSeriale, $aula, $categoria){
			require 'application/libs/connection.php';
			if(!empty($marca) && !empty($desc) && !empty($nSeriale) && !empty($aula) && !empty($categoria)){
				$aula = intval($aula);
				if(Component::checkAula($aula)){
					$idUser = $_SESSION['id'];
					$sql = "INSERT INTO componente(marca, descrizione, numero_seriale, data_installazione, utente_id, tipo_id, aula_id, is_enable) 
					VALUES('$marca', '$desc', '$nSeriale', CURDATE(), $idUser, $categoria, $aula, TRUE)";
					$result = $conn->query($sql);
					if ($result) {
						return TRUE;
					}
					throw new Exception("Bruh");
				}else{
					throw new Exception("Aula non esistente");
				}
			}else{
				throw new Exception("Completare tutti i campi");
			}
		}
	}
?>
