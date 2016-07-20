/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     18-Jun-16 00:23:43                           */
/*==============================================================*/


drop table if exists berkas_buku_tanah;

drop table if exists buku_tanah;

drop table if exists desa_kelurahan;

drop table if exists kecamatan;

drop table if exists loker;

drop table if exists peminjaman;

drop table if exists pengembalian;

drop table if exists user;

/*==============================================================*/
/* Table: berkas_buku_tanah                                     */
/*==============================================================*/
create table berkas_buku_tanah
(
   id_berkas            int not null AUTO_INCREMENT,
   no_buku              char(20) not null,
   keterangan           varchar(500) not null,
   lokasi               varchar(500) not null,
   primary key (id_berkas)
);

/*==============================================================*/
/* Table: buku_tanah                                            */
/*==============================================================*/
create table buku_tanah
(
   no_buku              char(20) not null,
   barcode              varchar(15) not null,
   id_desa_kel          int not null,
   id_loker             int not null,
   asal_hak             varchar(500) not null,
   nama_pemegang_hak    varchar(100) not null,
   jenis_hak            int not null,
   nomor_hak            varchar(5) not null,
   d_i_307              varchar(20) not null,
   d_i_208              varchar(20) not null,
   surat_ukur           varchar(10) not null,
   tgl_surat_ukur       date not null,
   luas                 int not null,
   tgl_terbit           date not null,
   penerbit             varchar(50) not null,
   penunjuk             varchar(700) not null,
   status_pinjam        int not null,
   primary key (no_buku)
);

/*==============================================================*/
/* Table: desa_kelurahan                                        */
/*==============================================================*/
create table desa_kelurahan
(
   id_desa_kel          int not null AUTO_INCREMENT,
   id_kecamatan         int not null,
   kode                 varchar(20) not null,
   nama_desa_kel        varchar(50) not null,
   primary key (id_desa_kel)
);

/*==============================================================*/
/* Table: kecamatan                                             */
/*==============================================================*/
create table kecamatan
(
   id_kecamatan         int not null AUTO_INCREMENT,
   kode                 varchar(20) not null,
   nama_kecamatan       varchar(50) not null,
   primary key (id_kecamatan)
);

/*==============================================================*/
/* Table: loker                                                 */
/*==============================================================*/
create table loker
(
   id_loker             int not null AUTO_INCREMENT,
   kode_loker           varchar(20) not null,
   keterangan           varchar(300) not null,
   primary key (id_loker)
);

/*==============================================================*/
/* Table: peminjaman                                            */
/*==============================================================*/
create table peminjaman
(
   id_peminjaman        int not null AUTO_INCREMENT,
   no_buku              char(20) not null,
   nip                  varchar(30) not null,
   status_peminjaman    int not null,
   tgl_pinjam           date not null,
   proses               varchar(500) not null,
   keterangan           varchar(500) not null,
   primary key (id_peminjaman)
);

/*==============================================================*/
/* Table: pengembalian                                          */
/*==============================================================*/
create table pengembalian
(
   id_pengembalian      int not null AUTO_INCREMENT,
   id_peminjaman        int not null,
   tanggal_pengembalian date not null,
   primary key (id_pengembalian)
);

/*==============================================================*/
/* Table: user                                                  */
/*==============================================================*/
create table user
(
   nip                  varchar(30) not null,
   password             char(64) not null,
   status               int not null,
   nama_lengkap         varchar(50) not null,
   primary key (nip)
);

alter table berkas_buku_tanah add constraint FK_berkas foreign key (no_buku)
      references buku_tanah (no_buku) on delete restrict on update restrict;

alter table buku_tanah add constraint FK_lokasi_desa foreign key (id_desa_kel)
      references desa_kelurahan (id_desa_kel) on delete restrict on update restrict;

alter table buku_tanah add constraint FK_loker_penyimpanan foreign key (id_loker)
      references loker (id_loker) on delete restrict on update restrict;

alter table desa_kelurahan add constraint FK_lokasi_kecamatan foreign key (id_kecamatan)
      references kecamatan (id_kecamatan) on delete restrict on update restrict;

alter table peminjaman add constraint FK_buku_dipinjam foreign key (no_buku)
      references buku_tanah (no_buku) on delete restrict on update restrict;

alter table peminjaman add constraint FK_peminjam_buku foreign key (nip)
      references user (nip) on delete restrict on update restrict;

alter table pengembalian add constraint FK_pengembalian_buku foreign key (id_peminjaman)
      references peminjaman (id_peminjaman) on delete restrict on update restrict;

