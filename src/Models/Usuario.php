<?php

namespace Models;

/**
 * Clase que representa la entidad de usuario (Usuario).
 */
class Usuario
{
    private string|null $id;
    private bool $cuentaBloqueada;
    private string $usuario;
    private string $dni;
    private string $nombre;
    private string $apellido1;
    private string $apellido2;
    private string $email;
    private string $rol;
    private string $contrasena;

    public function __construct(?string $id, bool $cuentaBloqueada, string $usuario, string $dni, string $nombre, string $apellido1, string $apellido2, string $email, string $rol, string $contrasena)
    {
        $this->id = $id;
        $this->cuentaBloqueada = $cuentaBloqueada;
        $this->usuario = $usuario;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->email = $email;
        $this->rol = $rol;
        $this->contrasena = $contrasena;
    }

        /**
     * Obtiene el DNI del usuario.
     *
     * @return string DNI del usuario.
     */
    public function getDni(): string {
        return $this->dni;
    }

    /**
     * Establece el DNI del usuario.
     *
     * @param string $dni Nuevo DNI del usuario.
     */
    public function setDni(string $dni): void {
        $this->dni = $dni;
    }

    /**
     * Obtiene el estado de cuenta bloqueada del usuario.
     *
     * @return bool Estado de cuenta bloqueada del usuario.
     */
    public function getCuentaBloqueada(): bool {
        return $this->cuentaBloqueada;
    }

    /**
     * Establece el estado de cuenta bloqueada del usuario.
     *
     * @param bool $cuentaBloqueada Nuevo estado de cuenta bloqueada del usuario.
     */
    public function setCuentaBloqueada(bool $cuentaBloqueada): void {
        $this->cuentaBloqueada = $cuentaBloqueada;
    }

    /**
     * Obtiene el nombre del usuario.
     *
     * @return string Nombre del usuario.
     */
    public function getNombre(): string {
        return $this->nombre;
    }

    /**
     * Establece el nombre del usuario.
     *
     * @param string $nombre Nuevo nombre del usuario.
     */
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    /**
     * Obtiene la contraseña del usuario.
     *
     * @return string Contraseña del usuario.
     */
    public function getContrasena(): string
    {
        return $this->contrasena;
    }

    /**
     * Establece la contraseña del usuario.
     *
     * @param string $contrasena Nueva contraseña del usuario.
     */
    public function setContrasena(string $contrasena): void
    {
        $this->contrasena = $contrasena;
    }


    /**
     * Obtiene el ID del usuario.
     *
     * @return string|null ID del usuario.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Obtiene el nombre del usuario.
     *
     * @return string Nombre del usuario.
     */
    public function getUsuario(): string
    {
        return $this->usuario;
    }

    /**
     * Obtiene el apellido1 del usuario.
     *
     * @return string Apellido1 del usuario.
     */
    public function getApellido1(): string
    {
        return $this->apellido1;
    }

    /**
     * Obtiene el apellido2 del usuario.
     *
     * @return string Apellido2 del usuario.
     */
    public function getApellido2(): string
    {
        return $this->apellido2;
    }

    /**
     * Obtiene el correo electrónico del usuario.
     *
     * @return string Correo electrónico del usuario.
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Establece el ID del usuario.
     *
     * @param string $id Nuevo ID del usuario.
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Establece el nombre del usuario.
     *
     * @param string $usuario Nuevo nombre del usuario.
     */
    public function setUsuario(string $usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * Establece el apellido1 del usuario.
     *
     * @param string $apellido1 Nuevo apellido1 del usuario.
     */
    public function setApellido1(string $apellido1): void
    {
        $this->apellido1 = $apellido1;
    }

    /**
     * Establece el apellido2 del usuario.
     *
     * @param string $apellido2 Nuevo apellido2 del usuario.
     */
    public function setApellido2(string $apellido2): void
    {
        $this->apellido2 = $apellido2;
    }

    /**
     * Establece el correo electrónico del usuario.
     *
     * @param string $email Nuevo correo electrónico del usuario.
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Obtiene el rol del usuario.
     *
     * @return string Rol del usuario.
     */
    public function getRol(): string
    {
        return $this->rol;
    }

    /**
     * Establece el rol del usuario.
     *
     * @param string $rol Nuevo rol del usuario.
     */
    public function setRol(string $rol): void
    {
        $this->rol = $rol;
    }



    /**
     * Crea una instancia de Usuario a partir de un array de datos.
     *
     * @param array $data Datos del usuario.
     * @return Usuario Instancia de la clase Usuario.
     */
    public static function fromArray(array $data): Usuario
    {
        return new Usuario(
            $data['id'] ?? null,
            $data['cuentaBloqueada'] ?? false,
            $data['usuario'] ?? '',
            $data['dni'] ?? '',
            $data['nombre'] ?? '',
            $data['apellido1'] ?? '',
            $data['apellido2'] ?? '',
            $data['email'] ?? '',
            $data['rol'] ?? '',
            $data['contrasena'] ?? ''
        );
    }

    /**
     * Valida y sanitiza los datos de un usuario.
     *
     * @param array $data Datos del usuario a validar y sanitizar.
     * @return array Datos del usuario validados y sanitizados.
     */
    public static function validSanitizeUsuario(array $data): array
    {
        // Reglas de validación y sanitización
        $rules = array(
            'usuario' => array('filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^[a-zA-Z0-9]+$/')),
            'dni' => array('filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^[a-zA-Z0-9]+$/')),
            'nombre' => array('filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^[a-zA-Z]+$/')),
            'apellido1' => array('filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^[a-zA-Z]+$/')),
            'apellido2' => array('filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^[a-zA-Z]+$/')),
            'email' => FILTER_VALIDATE_EMAIL,
            'contrasena' => array(
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => array('regexp' => '/^(?=.*[A-Z])(?=.*\d)(?=.*[#!@*$])[A-Za-z\d#!@*$]{7,}$/')
            )
        );

        $validData = filter_var_array($data, $rules);

        // Devuelve los datos válidos y sanitizados
        return $validData;
    }
}
