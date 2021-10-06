<?php

    // A class Usuario vai manipular a estrutura de dados da tabela usuários.

    class Usuario {
        private $id;
        private $nome;
        private $email;
        
        public function getId() {
            return $this->id;
        }
        public function setId($i) {
            // trim() vai tirar os espaços dos dois lados
            $this->id = trim($i);
        }

        public function getNome() {
            return $this->nome;
        }
        public function setNome($n) {
            // ucwords() vai deixar a primeira letra de cada nome em maiúsculo
            $this->nome = ucwords(trim($n));
        }

        public function getEmail() {
            return $this->email;
        }
        public function setEmail($e) {
            //strlower() vai deixar o email em letra minúscula
            $this->email = strtolower(trim($e));
        }
    }

    interface UsuarioDAO {

        // interface UsuarioDAO vai criar o CRUD
        // Create
        public function add(Usuario $u); 
        // Read
        // findAll vai retornar os objetos da class Usuario
        // findById() vai encontrar um usuário por meio do ID
        public function findAll();
        public function findByEmail($email);
        public function findById($id);
        // Update
        // vai receber os dados e atualizará no banco de dados
        public function update(Usuario $u);
        // Delete
        public function delete($id);  
    }