<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 25/06/2015
 * Time: 10:25 AM
 */
require($_SERVER['DOCUMENT_ROOT'] . '/bavosi.Pedidos/model/dao/DaoPedidos.php');
class Usuario {

    public $id;
    public $rol;
    public $user;
    public $password;
    public $nombre;
    public $email;

    function __construct(){}
    function __destruct() { unset($this); }

    public function check($user, $password) {
        if($user != "" && $password != ""){
            $res = DaoPedidos::getDb()->getResultsFromQuery("SELECT COUNT(*) AS COUNT FROM [SAVX].[dbo].[Usuario] WHERE isnull(borrado,'N') = 'N' AND usuario = '$user' and password = '$password'");
            foreach($res as $check){
                if($check['COUNT'] == 1){
                    $this->get($user);
                    return true;
                }else{
                    return false;
                }
            }
        }
        return false;
    }

    public function get($user = "") {
        if($user != ""){
            $res = DaoPedidos::getDb()->getResultsFromQuery("SELECT id,nombre,usuario,password, null email FROM [SAVX].[dbo].[Usuario] WHERE borrado = 'N' AND usuario = '$user'");
            foreach($res as $user){
                $this->id = $user['id'];
                $this->name = $user['nombre'];
                $this->user_name = $user['usuario'];
                $this->password = $user['password'];
                $this->email = $user['email'];
            }
            if($this->id != ""){
                $res = DaoPedidos::getDb()->getResultsFromQuery("select top 1 id,nombre from UsuarioXRol ur inner join Rol r on ur.rol_id = r.id where ur.usuario_id = $this->id");
                foreach($res as $rol) {
                    $this->rol = $rol;
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
} 