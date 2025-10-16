# Sistema de Agendamento Odontológico

Este é um sistema web simples e funcional para gerenciamento de agendamentos odontológicos. Foi desenvolvido como projeto acadêmico, com foco em operações CRUD e organização por entidades (pacientes, dentistas, agendamentos).

---

## Funcionalidades

- ✅ Cadastro de pacientes e dentistas
- 📅 Agendamento de consultas com data, hora e status
- 🔍 Listagem e busca de registros
- ✏️ Edição e exclusão de dados
- 💡 Interface responsiva com Bootstrap

---

## Tecnologias Utilizadas

- PHP 7.x  
- MySQL  
- HTML5, CSS3 e Bootstrap 4.5  
- XAMPP (ambiente de desenvolvimento local)  
- Visual Studio Code  

---

## Estrutura do Banco de Dados (MySQL)

```sql
CREATE DATABASE agendamento;
USE agendamento;

CREATE TABLE paciente (
  id_paciente INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  cpf VARCHAR(14),
  telefone VARCHAR(20),
  email VARCHAR(100),
  data_nascimento DATE
);

CREATE TABLE dentista (
  id_dentista INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  especialidade VARCHAR(100),
  cro VARCHAR(20)
);

CREATE TABLE agendamento (
  id_agendamento INT AUTO_INCREMENT PRIMARY KEY,
  id_paciente INT NOT NULL,
  id_dentista INT NOT NULL,
  data_agendamento DATETIME NOT NULL,
  status VARCHAR(20),
  FOREIGN KEY (id_paciente) REFERENCES paciente(id_paciente),
  FOREIGN KEY (id_dentista) REFERENCES dentista(id_dentista)
);
