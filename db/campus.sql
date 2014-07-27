/**
 * Filename: cscup.sql
 * Author: LiuXintong
 * Date: 2013-9-21
 * Descriprion:  
 * Modify: import to MySQL
 *  None
 */

create database campus
default character set utf8
collate utf8_general_ci;

use database campus;

create table post (
  pid int unsigned not null auto_increment primary key,
  uid int unsigned not null,
  catid int unsigned not null,
  ptitle varchar(50),
  pdetail text,
  pcreated timestamp default current_timestamp,
  phit int unsigned default 0
) engine=myisam default charset=utf8;

create table comment (
  cid int unsigned not null auto_increment primary key,
  pid int unsigned not null,
  ccreated timestamp default current_timestamp,
  cdetail text,
  uname varchar(50),
  uemail varchar(50)
) engine=myisam default charset=utf8;

create table soption (
	sid int unsigned not null primary key,
	pid int unsigned,
	slide1i varchar(200),
	slide1h text,
	slide1p text,
	slide1a varchar(200),
	slide1b text,
	slide2i varchar(200),
	slide2h text,
	slide2p text,
	slide2a varchar(200),
	slide2b text,
	slide3i varchar(200),
	slide3h text,
	slide3p text,
	slide3a varchar(200),
	slide3b text,
	intro1h text,
	intro1p text,
	intro1a varchar(200),
	intro2h text,
	intro2p text,
	intro2a varchar(200),
	intro3h text,
	intro3p text,
	intro3a varchar(200),
	intro4h text,
	intro4p text,
	intro4a varchar(200),
	intro5h text,
	intro5p text,
	intro5a varchar(200),
	intro6h text,
	intro6p text,
	intro6a varchar(200)
) engine=myisam default charset=utf8;

create table category (
	catid int unsigned not null auto_increment primary key,
	sid int unsigned not null,
	catname varchar(20),
	catdesc varchar(500)
) engine=myisam default charset=utf8;

create table school (
	sid int unsigned not null auto_increment primary key,
	sname varchar(50),
	sdesc varchar(500),
	suser varchar(20) not null,
	spwd varchar(40) not null,
	semail varchar(100),
	screated timestamp default current_timestamp,
	slogged timestamp default current_timestamp on update current_timestamp
) engine=myisam default charset=utf8;

insert into post (pid, uid, catid, ptitle, pdetail, pcreated, phit) 
values ('1', '0', '0', '系统介绍', '这里是系统介绍', CURRENT_TIMESTAMP, '0');

delete from comment where pid in (select pid from post where uid = '5');
delete from post where uid = '5';
delete from category where sid = '5';
delete from school where sid = '5';
delete from soption where sid = '5';

