/*
   Tabela de Usuários para autenticação da api
*/
create table lumen.users (

    id integer unsigned auto_increment,
    name varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    api_token varchar(60),
    created_at timestamp not null default CURRENT_TIMESTAMP,
    updated_at timestamp not null default CURRENT_TIMESTAMP,

    constraint PK_Users primary key (id)
);

/*
    Tabela de Ranking de heróis
*/
create table lumen.rankings (

    id integer unsigned auto_increment,
    title varchar(50) not null,
    alias varchar(5) not null,
    created_at timestamp not null default CURRENT_TIMESTAMP,
    updated_at timestamp not null default CURRENT_TIMESTAMP,

    constraint PK_Rankings primary key (id)
);

/*
    Tabela de registro de heróis
*/
create table lumen.heroes (

    id integer unsigned auto_increment,
    name varchar(50) not null,
    latitude numeric(10,10) not null, 
    longitude numeric(10,10) not null, 
    ranking_id integer unsigned, 
    created_at timestamp not null default CURRENT_TIMESTAMP,
    updated_at timestamp not null default CURRENT_TIMESTAMP,

    constraint PK_Hero primary key (id),
    constraint FK_Ranking foreign key (ranking_id) references rankings(id)
);

/*
    Tabela de registro de niveis de ameaças
*/
create table lumen.threat_levels (

    id integer unsigned auto_increment,
    title varchar(50) not null,
    created_at timestamp not null default CURRENT_TIMESTAMP,
    updated_at timestamp not null default CURRENT_TIMESTAMP,

    constraint PK_ThreatLevels primary key (id)
);

/*
    Tabela de registro de ameaças
*/
create table lumen.threats (

    id integer unsigned auto_increment,
    title varchar(50) not null,
    level_id integer unsigned,
    created_at timestamp not null default CURRENT_TIMESTAMP,
    updated_at timestamp not null default CURRENT_TIMESTAMP,

    constraint PK_Threats primary key (id),
    constraint FK_Level foreign key (level_id) references threat_levels(id)
);

/*
    Tabela de registro de status 
*/
create table lumen.status (

    id integer unsigned auto_increment,
    title varchar(50) not null,
    created_at timestamp not null default CURRENT_TIMESTAMP,
    updated_at timestamp not null default CURRENT_TIMESTAMP,

    constraint PK_Status primary key (id)
);

/*
    Tabela pivo de heroi e ameaças
*/
create table lumen.allocations (

    hero_id integer unsigned,
    threat_id integer unsigned,     
    status_id integer unsigned,
    created_at timestamp not null default CURRENT_TIMESTAMP,
    updated_at timestamp not null default CURRENT_TIMESTAMP,

    constraint PK_Threats primary key (hero_id,threat_id),
    constraint FK_Hero foreign key (hero_id) references heroes(id),
    constraint FK_Threat foreign key (threat_id) references threats(id),
    constraint FK_Status foreign key (status_id) references status(id)
);








