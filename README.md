# mercado
 Projeto criado para apresentar um mercado simples utilizando API RESTful com PHP (usando CakePHP).
 Para banco de dados foi utilizado MySQL.
 
 # Situação
 O projeto infelizmente não está completo, atualmente somente está funcionando os cadastros do cliente e produto na tela. Já o pedido não é possível cadastrar porque precisa adaptar para que adicione um ou mais produtos.
  
 Para poder executar o projeto do mercado terá que estar com internet funcionando porque o MySQL está disponível no site https://www.freemysqlhosting.net/.
Caso não for possível por motivos técnicos como por exemplo não estar com internet estável, ou o site que foi utilizado não estar no ar, deverá executar script disponível na categoria abaixo ou na ./config/schema/structures.sql no servidor do MySQL, que estão todos códigos para criação de tabelas necessários para o projeto. Após criar as tabelas deverá configurar o Datasources 'default' e 'test' que estão no arquivo ./config/app_local.php.
 
 # Query do banco de dados MySQL
 O query abaixo é script para criar tabelas.
 <pre>
create table cliente
(
    codigo_cliente int not null auto_increment,
    nome varchar(255) not null,
    cpf char(11) not null,
    sexo char(1) not null,
    email varchar(255) not null,
    constraint pk_codigo_cliente primary key (codigo_cliente),
    constraint ck_sexo check (sexo in ('F', 'M'))
);

create table produto
(
    codigo_produto int not null auto_increment,
    nome varchar(255) not null,
    cor varchar(50),
    tamanho int,
    valor decimal not null,
    constraint pk_codigo_produto primary key (codigo_produto)
);

create table pedido
(
    codigo_pedido int not null auto_increment,
    codigo_cliente int not null,
    data_pedido datetime not null,
    observacao varchar(255),
    forma_pagamento varchar(8) not null,
    constraint pk_codigo_pedido primary key (codigo_pedido),
    constraint ck_forma_pagamento check (forma_pagamento in ('dinheiro', 'cartao', 'cheque')),
    constraint fk_pedido_cliente foreign key (codigo_cliente) references cliente (codigo_cliente)
);

create table pedido_produto
(
    codigo_pedido int not null,
    codigo_produto int not null,
    quantidade int not null,
    constraint pk_pedido_produto primary key(codigo_pedido, codigo_produto),
    constraint fk_codigo_pedido foreign key (codigo_pedido) references pedido (codigo_pedido),
    constraint fk_codigo_produto foreign key (codigo_produto) references produto (codigo_produto)
);
 </pre>
 
 # Coleção do Postman
 Para testar alguns requests pode ser utilizado a coleção do Postman do link abaixo.
 https://www.getpostman.com/collections/53a5f5bd77fe77bbbf80
