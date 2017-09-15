<h1>Teste para vaga de desenvolvedor</h1>
<br>
Uma API onde o usuário interage com POSTMAN, lendo em JSON e possui as seguintes rotas: <br>
<br>
POST    /cadastro - passa como parametro nome, email e senha para se cadastrar na aplicação;<br>
POST    /login - passa como parametro email e senha para se logar e gerar o token de acesso;<br>
GET     /pokemons - lista todos os pokemons do banco de dados;<br>
GET     /pokemon/:id - mostra os detalhes de um pokemon;<br>
POST    /pokemon/add - cadastra um novo pokemon com nome, tipo do pokemon, poder de ataque, poder de defesa e agilidade;<br>
PUT     /pokemon/:id - altera os dados do pokemon;<br>
DELETE  /pokemon/:id - remove um pokemon;<br>