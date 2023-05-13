<?php
  class Ticket extends Conectar{
    public function insert_ticket($usu_id,$cat_id,$tick_titulo,$tick_descrip){
        $conectar= parent::Conexion(); 
        parent::set_name();
        $sql="INSERT INTO tm_ticket (tick_id,usu_id, cat_id, tick_titulo, tick_descrip, est)VALUES (NULL,?,?,?,?,'1');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$usu_id);
        $sql->bindValue(2,$cat_id);
        $sql->bindValue(3,$tick_titulo);
        $sql->bindValue(4,$tick_descrip);
        $sql->execute();
        $sql1="select last_insert_id() as 'tick_id';";
        $sql1=$conectar->prepare($sql1);
        $sql1->execute();
        return $resultado=$sql1->fetchAll(pdo::FETCH_ASSOC);
    }
    //Listar tickets
    public function listar_ticket_x_usu($usu_id){
      $conectar= parent::Conexion();
      parent::set_name();
      $sql="SELECT 
          tm_ticket.tick_id,
          tm_ticket.usu_id,
          tm_ticket.cat_id,
          tm_ticket.tick_titulo,
          tm_ticket.tick_descrip,
          tm_usuario.usu_nom,
          tm_usuario.usu_ape,
          tm_categoria.cat_nom
          FROM 
          tm_ticket
          INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
          INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
          WHERE
          tm_ticket.est = 1
          AND tm_usuario.usu_id=?";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $usu_id);
      $sql->execute();
      return $resultado=$sql->fetchAll();
  }

  }
?>