<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <h1>Guia de Configuração do Projeto</h1>
  <h2>Backend</h2>
  <ol>
    <li>Clone o repositório do projeto:</li>
    <pre><code>git clone https://github.com/seu-usuario/seu-projeto.git</code></pre>
    
    <li>Acesse a pasta do backend:</li>
    <pre><code>cd seu-projeto/backend</code></pre>
    
    <li>Instale as dependências do Composer:</li>
    <pre><code>composer install</code></pre>
    
    <li>Crie o arquivo de ambiente <code>.env</code>:</li>
    <pre><code>cp .env.example .env</code></pre>
    
    <li>Configure o arquivo <code>.env</code> com as informações do seu banco de dados e da porta que deseja usar:</li>
    <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu-database
DB_USERNAME=seu-usuario
DB_PASSWORD=sua-senha
...
APP_URL=http://localhost:8000  // Substitua pela sua URL</code></pre>
    
    <li>Gere a chave da aplicação:</li>
    <pre><code>php artisan key:generate</code></pre>
    
    <li>Execute as migrações do banco de dados:</li>
    <pre><code>php artisan migrate</code></pre>
    
    <li>Execute os seeders para popular o banco:</li>
    <pre><code>php artisan db:seed</code></pre>
    
    <li>Inicie o servidor backend:</li>
    <pre><code>php artisan serve</code></pre>
  </ol>

  <h2>Frontend</h2>
  <ol>
    <li>Acesse a pasta do frontend:</li>
    <pre><code>cd seu-projeto/frontend</code></pre>
    
    <li>Instale as dependências usando o npm:</li>
    <pre><code>npm install</code></pre>
    
    <li>Abra o arquivo <code>src/config.js</code> e verifique a variável <code>APP_URL</code>. Caso você tenha configurado uma porta diferente no backend, ajuste essa variável para corresponder à sua configuração.</li>
    <pre><code>// Exemplo
export const APP_URL = 'http://localhost:8000'; // Substitua pela sua URL</code></pre>
    
    <li>Inicie o servidor de desenvolvimento:</li>
    <pre><code>npm run serve</code></pre>
  </ol>
  
  <h2>Validações</h2>
  <p>As validações foram implementadas tanto no frontend quanto no backend. No frontend, as validações incluem verificar campos vazios, limites de caracteres e espaços extras. Certifique-se de usar o método <code>validateFields</code> para validar os campos antes de enviar os dados para o backend.</p>
</body>
</html>
