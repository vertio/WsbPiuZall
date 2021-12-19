create schema if not exists `wsbpiuzal` default character set utf8
use `wsbpiuzal`;
create table bmi (  
bmi_id int unsigned not null auto_increment primary key,  
data_pomiaru datetime not null,    
wynik varchar(20) not null 
);