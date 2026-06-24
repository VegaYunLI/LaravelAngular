# Laravel API + Telas de Cadastro

Projeto Laravel com endpoints para cadastro de aluno, curso e professor, além de telas HTML simples em `telas-cadastro/`.

## Requisitos

- PHP 8.1 ou superior
- Composer
- MySQL ou Laragon
- Extensões PHP habilitadas: `pdo_mysql`, `mysqli` e `zip`

## Como Rodar Depois do Git Clone

Instale as dependências:

```bash
composer install
```

Crie o arquivo `.env`:

```bash
cp .env.example .env
```

No Windows PowerShell, se o comando acima não funcionar:

```powershell
Copy-Item .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Configure o banco no `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3308
DB_DATABASE=atividade2
DB_USERNAME=root
DB_PASSWORD=
```

Se estiver usando outra porta, altere `DB_PORT` conforme o seu MySQL. Por exemplo, no Laragon pode ser `3307`:

```env
DB_PORT=3307
```

Crie o banco `atividade2` no MySQL/Laragon e rode as migrations:

```bash
php artisan migrate
```

Inicie a API Laravel:

```bash
php artisan serve
```

A API ficará em:

```text
http://127.0.0.1:8000
```

## Rodar as Telas HTML

Em outro terminal, rode:

```bash
php -S 127.0.0.1:5500 -t telas-cadastro
```

Abra no navegador:

```text
http://127.0.0.1:5500/cadastrar-aluno.html
http://127.0.0.1:5500/cadastrar-curso.html
http://127.0.0.1:5500/cadastrar-professor.html
```

## Endpoints

```text
POST http://127.0.0.1:8000/api/aluno/add
POST http://127.0.0.1:8000/api/curso/add
POST http://127.0.0.1:8000/api/professor/add
```

Corpo da requisição:

```json
{
  "nome": "Nome Teste"
}
```

## Verificar Cadastros Criados

Depois de cadastrar pelo HTML, abra o console do navegador com `F12`. A resposta da API será exibida no console com os registros cadastrados.

Também é possível verificar direto no banco. Entre no MySQL:

```bash
mysql -u root -p
```

Se estiver usando Laragon com usuário `root` sem senha:

```bash
mysql -u root
```

Se o MySQL estiver em outra porta, por exemplo `3307`:

```bash
mysql -h 127.0.0.1 -P 3307 -u root
```

Depois execute:

```sql
USE atividade2;

SELECT * FROM aluno;
SELECT * FROM curso;
SELECT * FROM professor;
```

## Problemas Comuns

Se aparecer `could not find driver`, habilite `pdo_mysql` no `php.ini`.

Se aparecer erro de senha do MySQL, confira `DB_USERNAME` e `DB_PASSWORD` no `.env`.

Se abrir os HTMLs com `file:///`, pode ocorrer erro de origem no navegador. Use sempre:

```text
http://127.0.0.1:5500/cadastrar-aluno.html
```
