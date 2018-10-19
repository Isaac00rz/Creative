create DATABASE Creative DEFAULT CHARACTER SET utf8 ;

use Creative;


create table Roles(
id  int(10) unsigned NOT NULL,
Rol varchar(15) default 'Usuario',
Matricula integer ,
PRIMARY KEY (id),
CONSTRAINT fk_usuario_id_f
FOREIGN KEY (id)
REFERENCES Creative.users (id)
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
INDEX fk_usuario_Sucursal (id ASC),
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
INDEX fk_usuario_Cliente_I (id ASC),
CONSTRAINT fk_usuario_Cliente_U
FOREIGN KEY (id)
REFERENCES Creative.users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT fk_sucursal_Cliente_S
FOREIGN KEY (id_Sucursal)
REFERENCES Creative.Sucursal (id_Sucursal)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


create table Provedores(
id_provedor integer not null auto_increment,
nombre varchar(20) not null,
apellidoP varchar(20) not null,
apellidoM varchar(20) not null,
direccion varchar(30) not null,
colonia varchar(25) not null,
CP integer not null,
TelefonoPersonal long not null,
TelefonoFijo long not null,
correo varchar(35) not null,
descripcion varchar(250),
FechaCreacion datetime default NOW(),
Activo boolean default true,
id  int(10) unsigned NOT NULL,
id_Sucursal integer not null,
PRIMARY KEY (id_provedor,id_Sucursal, id),
INDEX fk_usuario_Prove_I (id ASC),
CONSTRAINT fk_usuario_Pro
FOREIGN KEY (id)
REFERENCES Creative.users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT fk_sucursal_Pro
FOREIGN KEY (id_Sucursal)
REFERENCES Creative.Sucursal (id_Sucursal)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


create table Impresoras(
id_impresora integer not null auto_increment,
modelo varchar(20) not null,
marca varchar(20) not null,
existencias integer not null,
precio double not null,
costo double not null,
precioRenta double not null,
FechaCompra date,
FechaCreacion datetime default NOW(),
Activo boolean default true,
id  int(10) unsigned NOT NULL,
id_Sucursal integer not null,
PRIMARY KEY (id_impresora,id_Sucursal, id),
INDEX fk_usuario_Im_I (id ASC),
CONSTRAINT fk_usuario_Impre_F
FOREIGN KEY (id)
REFERENCES Creative.users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT fk_sucursal_Impre
FOREIGN KEY (id_Sucursal)
REFERENCES Creative.Sucursal (id_Sucursal)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


create table Fiyery(
id_impresora integer not null,
nombre varchar(35),
PRIMARY KEY (id_impresora),
INDEX fk_Fiyery_I (id_impresora ASC),
CONSTRAINT fk_Fiyery_Impre_f
FOREIGN KEY (id_impresora)
REFERENCES Creative.Impresoras (id_impresora)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


create table Consumibles(
id_consumible integer not null auto_increment,
nombre varchar(20) not null,
descripcion varchar(250),
existencias integer not null,
precio double not null,
costo float not null,
FechaCreacion datetime default NOW(),
Activo boolean default true,
id  int(10) unsigned NOT NULL,
id_Sucursal integer not null,
PRIMARY KEY (id_consumible,id_Sucursal, id),
INDEX fk_usuario_Con_I (id ASC),
CONSTRAINT fk_usuario_Cliente_F
FOREIGN KEY (id)
REFERENCES Creative.users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT fk_sucursal_Consu
FOREIGN KEY (id_Sucursal)
REFERENCES Creative.Sucursal (id_Sucursal)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

create table Compatibilidad(
id_consumible integer not null,
id_impresora integer not null,
PRIMARY KEY (id_consumible,id_impresora),
INDEX fk_Compa_I (id_impresora ASC),
CONSTRAINT fk_consu_F
FOREIGN KEY (id_consumible)
REFERENCES Creative.Consumibles (id_consumible)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT fk_Compa_Impre_f
FOREIGN KEY (id_impresora)
REFERENCES Creative.Impresoras (id_impresora)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

create table ComprasImpresoras(
id_compra integer not null auto_increment,
fecha datetime default NOW(),
precio double,
IVA integer, 
id  int(10) unsigned NOT NULL,
id_provedor integer not null,
PRIMARY KEY (id_compra,id_provedor, id),
INDEX fk_usuario_Com_Impr (id ASC),
CONSTRAINT fk_usuario_ComprasImpreso_F
FOREIGN KEY (id)
REFERENCES Creative.users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT fk_provedor_ComImpre_F
FOREIGN KEY (id_provedor)
REFERENCES Creative.Provedores (id_provedor)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

create table ModeloCompra(
id_compra integer not null,
modelo varchar(20) not null,
PRIMARY KEY (id_compra),
INDEX fk_ModeloCompra_I (id_compra ASC),
CONSTRAINT fk_compra_F
FOREIGN KEY (id_compra)
REFERENCES Creative.ComprasImpresoras (id_compra)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

create table ComprasConsumibles(
id_compraC integer not null auto_increment,
fecha datetime default NOW(),
precio double,
IVA integer, 
id  int(10) unsigned NOT NULL,
id_provedor integer not null,
PRIMARY KEY (id_compraC,id_provedor, id),
INDEX fk_usuario_ComC_Impr (id ASC),
CONSTRAINT fk_usuario_ComprasCon_F
FOREIGN KEY (id)
REFERENCES Creative.users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT fk_provedor_CompraConsu_F
FOREIGN KEY (id_provedor)
REFERENCES Creative.Provedores (id_provedor)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

create table ModeloConsumible(
id_compraC integer not null,
nombre varchar(25) not null,
PRIMARY KEY (id_compraC),
INDEX fk_ModeloConsumi_I (id_compraC ASC),
CONSTRAINT fk_compraConsu_F
FOREIGN KEY (id_compraC)
REFERENCES Creative.ComprasConsumibles (id_compraC)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

create table Ventas(
id_venta integer not null auto_increment,
descripcion varchar(150) not null,
FechaCompra datetime default NOW(),
IVA integer not null,
descuentoP integer,
descuentoE integer,
Activo boolean default true,
RFC_cliente integer not null,
id  int(10) unsigned NOT NULL,
id_Sucursal integer not null,
PRIMARY KEY (id_venta,id_Sucursal, id,RFC_cliente),
INDEX fk_usuario_Ventas_I (id ASC),
CONSTRAINT fk_usuario_Venta_F
FOREIGN KEY (id)
REFERENCES Creative.users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT fk_Sucursal_Venta_F
FOREIGN KEY (id_Sucursal)
REFERENCES Creative.Sucursal (id_Sucursal)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT fk_Cliente_Venta_F
FOREIGN KEY (RFC_cliente)
REFERENCES Creative.Clientes (RFC)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;