<?php

namespace Repositories;

use Lib\DataBase;
use Models\Usuario;
use PDO;
use PDOException;

class UsuarioRepository
{
    private DataBase $connection;

    /**
     * UsuarioRepository constructor.
     */
    function __construct()
    {
        $this->connection = new DataBase();
    }

    /**
     * Obtiene todos los usuarios.
     *
     * @return array
     */
    public function findAll(): array
    {
        $this->connection->query("SELECT * FROM contactos");
        return $this->extractAll();
    }

    /**
     * Extrae todos los usuarios del resultado de la consulta.
     *
     * @return array
     */
    public function extractAll(): array
    {
        $usuarios = [];
        $usuariosData = $this->connection->fetchAll();

        foreach ($usuariosData as $usuarioData) {
            $usuarios[] = Usuario::fromArray($usuarioData);
        }

        return $usuarios;
    }

    /**
     * Extrae un usuario del resultado de la consulta.
     *
     * @return mixed|null
     */
    private function extractRegister()
    {
        return ($usuario = $this->connection->extractRegister()) ? Usuario::fromArray($usuario) : null;
    }

    /**
     * Lee un usuario por su ID.
     *
     * @param int $id
     * @return mixed
     */
    public function read(int $id)
    {
        $consulta = "SELECT id, nombre, apellidos, date FROM users WHERE id= :id";
        $stmt = $this->connection->prepare($consulta);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt->closeCursor();

        $stmt = null;

        return $this->extractRegister();
    }

