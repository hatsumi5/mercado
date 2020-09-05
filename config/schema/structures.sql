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