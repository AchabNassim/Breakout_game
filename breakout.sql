/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  14/06/2022 12:53:01                      */
/*==============================================================*/


drop table if exists game;

drop table if exists user;

/*==============================================================*/
/* Table : game                                                 */
/*==============================================================*/
create table game
(
   gameId               int not null,
   userId               int not null,
   date                 varchar,
   timeSpent            int,
   score                int,
   reachedLevel         int,
   primary key (gameId)
);

/*==============================================================*/
/* Table : user                                                 */
/*==============================================================*/
create table user
(
   userId               int not null,
   name                 varchar,
   email                varchar,
   password             varchar,
   primary key (userId)
);

alter table game add constraint FK_Association_1 foreign key (userId)
      references user (userId) on delete restrict on update restrict;

