/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100410
 Source Host           : localhost:3306
 Source Schema         : elearning

 Target Server Type    : MySQL
 Target Server Version : 100410
 File Encoding         : 65001

 Date: 04/03/2020 12:06:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bab_pelajaran
-- ----------------------------
DROP TABLE IF EXISTS `bab_pelajaran`;
CREATE TABLE `bab_pelajaran`  (
  `id_bab_pelajaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_mata_pelajaran` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id_bab_pelajaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bab_pelajaran
-- ----------------------------
INSERT INTO `bab_pelajaran` VALUES (1, 1, 'Percabangan', '2020-03-03 23:06:46.565613');
INSERT INTO `bab_pelajaran` VALUES (2, 1, 'Pengulangan', '2020-03-03 23:06:46.565613');
INSERT INTO `bab_pelajaran` VALUES (3, 2, 'UI/UX', '2020-03-03 23:06:46.565613');
INSERT INTO `bab_pelajaran` VALUES (4, 3, 'LAN', '2020-03-03 23:06:46.565613');
INSERT INTO `bab_pelajaran` VALUES (5, 4, 'Fotografi', '2020-03-03 23:06:46.565613');
INSERT INTO `bab_pelajaran` VALUES (6, 5, 'Arduino', '2020-03-03 23:06:46.565613');

-- ----------------------------
-- Table structure for guru
-- ----------------------------
DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru`  (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_guru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_guru`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of guru
-- ----------------------------
INSERT INTO `guru` VALUES (1, '123123', 'Asep', 'admin@admin.com');
INSERT INTO `guru` VALUES (2, '123124', 'Bambang', 'nugraharizki21@gmail.com');
INSERT INTO `guru` VALUES (3, '123125', 'Cantika', 'nugraharizki80@student.upi.edu');

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas`  (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_mata_pelajaran` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `kode_unik` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kelas`) USING BTREE,
  INDEX `fk_mata_pelajaran_kelas`(`id_mata_pelajaran`) USING BTREE,
  INDEX `fk_id_guru_kelas`(`id_guru`) USING BTREE,
  CONSTRAINT `fk_mata_pelajaran_kelas` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `mata_pelajaran` (`id_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_guru_kelas` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES (5, 1, 1, 'KELAS1');
INSERT INTO `kelas` VALUES (6, 2, 2, 'KELAS2');
INSERT INTO `kelas` VALUES (7, 3, 3, 'KELAS3');

-- ----------------------------
-- Table structure for kontrak
-- ----------------------------
DROP TABLE IF EXISTS `kontrak`;
CREATE TABLE `kontrak`  (
  `id_kontrak` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` datetime(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id_kontrak`) USING BTREE,
  INDEX `fk_id_siswa_kontrak`(`id_siswa`) USING BTREE,
  INDEX `fk_id_kelas_kontrak`(`id_kelas`) USING BTREE,
  CONSTRAINT `fk_id_kelas_kontrak` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_siswa_kontrak` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kontrak
-- ----------------------------
INSERT INTO `kontrak` VALUES (17, 1, 5, '2020-03-04 11:27:47.597159', '2020-03-04 11:27:47.597159');
INSERT INTO `kontrak` VALUES (18, 7, 5, '2020-03-04 11:32:33.270798', '2020-03-04 11:32:33.270798');
INSERT INTO `kontrak` VALUES (19, 7, 6, '2020-03-04 11:33:12.993486', '2020-03-04 11:33:12.993486');
INSERT INTO `kontrak` VALUES (20, 7, 7, '2020-03-04 11:33:58.945546', '2020-03-04 11:33:58.945546');
INSERT INTO `kontrak` VALUES (21, 1, 7, '2020-03-04 11:59:28.070681', '2020-03-04 11:59:28.070681');

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for mata_pelajaran
-- ----------------------------
DROP TABLE IF EXISTS `mata_pelajaran`;
CREATE TABLE `mata_pelajaran`  (
  `id_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mata_pelajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_mata_pelajaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mata_pelajaran
-- ----------------------------
INSERT INTO `mata_pelajaran` VALUES (1, 'Pemrograman');
INSERT INTO `mata_pelajaran` VALUES (2, 'Desain');
INSERT INTO `mata_pelajaran` VALUES (3, 'Jaringan');
INSERT INTO `mata_pelajaran` VALUES (4, 'Multimedia');
INSERT INTO `mata_pelajaran` VALUES (5, 'Robotika');

-- ----------------------------
-- Table structure for materi_pelajaran
-- ----------------------------
DROP TABLE IF EXISTS `materi_pelajaran`;
CREATE TABLE `materi_pelajaran`  (
  `id_materi_pelajaran` int(11) NOT NULL,
  `id_bab_pelajaran` int(11) NOT NULL,
  `materi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_materi` int(11) NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_materi_pelajaran`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'admin');
INSERT INTO `role` VALUES (2, 'guru');
INSERT INTO `role` VALUES (3, 'siswa');

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa`  (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_siswa`) USING BTREE,
  UNIQUE INDEX `nis_unique`(`nis`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES (1, '123123123', 'Rizki Nugraha', 'nugraharizki80@gmail.com');
INSERT INTO `siswa` VALUES (2, '321321', 'Nugraha Rizki', 'developer@mail.com');
INSERT INTO `siswa` VALUES (4, '12332121237', 'Rizki Nugraha', 'nugraharizki80@gmail.co.id');
INSERT INTO `siswa` VALUES (5, '232132', 'Rizki Nugraha', 'nugraharizki80@gmail.co.in');
INSERT INTO `siswa` VALUES (7, '321213321123', 'Developer Handal', 'nugraharizki80@gmail.co.sp');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime(6) NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE INDEX `email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (11, 'nugraharizki80@gmail.com', '0192023a7bbd73250516f069df18b500', 3, '2020-03-04 11:17:13.419848');
INSERT INTO `user` VALUES (12, 'nugraharizki80@gmail.co.sp', '0192023a7bbd73250516f069df18b500', 3, '2020-03-04 11:19:40.439287');

SET FOREIGN_KEY_CHECKS = 1;
