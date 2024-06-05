# Curso de Segurança em Aplicações Web (com PHP)
#Curso ministrado pelo Professor Carlos Ferrira - Especializati https://academy.especializati.com.br/

#Ferramentas:
- VScode,
- Docker,
- Mysql,
- Dbeaver ou outro SGBD(phpmyadmin, mysql workbench, outros).

- OBS: Este sistema no curso foi realizado com BD postgresql, porem neste repositorio foi modificado para o BD Mysql.

##Iniciando projeto
- git clone https://github.com/fsalles2022/web-security.git
- docker compose build
- docker compose up -d
- docker compose logs -f  (Verificar logs)
- docker compose exec app bash
- php -m | grep pdo_mysql (Verifica se tem o driver de pdo)
- OBS: docker build --no-cache -t app . (Caso seja necessário construir novamente, limpando qualquer dado que possa ficar armazenado em cache)
- Porta NGINX = - "8891:80"
- localhost:8891

##Acessar banco de dados
- docker compose exec -it db bash
- bash-5.1# mysql -u root -p
- Enter password: root (Informações de Conexão no arquivo conn.php).
- Porta MYSQL = ports:
      - "3309:3306"
- localhost:3309
- Seguir com as instrruções de criação e inserção de dados conforme mostrado no arquivo sql.sql

CREATE DATABASE security;

use security;

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (email, password) VALUES ('admin@admin.com', 'admin'); -- no security password

CREATE TABLE cars (
  id SERIAL PRIMARY KEY,
  brand VARCHAR(255),
  model VARCHAR(255),
  year INT
);
INSERT INTO cars (brand, model, year) VALUES ('Ford', 'Mustang', 1964);
INSERT INTO cars (brand, model, year) VALUES ('Hacked', '<script>alert("página hackeada")</script>', 1964);

###########################################################################################################

- Assuntos abordados no curso:

## SQL Injection
Usar PDO corretamente

## XSS
usar a função do PHP **htmlentities**

## CSRF
Usar um captcha ou token no formulário
```sh
curl -X POST http://localhost:8891/sql_injection_fixed.php \
     -H "Content-Type: application/x-www-form-urlencoded" \
     -d "email=example@example.com&password=securepassword"
```

## Outros
 - arquivo com infos das configs (phpinfo)
 - versão desatualizada da linguagem (php)
 - pacotes desatualizados
 - nenhuma técnica para multiplas requests
 - Pegar dados da request sem higienizar ($_GET $_POST e etc)
 - Criptografia !== de Hash
    - Criptografar dados sensíveis
 - Frameworks, eles ajudam sim!!!
 - use https (roubo de cookies)
   - Cloudflare
 - não estourar exceptions com dados sensíveis
 - não deixar dados sensíveis expostos no servidor (.env, .sql, .log)
 - usar senhas fortes
 - document root em um nível diferente do código
