<?php

    require_once 'models/Usuario.php';

    class UsuarioDaoMysql implements UsuarioDAO {
        private $pdo;

        public function __construct(PDO $engine) {
            $this->pdo = $engine;
        }

        // Create
        public function add(Usuario $u) {
            $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
            $sql->bindValue(':nome', $u->getNome());
            $sql->bindValue(':email', $u->getEmail());
            $sql->execute();

            // Adicionar o id ao usuário adicionado
            $u->setId( $this->pdo->lastInsertId() );
            return $u;
        }
        
        // Read
        public function findAll() {
            $array = [];
            // Vamos fazer a consulta aos dados.
            $sql = $this->pdo->query("SELECT * FROM usuarios");

            // Verificamos se tem algum item.
            if($sql->rowCount() > 0) {
                // Se tiver algum item vai ser guardado no $data.
                $data = $sql->fetchAll();

                // Vamos preencher o formulário.
                foreach($data as $item) {   
                    $u = new Usuario();
                    $u->setId($item['id']);
                    $u->setNome($item['nome']);
                    $u->setEmail($item['email']);
                    // $array [] vai receber o objeto $u
                    $array[] = $u;
                }
            }

            return $array;
        }

        public function findByEmail($email) {
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $data = $sql->fetch();

                $u = new Usuario();
                $u->setId($data['id']);
                $u->setNome($data['nome']);
                $u->setEmail($data['email']);

                return $u;
            } else {
                return false;
            }
        }
        public function findById($id) {
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $data = $sql->fetch();

                $u = new Usuario();
                $u->setId($data['id']);
                $u->setNome($data['nome']);
                $u->setEmail($data['email']);

                return $u;
            } else {
                return false;
            }
        }

        // Update
        public function update(Usuario $u) {
            $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
            $sql->bindValue(':nome', $u->getNome());
            $sql->bindValue(':email', $u->getEmail());
            $sql->bindValue(':id', $u->getId());
            $sql->execute();

            return true;
        }

        // Delete
        public function delete($id) {
            $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
        }

    }
?>