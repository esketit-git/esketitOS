DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(255) DEFAULT NULL,
  `tokenname` varchar(255) DEFAULT NULL,
  `softwaredescription` varchar(255) DEFAULT NULL,
  `whatsnew` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `companydescription` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `homepage` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `foldername` varchar(255) DEFAULT NULL,
  `ext` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `titleimage` varchar(255) DEFAULT NULL,
  `ss1` varchar(255) DEFAULT NULL,
  `ss2` varchar(255) DEFAULT NULL,
  `ss3` varchar(255) DEFAULT NULL,
  `ss4` varchar(255) DEFAULT NULL,
  `ss5` varchar(255) DEFAULT NULL,
  `ss6` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `releasedate` varchar(255) DEFAULT NULL,
  `agree` varchar(255) DEFAULT NULL,
  `approved` varchar(255) DEFAULT NULL,
  `a1` varchar(255) DEFAULT NULL,
  `b2` varchar(255) DEFAULT NULL,
  `c3` varchar(255) DEFAULT NULL,
  `d4` varchar(255) DEFAULT NULL,
  `e5` varchar(255) DEFAULT NULL,
  `f6` varchar(255) DEFAULT NULL,
  `g7` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `programs` (`id`, `author`, `tokenname`, `softwaredescription`, `whatsnew`, `version`, `company`, `companydescription`, `category`, `homepage`, `contact`, `filename`, `foldername`, `ext`, `icon`, `titleimage`, `ss1`, `ss2`, `ss3`, `ss4`, `ss5`, `ss6`, `price`, `releasedate`, `agree`, `approved`) VALUES
(1, 'Mike Rogers', 'Power Editor', 'Word Processer that lets you do everything', 'New menu items, bug fixes', '1.7', 'X-Soft', 'Software company', 'Gaming', 'powereditor.org', 'Emike@wp.org', 'wp.zip', 'pong', 'php', 'icon.png', 'titleimage.png', 'ss1.png', 'ss2.png', 'ss3.png', 'ss4.png', 'ss5.png', 'ss6.png', '0', '1/1/2010', '1', '0');

INSERT INTO `programs` (`id`, `author`, `tokenname`, `softwaredescription`, `whatsnew`, `version`, `company`, `companydescription`, `category`, `homepage`, `contact`, `filename`, `foldername`, `ext`, `icon`, `titleimage`, `ss1`, `ss2`, `ss3`, `ss4`, `ss5`, `ss6`, `price`, `releasedate`, `agree`, `approved`) VALUES
(2, 'Mike Rogerer', 'Game Editor', 'Game Processer that lets you do everything', 'New menu items, bug fixes', '1.7', 'X-Soft', 'Software company', 'Gaming', 'powereditor.org', 'Emike@wp.org', 'pong.zip', 'ping', 'php', 'icon.png', 'titleimage.png', 'ss1.png', 'ss2.png', 'ss3.png', 'ss4.png', 'ss5.png', 'ss6.png', '0', '1/1/2010', '1', '0');
