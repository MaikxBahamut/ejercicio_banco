<?php
    class Persona{

        private $nombre;
        private $apellido;
        private $direccion;
        private $correo;
        private $confiCorreo;
        private $dni;
        private $contrasena;

        //getters
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getCorreo(){
            return $this->correo;
        }
        public function getDni(){
            return $this->dni;
        }
        public function getContrasena(){
            return $this->contrasena;
        }
        //setters

        function setNombre($nombre){
            if (!$nombre) return false; //comprueba que el campo no sea nulo
            $letras = str_split($nombre);
            if(ctype_upper($letras [0])){ //comprueba que la primera letra sea mayuscula
            for ($i=1; $i < sizeOf($letras); $i++) {    
                if(is_numeric($letras[$i])) //comprueba que no haya numeros
                return false;    
                }
                $this->nombre = $nombre;
                return true;
            }
            return false;
        }

        function setApellidos($apellidos)
        {
            if (!$apellidos) return false; //comprueba que el campo no sea nulo
            $arrayApellidos = explode(" ",$apellidos); //separa por espacios
            foreach ($arrayApellidos as $apellido) {
                $letras = str_split($apellido);
                if(ctype_upper($letras [0])){ //comprueba que la primera letra sea mayuscula
                for ($i=1; $i < sizeOf($letras); $i++) {    
                    if(is_numeric($letras[$i])) //comprueba que no haya numeros
                    return false;    
                    }
                }else{
                return false;
                }
            }
            $this->apellido = $apellidos;
            return true;

        }

        function setdni($dni){
            if (!$dni) return false; //comprueba que el campo no sea nulo
            $letter = strtoupper(substr($dni, -1)); //pilla la letra, strtoupper lo vuelve mayuscula
            $numbers = substr($dni, 0, -1);
            
            //esto comprieba que la letra sea la que tiene que ser
            if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8 ){ 
            $this->dni = $dni;
                return true;
            }
            return false;
        
        }

        function setCorreo($correo , $confiCorreo)
        {
            if (!$correo) return false; //comprueba que el campo no sea nulo
            if($correo == $confiCorreo){ //simplemente comprueba que sean iguales
                $this -> correo = $correo;
                $this -> confiCorreo = $confiCorreo;
                return true;
            }
            return false;
        }

        function setDireccion($direccion)
        {
            $arrayDirecciones = explode(",",trim($direccion));
            if (sizeof($arrayDirecciones) != 6) return false; //comprueba que haya 6 comas, sino da fallo
            if (!is_numeric($arrayDirecciones[1])) return false; //comprueba que haya un numero en la segunda posicion
            if (!is_numeric($arrayDirecciones[3]) || strlen ($arrayDirecciones[3])!= 5) return false; //comprueba que la quinta posicion sea un codigo postal

            $this -> direccion = $direccion;
            return true;
        }

        //limite maximo y minimo de la contraseña
        function setContrasena($contrasena){
            if (strlen($contrasena) >=8 && strlen($contrasena) <= 20 ) { //minimo contraseña 8 y maximo 20
                $nMayus = 0;$nMinus = 0; $nNumeros = 0; $nEspeciales = 0;
                    $letras = str_split($contrasena); //separa la contraseña en letras
                    foreach ($letras as $letra) {
                        if (is_numeric($letra)) //comprueba es numerico y cuenta cuantos numeros hay
                        {
                            $nNumeros ++;
                        } elseif (ctype_upper($letra)) //comprueba es mayuscula y las cuenta
                        {
                            $nMayus ++;
                        } else if (ctype_lower($letra)) //comprueba es minuscula y las cuenta
                        {
                            $nMinus ++;
                        }else //si no es ninguna de esas es un caracter especial
                        {
                            $nEspeciales ++;
                        }
                    }

                    if ($nMayus >= 1 && $nMinus >= 1 && $nNumeros >= 2 && $nEspeciales >= 1) //comprueba que el numero de cada tipo de letra es correcto
                    {
                        
                        $this -> contrasena = $contrasena; //si entra aqui se mete la contraseña dentro de la clase y devuelve true, si falla algo da falso
                        return true;
                    }
            }
            return false;
        }
    } 
?>