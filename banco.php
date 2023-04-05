<?php

class Usuario {
   


    /*
    *
    *
    *
    * GETTERS
    *
    **
    */
    public function getNombre(){
        
        return $this->nombre;

    }
    
    public function getApellido(){
        return $this->apellido;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getEmail(){
        return $this->email;
    }
    /*
    public function getConfirmacion(){
        return $this->confirmacion;
    }*/
    
    public function getDni(){
        return $this->dni;
    }
    public function getContrasena(){
        return $this->contrasena;
    }
    /*
    *
    *
    *SETTERS
    *
    *
    */
    public function setNombre($nombre){
        //nombre: todos los nombres deben empezar por mayúscula
// y el campo no admite número o símbolos, únicamente letra.
        if(self::empiezaMayus($nombre)){
            if(self::todoLetras($nombre)){ //si no dio error es que son letras to
                $this->nombre = $nombre;
            }
        }
    }

    public function setApellido($apellido){
        if(self::empiezaMayus($apellido)){
            if(self::todoLetras($apellido)){ //si no dio error es que son letras to
                $this->apellido = $apellido;
            }
        }
    }
    
    public function setDireccion($direccion){
        if(self::calleBien($direccion)){
            $this->direccion = $direccion;
        }
    }
    public function setEmail($email){
        $this->email = $email;
    }
    /*public function setConfirmacion($confirmacion){
        $this->confirmacion = $confirmacion;
    }*/
    public function setDni($dni){
        if(self::dnieOk($dni)){
            $this->dni=$dni;
        }
    }
    public function setContrasena($contrasena){
        if(strlen($contrasena)>=8 && strlen($contrasena)<=20){
            if(self::contMayus($contrasena)>0){
                if(self::contMinus($contrasena)>0){
                    if(self::contNum($contrasena)>1){
                        if(self::contSig($contrasena)>0){
                            $this->contrasena = $contrasena;
                        }
                    }   
                }
                
            }
        }
    }


} 

$usuario = new Usuario("Alan","Brito","calle falsa 123","quientepreguntoxd@gmail","quientepreguntoxj@gmail","1723723p","yopregunte");
echo "nombre: ".$usuario->getNombre();
echo "<br>";
echo "Apellido: ".$usuario->getApellido();
echo "<br>";
echo "Direccion: ".$usuario->getDireccion();
echo "<br>";
echo "Correo Electrónico: ".$usuario->getEmail();
echo "<br>";
//echo $usuario->getConfirmacion();
echo "DNI: ".$usuario->getDni();
echo "<br>";
echo "Contraseña: ".$usuario->getContrasena();
echo "<br>";
$usuario->setNombre("David");
$usuario->setApellido("León");
$usuario->setDireccion("verdadera,123,toda,11207,Libertalia,Oceania");
$usuario->setEmail("pues@si.es");
//$usuario->setConfirmacion("pues@no.es");
$usuario->setDni("15765324T");
$usuario->setContrasena("AmU987hp!");
echo "<br>";
//$usuario->setConfirmacion("contrase");
echo "nombre: ".$usuario->getNombre();
echo "<br>";
echo "Apellido: ".$usuario->getApellido();
echo "<br>";
echo "Direccion: ".$usuario->getDireccion();
echo "<br>";
echo "Correo Electrónico: ".$usuario->getEmail();
echo "<br>";
//echo $usuario->getConfirmacion();
echo "DNI: ".$usuario->getDni();
echo "<br>";
echo "Contraseña: ".$usuario->getContrasena();
echo "<br>";


?>
