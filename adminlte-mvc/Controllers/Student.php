<?php
require_once 'Config/DB.php';

class Student
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
      $stmt = $this->pdo->query("SELECT * FROM students");
      return $stmt->fetchAll(); 
    }

    public function show($id)
    {
        
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO students (name, email, created) values (?, ?, ?)");
        return $stmt->execute([
            $data['name'],
            $data['email'], 
            $data['created_at']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE students SET name = ? ,  email = ? WHERE id = ?");
        return $stmt->execute([
            $data['name'],
            $data['email'], 
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM students WHERE id = ?");
        return $stmt->execute([$id]);

    }
}

$student = new Student($pdo);
