create DATABASE Creative DEFAULT CHARACTER SET utf8 ;

use Creative;


create table Roles(
id  int(10) unsigned NOT NULL,
Rol varchar(15) default 'Usuario',
Matricula integer ,
PRIMARY KEY (id),
CONSTRAINT fk_usuario_id_f
FOREIGN KEY (id)
REFERENCES MiniSIIA.users (id)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

create table Sucursal(
id_Sucursal integer not null auto_increment,
nombre varchar(25) not null,
direccion varchar(30) not null,
colonia varchar(25) not null,
CP integer not null,
Telefono long not null,
correo varchar(35) not null,
FechaCreacion datetime default NOW(),
Activo boolean default true,
id  int(10) unsigned NOT NULL,
PRIMARY KEY (id_Sucursal, id),
INDEX fk_usuario_i (id ASC),
CONSTRAINT fk_usuario_f
FOREIGN KEY (id)
REFERENCES Creative.users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


create table Clientes(
RFC integer not null,
nombre varchar(20) not null,
apellidoP varchar(20) not null,
apellidoM varchar(20) not null,
direccion varchar(30) not null,
colonia varchar(25) not null,
CP integer not null,
TelefonoPersonal long not null,
TelefonoFijo long not null,
correo varchar(35) not null,
FechaCreacion datetime default NOW(),
Activo boolean default true,
id  int(10) unsigned NOT NULL,
id_Sucursal integer not null,
PRIMARY KEY (RFC,id_Sucursal, id),
INDEX fk_usuario_i (id ASC),
CONSTRAINT fk_usuario_Cliente
FOREIGN KEY (id)
REFERENCES Creative.users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT fk_sucursal_Cliente
FOREIGN KEY (id_Sucursal)
REFERENCES Creative.Sucursal (id_Sucursal)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;