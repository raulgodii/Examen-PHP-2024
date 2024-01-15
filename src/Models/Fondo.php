<?php

namespace Models;

use Lib\DataBase;
use PDO;
use PDOException;
class Fondo {

    private ?int $id;
    private int $isan;
    private string $titulo;
    private string $director;
    private string $genero;
    private int $anio;

    private DataBase $connection;

    /**
     * UsuarioRepository constructor.
     */
    function __construct()
    {
        $this->connection = new DataBase();
    }
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getIsan(): int {
        return $this->isan;
    }

    public function setIsan(int $isan): void {
        $this->isan = $isan;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }

    public function getDirector(): string {
        return $this->director;
    }

    public function setDirector(string $director): void {
        $this->director = $director;
    }

    public function getGenero(): string {
        return $this->genero;
    }

    public function setGenero(string $genero): void {
        $this->genero = $genero;
    }

    public function getAnio(): int {
        return $this->anio;
    }

    public function setAnio(int $anio): void {
        $this->anio = $anio;
    }

    public function obtenerFondos() {
        try {
            // Query
            $stmt=$this->connection->prepare('SELECT * FROM fondos');

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

    public function buscarFondo($titulo) {
        try {
            // Query con cláusula WHERE para buscar por título
            $stmt = $this->connection->prepare('SELECT * FROM fondos WHERE titulo LIKE :titulo');
    
            // Añadir el parámetro del título con comodín '%' para coincidencias parciales
            $stmt->bindValue(':titulo', '%' . $titulo . '%', PDO::PARAM_STR);
    
            // Ejecutar query
            $stmt->execute();
    
            // Extraer registros
            $datos = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            // Cerrar
            $stmt->closeCursor();
    
            return $datos;
        } catch (PDOException $e) {
            return false;
        }
    }
    
}
