
# Teste Desenvolvedor PHP - UPD8

Criar um cadastro de cliente utilizando Laravel e Mysql.


## Instalação

Primeiro execute o composer dentro do projeto

```bash
  composer install
```

Depois configure seu banco de dados conforme *.env.example* e rode as seguintes configurações

```bash
  php artisan migrate
  php artisan db:seed
```

Ao rodar o comando *db:seed* será adicionado informaçoes a 4 tabelas

    1. Estado: Contém todos os Estados brasileiros;
    2. Cidade: Contém todas as Cidades brasileiras;
    3. Endereço: Serão cadastrados 15 endereços;
    4. Cliente: Serão cadastrados 15 clientes. Essa quantidade vai ajudar na hora da paginação.

