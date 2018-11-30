

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

select * from provedores;

select * from empleados;


SET FOREIGN_KEY_CHECKS=0;
drop table finman;
SET FOREIGN_KEY_CHECKS=1;


select * from mantenimiento;

insert into mantenimiento values(null,'Mantenimiento de impresora de sapal','2018/12/02',1,now(),1,1);
insert into mantenimiento values(null,'Mantenimiento de impresora de Bodega','2018/12/20',2,now(),1,1);
insert into mantenimiento values(null,'Mantenimiento de impresora de Creativos','2018/12/15',2,now(),1,1);
insert into mantenimiento values(null,'Mantenimiento de impresora de Aeoros','2018/11/01',3,now(),1,1);


select mantenimiento.id_Mantenimiento,mantenimiento.descripcion,fechaMan,mantenimiento.id_impresora,fecha, modelo,CONCAT(empleados.nombre, ' ',empleados.apellidoP,' ',empleados.apellidoM) as nombreC
from mantenimiento left join FinMan on mantenimiento.id_Mantenimiento = FinMan.id_Mantenimiento
left join empleados on FinMan.id_empleado = FinMan.id_empleado
inner join impresoras on mantenimiento.id_impresora = impresoras.id_impresora;

select * from FinMan;

insert into FinMan values (null,'Finalizacion normal','2018/11/02','Ninguno',5,1,now(),1);
