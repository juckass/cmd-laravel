/*
 Navicat Premium Data Transfer

 Source Server         : local-mysql-5.7
 Source Server Type    : MySQL
 Source Server Version : 50734
 Source Host           : localhost:3306
 Source Schema         : prueba-ilogica

 Target Server Type    : MySQL
 Target Server Version : 50734
 File Encoding         : 65001

 Date: 06/07/2021 00:35:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of media
-- ----------------------------
BEGIN;
INSERT INTO `media` VALUES (1, '/asset/media/mobsterjs.js', '2021-07-06 00:30:48', '2021-07-06 00:50:04', '2021-07-06 00:50:04');
INSERT INTO `media` VALUES (2, '/asset/media/app-preview-1png.png', '2021-07-06 00:48:38', '2021-07-06 00:48:38', NULL);
INSERT INTO `media` VALUES (3, '/asset/media/app-preview-2png.png', '2021-07-06 00:50:28', '2021-07-06 00:50:28', NULL);
INSERT INTO `media` VALUES (4, '/asset/media/app-preview-3png.png', '2021-07-06 00:50:35', '2021-07-06 00:50:35', NULL);
INSERT INTO `media` VALUES (5, '/asset/media/app-preview-4png.png', '2021-07-06 00:50:46', '2021-07-06 00:50:46', NULL);
INSERT INTO `media` VALUES (6, '/asset/media/app-showcasesvg.svg', '2021-07-06 00:51:01', '2021-07-06 00:51:01', NULL);
INSERT INTO `media` VALUES (7, '/asset/media/bg-hero-1svg.svg', '2021-07-06 00:51:11', '2021-07-06 00:51:11', NULL);
INSERT INTO `media` VALUES (8, '/asset/media/bg-hero-2svg.svg', '2021-07-06 00:51:19', '2021-07-06 00:51:19', NULL);
INSERT INTO `media` VALUES (9, '/asset/media/bg-testimonialsjpg.jpg', '2021-07-06 00:51:38', '2021-07-06 00:51:38', NULL);
INSERT INTO `media` VALUES (10, '/asset/media/hero-minisvg.svg', '2021-07-06 00:52:08', '2021-07-06 00:52:08', NULL);
INSERT INTO `media` VALUES (11, '/asset/media/illustration-contactsvg.svg', '2021-07-06 00:52:34', '2021-07-06 00:52:34', NULL);
INSERT INTO `media` VALUES (12, '/asset/media/pattern-1svg.svg', '2021-07-06 00:52:43', '2021-07-06 00:52:43', NULL);
INSERT INTO `media` VALUES (13, '/asset/media/pattern-2svg.svg', '2021-07-06 00:52:50', '2021-07-06 00:52:50', NULL);
INSERT INTO `media` VALUES (14, '/asset/media/pricing-pattern-grayscalesvg.svg', '2021-07-06 00:52:58', '2021-07-06 00:52:58', NULL);
INSERT INTO `media` VALUES (15, '/asset/media/pricing-patternsvg.svg', '2021-07-06 00:53:05', '2021-07-06 00:53:05', NULL);
INSERT INTO `media` VALUES (16, '/asset/media/alter-sportpng.png', '2021-07-06 00:53:53', '2021-07-06 00:53:53', NULL);
INSERT INTO `media` VALUES (17, '/asset/media/cleaning-servicepng.png', '2021-07-06 00:54:00', '2021-07-06 00:54:00', NULL);
INSERT INTO `media` VALUES (18, '/asset/media/creative-photopng.png', '2021-07-06 00:54:06', '2021-07-06 00:54:06', NULL);
INSERT INTO `media` VALUES (19, '/asset/media/global-tvpng.png', '2021-07-06 00:54:13', '2021-07-06 00:54:13', NULL);
INSERT INTO `media` VALUES (20, '/asset/media/net-sport-tvpng.png', '2021-07-06 00:54:21', '2021-07-06 00:54:21', NULL);
INSERT INTO `media` VALUES (21, '/asset/media/news-digital-tvpng.png', '2021-07-06 00:54:30', '2021-07-06 00:54:30', NULL);
INSERT INTO `media` VALUES (22, '/asset/media/spa-beautypng.png', '2021-07-06 00:54:39', '2021-07-06 00:54:39', NULL);
INSERT INTO `media` VALUES (23, '/asset/media/trivier-grouppng.png', '2021-07-06 00:54:46', '2021-07-06 00:54:46', NULL);
COMMIT;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(10) unsigned NOT NULL DEFAULT '0',
  `order` smallint(6) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
BEGIN;
INSERT INTO `menus` VALUES (1, 'Home', '/', 0, 0, 1, '2021-07-05 22:38:32', '2021-07-05 22:38:35');
INSERT INTO `menus` VALUES (2, 'Contact', 'contact', 0, 1, 1, '2021-07-05 22:39:03', '2021-07-06 04:19:37');
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_07_04_223809_paginas', 2);
INSERT INTO `migrations` VALUES (5, '2021_07_05_235513_media', 3);
INSERT INTO `migrations` VALUES (6, '2021_07_06_014915_menu', 4);
COMMIT;

-- ----------------------------
-- Table structure for paginas
-- ----------------------------
DROP TABLE IF EXISTS `paginas`;
CREATE TABLE `paginas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head` longtext COLLATE utf8mb4_unicode_ci,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `footer` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of paginas
-- ----------------------------
BEGIN;
INSERT INTO `paginas` VALUES (1, 'home', '/', '<link type=\"text/css\" rel=\"stylesheet\" href=\"/js/uploaded/owl.carousel.min1625448973.css\" />\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"/js/uploaded/animate1625448983.css\" />\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"/js/uploaded/maicons1625448535.css\" />\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"/js/uploaded/mobster1625448540.css\" />', '<div class=\"bg-image hero-home-1 page-hero-section\" style=\"background-image:url(../assets/img/bg_hero_1.svg)\">\r\n<div class=\"hero-caption pt-5\">\r\n<div class=\"container h-100\">\r\n<div class=\"align-items-center h-100 row\">\r\n<div class=\"col-lg-6 fadeInUp wow\">\r\n<div class=\"badge mb-2\">#2 Editor Choice App of 2020</div>\r\n\r\n<h1>Manage your Finance easier</h1>\r\n\r\n<p>Mobster has features to view and manage<br />\r\nour finances, such as transfer, and statistics.</p>\r\n<a class=\"btn btn-primary rounded-pill\" href=\"#\">Get App Now</a></div>\r\n\r\n<div class=\"col-lg-6 d-lg-block d-none wow zoomIn\">\r\n<div class=\"floating-animate img-place mobile-preview shadow\"><img alt=\"\" src=\"../assets/img/app_preview_1.png\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- Clients -->\r\n\r\n<div class=\"mt-5 page-section\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-3 col-sm-6 py-3 wow zoomIn\">\r\n<div class=\"client-img img-place\"><img alt=\"\" src=\"../assets/img/clients/alter_sport.png\" /></div>\r\n</div>\r\n\r\n<div class=\"col-lg-3 col-sm-6 py-3 wow zoomIn\">\r\n<div class=\"client-img img-place\"><img alt=\"\" src=\"../assets/img/clients/cleaning_service.png\" /></div>\r\n</div>\r\n\r\n<div class=\"col-lg-3 col-sm-6 py-3 wow zoomIn\">\r\n<div class=\"client-img img-place\"><img alt=\"\" src=\"../assets/img/clients/creative_photo.png\" /></div>\r\n</div>\r\n\r\n<div class=\"col-lg-3 col-sm-6 py-3 wow zoomIn\">\r\n<div class=\"client-img img-place\"><img alt=\"\" src=\"../assets/img/clients/global_tv.png\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- End clients -->\r\n\r\n<div class=\"bg-image position-realive\" style=\"background-image:url(../assets/img/pattern_1.svg)\">\r\n<div class=\"page-section\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-5 py-3\">\r\n<div class=\"img-place mobile-preview shadow wow zoomIn\"><img alt=\"\" src=\"../assets/img/app_preview_2.png\" /></div>\r\n</div>\r\n\r\n<div class=\"col-lg-6 mt-lg-5 py-3\">\r\n<div class=\"iconic-list\">\r\n<div class=\"fadeInUp iconic-item wow\">\r\n<div class=\"bg-warning fg-white iconic-md iconic-text rounded-circle\">&nbsp;</div>\r\n\r\n<div class=\"iconic-content\">\r\n<h5>Powerful Features</h5>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"fadeInUp iconic-item wow\">\r\n<div class=\"bg-info fg-white iconic-md iconic-text rounded-circle\">&nbsp;</div>\r\n\r\n<div class=\"iconic-content\">\r\n<h5>Fully Secured</h5>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"fadeInUp iconic-item wow\">\r\n<div class=\"bg-indigo fg-white iconic-md iconic-text rounded-circle\">&nbsp;</div>\r\n\r\n<div class=\"iconic-content\">\r\n<h5>Easy Monitoring</h5>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<script src=\"/js/uploaded/wow.min1625448927.js\"></script>              \r\n<script src=\"/js/uploaded/owl.carousel.min1625448951.js\"></script>\r\n <script src=\"/js/uploaded/google-maps1625448593.js\"></script>\r\n<script src=\"/js/uploaded/bootstrap.bundle.min1625448599.js\"></script>\r\n<script src=\"/js/uploaded/mobster1625448581.js\"></script>', '2021-07-04 23:09:53', '2021-07-05 01:37:29', NULL);
INSERT INTO `paginas` VALUES (2, 'Contact', 'contact', '<link type=\"text/css\" rel=\"stylesheet\" href=\"/js/uploaded/owl.carousel.min1625448973.css\" />\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"/js/uploaded/animate1625448983.css\" />\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"/js/uploaded/maicons1625448535.css\" />\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"/js/uploaded/mobster1625448540.css\" />', '<div class=\"bg-light\">\r\n\r\n  <div class=\"page-hero-section bg-image hero-mini\" style=\"background-image: url(../assets/img/hero_mini.svg);\">\r\n    <div class=\"hero-caption\">\r\n      <div class=\"container fg-white h-100\">\r\n        <div class=\"row justify-content-center align-items-center text-center h-100\">\r\n          <div class=\"col-lg-6\">\r\n            <h3 class=\"mb-4 fw-medium\">Contact</h3>\r\n            <nav aria-label=\"breadcrumb\">\r\n              <ol class=\"breadcrumb breadcrumb-dark justify-content-center bg-transparent\">\r\n                <li class=\"breadcrumb-item\"><a href=\"index.html\">Home</a></li>\r\n                <li class=\"breadcrumb-item active\" aria-current=\"page\">Contact</li>\r\n              </ol>\r\n            </nav>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n\r\n  <div class=\"page-section\">\r\n    <div class=\"container\">\r\n      <div class=\"row justify-content-center\">\r\n        <div class=\"col-lg-10 my-3 wow fadeInUp\">\r\n          <div class=\"card-page\">\r\n            <div class=\"row row-beam-md\">\r\n              <div class=\"col-md-4 text-center py-3 py-md-2\">\r\n                <i class=\"mai-location-outline h3\"></i>\r\n                <p class=\"fg-primary fw-medium fs-vlarge\">Location</p>\r\n                <p class=\"mb-0\">3 East Ridgewood Avenue Los Angeles, CA 90022</p>\r\n              </div>\r\n              <div class=\"col-md-4 text-center py-3 py-md-2\">\r\n                <i class=\"mai-call-outline h3\"></i>\r\n                <p class=\"fg-primary fw-medium fs-vlarge\">Contact</p>\r\n                <p class=\"mb-1\">+213 908 92034</p>\r\n                <p class=\"mb-0\">+415 123 89245</p>\r\n              </div>\r\n              <div class=\"col-md-4 text-center py-3 py-md-2\">\r\n                <i class=\"mai-mail-open-outline h3\"></i>\r\n                <p class=\"fg-primary fw-medium fs-vlarge\">Email</p>\r\n                <p class=\"mb-1\">support@mobster.com</p>\r\n                <p class=\"mb-0\">support@macodeid.com</p>\r\n              </div>\r\n            </div>\r\n          </div>\r\n        </div>\r\n        <div class=\"col-md-6 col-lg-5 my-3 wow fadeInUp\">\r\n          <div class=\"card-page\">\r\n            <h3 class=\"fw-normal\">Get in touch</h3>\r\n            <form method=\"POST\" class=\"mt-3\">\r\n              <div class=\"form-group\">\r\n                <label for=\"name\" class=\"fw-medium fg-grey\">Fullname</label>\r\n                <input type=\"text\" class=\"form-control\" id=\"name\">\r\n              </div>\r\n    \r\n              <div class=\"form-group\">\r\n                <label for=\"email\" class=\"fw-medium fg-grey\">Email</label>\r\n                <input type=\"text\" class=\"form-control\" id=\"email\">\r\n              </div>\r\n\r\n              <div class=\"form-group\">\r\n                <label for=\"phone\" class=\"fw-medium fg-grey\">Phone(optional)</label>\r\n                <input type=\"number\" class=\"form-control\" id=\"phone\">\r\n              </div>\r\n    \r\n              <div class=\"form-group\">\r\n                <label for=\"message\" class=\"fw-medium fg-grey\">Message</label>\r\n                <textarea rows=\"6\" class=\"form-control\" id=\"message\"></textarea>\r\n              </div>\r\n\r\n              <p>*Your information will never be shared with any third party.</p>\r\n    \r\n              <div class=\"form-group mt-4\">\r\n                <button type=\"submit\" class=\"btn btn-primary\">Send Message</button>\r\n              </div>\r\n            </form>\r\n          </div>\r\n        </div>\r\n        <div class=\"col-md-6 col-lg-7 my-3 wow fadeInUp\">\r\n          <div class=\"card-page\">\r\n            <div class=\"maps-container\">\r\n              <div id=\"myMap\"></div>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n\r\n</div> <!-- .bg-light -->\r\n\r\n\r\n<div class=\"page-footer-section bg-dark fg-white\">\r\n  <div class=\"container\">\r\n    <div class=\"row mb-5 py-3\">\r\n      <div class=\"col-sm-6 col-lg-2 py-3\">\r\n        <h5 class=\"mb-3\">Pages</h5>\r\n        <ul class=\"menu-link\">\r\n          <li><a href=\"#\" class=\"\">Features</a></li>\r\n          <li><a href=\"#\" class=\"\">Customers</a></li>\r\n          <li><a href=\"#\" class=\"\">Pricing</a></li>\r\n          <li><a href=\"#\" class=\"\">GDPR</a></li>\r\n        </ul>\r\n      </div>\r\n      <div class=\"col-sm-6 col-lg-2 py-3\">\r\n        <h5 class=\"mb-3\">Company</h5>\r\n        <ul class=\"menu-link\">\r\n          <li><a href=\"#\" class=\"\">About</a></li>\r\n          <li><a href=\"#\" class=\"\">Team</a></li>\r\n          <li><a href=\"#\" class=\"\">Leadership</a></li>\r\n          <li><a href=\"#\" class=\"\">Careers</a></li>\r\n          <li><a href=\"#\" class=\"\">HIRING!</a></li>\r\n        </ul>\r\n      </div>\r\n\r\n\r\n    </div>\r\n  </div>\r\n\r\n\r\n\r\n</div>', '<script src=\"/js/uploaded/wow.min1625448927.js\"></script>              \r\n<script src=\"/js/uploaded/owl.carousel.min1625448951.js\"></script>\r\n <script src=\"/js/uploaded/google-maps1625448593.js\"></script>\r\n<script src=\"/js/uploaded/bootstrap.bundle.min1625448599.js\"></script>\r\n<script src=\"/js/uploaded/mobster1625448581.js\"></script>\r\n                            \r\n<script async defer src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap\"></script>', '2021-07-05 01:49:59', '2021-07-05 01:52:03', NULL);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (5, 'Admin', 'admin@admin.cl', NULL, '$2y$10$HjzDzRqFjzJ1DlJ94VSPUO7YQ./VTcymKxoUbTnaP8c5czznGclni', NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
