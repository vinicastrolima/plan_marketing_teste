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
    <li><p>Clone o repositório do projeto:</p></li>
    <pre><code>git clone https://github.com/vinicastrolima/plan_marketing_teste.git</code></pre>
    
    <li><p>Acesse a pasta do backend:</p></li>
    <pre><code>cd seu-projeto/backend</code></pre>
    
    <li><p>Instale as dependências do Composer:</p></li>
    <pre><code>composer install</code></pre>
    
    <li><p>Crie o arquivo de ambiente <code>.env</code>:</p></li>
    <pre><code>cp .env.example .env</code></pre>
    
    <li><p>Configure o arquivo <code>.env</code> com as informações do seu banco de dados e da porta que deseja usar:</p></li>
    <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu-database
DB_USERNAME=seu-usuario
DB_PASSWORD=sua-senha
...
APP_URL=http://localhost:8000  // Substitua pela sua URL</code></pre>
    
    <li><p>Gere a chave da aplicação:</p></li>
    <pre><code>php artisan key:generate</code></pre>
    
    <li><p>Execute as migrações do banco de dados:</p></li>
    <pre><code>php artisan migrate</code></pre>
    
    <li><p>Execute os seeders para popular o banco:</p></li>
    <pre><code>php artisan db:seed</code></pre>
    
    <li><p>Inicie o servidor backend:</p></li>
    <pre><code>php artisan serve</code></pre>
  </ol>

  <h2>Frontend</h2>
  <ol>
    <li><p>Acesse a pasta do frontend:</p></li>
    <pre><code>cd seu-projeto/frontend</code></pre>
    
    <li><p>Instale as dependências usando o npm:</p></li>
    <pre><code>npm install</code></pre>
    
    <li><p>Abra o arquivo <code>src/config.js</code> e verifique a variável <code>APP_URL</code>. Caso você tenha configurado uma porta diferente no backend, ajuste essa variável para corresponder à sua configuração.</p></li>
    <pre><code>// Exemplo
export const APP_URL = 'http://localhost:8000/api'; // Substitua pela sua URL</code></pre>
    
    <li><p>Inicie o servidor de desenvolvimento:</p></li>
    <pre><code>npm run serve</code></pre>
  </ol>
  
  <h2>Validações</h2>
  <p>As validações foram implementadas tanto no frontend quanto no backend. No frontend, as validações incluem verificar campos vazios, limites de caracteres e espaços extras. Certifique-se de usar o método <code>validateFields</code> para validar os campos antes de enviar os dados para o backend.</p>
</body>
</html>
