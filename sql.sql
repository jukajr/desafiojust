-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.21-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela just.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela just.categorias: ~1 rows (aproximadamente)
DELETE FROM `categorias`;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(4, 'PUBG', '2017-09-18 18:24:54', '2017-09-18 18:24:54');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Copiando estrutura para tabela just.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_bin NOT NULL,
  `imagem` varchar(255) COLLATE utf8_bin NOT NULL,
  `texto` text COLLATE utf8_bin NOT NULL,
  `slug` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `fk_post_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela just.posts: ~1 rows (aproximadamente)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `categoria_id`, `titulo`, `imagem`, `texto`, `slug`, `created_at`, `updated_at`) VALUES
	(2, 4, 'Competitive PUBG Config Guide', '6bf15ed5ec9d845fdeb37907b197b84c.png', '<p>\r\n\r\n</p><p>We have created this guide to help you configure PUBG to optimize performance for competitive gameplay. We have discussed and tested these settings with some of the top players in the game and want to share the results with the PUBG community.</p><p><strong>Please Note: This guide is focusing on optimizing performance and competitive experience, not on making the game look nice.</strong></p><h2>CONFIG FILES</h2><p>This section is recommended for advanced users who are comfortable with editing config files.</p><p>Similar to the <strong>autoexec.cfg</strong>&nbsp;in Counter-Strike: Global Offensive, PlayerUnknown\'s Battlegrounds also has an editable config file which can be modified to improve performance.</p><p><strong>Warning: Since releasing this guide, PUBG has updated the FAQ on their forums to say that editing config files is against the Rules of Conduct, which could result in a ban. Edit the config files at your own risk.</strong></p><p>&nbsp;</p><p>Make sure the game is closed before attempting to edit the config files.</p><p>The config files are located in the following directory:</p><p>C:\\Users\\YOUR_USERNAME\\AppData\\Local\\TslGame\\Saved\\Config\\WindowsNoEditor</p><p>Which can be accessed by pressing WIN+R and copying this in:</p><p>%localappdata%\\TslGame\\Saved\\Config\\WindowsNoEditor</p><h3>&nbsp;</h3><h3>ENGINE.INI</h3><p>In the config directory explained above, you will find a file named <strong>Engine.ini</strong>, edit this file and change its contents to:</p><div>[/Script/Engine.RendererSettings]<br>r.DefaultFeature.Bloom=False<br>r.DefaultFeature.AmbientOcclusion=False<br>r.DefaultFeature.AmbientOcclusionStaticFraction=False<br>r.DefaultFeature.AutoExposure=False<br>r.DefaultFeature.MotionBlur=False<br>r.DepthOfFieldQuality=0<br>r.DepthOfField.MaxSize=0<br>r.SwitchGridShadow=0<br><br>[/Script/TslGame.TslEngine]<br>FrameRateCap=0</div><p>&nbsp;</p><p>These changes will remove post-processing effects which will improve performance and visibility. </p><p>The <strong>FrameRateCap=0</strong>&nbsp;will remove the FPS limit of 144, which will increase performance for some users. If removing the frame rate cap causes lag, you could try a limit of 240, or the default value of 144.</p><p>&nbsp;</p><h2>GAME SETTINGS</h2><h3>GRAPHICS / SCREEN</h3><ul><li>Screen Mode: <strong>Fullscreen</strong></li></ul><h3>GRAPHICS / QUALITY</h3><ul><li>Quality: <strong>Custom</strong></li><li>Screen Scale: <strong>100</strong></li><li>Anti-Aliasing: <strong>Very Low</strong></li><ul><li>Setting this to <strong>Very Low</strong>&nbsp;disables anti-aliasing, which is sometimes useful for spotting enemies in foliage.</li><li>Try using <strong>Very Low</strong>&nbsp;Anti-Aliasing instead of Reshade sharpening.</li><li>If you can\'t stand the jagged edges we recommend setting this to <strong>Low</strong>.</li></ul><li>Post-Processing: <strong>Very Low</strong></li><li>Shadows: <strong>Very Low</strong></li><li>Texture: <strong>Medium</strong></li><ul><li>If you have low VRAM we recommend setting this to <strong>Very Low</strong>.</li></ul><li>Effects: <strong>Very Low</strong></li><li>Foliage: <strong>Very Low</strong></li><li>View Distance: <strong>Ultra</strong></li><ul><li>Setting this to <strong>Ultra</strong>&nbsp;can help you spot objects that are further away, which is very useful while parachuting.</li></ul><li>Motion Blur: <strong>Disabled</strong></li><li>V-Sync: <strong>Disabled</strong></li></ul><h3>GAMEPLAY / UI</h3><ul><li>Inventory screen character render: <strong>Disabled</strong></li><ul><li>Disabling this setting removes the 3d view of your character in the inventory UI, which will improve performance and inventory loading time.</li></ul></ul><h3>GAMEPLAY / KEY INPUT METHOD</h3><ul><li>Peek: <strong>Toggle</strong>&nbsp;OR <strong>DoubleTap</strong></li><ul><li>Holding Q or E to lean makes it difficult to lean peek out of cover because you have to also press A or D. Use <strong>Toggle</strong>&nbsp;or <strong>DoubleTap</strong>instead of <strong>Hold </strong>to lean peek with ease.</li></ul></ul><p>&nbsp;</p><h2>VIBRANCE</h2><p>Some users rely on Reshade to add saturation, but this will slightly affect your FPS. We recommend changing the settings using your graphics card control panel instead.</p><p>For <strong>NVIDIA</strong>&nbsp;graphics cards, this setting is called <strong>Digital Vibrance</strong>.</p><p>For <strong>AMD </strong>graphics cards, this setting is called <strong>Color Saturation</strong>.</p><h3>AUTOMATING VIBRANCE</h3><p>Changing the settings on the graphics card will change the vibrancy on your desktop too. There is a tool which can automatically change these settings when you open/close the game.</p><p>This tool is open-source and free to use: <a target="_blank" rel="nofollow" href="https://vibrancegui.com/">VibranceGUI (https://vibrancegui.com/)</a></p><p><strong>How to configure VibranceGUI for PUBG:</strong></p><ol><li>Click the "Add manually" button</li><li>Navigate to where PUBG is installed and select the <strong>TslGame.exe</strong></li><ul><li>This is usually located: <strong>C:\\Program Files (x86)\\Steam\\steamapps\\common\\PUBG\\TslGame\\Binaries\\Win64\\TslGame.exe</strong></li></ul><li>Choose In-game Vibrancy level of <strong>100%</strong></li></ol>\r\n\r\n<br><p></p>', 'competitive-pubg-config-guide', '2017-09-18 18:30:07', '2017-09-18 18:30:07');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Copiando estrutura para tabela just.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela just.usuarios: ~1 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nome`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(24, 'Admin', 'admin@gmail.com', 'juvPVTGHVCTYA', '2017-09-18 02:24:58', '2017-09-18 06:29:37');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