    /**
     * Registra un nuevo usuario.
     *
     * @param Usuario $usuario
     * @return bool
     */
    public function registerUsuario(Usuario $usuario): bool
    {
        $id = $usuario->getId();
        $cuentaBloqueada = $usuario->getCuentaBloqueada();
        $usuarioNombre = $usuario->getUsuario();
        $dni = $usuario->getDni();
        $nombre = $usuario->getNombre();
        $apellido1 = $usuario->getApellido1();
        $apellido2 = $usuario->getApellido2();
        $email = $usuario->getEmail();
        $rol = $usuario->getRol();
        $contrasena = $usuario->getContrasena();
        
        try {
            $ins = $this->connection->prepare("INSERT INTO profesores (id, cuenta_bloqueada, nombre_usuario, dni, nombre_completo, apellido1, apellido2, correo, rol, contrasena) 
                                                VALUES (:id, :cuentaBloqueada, :usuario, :dni, :nombre, :apellido1, :apellido2, :email, :rol, :contrasena)");
            $ins->bindValue(':id', $id);
            $ins->bindValue(':cuentaBloqueada', $cuentaBloqueada, PDO::PARAM_BOOL);
            $ins->bindValue(':usuario', $usuarioNombre, PDO::PARAM_STR);
            $ins->bindValue(':dni', $dni, PDO::PARAM_STR);
            $ins->bindValue(':nombre', $nombre, PDO::PARAM_STR);
            $ins->bindValue(':apellido1', $apellido1, PDO::PARAM_STR);
            $ins->bindValue(':apellido2', $apellido2, PDO::PARAM_STR);
            $ins->bindValue(':email', $email, PDO::PARAM_STR);
            $ins->bindValue(':rol', $rol, PDO::PARAM_STR);
            $ins->bindValue(':contrasena', $contrasena, PDO::PARAM_STR);
    
            $ins->execute();
    
            $ins->closeCursor();
    
            $result = true;
        } catch (PDOException $err) {
            $result = false;
        }
    
        return $result;
    }

    /**
     * Busca un usuario por su correo electrónico.
     *
     * @param string $email
     * @return bool|object
     */
    public function buscaMail(string $email): bool|object
    {
        try {
            $cons = $this->connection->prepare("SELECT * FROM profesores WHERE correo = :email");
            $cons->bindValue(':email', $email, PDO::PARAM_STR);
            $cons->execute();
            
            if ($cons && $cons->rowCount() == 1) {
                $result = $cons->fetch(PDO::FETCH_OBJ);
            } else {
                $result = false;
            }

            $cons->closeCursor();

        } catch (PDOException $err) {
            $result = false;
        }
        return $result;
    }

    /**
     * Inicia sesión de usuario.
     *
     * @param Usuario $usuario
     * @return bool|object
     */
    public function login(Usuario $usuario): bool|object
    {
        $result = false;
        $email = $usuario->getEmail();
        $contrasena = $usuario->getContrasena();

        $usuario = $this->buscaMail($email);

        if ($usuario !== false) {
            
            //$verify = password_verify($contrasena, $usuario->contrasena);
            $verify = ($contrasena === $usuario->contrasena);

            if ($verify) {
                $result = $usuario;
            } else {
                echo $contrasena . "  " . $usuario->contrasena;
                $result = false;
            }
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * Actualiza la sesión de usuario.
     *
     * @param Usuario $usuario
     * @return bool|object
     */
    public function updateLogin(Usuario $usuario): bool|object
    {
        $result = false;
        $email = $usuario->getEmail();
        $password = $usuario->getPassword();

        $usuario = $this->buscaMail($email);

        if ($usuario !== false) {

            $result = $usuario;

        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * Cierra la conexión.
     */
    public function close(): void
    {
        $this->connection->close();
    }

    /**
     * Obtiene un usuario por su ID.
     *
     * @param int $usuario_id
     * @return mixed
     */
    public function getUsuarioFromId(int $usuario_id)
    {
        $this->connection->query("SELECT name FROM users WHERE id=$usuario_id");

        $usuario = $this->connection->fetchAll();
        $this->connection->close();

        return $usuario;
    }

    /**
     * Actualiza la información del usuario.
     *
     * @param array $updateUsuario
     * @return bool
     */
    public function updateUsuario(array $updateUsuario): bool
    {
        $result = true;
        try {
            $this->connection->query("UPDATE usuarios SET name='{$updateUsuario['name']}', last_name='{$updateUsuario['last_name']}', email='{$updateUsuario['email']}', date='{$updateUsuario['date']}' WHERE id='{$updateUsuario['id']}'");
            $this->connection->close();

        } catch (PDOException $err) {
            $result = false;
        }

        return $result;
    }

    public function obtenerProfesores()
    {
        try {
            // Query
            $stmt=$this->connection->prepare('SELECT * FROM profesores');

            // Ejecutar query
            $stmt->execute();

            // Extraer registros
            $datos = $stmt->fetchAll(PDO::FETCH_OBJ);

            // Cerrar
            $stmt->closeCursor();

            return $datos;
        } catch (PDOException $e){
            return false;
        }
    }


    public function eliminarProfesor($id)
{
    try {
        // Query para eliminar el profesor con el ID especificado
        $stmt = $this->connection->prepare('DELETE FROM profesores WHERE id = :id');
        
        // Bind del parámetro ID
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecutar la consulta de eliminación
        $stmt->execute();

        // Cerrar
        $stmt->closeCursor();

        return true; // Devuelve true si la eliminación fue exitosa
    } catch (PDOException $e) {
        return false; // Devuelve false en caso de error
    }
}

public function obtenerProfesorId($id)
{
    try {
        // Query para eliminar el profesor con el ID especificado
        $stmt = $this->connection->prepare('SELECT * FROM profesores WHERE ID = :id');
        
        // Bind del parámetro ID
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Extraer registros
        $datos = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Cerrar
        $stmt->closeCursor();

        return $datos; 
    } catch (PDOException $e) {
        return false; // Devuelve false en caso de error
    }
}

public function confirmarModificarProfesor($data)
{
    var_dump($data);
    try {
        // Query para eliminar el profesor con el ID especificado
        $stmt = $this->connection->prepare('SELECT * FROM profesores WHERE ID = :id');
        
        // Bind del parámetro ID
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Extraer registros
        $datos = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Cerrar
        $stmt->closeCursor();

        return $datos; 
    } catch (PDOException $e) {
        return false; // Devuelve false en caso de error
    }
}

    
}
