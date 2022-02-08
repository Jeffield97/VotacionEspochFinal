CREATE TABLE auditoria_candidates (
  `id_auditoria` int NOT  NULL PRIMARY KEY AUTO_INCREMENT,
  id_candidato int,
  `name_copia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votes_copia` int NOT NULL,
  `lista_copia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_copia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` DateTime null
);

create trigger auditoria after update on  candidates
for each row
insert into auditoria_candidates (name_copia,id_candidato,votes_copia,lista_copia,image_copia,fecha)
values (new.name,new.id, new.votes,new.lista,new.image,CURRENT_TIMESTAMP);

drop trigger auditoria;


SELECT CURRENT_TIMESTAMP;  












