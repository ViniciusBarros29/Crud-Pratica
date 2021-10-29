Create schema empresa
CREATE TABLE vendas(
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(45),
  usuário varchar(45),
  janeiro double,
  fevereiro double,
  março double,
  abril double,
  maio double,
  junho double,
  julho double,
  agosto double,
  setembro double,
  outubro double,
  novembro double,
  dezembro double,
  fixo double,
  datacontratacao date,
  PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `empresa`.`vendas` (`nome`, `janeiro`, `fevereiro`, `março`, `abril`, `maio`, `junho`, `julho`, `agosto`, `setembro`, `outubro`, `novembro`, `dezembro`, `fixo`, `datacontratacao`) VALUES ('Pedro', '2000', '3000', '4000', '5000', '6000', '7000', '8000', '9000', '10000', '11000', '12000', '13000', '1000', '1980-02-02');
INSERT INTO `empresa`.`vendas` (`nome`, `janeiro`, `fevereiro`, `março`, `abril`, `maio`, `junho`, `julho`, `agosto`, `setembro`, `outubro`, `novembro`, `dezembro`, `fixo`, `datacontratacao`) VALUES ('Ademir', '8000', '8000', '8000', '8000', '2000', '8000', '8000', '8000', '8000', '8000', '8000', '8000', '1000', '2000-02-02');
INSERT INTO `empresa`.`vendas` (`nome`, `janeiro`, `fevereiro`, `março`, `abril`, `maio`, `junho`, `julho`, `agosto`, `setembro`, `outubro`, `novembro`, `dezembro`, `fixo`, `datacontratacao`) VALUES ('Marcos', '13000', '12000', '13000', '11000', '10000', '9000', '8000', '7000', '6000', '5000', '3000', '2000', '1000', '2001-02-02');
INSERT INTO `empresa`.`vendas` (`nome`, `janeiro`, `fevereiro`, `março`, `abril`, `maio`, `junho`, `julho`, `agosto`, `setembro`, `outubro`, `novembro`, `dezembro`, `fixo`, `datacontratacao`) VALUES ('Jaime', '2000', '2000', '2000', '2000', '2000', '2000', '2000', '2000', '2000', '2000', '2000', '2000', '1000', '1960-02-02');
INSERT INTO `empresa`.`vendas` (`nome`, `janeiro`, `fevereiro`, `março`, `abril`, `maio`, `junho`, `julho`, `agosto`, `setembro`, `outubro`, `novembro`, `dezembro`, `fixo`, `datacontratacao`) VALUES ('Claudia', '6000', '7000', '8000', '9000', '10000', '11000', '12000', '13000', '14000', '15000', '16000', '17000', '5000', '2020-02-02');
