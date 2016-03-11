--
-- Table structure for table `categories`
-- A multi row example table
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `forum`, `title`, `description`) VALUES
(1, 1, 'General Discussions', 'General web/wapmasters discussions forum.'),
(2, 1, 'Coding Forum', 'HTML, WML, CSS, mySQL, PHP, ASP, CGI, JavaScript coding discussions and help.'),
(3, 1, 'Scripts Forum', 'Free HTML, WML, CSS, mySQL, PHP scripts for websites and mobile wapsites.'),
(4, 1, 'Domains, Hosting, Servers', 'For general discussion about domain names, hosting, cPanel, Plesk etc.'),
(5, 1, 'Server Management', 'Linux commands. Server configuration, optimization and install instructions.'),
(6, 1, 'Site/Script testing/error fixing', 'Here you can ask for help fixing some script errors, or just ask for help testing your site with different mobile devices.'),
(7, 1, 'Design, Templates, Graphics', 'Logos, graphic tools, banners, anything to do with web design and graphics, CSS - styles, templates etc.'),
(8, 1, 'Marketplace', 'here you can sell your domains, scripts, modifications, design graphics or offer some paid services like script installation etc. You can also place here your requests if you want to buy some scripts.'),
(9, 2, 'Freelance Jobs &amp; Projects', 'looking for a coder to develop a website or just to make changes, upgrades, improvements to your site, post your job offers here.'),
(10, 2, 'Sites &amp; Links', 'Show us your sites.');

-- --------------------------------------------------------

--
-- Table structure for table `config`
-- A single row example table
--

CREATE TABLE IF NOT EXISTS `config` (
  `site_name` text NOT NULL,
  `site_logo` text NOT NULL,
  `timezone` text NOT NULL,
  `seo` text NOT NULL,
  `topics_per_page` int(11) NOT NULL,
  `categories_per_page` int(11) NOT NULL,
  `auto_delete_shouts` text NOT NULL,
  `show_shouts_to_guests` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`site_name`, `site_logo`, `timezone`, `seo`, `topics_per_page`, `categories_per_page`, `auto_delete_shouts`, `show_shouts_to_guests`) VALUES
('codemafia', 'core/images/codemafia.png', 'Europe/London', 'true', 10, 10, 'true', 'true');
