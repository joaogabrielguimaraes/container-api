Agora, dentro da pasta onde está o docker-compose.yml, execute:

docker-compose up -d
Isso fará o PHP com Apache e o MySQL subirem juntos!

Para testar, acesse o Postman:

http://localhost:8080/carros

--> Documentação da API de Cadastro de Carros

Esta API permite realizar operações de CRUD (Criar, Ler, Atualizar, Deletar) em itens. 
Os itens podem ser registrados com informações como "Marca", "Modelo", e "Ano".

* OBS retorno com erro: 

    {
        "error": "Rota não encontrada"
    }

<!-- Endereços (Endpoints) e Métodos HTTP -->

1. Método: POST - Cadastrar Carro

URL: http://localhost:8080/carros

Descrição: Cria um novo carro com as informações fornecidas no corpo da requisição.

EXEMPLO de inserção:

    {
        "marca": "Fiat",
        "modelo": "Uno",
        "ano": 2010
    }

Retorno com sucesso:

    {
        "status": "Carro inserido"
    }   

2. Método: GET - Listar Todos os Carros

URL: http://localhost:8080/carros

Descrição: Retorna todos os carros cadastrados.

EXEMPLO - retorno com sucesso:

    {
        "id": 2,
        "marca": "Fiat",
        "modelo": "Uno",
        "ano": 2010
    },
    {
        "id": 3,
        "marca": "Toyota",
        "modelo": "Corolla",
        "ano": 2020
    }

* Obter um carro específico utilizando o ID do mesmo.

URL: http://localhost:8080/carros/2

3. Método: PUT - Atualizar Item 

URL: http://localhost:8080/carros/id

Descrição: Atualiza as informações de um carro existente.

Exemplo de inserção:

    {
        "marca": "Fiat",
        "modelo": "Uno",
        "ano": 2010
    }

Resposta com sucesso:

    {
        "status": "Carro atualizado"
    }

5. Método: Delete - Deletar Item 

URL: http://localhost:8080/carros/id

Descrição: Deleta um carro específico.

Resposta com sucesso:

    {
        "message": "Carro excluído"
    }

<!-- Método de teste - Uso com o Postman -->

* POST: 

Selecione o método POST;

Insira a URL: http://localhost:8080/carros

Vá para a aba Body e selecione raw. Escolha o tipo JSON;

Insira o JSON, conforme mencionado anteriormente (1);

Clique em "Send" e veja a resposta no painel inferior;

* GET: 

Selecione o método GET;

Insira a URL: http://localhost:8080/carros

Insira a URL para obter um item específico por ID: http://localhost:8080/carros/id

Clique em "Send" e veja a resposta no painel inferior;

* PUT: 

Selecione o método PUT.

Insira a URL do item: http://localhost:8080/carros/id

Vá para a aba Body, selecione raw. Escolha o tipo JSON e insira as novas informações do item.

Clique em "Send" e veja a resposta no painel inferior;

* DELETE: 

Selecione o método DELETE.

Insira a URL do item a ser deletado: http://localhost:8080/carros/id

Clique em "Send" e veja a resposta no painel inferior;





