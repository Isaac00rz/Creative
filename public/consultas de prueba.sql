

use creative;

select * from clientes;

select rfc, concat(nombre,' ', apellidoP,' ',apellidoP) as nombreC, cp, direccion, correo, telefonoPersonal from 
clientes;

select * from sucursal;

select * from users;
SET FOREIGN_KEY_CHECKS=0;
truncate table users;
SET FOREIGN_KEY_CHECKS=1;
insert into users(id,name,email,password) values(null,'Admin','admin@hotmail.com','123123');

insert into sucursal values(null,'Leon I','Lomas #4445','Los altos',3554,4772596655,'creative@hotmail.com',NOW(),true,1);

insert into clientes values(374414,'Roberto','Rodriguez','Martinez','Valle de los tacos $425','Valle Alca',37544,4771234745,4442255,'Sapal@sapal.com',NOW(),true,1,1);

update clientes set Activo = 1 where rfc = 374414;

alter table users add (
username varchar(15) not null
);

select * from roles;
insert into roles values (1,'Administrador',0);