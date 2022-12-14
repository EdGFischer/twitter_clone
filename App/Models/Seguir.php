<?php

namespace App\Models;

use MF\Model\Model;

class Seguir extends Model {


    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function seguirUsuario($id_usuario_seguindo) {
        $query = "INSERT INTO usuario_seguidores(id_usuario, id_usuario_seguindo) VALUES (:id_usuario, :id_usuario_seguindo)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id'));
        $stmt->bindValue(':id_usuario_seguindo', $id_usuario_seguindo);
        $stmt->execute();

        return true;
    }


    public function deixarSeguirUsuario($id_usuario_seguindo) {
        $query = "DELETE FROM usuario_seguidores WHERE id_usuario = :id_usuario AND id_usuario_seguindo = :id_usuario_seguindo";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id'));
        $stmt->bindValue(':id_usuario_seguindo', $id_usuario_seguindo);
        $stmt->execute();
        
        return true;
    }
}

?>
