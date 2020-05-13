-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-07 08:32:12
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `wepaintphp`
--

-- --------------------------------------------------------

--
-- 資料表結構 `activity`
--

CREATE TABLE `activity` (
  `photoID` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `num` int(10) NOT NULL,
  `details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `activity`
--

INSERT INTO `activity` (`photoID`, `name`, `link`, `num`, `details`) VALUES
(3, 'Art Jamming/Social inclusion activites', '../image/art1.jpg', 1, 'Island School Social Inclusion and Autism Awareness Week'),
(3, 'Art Jamming/Social inclusion activities', '../image/art10.jpg', 10, 'The Mira Hotel'),
(3, 'Art Jamming/Social inclusion activities', '../image/art11.jpg', 11, 'The Mira Hotel'),
(3, 'Art Jamming/Social inclusion activites', '../image/art2.jpg', 2, 'Island School Social Inclusion and Autism Awareness Week'),
(3, 'Art jamming/Social inclusion activites', '../image/art3.jpg', 3, 'Social Inclusion Workshops with autistic youth in Tung Wah District Community Centre'),
(3, 'Art jamming/Social inclusion activites', '../image/art4.jpg', 4, 'Social Inclusion Workshops with autistic youth in Tung Wah District Community Centre'),
(3, 'Art Jamming/Social inclusion activites', '../image/art5.jpg', 5, 'Group Outdoor Painting for Hong Kong PHAB Association in Shatin City One'),
(3, 'Art Jamming/Social inclusion activites', '../image/art6.jpg', 6, 'Collaboration with Hong Kong Green Designers Association Projects'),
(3, 'Art Jamming/Social inclusion activities', '../image/art7.jpg', 7, 'Collaboration with Hong Kong Green Designers Association Projects'),
(3, 'Art Jamming/Social inclusion activities', '../image/art8.jpg', 8, 'Greenomarket Art Jamming workshops'),
(3, 'Art Jamming/Social inclusion activities', '../image/art9.jpg', 9, 'Greenomarket Art Jamming workshops'),
(5, 'Art Jamming workshop for Education University of Hong Kong', '../image/eduhk1.jpg', 1, ''),
(5, 'Art Jamming workshop for Education University of Hong Kong', '../image/eduhk2.jpg', 2, ''),
(5, 'Art Jamming workshop for Education University of Hong Kong', '../image/eduhk3.jpg', 3, ''),
(4, 'Participating SE in Baptist University Company Attachment Programme', '../image/se.jpg', 1, 'Provide attachment opportunities to BU marketing students '),
(6, 'School Social Inclusion Workshop for Secondary Schools', '../image/ss1.jpg', 1, ''),
(6, 'School Social Inclusion Workshop for Secondary Schools', '../image/ss2.jpg', 2, ''),
(6, 'School Social Inclusion Workshop for Secondary Schools', '../image/ss3.jpg', 3, ''),
(7, 'Art Jamming Workshops for Tseung Kwan O Community Family Service Centre', '../image/tko1.jpg', 1, ''),
(7, 'Art Jamming Workshops for Tseung Kwan O Community Family Service Centre', '../image/tko2.jpg', 2, ''),
(1, 'Wall paint trainings for Heep Hong Society members', '../image/wall1.jpg', 1, ''),
(1, 'Wall paint trainings for Heep Hong Society members', '../image/wall2.jpg', 2, ''),
(2, 'Household painting job', '../image/wall3.jpg', 1, ''),
(2, 'Household painting job', '../image/wall5.jpg', 2, '');

-- --------------------------------------------------------

--
-- 資料表結構 `autism`
--

CREATE TABLE `autism` (
  `id` int(5) NOT NULL,
  `engq` varchar(200) NOT NULL,
  `mark` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `autism`
--

INSERT INTO `autism` (`id`, `engq`, `mark`) VALUES
(1, 'I prefer to do things with others rather than on my own.', 'disagree'),
(2, 'I prefer to do things the same way over and over again.	', 'agree'),
(3, 'If I try to imagine something, I find it very easy to create a picture in my mind.	', 'disagree'),
(4, 'I frequently get so strongly absorbed in one thing that I lose sight of other things.	', 'agree'),
(5, 'I often notice small sounds when others do not.	', 'agree'),
(6, 'I usually notice car number plates or similar strings of information.	', 'agree'),
(7, 'Other people frequently tell me that what I have said is impolite, even though I think it is polite.	', 'agree'),
(8, 'When I am reading a story, I can easily imagine what the characters might look like.	', 'disagree'),
(9, 'I am fascinated by dates.', 'agree'),
(10, 'In a social group, I can easily keep track of several different people conversations.	', 'disagree'),
(11, 'I find social situations easy.	', 'disagree'),
(12, 'I tend to notice details that others do not.	', 'agree'),
(13, 'I would rather go to a library than to a party.	', 'agree'),
(14, 'I find making up stories easy.', 'disagree'),
(15, 'I find myself drawn more strongly to people than to things.	', 'disagree'),
(16, 'I tend to have very strong interests, which I get upset about if I cannot pursue.	', 'agree'),
(17, 'I enjoy social chitchat.', 'disagree'),
(18, 'When I talk, it is not always easy for others to get a word in edgewise.', 'agree'),
(19, 'I am fascinated by numbers.', 'agree'),
(20, 'When I am reading a story, I find it difficult to work out the characters intentions.	', 'agree'),
(21, 'I do not particularly enjoy reading fiction.', 'agree'),
(22, 'I find it hard to make new friends.', 'agree'),
(23, 'I notice patterns in things all the time.	', 'agree'),
(24, 'I would rather go to the theater than to a museum.', 'disagree'),
(25, 'It does not upset me if my daily routine is disturbed.', 'disagree'),
(26, 'I frequently find that I do not know how to keep a conversation going.', 'agree'),
(27, 'I find it easy to read between the lines when someone is talking to me.', 'disagree'),
(28, 'I usually concentrate more on the whole picture, rather than on the small details.', 'disagree'),
(29, 'I am not very good at remembering phone numbers.', 'disagree'),
(30, 'I do not usually notice small changes in a situation or a personal appearance.', 'disagree'),
(31, 'I know how to tell if someone listening to me is getting bored.', 'disagree'),
(32, 'I find it easy to do more than one thing at once.', 'disagree'),
(33, 'When I talk on the phone, I am not sure when it is my turn to speak.', 'agree'),
(34, 'I enjoy doing things spontaneously.', 'disagree'),
(35, 'I am often the last to understand the point of a joke.', 'agree'),
(36, 'I find it easy to work out what someone is thinking or feeling just by looking at their face.', 'disagree'),
(37, 'If there is an interruption, I can switch back to what I was doing very quickly.', 'disagree'),
(38, 'I am good at social chitchat.', 'disagree'),
(39, 'People often tell me that I keep going on and on about the same thing.', 'agree'),
(40, 'When I was young, I used to enjoy playing games involving pretending with other children.', 'disagree'),
(41, 'I like to collect information about categories of things (e.g., types of cars, birds, trains, plants).', 'agree'),
(42, 'I find it difficult to imagine what it would be like to be someone else.', 'agree'),
(43, 'I like to carefully plan any activities I participate in.', 'agree'),
(44, 'I enjoy social occasions.', 'disagree'),
(45, 'I find it difficult to work out people intentions.', 'agree'),
(46, 'New situations make me anxious.', 'agree'),
(47, 'I enjoy meeting new people.', 'disagree'),
(48, 'I am a good diplomat.', 'disagree'),
(49, 'I am not very good at remembering people date  of birth.', 'disagree'),
(50, 'I find it very easy to play games with children that involve pretending.', 'disagree');

-- --------------------------------------------------------

--
-- 資料表結構 `chattb`
--

CREATE TABLE `chattb` (
  `chatid` int(20) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `chatbody` text NOT NULL,
  `chatdate` varchar(10) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `chattb`
--

INSERT INTO `chattb` (`chatid`, `userID`, `chatbody`, `chatdate`, `date`) VALUES
(65, 'U1', 'Low Yokai', '7:23 pm', '30/10/2016'),
(100, 'U00000', 'Thx', '11:33 pm', '01/11/2016'),
(107, 'U2', 'HIHI', '3:20 pm', '02/11/2016'),
(108, 'U7', 'Hello, I am Nick Ng', '9:40 am', '03/11/2016'),
(110, 'U4', 'Hello, I am Hacker', '9:59 am', '04/11/2016'),
(113, 'U00000', 'Hey', '12:54 pm', '08/11/2016'),
(114, 'U00000', 'Gd afternonn everyone', '12:55 pm', '08/11/2016'),
(115, 'U8', 'Hello, I am Isis Liu', '2:59 pm', '10/11/2016'),
(116, 'U00000', 'Hello', '12:35 pm', '11/11/2016'),
(117, 'U2', 'Hello, I am Peter Chan', '11:27 am', '14/11/2016');

-- --------------------------------------------------------

--
-- 資料表結構 `colortb`
--

CREATE TABLE `colortb` (
  `colorid` int(20) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `colorbg` varchar(20) NOT NULL,
  `colortxt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `colortb`
--

INSERT INTO `colortb` (`colorid`, `userID`, `colorbg`, `colortxt`) VALUES
(1, 'U3', 'gray', 'yellow'),
(2, 'U1', 'brown', 'peach'),
(3, 'U00000', 'blue', 'skyblue'),
(4, 'U2', 'skyblue', 'brown'),
(5, 'U7', 'red', 'peach'),
(6, 'U4', 'yellow', 'yellowgreen'),
(7, 'U8', 'violet', 'pink');

-- --------------------------------------------------------

--
-- 資料表結構 `email`
--

CREATE TABLE `email` (
  `emailID` int(10) NOT NULL,
  `userID` varchar(10) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date` varchar(20) NOT NULL,
  `senderID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `email`
--

INSERT INTO `email` (`emailID`, `userID`, `topic`, `content`, `date`, `senderID`) VALUES
(1, 'U00000', 'The first email for testing', 'This is the first email', '25/10/2016', 'U00001'),
(2, 'U00001', 'The second reply email for testing', 'reply for email by admin', '28/10/2016', 'U00002'),
(3, 'U00000', 'This is third email', 'hello how are you?', '31/10/2016', 'U00002'),
(4, 'U00000', '123', '12313', '01/11/2016', 'U00001'),
(5, 'U00000', 'This is fifth Email', 'hey', '01/11/2016', 'U00002'),
(6, 'U00000', 'This is fifth Email', 'hey', '01/11/2016', 'U00002'),
(7, 'U00002', 'Hi admin', 'help me ok?i am autism people', '01/11/2016', 'U00000'),
(8, 'U00000', 'Hey Nick', 'I am admin', '08/11/2016', 'U7'),
(10, 'U2', 'HI', 'HI', '34/03/2011', 'U00000'),
(11, 'U7', 'Hi Admin', 'I am Nick Ng', '10/11/2016', 'U00000');

-- --------------------------------------------------------

--
-- 資料表結構 `information`
--

CREATE TABLE `information` (
  `infoID` int(10) NOT NULL,
  `infoName` varchar(200) NOT NULL,
  `infoDetail` varchar(1000) NOT NULL,
  `infoDate` varchar(50) NOT NULL,
  `infoUrl` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `information`
--

INSERT INTO `information` (`infoID`, `infoName`, `infoDetail`, `infoDate`, `infoUrl`) VALUES
(1, 'Art Jamming/Social inclusion activities', 'Collaboration with Hong Kong Green Designers Association Projects Sponsor eco-paint for Love Hong Kong Canvas shoes painting for Primary school students ', '25/08/14', 'image/art1.jpg'),
(2, 'Participating SE in Baptist University Company Attachment Programme', 'Provide attachment opportunities to BU marketing students \r\n', '13/09/15', 'image/se.jpg'),
(3, 'Art Jamming workshop for Education University of Hong Kong', 'N/A', '12/08/16', 'image/eduhk1.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `productID` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `productUrl` varchar(500) NOT NULL,
  `code` varchar(100) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`productID`, `price`, `productUrl`, `code`, `productName`, `description`) VALUES
(1, 300, 'image/abdc.jpg', 'ABDC01', 'Asante Botanical Disinfectant Cleaner', 'Canadian Product \r\nMade from thyme oil, essential oil and natural surfactant \r\nKills 99.99% of germs e.g. H1N1, swine influenza, SARS Coronavirus\r\nCan be used in smart phones cleaning, toilet cleaning, floor cleaning, door handle, baby furniture , as hands disinfectant \r\nVolume:750ml / 200ml'),
(2, 800, 'image/enmce.jpg', 'ENMCE02', 'Ecoscrub (Natural Odor, Moisture & Chemical Elimination)', 'Product from USA \r\nNatural Volcanic Rocks, Remove moisture, odor, chemical substances, i.e. VOC \r\n     \r\nCan be used in closets, shoe cabinets , refrigerators, handbags or other wet places\r\nRegenerable under direct sunlight after soaking in water'),
(3, 5000, 'image/airp.jpg', 'AIRP03', 'Air Purifier', 'HEPA Filter\r\nEliminates :\r\nDust, dust mites, \r\npet dander, pollen, bacteria, viruses and pollution including PM2.5'),
(4, 100, 'http://www.privaledge.net/pricing-strategy/wp-content/uploads/2013/09/13986273-new-product.jpg', 'TEST04', 'TEST', 'TEST'),
(5, 200, 'http://www.privaledge.net/pricing-strategy/wp-content/uploads/2013/09/13986273-new-product.jpg', 'TEST05', 'TEST', 'TEST'),
(6, 300, 'http://www.privaledge.net/pricing-strategy/wp-content/uploads/2013/09/13986273-new-product.jpg', 'TEST06', 'TEST', 'TEST'),
(7, 400, 'http://www.privaledge.net/pricing-strategy/wp-content/uploads/2013/09/13986273-new-product.jpg', 'TEST07', 'TEST', 'TEST'),
(8, 500, 'http://www.audiotrader.it/wordpress/wp-content/uploads/2014/03/tampon-new-350x333.jpg', 'TEST08', 'TEST', 'TEST'),
(9, 600, 'http://www.audiotrader.it/wordpress/wp-content/uploads/2014/03/tampon-new-350x333.jpg', 'TEST09', 'TEST', 'TEST'),
(10, 800, 'http://www.audiotrader.it/wordpress/wp-content/uploads/2014/03/tampon-new-350x333.jpg', 'TEST10', 'TEST', 'TEST');

-- --------------------------------------------------------

--
-- 資料表結構 `product_order`
--

CREATE TABLE `product_order` (
  `porderID` int(20) NOT NULL,
  `productCode` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `total` int(20) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `product_order`
--

INSERT INTO `product_order` (`porderID`, `productCode`, `quantity`, `userID`, `total`, `date`) VALUES
(1, 'ENMCE02', 5, 'U00001', 4000, '18/11/2017'),
(5, 'AIRP03', 1, 'U00002', 5000, '02/11/2016'),
(8, 'ENMCE02', 1, 'U00000', 800, '02/11/2016'),
(11, 'ABDC01', 3, 'U00002', 900, '07/11/2016'),
(12, 'AIRP03', 2, 'U00000', 10000, '20/11/2016'),
(13, 'ABDC01', 2, 'U00000', 600, '20/11/2016'),
(16, 'AIRP03', 1, 'U00000', 5000, '20/11/2016'),
(17, 'ABDC01', 1, 'U00000', 300, '07/12/2016');

-- --------------------------------------------------------

--
-- 資料表結構 `service`
--

CREATE TABLE `service` (
  `serviceID` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `serviceUrl` varchar(1000) NOT NULL,
  `code` varchar(50) NOT NULL,
  `serviceName` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `service`
--

INSERT INTO `service` (`serviceID`, `price`, `serviceUrl`, `code`, `serviceName`, `description`) VALUES
(1, 0, 'image/hp1.jpg', 'HP01', 'Household/Organiszations Painting', 'The price depend on the household.'),
(2, 0, 'image/hp2.jpg', 'RJ02', 'Repainting Jobs', 'The price will depend on the size.'),
(3, 0, 'image/ipa1.jpg', 'IPA03', 'Inclusive painting activity in community', 'The price will depend on many factors.');

-- --------------------------------------------------------

--
-- 資料表結構 `service_order`
--

CREATE TABLE `service_order` (
  `pserviceID` int(10) NOT NULL,
  `serviceCode` varchar(50) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `total` int(10) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `service_order`
--

INSERT INTO `service_order` (`pserviceID`, `serviceCode`, `userID`, `total`, `date`) VALUES
(1, 'HP01', 'U00000', 5000, '07/11/2016'),
(3, 'IPA03', 'U00000', 0, '07/11/2016'),
(4, 'IPA03', 'U00000', 0, '20/11/2016'),
(5, 'HP01', 'U00000', 0, '20/11/2016');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userID` varchar(10) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mark` int(5) NOT NULL DEFAULT '0',
  `brithday` varchar(20) NOT NULL,
  `registerDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`userID`, `icon`, `username`, `password`, `name`, `gender`, `address`, `tel`, `email`, `mark`, `brithday`, `registerDate`) VALUES
('U00000', 'http://www.qimrt.com/images/login-icon.png', 'admin', 'admin', 'Admin', 'F', 'House', 81068068, 'hkwepaint@gmail.com', 0, '12/08/1990', '05/10/2016'),
('U1', 'https://lh3.googleusercontent.com/YGqr3CRLm45jMF8eM8eQxc1VSERDTyzkv1CIng0qjcenJZxqV5DBgH5xlRTawnqNPc', 'testwong', 'testwong', 'Test Wong', 'M', '', 0, '', 0, '', '07/11/2016'),
('U2', 'http://i1054.photobucket.com/albums/s499/vadimzbanok/1327.jpg', 'peterchan', 'peterchan', 'Peter Chan', 'M', 'Flat 2451, Tsing Yi, Hong Kong', 2180005, 'peterchan@gmail.com', 24, '24/09/1984', '12/07/2016'),
('U3', '', 'testng', '', 'testng', 'M', 'Flat 1234,Tsing Yi', 81028332, 'tsingyi@gmail.com', 0, '28/007/1998', '07/11/2016'),
('U4', 'https://lh3.googleusercontent.com/YGqr3CRLm45jMF8eM8eQxc1VSERDTyzkv1CIng0qjcenJZxqV5DBgH5xlRTawnqNPc', 'hackerwong', 'hackerwong', 'Hacker Wong', 'F', 'Hacker Address', 21800000, 'hackerwong@gmail.com', 0, '28/12/1974', '07/11/2016'),
('U5', 'sdf', 'hkwepaint', 'hkwepaint', 'WE PAINT', 'M', 'dsf', 0, 'hkwepaint@gmail.com', 0, '12/12/2012', ''),
('U7', 'https://lh3.googleusercontent.com/YGqr3CRLm45jMF8eM8eQxc1VSERDTyzkv1CIng0qjcenJZxqV5DBgH5xlRTawnqNPc', 'nickng', 'nickng', 'Nick Ng', 'M', 'Flat 1943', 86452393, 'nickng@gmail.com', 0, '08/09/2010', '08/11/2016'),
('U8', 'http://rocketdock.com/images/screenshots/index_logo_star_trek-1.png', 'isisliu', 'isisliu', 'Isis Liu', 'F', 'Flat 1842,F House', 88694153, 'isisliu@gmail.com', 0, '12/06/2011', '10/11/2016'),
('U9', '', 'samwong', 'samwong', 'Sam Wong', 'M', 'SamHome', 12391273, 'sam@gmail.com', 0, '', '19/11/2016');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`link`);

--
-- 資料表索引 `autism`
--
ALTER TABLE `autism`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `chattb`
--
ALTER TABLE `chattb`
  ADD PRIMARY KEY (`chatid`);

--
-- 資料表索引 `colortb`
--
ALTER TABLE `colortb`
  ADD PRIMARY KEY (`colorid`);

--
-- 資料表索引 `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`emailID`);

--
-- 資料表索引 `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`infoID`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- 資料表索引 `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`porderID`);

--
-- 資料表索引 `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- 資料表索引 `service_order`
--
ALTER TABLE `service_order`
  ADD PRIMARY KEY (`pserviceID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `chattb`
--
ALTER TABLE `chattb`
  MODIFY `chatid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- 使用資料表 AUTO_INCREMENT `colortb`
--
ALTER TABLE `colortb`
  MODIFY `colorid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `email`
--
ALTER TABLE `email`
  MODIFY `emailID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用資料表 AUTO_INCREMENT `product_order`
--
ALTER TABLE `product_order`
  MODIFY `porderID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用資料表 AUTO_INCREMENT `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `service_order`
--
ALTER TABLE `service_order`
  MODIFY `pserviceID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
