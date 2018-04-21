

CREATE TABLE `disposisi` (
  `id_disp` int(10) NOT NULL AUTO_INCREMENT,
  `id_surat` varchar(10) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `isi_disposisi` varchar(250) NOT NULL,
  `sifat` varchar(50) NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(250) NOT NULL,
  PRIMARY KEY (`id_disp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `surat_keluar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_agenda` varchar(10) NOT NULL,
  `no_surat` int(20) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `isi_ringkas` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO surat_keluar VALUES
("1","14012000","91837","DInas","2018-02-08","Kodir sudrajat","Pengetahuan tentang hari libur","Picture1.jpg"),
("2","0102937465","1818","Resmi","2018-02-08","SMP Yapida","Pengumuman","IMG_20161004_170504.jpg"),
("3","19264","146","Dinas","2018-02-09","Anggi Fitrahandika s.kom","Pemberitahuan hari libur","IMG_0031.JPG"),
("5","654","6135135","Resmi","2018-02-10","Kantor Kementrian Perhutanan","Hari tatanen sedunia","IMG_0012.JPG");




CREATE TABLE `surat_masuk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_agenda` varchar(10) NOT NULL,
  `no_surat` int(20) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `isi_ringkas` varchar(100) NOT NULL,
  `file` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;


INSERT INTO surat_masuk VALUES
("23","18734","474","Dinas","2018-02-19","2018-02-19","Polsek Cisayong","teuing","9434-2134-P1-SPK-Rekayasa Perangkat Lunak-K13 (1).",""),
("24","97","235","Resmi","2018-02-19","2018-02-19","Smpn 1 cisayong ","Nothing","Anggi Fitahandika.docx",""),
("25","38912","363","Resmi","2018-02-19","2018-02-19","Kantor kementrian","bla bla bla","Ada sebuah perusahaan software house akan membuah ",""),
("26","875","765","Resmi","2018-02-28","2018-02-28","Kantor kementrian ","isi","7-2-server-picture.png","Administrator");




CREATE TABLE `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `foto` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;


INSERT INTO user VALUES
("1","admin","21232f297a57a5a743894a0e4a801fc3","Administrator","admin","Laki Laki","user4.png"),
("5","user","ee11cbb19052e40b07aac0ca060c23ee","Anggi Fitrahandika","user","Laki Laki","user5.png"),
("6","petugas","afb91ef692fd08c445e8cb1bab2ccf9c","Petugas TU","user","Perempuan","user.png");


