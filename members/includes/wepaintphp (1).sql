-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-03-29 16:03:49
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
-- 資料表結構 `article_img`
--

CREATE TABLE `article_img` (
  `id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `article_img`
--

INSERT INTO `article_img` (`id`, `path`) VALUES
(3, '../uploads/article/31374157275_10aeae2de6_o.jpg'),
(5, '../uploads/article/bg_07_environment.jpg'),
(6, '../uploads/article/Environment (1).jpg'),
(7, '../uploads/article/environment (2).jpg'),
(8, '../uploads/article/environment.jpg'),
(9, '../uploads/article/environment-1-612x336.jpg'),
(10, '../uploads/article/environment-759.jpg'),
(11, '../uploads/article/environmental.jpg'),
(12, '../uploads/article/environmental-conservation-concept-1024x682.jpg'),
(13, '../uploads/article/EnvironmentBG1.jpg'),
(14, '../uploads/article/EnvironmentHeader.jpg'),
(15, '../uploads/article/environment-title-image_tcm7-188217.jpg'),
(16, '../uploads/article/lecture_thumbnail_1376.jpg'),
(17, '../uploads/article/reduce-reuse-recycle-10-tips.jpg'),
(18, '../uploads/article/Yourstory_power_plants_environment.jpg'),
(21, '../uploads/article/iphoneconceptimage.jpg'),
(22, '../uploads/article/p7229461a775692825.jpg');

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
-- 資料表結構 `bg_color`
--

CREATE TABLE `bg_color` (
  `id` int(11) NOT NULL,
  `header` varchar(7) NOT NULL,
  `topbar` varchar(7) NOT NULL,
  `nav` varchar(7) NOT NULL,
  `slidebar` varchar(7) NOT NULL,
  `login` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `bg_color`
--

INSERT INTO `bg_color` (`id`, `header`, `topbar`, `nav`, `slidebar`, `login`) VALUES
(1, '#0e0e0e', '#001700', '#00b700', '#2d2d2d', '#008000');

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(2, 'Other'),
(3, 'News'),
(5, 'Health'),
(6, 'Arts'),
(7, 'Hong Kong'),
(8, 'Lifestyle'),
(9, 'Earth'),
(10, 'World');

-- --------------------------------------------------------

--
-- 資料表結構 `chattb`
--

CREATE TABLE `chattb` (
  `chatid` int(20) NOT NULL,
  `userID` varchar(100) NOT NULL,
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
(117, 'U2', 'Hello, I am Peter Chan', '11:27 am', '14/11/2016'),
(118, 'U27', 'hi\r\n', '12:21 pm', '13/01/2017'),
(119, 'fail', 'sadsa', '12:06 pm', '26/01/2017'),
(120, 'fail', 'sad', '12:06 pm', '26/01/2017'),
(121, 'U43', 'å°‡è»å±Žå ¡ éº»éº»åœ°', '9:02 pm', '14/02/2017');

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
-- 資料表結構 `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `fbId` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `userid`, `fbId`, `name`, `comment`, `date`, `ip`) VALUES
(7, 18, '', '', 'Guest', 'hello', '2017-02-06 16:00:00', '::1'),
(8, 18, '', '', 'Guest', 'test', '2017-02-06 16:00:00', '::1'),
(9, 18, '', '', 'Guest', 'hihi', '2017-02-06 16:00:00', '::1'),
(10, 19, '', '', 'Guest', 'good article !', '2017-02-07 16:00:00', '::1'),
(11, 19, '', '', '123456', '123456', '2017-02-07 16:00:00', '::1'),
(14, 15, '', '', 'Guest', 'éžå¸¸ç°¡å–®ï¼Œä¸€æ¯æ°´èˆ’ç·©å’³å—½å’Œæ„Ÿå†’ï¼', '2017-02-08 12:24:05', '::1'),
(16, 42, '', '', 'Guest', 'iPhone 8 ', '2017-02-13 15:27:01', '::1'),
(19, 42, '', '3', 'Tsz Him', 'cool, it''s time to change my iPhone', '2017-02-13 15:32:31', '::1'),
(21, 42, 'U27', '', 'apple', 'i love apple', '2017-02-13 15:58:03', '::1'),
(23, 42, 'U43', '', 'people', 'hi', '2017-02-14 12:59:21', '::1'),
(24, 16, 'U43', '', 'people', 'The tech enabling a man with quadriplegia to drive', '2017-02-14 13:00:10', '::1'),
(25, 42, '', '', 'Guest', 'i''m guest', '2017-02-14 15:58:07', '::1'),
(26, 42, '', '3', 'Tsz Him', 'testing', '2017-02-22 14:54:45', '::1');

-- --------------------------------------------------------

--
-- 資料表結構 `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(8) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `message`, `date`, `ip`) VALUES
(6, 'admin', 'test@test.com', 12345678, 'Testing by Admin', '2017-02-08 15:54:08', '0'),
(7, 'admin', 'admin@admin', 12345678, 'fixed IP data type', '2017-02-08 15:55:57', '::1');

-- --------------------------------------------------------

--
-- 資料表結構 `email`
--

CREATE TABLE `email` (
  `emailID` int(10) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date` varchar(20) NOT NULL,
  `senderID` varchar(100) NOT NULL
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
-- 資料表結構 `file`
--

CREATE TABLE `file` (
  `fileNo` int(10) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `fileTitle` varchar(100) NOT NULL,
  `fileContent` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `file`
--

INSERT INTO `file` (`fileNo`, `fileName`, `fileTitle`, `fileContent`) VALUES
(9, 'test1', 'test1', 'test1'),
(10, 'test2', 'test2', 'test2'),
(11, 'test3', 'test3', 'test3'),
(12, 'test4', 'test4', 'test4');

-- --------------------------------------------------------

--
-- 資料表結構 `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `path` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `images`
--

INSERT INTO `images` (`id`, `category`, `path`, `date`) VALUES
(380, 'activity', '../uploads/a.jpg', '2017-02-05'),
(381, 'activity', '../uploads/art0.jpg', '2017-02-05'),
(382, 'activity', '../uploads/art1.jpg', '2017-02-05'),
(383, 'activity', '../uploads/art2.jpg', '2017-02-05'),
(384, 'activity', '../uploads/art3.jpg', '2017-02-05'),
(385, 'activity', '../uploads/art4.jpg', '2017-02-05'),
(386, 'activity', '../uploads/art5.jpg', '2017-02-05'),
(387, 'activity', '../uploads/art6.jpg', '2017-02-05'),
(388, 'activity', '../uploads/art7.jpg', '2017-02-05'),
(389, 'activity', '../uploads/art8.jpg', '2017-02-05'),
(390, 'activity', '../uploads/art9.jpg', '2017-02-05'),
(391, 'activity', '../uploads/art10.jpg', '2017-02-05'),
(392, 'activity', '../uploads/art11.jpg', '2017-02-05'),
(393, 'activity', '../uploads/art12.jpg', '2017-02-05'),
(394, 'activity', '../uploads/art13.jpg', '2017-02-05'),
(395, 'activity', '../uploads/art14.jpg', '2017-02-05'),
(396, 'activity', '../uploads/art15.jpg', '2017-02-05'),
(397, 'activity', '../uploads/art16.jpg', '2017-02-05'),
(398, 'activity', '../uploads/art17.jpg', '2017-02-05'),
(399, 'activity', '../uploads/art18.jpg', '2017-02-05'),
(400, 'activity', '../uploads/art19.jpg', '2017-02-05'),
(401, 'project', '../uploads/pro0.jpg', '2017-02-05'),
(402, 'project', '../uploads/pro1.jpg', '2017-02-05'),
(403, 'project', '../uploads/pro2.jpg', '2017-02-05'),
(404, 'project', '../uploads/pro3.jpg', '2017-02-05'),
(405, 'project', '../uploads/pro4.jpg', '2017-02-05'),
(406, 'project', '../uploads/pro5.jpg', '2017-02-05'),
(407, 'project', '../uploads/pro6.jpg', '2017-02-05'),
(408, 'project', '../uploads/pro7.jpg', '2017-02-05'),
(409, 'project', '../uploads/pro8.jpg', '2017-02-05'),
(410, 'project', '../uploads/pro9.jpg', '2017-02-05'),
(411, 'test', '../uploads/29006632101_21461e2979_o.jpg', '2017-03-06');

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
-- 資料表結構 `login_info`
--

CREATE TABLE `login_info` (
  `id` int(11) NOT NULL,
  `type` varchar(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  `success` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `login_info`
--

INSERT INTO `login_info` (`id`, `type`, `username`, `date`, `ip`, `success`) VALUES
(41, '', 'ddd', '2016-12-28 12:33:45', '127.0.0.1', 'no'),
(42, '', '', '2016-12-28 12:38:40', '127.0.0.1', 'no'),
(43, '', '', '2016-12-28 12:38:42', '127.0.0.1', 'no'),
(44, '', '', '2016-12-28 12:39:13', '127.0.0.1', 'no'),
(45, '', '', '2016-12-28 12:40:05', '127.0.0.1', 'no'),
(46, '', '', '2016-12-28 12:40:07', '127.0.0.1', 'no'),
(47, '', '', '2016-12-28 12:40:26', '127.0.0.1', 'no'),
(48, '', '', '2016-12-28 12:40:48', '127.0.0.1', 'no'),
(49, '', '', '2016-12-28 12:40:54', '127.0.0.1', 'no'),
(50, '', 'admin', '2016-12-28 12:42:05', '127.0.0.1', 'yes'),
(51, '', 'admin', '2017-01-09 08:52:44', '127.0.0.1', 'yes'),
(52, '', 'admin', '2017-01-12 18:35:02', '127.0.0.1', 'yes'),
(53, '', 'admin', '2017-01-15 15:00:53', '127.0.0.1', 'yes'),
(54, '', 'admin', '2017-01-21 12:37:05', '127.0.0.1', 'yes'),
(55, '', 'admin', '2017-01-21 13:33:44', '127.0.0.1', 'yes'),
(56, '', 'admin', '2017-01-24 10:54:10', '127.0.0.1', 'yes'),
(57, '', 'admin', '2017-01-25 04:29:47', '127.0.0.1', 'yes'),
(58, '', 'admin', '2017-01-25 15:18:57', '127.0.0.1', 'yes'),
(59, '', 'admin', '2017-02-01 10:51:06', '127.0.0.1', 'yes'),
(60, '', 'admin', '2017-02-08 04:47:11', '::1', 'yes'),
(61, '', 'admin', '2017-02-08 11:41:57', '127.0.0.1', 'yes'),
(62, '', 'admin', '2017-02-14 07:32:30', '127.0.0.1', 'yes'),
(63, 'admin', 'aa', '2017-02-14 11:44:05', '127.0.0.1', 'no'),
(64, '', 'admin', '2017-02-14 12:24:08', '::1', 'yes'),
(65, '', 'admin', '2017-02-22 07:19:07', '127.0.0.1', 'yes'),
(66, '', 'admin', '2017-02-22 07:21:24', '127.0.0.1', 'yes'),
(67, '', 'admin', '2017-02-22 07:22:44', '127.0.0.1', 'yes'),
(68, '', 'admin', '2017-02-22 08:15:59', '127.0.0.1', 'yes'),
(69, '', 'admin', '2017-03-04 06:33:50', '127.0.0.1', 'yes'),
(70, '', 'admin', '2017-03-22 05:20:36', '::1', 'yes'),
(71, '', 'admin', '2017-03-29 11:54:49', '::1', 'yes');

-- --------------------------------------------------------

--
-- 資料表結構 `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `posted` date NOT NULL,
  `date_modified` date DEFAULT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `views` int(8) NOT NULL,
  `coverImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `body`, `category_id`, `posted`, `date_modified`, `keywords`, `description`, `views`, `coverImage`) VALUES
(11, 0, 'Hong Kong bamboo climbing frame project aims to change how children play', '&lt;h2&gt;A climbing frame made from bamboo is part of an initiative to draw Hong Kong children closer to nature and away from the usual plastic playground equipment&lt;/h2&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;Children hang like monkeys off bamboo scaffolding and shout as they clamber over the newly assembled climbing frame adjoining Tai Tam Country Park.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;&amp;ldquo;This is my hotel,&amp;rdquo; says one child, pointing to the three-metre structure shaped like a child&amp;rsquo;s drawing of a house. Bamboo sticks are strewn on the ground.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;Bamboo scaffolding is a common sight in Hong Kong, but the structure in Tai Tam serves another purpose. It&amp;rsquo;s a pilot jungle gym funded by the Agriculture, Fisheries and Conservation Department as part of a biodiversity festival that runs until the end of this month. More than 40 groups will host 130 eco-activities designed to connect Hongkongers with nature. Bamboo is regarded as a sustainable material of the future.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed image no-float&quot;&gt;Jenna Ho Marris, co-founder of eco-education centre Tai Tam Tuk Foundation and a leader of the bamboo gym project, says: &amp;ldquo;What if we could bring kids closer to nature, to get them playing with natural materials instead of the brightly coloured plastic junk that they are not that interested in anyway?&amp;rdquo;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed image no-float&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed image no-float&quot;&gt;&lt;span class=&quot;image-caption-container image-caption-container-none&quot;&gt;&lt;img class=&quot;caption lazyload-processed magic-processed loaded&quot; style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; title=&quot;Some believe Hong Kong children are not interested in playing in parks in the hot summer because the equipment is made of plastic.&quot; src=&quot;http://www.scmp.com/sites/default/files/styles/486w/public/images/methode/2016/12/19/3a239398-bdc6-11e6-b1a9-d0a597083a8f_486x.JPG?itok=Q4T1cnsI&quot; alt=&quot;&quot; data-original=&quot;http://www.scmp.com/sites/default/files/styles/486w/public/images/methode/2016/12/19/3a239398-bdc6-11e6-b1a9-d0a597083a8f_486x.JPG?itok=Q4T1cnsI&quot; data-ignore=&quot;true&quot; /&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;div class=&quot;image-caption-overlay&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;To that end, Ho Marris is also behind the White House Tai Tam project, a pilot school for two- to six-year-olds in Tai Tam Harbour, close to where the climbing frame has been erected. The project involves parents and Montessori teachers setting up a sustainable preschool in Hong Kong modelled on Indonesia&amp;rsquo;s Green School Bali in Ubud.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;The White House and bamboo gym are part of a push for a greener approach to play in the city. The government manages about 700 playgrounds, and most feature plastic and metal equipment. A video survey of five playgrounds conducted during the summer holidays in 2015 revealed they were deserted a quarter of the time. When children did show up, they made their own fun, climbing up the slides or playing with scooters and in flower beds.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;&amp;ldquo;There is too much emphasis on safety so it&amp;rsquo;s not challenging,&amp;rdquo; says Chris Yuen, director of Playright, the consultancy that carried out the survey.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed link&quot;&gt;&lt;a title=&quot;www.scmp.com&quot; href=&quot;http://www.scmp.com/news/hong-kong/education-community/article/2043491/game-plan-needed-hong-kongs-old-playgrounds-study&quot; shape=&quot;rect&quot;&gt;Game plan needed for Hong Kong&amp;rsquo;s old playgrounds, study finds&lt;/a&gt;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;Hong Kong is known for its focus on exams and extracurricular tutoring. A 2013 UN report on children&amp;rsquo;s rights found the competitive nature of its education system triggers anxiety and depression, and infringes on a child&amp;rsquo;s &amp;ldquo;right to play and rest&amp;rdquo;.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;&amp;ldquo;Chinese people underestimate the value of play,&amp;rdquo; says Yuen. &amp;ldquo;For them, play is a luxury, while homework is important.&amp;rdquo;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;Pioneers in childhood education, such as Italian physician Maria Montessori and Swiss clinical psychologist Jean Piaget, believed that play is children&amp;rsquo;s work; it allows them to learn to explore, and communicate. Unicef Hong Kong says at least one hour a day should be spent playing. According to the US-based Urban Parks Institute, the best playgrounds contain an element of adventure, where children of all ages create together, using &amp;ldquo;loose&amp;rdquo; materials such as bamboo, water, sand, twigs and stones.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;Bamboo, a grass, is an ideal material for playgrounds. And with 60 different species, Hong Kong has no shortage of it. The world&amp;rsquo;s fastest-growing plant &amp;ndash; some species grow almost a metre a day &amp;ndash; it is lighter and stronger than wood, brick or concrete, and rivals steel.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;&amp;ldquo;We want kids to create worlds around bamboo,&amp;rdquo; says Rachel Wilson, an educational consultant who devised a hands-on children&amp;rsquo;s workshop for the bamboo climbing frame project.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed image&quot;&gt;&lt;span class=&quot;image-caption-container image-caption-container-left&quot;&gt;&lt;img class=&quot;caption align-left c1 image-float-left lazyload-processed magic-processed loaded&quot; style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; title=&quot;Bamboo scaffolding is a Hong Kong speciality. Photo: AP&quot; src=&quot;http://www.scmp.com/sites/default/files/styles/486w/public/images/methode/2016/12/19/480d1654-bdc2-11e6-b1a9-d0a597083a8f_486x.JPG?itok=8mQYBMJ7&quot; alt=&quot;&quot; data-original=&quot;http://www.scmp.com/sites/default/files/styles/486w/public/images/methode/2016/12/19/480d1654-bdc2-11e6-b1a9-d0a597083a8f_486x.JPG?itok=8mQYBMJ7&quot; data-ignore=&quot;true&quot; /&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;div class=&quot;image-caption-overlay&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;&amp;ldquo;I loved climbing on the frame &amp;ndash; it was pretty cool and unique,&amp;rdquo; said Lok Pui-fong, a 10-year-old Grade 5 student from The Harbour School during a recent visit to Tai Tam. &amp;ldquo;I feel like I&amp;rsquo;m in a forest and I&amp;rsquo;ve built a hut.&amp;rdquo;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;Bamboo has played an important role in Chinese society since ancient times being used in food, art, culture and industry. It was so integral to everyday life that Song dynasty (960-1279) poet Su Shi said: &amp;ldquo;Life without meat would make one thin, whereas a life without bamboo would become unsophisticated.&amp;rdquo;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;It&amp;rsquo;s used to make chopsticks and toothpicks, furniture and houses, according to Twiggy Au, who curated an exhibition on bamboo at the Central Library in Causeway Bay this year.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed link&quot;&gt;&lt;a href=&quot;https://www.scmp.com/lifestyle/families/article/1925023/expert-teaches-hong-kong-families-how-play-meaningfully-children&quot;&gt;Expert teaches Hong Kong families how to play meaningfully with children&lt;/a&gt;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;A wide variety of products are made from bamboo, from bikes and watches to furniture and flooring. Beijing-based architectural firm Penda has even unveiled a concept for bamboo-only cities. The International Network for Bamboo and Rattan, an independent intergovernmental organisation that promotes innovative solutions to poverty and environmental sustainability using bamboo and rattan, estimates the market was worth US$60 billion in 2015.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;Master scaffolders in Hong Kong lash the sticks together with black nylon strips, creating structures within which high-rises are built.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;Creating something from nothing is the biggest accomplishment, says 33-year-old Chu Wing-fai, who spent two days with trainees erecting the bamboo climbing frame in Tai Tam.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;&amp;ldquo;I like doing neon signs most,&amp;rdquo; says Chu, who has 20 years experience and whose family has worked with bamboo for three generations. &amp;ldquo;There&amp;rsquo;s nothing below so you have to stick the bamboo out from the side of the buildings.&amp;rdquo;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed link&quot;&gt;&lt;a href=&quot;https://www.scmp.com/magazines/hk-magazine/article/2036336/ask-mr-know-it-all-why-do-they-still-use-bamboo-scaffolding&quot;&gt;Ask Mr. Know-It-All: Why do they still use bamboo scaffolding in Hong Kong?&lt;/a&gt;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;&amp;ldquo;What if schools have a pop-up bamboo playground that can be customised for their space?&amp;rdquo; Ho Marris suggests. &amp;ldquo;Kids can connect, design and build, then interact and play, and learn about nature, plants and heritage.&amp;rdquo;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;Asia does not have any permanent outdoor bamboo playgrounds. Heavy rain and intense sunlight can wreak havoc on bamboo, which also needs to be treated against insect attacks.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed image no-float&quot;&gt;The Green School (Bali) is a good example of such a structure; the award-winning ZCB Bamboo Pavilion, which stood in Kowloon Bay for nine months, is another. (Craftsmen used 473 bent bamboo poles to make the pavilion in the summer of 2015.)&lt;span class=&quot;image-caption-container image-caption-container-none&quot;&gt;&lt;img class=&quot;caption lazyload-processed magic-processed loaded&quot; style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; title=&quot;The Green School Bali in Ubud.&quot; src=&quot;http://www.scmp.com/sites/default/files/styles/486w/public/images/methode/2016/12/19/76b5a3c2-bdc2-11e6-b1a9-d0a597083a8f_486x.JPG?itok=q0AWu5XU&quot; alt=&quot;&quot; data-original=&quot;http://www.scmp.com/sites/default/files/styles/486w/public/images/methode/2016/12/19/76b5a3c2-bdc2-11e6-b1a9-d0a597083a8f_486x.JPG?itok=q0AWu5XU&quot; data-ignore=&quot;true&quot; /&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;div class=&quot;image-caption-overlay&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;&amp;ldquo;They used traditional material with contemporary working methods, form and geometry,&amp;rdquo; says Professor Kristof Crolla, who led the team. &amp;ldquo;It was a marriage of old and new.&amp;rdquo;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;There are no building codes to dictate how bamboo should be used in its raw form, says Crolla. &amp;ldquo;Our greatest aim was to open up the discussion about how natural bamboo can be used as a structural material.&amp;rdquo;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;Yuen believes the climbing frame is a good place to start, as it could set the benchmark for a concept that can be scaled up or down to suit different spaces. His job is to check it for safety, find out how high it can be built and the best surface to protect falling children. He also needs to work out building and maintenance costs.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed image no-float&quot;&gt;One challenge is that playground owners and designers have no guidelines on what makes a good play space. &amp;ldquo;They think a collection of equipment is enough,&amp;rdquo; Yuen says. Often it is the equipment makers who decide what a playground looks like.&lt;span class=&quot;image-caption-container image-caption-container-none&quot;&gt;&lt;img class=&quot;caption lazyload-processed magic-processed loaded&quot; style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; title=&quot;ZCB Bamboo Pavilion, which stood in Kowloon Bay for nine months in 2015.&quot; src=&quot;http://www.scmp.com/sites/default/files/styles/486w/public/images/methode/2016/12/19/91784e14-c0f4-11e6-85c8-a5c9105fe082_486x.JPG?itok=KwbjUARk&quot; alt=&quot;&quot; data-original=&quot;http://www.scmp.com/sites/default/files/styles/486w/public/images/methode/2016/12/19/91784e14-c0f4-11e6-85c8-a5c9105fe082_486x.JPG?itok=KwbjUARk&quot; data-ignore=&quot;true&quot; /&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;div class=&quot;image-caption-overlay&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;Yuen says parents are key to shaping play spaces, and need to encourage their children to take risks, to assess how high they can go.&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;&amp;ldquo;If parents support it then they can tell the government, they can add some pressure.&amp;rdquo;&lt;/p&gt;\r\n&lt;p class=&quot;v2-processed&quot;&gt;Source from&amp;nbsp;http://www.bbc.com/&lt;/p&gt;', 3, '2016-12-20', '2017-02-09', 'Lifestyle, Families, bamboo, architecture, play, children, playgrounds, educatio', 'A climbing frame made from bamboo is part of an initiative to draw Hong Kong children closer to natu', 3, ''),
(12, 0, '''Casper octopod under threat from deep sea mining''', '&lt;p class=&quot;story-body__introduction&quot;&gt;A deep sea octopod, dubbed &quot;Casper&quot; after the film ghost because of its appearance, could be at risk from mining, scientists say.&lt;/p&gt;\r\n&lt;p&gt;The animal, possibly a new species, was discovered last spring at depths of more than 4,000 metres (2.5 miles).&lt;/p&gt;\r\n&lt;p&gt;Studies suggest females nurture their eggs for several years on parts of the seabed that contain valuable metals.&lt;/p&gt;\r\n&lt;p&gt;Commercial companies are interested in harvesting metals and minerals from the bottom of the ocean.&lt;/p&gt;\r\n&lt;p&gt;There are growing concerns about the future impact of mining on life in the deep sea, much of which has yet to be discovered and categorised.&lt;/p&gt;\r\n&lt;p&gt;&lt;a class=&quot;story-body__link&quot; href=&quot;http://www.bbc.com/news/science-environment-38305989&quot;&gt;New marine life found in deep sea vents&lt;/a&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;a class=&quot;story-body__link&quot; href=&quot;http://www.bbc.com/news/world-us-canada-35736435&quot;&gt;Ghost-like ''Casper'' octopod discovered&lt;/a&gt;&lt;/p&gt;\r\n&lt;p&gt;The octopus lays its eggs on the dead stalks of sponges, attached to rocky crusts which are rich in metals like manganese.&lt;/p&gt;\r\n&lt;p&gt;The female then protects the eggs as they grow, perhaps for a number of years.&lt;/p&gt;\r\n&lt;p&gt;&quot;The brooding observation is important as these sponges only grow in some areas on small, hard nodules or rocky crusts of interest to mining companies because of the metal they contain,&quot; said Autun Purser, of the Alfred Wegener Institute''s Helmholtz Centre for Polar and Marine Research in Germany.&lt;/p&gt;\r\n&lt;p&gt;&quot;The removal of these nodules may therefore put the lifecycle of these octopods at risk.&quot;&lt;/p&gt;\r\n&lt;p&gt;The &quot;Casper&quot; octopod was spotted last year by the camera of a submersible vessel remotely operated by NOAA off Necker Island near Hawaii.&lt;/p&gt;\r\n&lt;p&gt;A type of octopus without fins, it crawls along the seafloor.&lt;/p&gt;\r\n&lt;p&gt;Jon Copley of the University of Southampton, who is not connected with the new research, said the record for octopus mothers keeping vigil over their eggs is four years, by another deep-sea species in the Pacific.&lt;/p&gt;\r\n&lt;p&gt;If this species is similar, then it could be particularly vulnerable to disturbance by deep-sea mining, he said.&lt;/p&gt;\r\n&lt;p&gt;&quot;This discovery shows how we need far greater understanding of fundamental ecology - and far greater knowledge of the natural history of individual species - in deep-sea environments being targeted for future mining, before its potential impacts can really be assessed,&quot; Dr Copley told BBC News.&lt;/p&gt;\r\n&lt;h2 class=&quot;story-body__crosshead&quot;&gt;Metal-rich deposits&lt;/h2&gt;\r\n&lt;p&gt;The German and US researchers investigated deep sea environments using remotely operated vehicles, and towed camera surveys, between 2011 and 2016.&lt;/p&gt;\r\n&lt;p&gt;They observed 29 octopods from two distinct species on the bottom of the Pacific Ocean off the Hawaiian Archipelago and in part of the Peru Basin.&lt;/p&gt;\r\n&lt;figure class=&quot;media-landscape has-caption full-width&quot;&gt;&lt;span class=&quot;image-and-copyright-container&quot;&gt;&lt;img class=&quot;responsive-image__img js-image-replace&quot; style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;http://ichef.bbci.co.uk/news/624/cpsprodpb/6E85/production/_93039282_octopod.jpg&quot; alt=&quot;An octopod brooding its eggs on the stalk of a dead deep-sea sponge&quot; width=&quot;976&quot; height=&quot;549&quot; data-highest-encountered-width=&quot;624&quot; /&gt;&lt;span class=&quot;off-screen&quot;&gt;Image copyright&lt;/span&gt;&lt;span class=&quot;story-image-copyright&quot;&gt;ALFRED WEGENER INSTITUTE&lt;/span&gt;&lt;/span&gt;&lt;figcaption class=&quot;media-caption&quot;&gt;&lt;span class=&quot;off-screen&quot;&gt;Image caption&lt;/span&gt;&lt;span class=&quot;media-caption__text&quot;&gt;An octopod brooding its eggs on the stalk of a dead deep-sea sponge&lt;/span&gt;&lt;/figcaption&gt;&lt;/figure&gt;\r\n&lt;p&gt;Two octopods were seen to be brooding clutches of eggs that were laid on stalks of dead sponges, which require manganese to grow and stay attached to these rocky crusts or nodules.&lt;/p&gt;\r\n&lt;p&gt;&quot;These nodules look a bit like a potato, and are made up of rings of different shells of metal-rich layers,&quot; said Dr Purser.&lt;/p&gt;\r\n&lt;p&gt;&quot;They are interesting to companies as many of the metals contained are &quot;high-tech&quot; metals, useful in producing mobile phones and other modern computing equipment, and most of the land sources of these metals have already been found and are becoming more expensive to buy.&quot;&lt;/p&gt;\r\n&lt;p&gt;The scientists say the future of octopods and other animals, large and small, must be considered when managing &quot;commercially attractive, yet bio-diverse and poorly understood deep sea ecosystems&quot;.&lt;/p&gt;\r\n&lt;p&gt;The research is published in the journal,&amp;nbsp;&lt;a class=&quot;story-body__link-external&quot; href=&quot;http://www.cell.com/current-biology/home&quot;&gt;Current Biology&lt;/a&gt;.&lt;/p&gt;\r\n&lt;p&gt;Follow Helen on&amp;nbsp;&lt;a class=&quot;story-body__link-external&quot; href=&quot;https://twitter.com/hbriggs?lang=en-gb&quot;&gt;Twitter&lt;/a&gt;.&lt;/p&gt;\r\n&lt;p&gt;Source from&amp;nbsp;http://www.bbc.com/news/science-environment-38366118&lt;/p&gt;', 9, '2016-12-20', NULL, 'Casper', '''Casper octopod under threat from deep sea mining''', 9, ''),
(13, 0, 'éœ§éœ¾è”½æ—¥ é ˆå…¨æ–¹ä½æ ¹æ²»', '&lt;p id=&quot;yui_3_9_1_1_1482314655912_945&quot; class=&quot;first&quot;&gt;ã€æ˜Ÿå³¶æ—¥å ±å ±é“ã€‘é€™å€‹å†¬å­£å¤©å¾ˆç°ï¼Œç¥žå·žå¤§åœ°éœ§éœ¾ç± ç½©é€¾åŠçœå¸‚ï¼Œå½±éŸ¿äº”å„„äººå£ã€‚ç•¶å±€å¦‚æžœä¸å…¨æ–¹ä½å¾žåš´æ²»éœ¾ï¼Œææ€•æœƒæœ‰æ„ˆä¾†æ„ˆå¤šç™¾å§“è³ ä¸Šå¥åº·å’Œç”Ÿå‘½ï¼Œä¹Ÿç‚ºåœ‹å®¶ç¶“æ¿Ÿå¸¶ä¾†é‡å¤§æå¤±ã€‚&lt;/p&gt;\r\n&lt;p&gt;ã€€ã€€åŒ—äº¬ä¸Šæ˜ŸæœŸäº”ä»¥ä¾†ï¼Œç™¼å‡ºæœ€é•·çš„éœ§éœ¾ç´…è‰²é è­¦ï¼Œå…¨å¸‚èƒ½è¦‹åº¦åŠ‡é™ï¼Œè¶…éŽäºŒç™¾ç­èˆªæ©Ÿè¦å–æ¶ˆï¼Œå¤šæ¢é«˜é€Ÿå…¬è·¯è¦å°é–‰ï¼Œé€Ÿéžæœå‹™å»¶èª¤ã€‚&lt;/p&gt;\r\n&lt;p&gt;ã€€ã€€åŒ—äº¬ä½œç‚ºé¦–éƒ½ï¼Œç©ºæ°£æ±¡æŸ“æƒ…æ³ç‰¹åˆ¥æƒ¹äººé—œæ³¨ã€‚å¯¦éš›ä¸Šï¼Œèˆ‡åŒ—äº¬åŒç—…ç›¸æ†çš„ï¼Œé‚„æœ‰å¤©æ´¥ã€é»‘é¾æ±Ÿã€å‰æž—ã€é¼å¯§ã€å±±æ±ã€æ²³åŒ—ã€æ²³å—ã€é™è¥¿ã€å±±è¥¿ã€æ¹–åŒ—ã€å®‰å¾½ã€æ±Ÿè˜‡ã€æ–°ç–†ã€å…§è’™å¤ã€å¯§å¤ã€ç”˜è‚…ã€‚åœ¨é€™åä¸ƒå€‹çœå¸‚å’Œè‡ªæ²»å€ä¸­ï¼Œä»¥æ²³åŒ—çš„çŸ³å®¶èŽŠæƒ…æ³æœ€ç‚ºåš´é‡ï¼Œç”¨ä¾†é‡åº¦ç©ºæ°£ä¸­ç´°å¾®æ‡¸æµ®ç²’å­çš„PM2.5æ¿ƒåº¦çˆ†è¡¨ï¼Œæ¯ç«‹æ–¹ç±³ç«Ÿé«˜é”ä¸€åƒå¤šå¾®å…‹ã€‚&lt;/p&gt;\r\n&lt;p id=&quot;yui_3_9_1_1_1482314655912_958&quot;&gt;ã€€ã€€é€™äº›ç›´å¾‘ä¸åŠäººçš„é ­é«®äºŒååˆ†ä¸€çš„å¾®ç²’ï¼Œé•·æ™‚é–“æ¼‚æµ®åœ¨ç©ºæ°£ä¸­ï¼Œäººé«”å¸å…¥éŽé‡ï¼Œå¯ä»¥å°Žè‡´å¿ƒè‡Ÿç—…ã€å“®å–˜å’Œè‚ºç™Œã€‚ä¸–ç•Œ ç”Ÿçµ„ç¹”çš„ç›®æ¨™æ˜¯ç”±äºŒåå››å°æ™‚æ¯ç«‹æ–¹ç±³å¹³å‡å€¼ä¸‰åäº”å¾®å…‹ï¼Œé€æ­¥é™è‡³åå¾®å…‹ã€‚ä¸­åœ‹ä½œç‚ºç™¼å±•ä¸­ç¶“æ¿Ÿï¼Œå®šå¾—å¯¬é¬†ä¸€é»žï¼Œä¹Ÿåªæ˜¯ä¸ƒåäº”å¾®å…‹ï¼Œå¯è¦‹ä»Šæ¬¡çš„æ±¡æŸ“è¶…æ¨™ä½•å…¶åš´é‡ã€‚&lt;/p&gt;\r\n&lt;p&gt;ã€€ã€€è¯ç©ºæ°£æ±¡æŸ“æ­»äº¡çŽ‡é«˜&lt;/p&gt;\r\n&lt;p&gt;ã€€ã€€ä¸­åœ‹æ˜¯ç©ºæ°£æ±¡æŸ“ç›¸é—œç–¾ç—…æ­»äº¡çŽ‡ç¬¬å…­é«˜çš„åœ‹å®¶ï¼Œç§‘å­¸å®¶ä¼°è¨ˆåœ¨äºŒâ—‹ä¸€ä¸‰å¹´ä¸­åœ‹æœ‰ä¸€ç™¾å…­åè¬äººå› ç©ºæ°£æ±¡æŸ“è€Œæ—©æ­»ã€‚æœ‰éŒ¢å»è³ ä¸Šå¥åº·ï¼Œç”šè‡³ç¸®çŸ­å£½å‘½ï¼Œåˆ’ä¸åˆ’ç®—ï¼Œå¤§å®¶å¿ƒä¸­æœ‰æ•¸ã€‚&lt;/p&gt;\r\n&lt;p&gt;ã€€ã€€ä½†æ˜¯ï¼Œåœ‹æ°‘ç”Ÿç”¢ç¸½å€¼å¢žé•·çŸ­æœŸè¦‹åŠŸï¼Œç©ºæ°£æ±¡æŸ“å°å¥åº·çš„å±å®³å»æ˜¯é•·æœŸéŽç¨‹ï¼Œåœ°æ–¹æ”¿åºœè¦ä¿ç¶“æ¿Ÿå¢žé•·ï¼Œè¦ä¿ä¸€äº›å·¨åž‹è€èˆŠä¼æ¥­çš„ç”Ÿå­˜å’Œå“¡å·¥é£¯ç¢—ï¼Œå†åŠ ä¸Šè²ªæ±¡å•é¡Œå’Œæƒ¡æ€§ç«¶çˆ­ï¼Œå°Žè‡´ä¸å°‘ç›£ç®¡æ±¡æŸ“ç‰©æŽ’æ”¾çš„æ¢ä¾‹ï¼ŒåŽ»åˆ°åœ°æ–¹å±¤é¢å³ç„¡æ³•æœ‰æ•ˆåŸ·è¡Œï¼Œæ·ªç‚ºç©ºæ–‡ã€‚&lt;/p&gt;\r\n&lt;p&gt;ã€€ã€€æ­¤å¤–ï¼Œéƒ¨åˆ†æ”¹å–„ç©ºæ°£è³ªç´ çš„æŽªæ–½ï¼ŒæŽ¨è¡Œèµ·ä¾†ç¼ºä¹æ†å¿ƒæ¯…åŠ›ï¼Œç”šè‡³å¯èƒ½åªç‚ºæ‡‰ä»˜ä¸€æ™‚çŸ­æš«éœ€è¦ï¼Œä¾‹å¦‚åŒ—äº¬åœ¨å¥§é‹å’Œäºžå¤ªç¶“æ¿Ÿåˆä½œçµ„ç¹”æœƒè­°æœŸé–“çš„è—å¤©ï¼Œå°±æ·ªç‚ºé–€é¢å·¥å¤«ï¼ŒéŽå¾Œæ±¡æŸ“è®Šæœ¬åŠ åŽ²ã€‚&lt;/p&gt;\r\n&lt;p&gt;ã€€ã€€æ”¿ç­–çŸ›ç›¾åˆåŸ·æ³•ä¸åŠ›&lt;/p&gt;\r\n&lt;p&gt;ã€€ã€€æœ‰äº›æŽªæ–½å‰‡æ¬ å‘¨å…¨è€ƒæ…®ï¼Œç”šè‡³æŽ©è€³ç›œéˆ´ï¼Œä¾‹å¦‚æŠŠåŒ—äº¬éƒ¨åˆ†é«˜æ±¡æŸ“å·¥å» æ¬åŽ»æ²³åŒ—ï¼Œåªæ˜¯æŠŠæ±¡æŸ“æºæ¬åŽ»å¦ä¸€å€‹åœ°æ–¹ï¼Œä¸åœ¨è‡ªå·±å®¶é–€å£ï¼Œä½†æ˜¯ç©ºæ°£æ±¡æŸ“ç„¡é‚Šç•Œï¼Œæ²³åŒ—ç”¢ç”Ÿçš„æ±¡æŸ“ï¼Œä¸€æ¨£æœƒéš¨é¢¨é£„åŽ»åŒ—äº¬ã€‚&lt;/p&gt;\r\n&lt;p&gt;ã€€ã€€å†¬å¤©åŒ—æ–¹å¤šäººç‡’ç‚­å–æš–ï¼Œå‡ºå£å¾©ç”¦å·¥å» å¢žç”¢ç”¨é›»å¢žåŠ ï¼Œä¹Ÿå¢žåŠ äº†ç‚­æ¶ˆè€—ï¼Œå°¤ä»¥æ±åŒ—åœ°å€çš„èˆŠåž‹é‡å·¥æ¥­åŸºåœ°ç‚ºç„¶ã€‚æ­¤å¤–ï¼Œæ”¿åºœç‚ºäº†æ‰¶æ¤æ±½è»Šå·¥æ¥­ï¼ŒæŽ¨å‡ºç¨®ç¨®æŽªæ–½è£œè²¼ç™¾å§“è²·è»Šï¼Œäº¦å°Žè‡´åŸŽå¸‚äº¤é€šåš´é‡æ“ å¡žå’Œç©ºæ°£æ±¡æŸ“ã€‚ä¸€é‚Šè¦æ”¹å–„ç©ºæ°£è³ªç´ ï¼Œä¸€é‚Šé¼“å‹µç™¾å§“è²·è»Šï¼Œä¸åŒéƒ¨é–€çš„æ”¿ç­–äº’ç›¸çŸ›ç›¾ã€‚&lt;/p&gt;\r\n&lt;p&gt;ã€€ã€€ç©ºæ°£æ±¡æŸ“åš´é‡ï¼Œä¸ä½†æ§‹æˆç™¾å§“ä¸ä¾¿ï¼Œæå®³ç™¾å§“å¥åº·ï¼Œè€Œä¸”æå®³ç¶“æ¿Ÿç™¼å±•ï¼Œå–æ¶ˆèˆªç­å’Œå°é–‰å…¬è·¯çš„æå¤±æ˜¯çŸ­æœŸçš„ï¼Œæ›´é‡çš„ç¶“æ¿Ÿè² è·æ˜¯ç™¾å§“å› ç—…å¤±åŽ»çš„ç”Ÿç”¢åŠ›å’Œæ”¿åºœé†«ç™‚é–‹æ”¯çš„å¢žåŠ ï¼Œè€Œå¤–å•†æŠ•è³‡ä¸­åœ‹çš„æ„æ¬²äº¦æœƒé™ä½Žã€‚&lt;/p&gt;\r\n&lt;p&gt;ã€€ã€€åœ‹å®¶è¦æ”¹å–„ç©ºæ°£æ±¡æŸ“ï¼Œä¸èƒ½é ­ç—›é†«é ­ï¼Œéœ€è¦å±•ç¤ºé­„åŠ›ï¼Œç«‹å®šæ±ºå¿ƒï¼Œæ“ºå¹³çŸ­æœŸåˆ©ç›ŠçŸ›ç›¾ï¼Œç¶œåˆå…¨æ–¹ä½åŽ»æŽ¨è¡Œï¼Œå¦å‰‡ï¼Œä¸€æ•´ä»£äººçš„å¥åº·å°‡ç‚ºæ­¤ä»˜å‡ºæ²‰é‡ä»£åƒ¹ã€‚&lt;/p&gt;', 3, '2016-12-21', '2017-02-14', 'éœ§éœ¾', 'éœ§éœ¾è”½æ—¥ é ˆå…¨æ–¹ä½æ ¹æ²»', 2, '../uploads/article/p7229461a775692825.jpg'),
(14, 0, 'çŽ„é€”å¥½æ™¯ï¼2017ä¸é…‰é›žå¹´ç”Ÿè‚–é‹ç¨‹ï¸°é¼ ã€ç‰›ã€è™Ž', '&lt;figure class=&quot;canvas-image Mx(a) canvas-atom Mt(0px) Mt(20px)--sm Mb(24px) Mb(22px)--sm&quot; data-type=&quot;image&quot;&gt;\r\n&lt;div class=&quot;Maw(100%) Pos(r) H(0)&quot;&gt;&lt;img class=&quot;Trsdu(.42s) StretchedBox W(100%) H(100%) ie-7_H(a)&quot; style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;https://s.yimg.com/ny/api/res/1.2/ETWxptmE8GFCdVkIqkv_jg--/YXBwaWQ9aGlnaGxhbmRlcjtzbT0xO3c9NzI0O2g9NDgz/http://media.zenfs.com/en/homerun/feed_manager_auto_publish_494/0fd870848422ebfbb4a111694aef71a6&quot; alt=&quot;&quot; /&gt;&lt;/div&gt;\r\n&lt;/figure&gt;\r\n&lt;div class=&quot;canvas-body C(#26282a) Wow(bw) Cl(start) Mb(20px) Fz(15px) Lh(1.6) Ff($ff-secondary)&quot;&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;è‚–é¼ é‹ç¨‹&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;ä»Šå¹´å±¬çŠ¯å¤ªæ­²çš„ç”Ÿè‚–ï¼Œç‚ºã€Œç ´å¤ªæ­²ã€ã€‚é€™ç¨®çŠ¯å¤ªæ­²ç›¸æ¯”ã€Œæ²–å¤ªæ­²ã€ã€ã€Œåˆ‘å¤ªæ­²ã€çš„å½±éŸ¿å¯¦å±¬è¼•å¾®ã€‚è€Œä¸”ä»Šå¹´æœ‰å‰æ˜ŸåŒåž£æ‹±ç…§ï¼Œå¦‚ã€Œå¤ªé™°ã€å¤©å–œã€ç´«å¾®ã€é¾å¾·ã€ï¼Œæ•…çŠ¯å¤ªæ­²æƒ…æ³ä¸éœ€éŽä»½åœ¨æ„ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;ä¸»è¦å‰æ˜Ÿï¸°å¤ªé™°ã€å¤©å–œ&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;ä¸»è¦å‡¶æ˜Ÿï¸°å‹¾ç¥žã€è²«ç´¢&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;è²¡é‹ï¸°ä»Šå¹´è²¡é‹è¼ƒä½³ã€‚æœ‰ã€Œå¤ªé™°ã€æ˜Ÿç›¸åŠ©ï¼Œå¤šè½å–å¥³æ€§è²´äººçš„æ„è¦‹ä½œåƒè€ƒï¼Œä¾‹å¦‚æŠ•è³‡ã€ç”Ÿæ„ç­–åŠƒã€‚è‹¥èˆ‡å¥³æ€§ä¼™ä¼´åˆä½œï¼Œæˆ–å¾žäº‹å¥³æ€§ç›¸é—œç”Ÿæ„æ›´ç‚ºæœ‰åˆ©ã€‚åŒæ™‚ã€Œå¤ªé™°ã€æ˜¯ä¸€é¡†è²¡æ˜Ÿï¼Œæ˜“æœ‰é€²è²¡æ©Ÿæœƒï¼Œä¸»è¦æ˜¯æ­£è²¡åŠç©©å®šæŠ•è³‡çš„è²¡ï¼Œè€ŒéžæŠ•æ©Ÿçš„è²¡ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;ç„¶è€Œæœ‰ã€Œç ´å¤ªæ­²ã€æƒ…æ³å‡ºç¾ï¼Œæœƒæœ‰ä¸€é»žå…’çš„éŒ¢è²¡ç ´å¤±ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;äº‹æ¥­ï¸°å·¥ä½œå´—ä½ä¸Šï¼Œä¸è«–é‡åˆ°ä¸Šå¸ä¸‹å±¬è‹¥ç‚ºå¥³æ€§ï¼Œçš†ç‚ºæœ‰åˆ©ã€‚ç”±æ–¼ã€Œå¤ªé™°ã€é—œä¿‚ï¼Œè¡Œæ¥­ä¸Šèˆ‡å¥³æ€§æˆ–é‡‘èžè²¡å‹™ç›¸é—œï¼Œå¦‚åŒ–å¦ã€ç¾Žå®¹ã€éŠ€è¡Œã€æŠ•è³‡ç­‰ï¼Œå¯æœ›æœ‰æ›´å¥½ç™¼å±•æ©Ÿæœƒã€‚ä½†ã€Œè²«ç´¢ã€æœƒä½¿å·¥ä½œä¸Šé‡åˆ°ä¸€é»žé˜»æ»¯ï¼Œä¸»è¦æ˜¯ä¸€äº›å°äº‹ç³¾çºè‘—ï¼Œä½†å‰æ˜Ÿæ‹±ç…§ï¼Œå•é¡Œä¸å¤šã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;æ„Ÿæƒ…ï¸°ç”·æ€§æœƒè¼ƒæœ‰ç•°æ€§ç·£ï¼Œä½†å–®èº«å¥³æ€§ä¸å¦¨æ‰¾å¥³æ€§è²´äººç›¸åŠ©ä»‹ç´¹ï¼Œå¢žåŠ é‡åˆ°å¿ƒå„€å°è±¡çš„æ©Ÿæœƒã€‚ä»Šå¹´æ˜¯ã€Œå¤©å–œã€æ¡ƒèŠ±å¹´ï¼Œé‡ä¸Šå¦ä¸€åŠçš„æ©Ÿæœƒè¼ƒå¹³æ™‚é«˜ï¼Œå–®èº«çš„ä¸å¦¨å¤šç•™æ„æ©Ÿæœƒã€‚ç†±æˆ€ä¸­çš„æƒ…ä¾¶æ›´æœ‰æœ›æ‹‰åŸ‹å¤©çª—ï¼Œå·²å©šçš„æ›´æœ‰åˆ©æ‡·å­•ï¼Œé€¢ã€Œå¼„ç’‹ä¹‹å–œã€ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;è¦æ³¨æ„çš„æ˜¯ã€Œå‹¾ç¥žã€è²«ç´¢ã€æœƒä½¿äººæœ‰è¦ºå¾—å°æ–¹æ™‚æœ‰ç„¡ç†è¦æ±‚ï¼Œéœ€è¦åŠ å¼·æºé€šã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;å¥åº·ï¸°ç”±æ–¼å‰æ˜Ÿæ‹±ç…§ï¼Œæ²’æœ‰ç—…æ˜Ÿçš„å½±éŸ¿ï¼Œä»Šå¹´èº«é«”å•é¡Œä¸å¤§ã€‚ã€Œå‹¾ç¥žã€é—œä¿‚ï¼Œå¤šå°å¿ƒè¢«åˆ©å™¨æ‰€å‚·ï¼ŒåŠå‹•ç‰©å¦‚å¯µç‰©çš„çˆªç‰™ä¾¿å¯ä»¥äº†ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;è‚–ç‰›é‹ç¨‹&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;ä»Šå¹´å±¬å¹³å®‰éŽåº¦çš„å¹´ä»½ï¼Œé¢¨æµªä¸å¤§ä¸å¤šã€‚é›–é‡å‡¶æ˜Ÿä¸å°‘ï¼Œä½†æ‰€é‡å‰æ˜Ÿå¾—åŠ›ï¼Œå¦‚ã€Œå¤©è§£ã€ã€ã€Œä¸‰å°ã€ã€ã€Œè¯è“‹ã€åŒåž£ï¼Œã€Œå°‡æ˜Ÿã€æ‹±è¡›ã€‚è€Œä¸”ä»Šå¹´ä¸‰åˆå¤ªæ­²ï¼Œäººç·£äº¦ä¸éŒ¯ã€‚é›–ç„¶ä¸¦éžå¥½æ™¯å¹´ä»½ï¼Œä½†äº¦ç®—å¹³å®‰ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;ä¸»è¦å‰æ˜Ÿï¸°å¤©è§£ã€ä¸‰å°ã€è¯è“‹ã€å”ç¬¦&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;ä¸»è¦å‡¶æ˜Ÿï¸°äº”é¬¼ã€å®˜ç¬¦ã€é»ƒæ—›ã€æµ®æ²‰&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;è²¡é‹ï¸°å‰æ˜Ÿã€Œä¸‰å°ã€å°æ‰“å·¥ä»”ã€æ”¶å–å®šè–ªçš„æœ‹å‹è¼ƒç‚ºæœ‰åˆ©ï¼Œæœ‰æœ›å¾žè¡¨ç¾ä¸­ç²å–å‡è·åŠ è–ªçš„æ©Ÿæœƒã€‚ç›¸åï¼Œã€Œäº”é¬¼ã€ã€ã€Œå®˜ç¬¦ã€æ˜Ÿä»¤åšç”Ÿæ„çš„æœ‹å‹å¢žåŠ ç™¼ç”Ÿå®˜éžã€å°äººä¾µä½”è²¡ç”¢çš„æ©Ÿæœƒã€‚å®˜éžå¯ä»¥æ˜¯å°åž‹ç½°æ¬¾ï¼Œä¸¦ä¸ä¸€å®šæ˜¯åš´é‡çš„ï¼Œåšäº‹æœ‰è¦è·ä¾¿å¯ä»¥äº†ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;äº‹æ¥­ï¸°ã€Œå¤©è§£ã€ã€ã€Œä¸‰å°ã€ã€ã€Œå”ç¬¦ã€è®“æ‰“å·¥ä»”äº‹æ¥­æš¢é †ï¼Œåªè¦å¤šé¿å…å£èˆŒå°äººï¼Œé‡åˆ°å›°é›£éƒ½è¼ƒæ˜“è™•ç†ã€‚åšäº‹è…³è¸å¯¦åœ°ï¼Œä¸è¦åé€™å±±ã€æœ›é‚£å±±ï¼Œè‡ªç„¶ä¸æ€•ã€Œæµ®æ²‰ã€æ˜Ÿæ‰€å¸¶ä¾†çš„å›°æ“¾ã€‚ã€Œè¯è“‹ã€æ˜Ÿäº¦æœ‰åŠ©å¾žäº‹è—è¡“ã€å“²å­¸ã€æ€æƒ³çš„è·æ¥­äººä»•ï¼Œæœ‰ä¸éŒ¯ç™¼å±•æ©Ÿæœƒã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;æ„Ÿæƒ…ï¸°ä»Šå¹´æ˜¯ä¸‰åˆå¤ªæ­²çš„å¹´ä»½ï¼Œäººç·£ã€æ„Ÿæƒ…æœƒè¼ƒå¥½ã€‚å·²å©šæˆ–æˆ€æ„›ä¸­çš„æœ‹å‹æ„Ÿæƒ…æœƒç©©å®šä¸€é»žï¼Œå–®èº«çš„å‰‡å¯ä»¥å¤šæ‰¾æ©Ÿæœƒï¼ŒæŠŠæ¡æ¡ƒèŠ±é‹ä¸éŒ¯çš„ä¸€å¹´ã€‚ä½†éœ€è¦ç•¶å¿ƒå°äººå¾žä¸­ä½œæ¢—ï¼Œç´°å¿ƒåˆ†æžæ˜¯éžæ›²ç›´ã€‚å¤šè·Ÿæœ‹å‹èšæœƒå‚¾è«‡ï¼Œä»¥æ¸›å°‘ã€Œè¯è“‹ã€æ˜Ÿæ‰€å¸¶ä¾†çš„å­¤ç¨æ„Ÿã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;å¥åº·ï¸°èº«é«”å¥åº·å•é¡Œä¸å¤§ï¼Œå¹³å¹³å®‰å®‰ã€‚å°å¿ƒè™•ç†å£“åŠ›ï¼Œæ‡‚å¾—å¿™è£¡å·é–’ï¼Œä¾¿å¯ä»¥äº†ã€‚&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;è‚–è™Žé‹ç¨‹&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;ç¶“éŽå¾€å¹´2016çš„æ²–å¤ªæ­²å¹´ï¼Œä»Šå¹´æ˜Žé¡¯è®Šå¾—æ²’é‚£éº¼æ³¢å‹•ï¼Œäº‹æƒ…ä¹Ÿè®Šå¾—é †åˆ©æ²’å¤ªå¤šè®Šå¦ã€‚å¾—åˆ°ã€Œæœˆå¾·ã€æ˜ŸåŒåž£ï¼Œå·¦å³æœƒç…§å‰æ˜Ÿå¦‚ã€Œå¤ªé™½ã€åŠã€Œç¦å¾·ã€æ˜Ÿï¼Œå‡¶æ˜Ÿçš„åŠ›é‡å¤§æ¸›ï¼Œå±¬æ–¼åäºŒç”Ÿè‚–ä¸­è¼ƒå¥½é‹ç¨‹ä¹‹ä¸€çš„ç”Ÿè‚–ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;ä¸»è¦å‰æ˜Ÿï¸°æœˆå¾·ã€åœ‹å°&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;ä¸»è¦å‡¶æ˜Ÿï¸°åŠ«ç…žã€å°è€—ã€æ­»ç¬¦&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;è²¡é‹ï¸°å—æƒ æ–¼ã€Œæœˆå¾·ã€ã€ã€Œåœ‹å°ã€å‰æ˜Ÿçš„å¹«åŠ©ï¼Œä»Šå¹´æ‰“å·¥ä»”æœ‰æœ›å¾žè¡¨ç¾ä¸­ç²å–å‡è·åŠ è–ªçš„æ©Ÿæœƒã€‚ä½†åšç”Ÿæ„çš„æœ‹å‹æœªå¿…èƒ½ç›´æŽ¥ç²ç›Šï¼Œéƒ¤æœ‰å—æƒ æ–¼è²æœ›æå‡çš„æ©Ÿæœƒã€‚ç•™æ„æœ‰ã€Œå°è€—ã€æ˜Ÿçš„å½±éŸ¿ï¼Œç ´è²¡çš„æƒ…æ³æœƒå‡ºç¾ï¼Œä½†ä¸¦éžåš´é‡ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;äº‹æ¥­ï¸°ã€Œæœˆå¾·ã€æ˜Ÿæœ‰åŒ–è§£å•é¡Œçš„èƒ½åŠ›ï¼Œä»¤ä¸€èˆ¬å·¥ä½œä¸Šé‡åˆ°çš„å•é¡Œéƒ½è®Šå¾—å®¹æ˜“è™•ç†ï¼Œå¤§äº‹åŒ–å°ï¼Œå°äº‹åŒ–ç„¡ã€‚åŒæ™‚æœ‰ã€Œåœ‹å°ã€æ˜Ÿå¸¶ä¾†æ¬ŠåŠ›ã€è²´äººåŠ©åŠ›ï¼Œæœ‰åˆ©æ‰“å·¥ä»”çˆ­å–å¥½è¡¨ç¾ï¼Œæœ‰æœ›å‡è·æˆ–åŠ è–ªã€‚å€¼å¾—æ³¨æ„çš„æ˜¯æé˜²é™°éšªå°äººï¼Œåˆ¥è®“ã€ŒåŠ«ç…žã€æ˜Ÿä»¤äº‹æ¥­ç™¼å±•å‡ºç¾çªç™¼æ€§çš„è² é¢å½±éŸ¿ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;æ„Ÿæƒ…ï¸°ç›¸æ¯”2016çŒ´å¹´çš„å¿ƒæƒ…èµ·ä¼ä¸å®šï¼Œç…©èºä¸å®‰ï¼Œèˆ‡å¦ä¸€åŠæ˜“èµ·è¡çªï¼Œä»Šå¹´å¯¦å±¬ç©©å®šçš„ä¸€å¹´ï¼Œç›¸è™•å’Œè«§ã€‚æœªæœ‰å°è±¡çš„æœ‹å‹ï¼Œä»Šå¹´éœ€è¦ä¸»å‹•ä¸€é»žï¼Œç™¼å±•æ©Ÿæœƒæ‰è¼ƒæ˜Žé¡¯ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;å¥åº·ï¸°ä»Šå¹´å±¬æ–¼èº«é«”ç›¸å°å¥åº·çš„ç”Ÿè‚–ï¼Œå•é¡Œä¸å¤§ï¼Œä¸è¦å·¥ä½œéŽå‹žä¾¿å¯ä»¥äº†ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;é„­æ™¯æ–‡å¸«å‚…&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;é¦™æ¸¯å¤§å­¸å»ºç¯‰å­¸é™¢ç¢©å£«ç•¢æ¥­ï¼Œæ›¾ä»»è·æ–¼å»ºç¯‰ç•ŒåŠé‡‘èžç•Œã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;è‡ªå°è·Ÿéš¨å¸«å‚…å­¸ç¿’é¢¨æ°´å‘½ç†ï¼Œç¾æ“”ä»»å¤šé–“å¤§åž‹æ©Ÿæ§‹çš„é¢¨æ°´é¡§å•ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;Facebook:&amp;nbsp;&lt;a href=&quot;https://www.facebook.com/chengkingman88&quot; target=&quot;_blank&quot; rel=&quot;nofollow noopener&quot;&gt;https://www.facebook.com/chengkingman88&lt;/a&gt;&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; data-type=&quot;text&quot;&gt;Website:&amp;nbsp;&lt;a href=&quot;http://www.chengkingman.com/&quot; target=&quot;_blank&quot; rel=&quot;nofollow noopener&quot;&gt;www.chengkingman.com&lt;/a&gt;&lt;/p&gt;\r\n&lt;/div&gt;', 2, '2016-12-21', NULL, 'ç”Ÿè‚–é‹ç¨‹', 'çŽ„é€”å¥½æ™¯ï¼2017ä¸é…‰é›žå¹´ç”Ÿè‚–é‹ç¨‹ï¸°é¼ ã€ç‰›ã€è™Ž', 2, ''),
(15, 0, 'ã€å¿…å­¸ã€‘éžå¸¸ç°¡å–®ï¼Œä¸€æ¯æ°´èˆ’ç·©å’³å—½å’Œæ„Ÿå†’ï¼', '&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;ã€Œå’³ï¼å’³å’³ï¼ã€å¤©æ°£è½‰æ¶¼ï¼Œå–‰åš¨ä¹Ÿè·Ÿè‘—é¬§è„¾æ°£å—Žï¼Ÿ&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;å’³å—½çš„åŽŸå› ç™¾ç™¾ç¨®ï¼Œæ„Ÿå†’ã€éŽæ•éƒ½æœ‰å¯èƒ½ï¼Œåˆå¸¸ä¼´éš¨å–‰åš¨ä¹¾ç™¢ç­‰ç¾è±¡ã€‚æœ‰æ™‚å€™ç—‡ç‹€è¼ƒè¼•ï¼Œå¯èƒ½åªæ˜¯æ„Ÿå†’åˆæœŸï¼Œå¦‚æžœä¸æƒ³åƒè—¥çœ‹é†«ç”Ÿï¼Œä¸å¦¨è©¦è©¦ä»¥ä¸‹çš„ã€Œå±…å®¶ç™‚æ³•ã€ï¼Œé ç°¡å–®çš„å–æ°´å¹«åŠ©èˆ’ç·©å–‰åš¨ä¸é©ï¼Œç”šè‡³å¢žå¼·æŠµæŠ—åŠ›ï¼&lt;/p&gt;\r\n&lt;figure class=&quot;canvas-image Mx(a) canvas-atom My(24px) My(20px)--sm&quot; style=&quot;text-align: center;&quot; data-type=&quot;image&quot;&gt;\r\n&lt;div class=&quot;Maw(100%) Pos(r) H(0)&quot;&gt;&lt;img class=&quot;Trsdu(.42s) StretchedBox W(100%) H(100%) ie-7_H(a)&quot; style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;https://s.yimg.com/ny/api/res/1.2/iU4NgjZYAe9BY6WkQvIKBg--/YXBwaWQ9aGlnaGxhbmRlcjtzbT0xO3c9NjAwO2g9MzE0O2lsPXBsYW5l/https://68.media.tumblr.com/5736fad1035fc23f5948766620ee1459/tumblr_inline_oigu6y5vna1u41zut_1280.jpg&quot; alt=&quot;&quot; /&gt;&lt;/div&gt;\r\n&lt;/figure&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;æ ¹æ“šç¾Žåœ‹å¥åº·ç¶²ç«™Healthlineï¼Œèœ‚èœœã€è–„è·ã€é¹½å·´éƒ½æ˜¯èˆ’ç·©å–‰åš¨ä¸é©çš„åˆ©å™¨ï¼Œå„æœ‰å„çš„å¦™ç”¨ï¼Œè€Œä¸”è¶…ç´šå¤©ç„¶ã€‚é€™äº›é£Ÿæåœ¨ç”Ÿæ´»ä¸­éƒ½å¾ˆå®¹æ˜“å–å¾—ï¼Œä¸€èµ·ä¾†çœ‹çœ‹æ€Žéº¼æ­é…é–‹æ°´ä½¿ç”¨å§ï¼&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;&lt;strong&gt;1.èœ‚èœœï¼šèœ‚èœœæª¸æª¬æ°´&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;èœ‚èœœæ˜¯è¥¿æ–¹äººå¸¸ç”¨ä¾†èˆ’ç·©å–‰åš¨ç—›çš„ç§˜æ–¹ã€‚2007å¹´ä¸€é …åˆŠç™»æ–¼ã€Šå°å…’åŠé’å°‘å¹´é†«å­¸æª”æ¡ˆã€‹ï¼ˆArchives of Pediatrics &amp;amp; Adolescent Medicineï¼‰æœŸåˆŠçš„ç ”ç©¶ç”šè‡³ç™¼ç¾ï¼Œèœ‚èœœèˆ’ç·©å’³å—½çš„æ•ˆæžœï¼Œå¯èƒ½è¶…éŽä¸€äº›å«æœ‰å³ç¾Žæ²™èŠ¬ï¼ˆdextromethorphanï¼‰æˆåˆ†çš„éŽ®å’³è—¥ç‰©ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;å–‰åš¨æ„Ÿè¦ºæ€ªæ€ªçš„æ™‚å€™ï¼Œä¸å¦¨åœ¨èŠ±è‰èŒ¶æˆ–æº«é–‹æ°´ä¸­åŠ å…¥2èŒ¶åŒ™çš„èœ‚èœœï¼Œå†åŠ å…¥ä¸€ç‰‡æª¸æª¬æˆ–å°‘è¨±æª¸æª¬æ±ï¼Œæ”ªæ‹Œå‡å‹»å¾Œï¼Œå°±æ˜¯ä¸€æ¯é…¸ç”œçš„èœ‚èœœæª¸æª¬æ°´æˆ–èœ‚èœœæª¸æª¬èŒ¶ï¼å…¶ä¸­ï¼Œèœ‚èœœå…·æœ‰èˆ’ç·©æ•ˆæžœï¼Œæª¸æª¬çš„ç¶­ä»–å‘½Cå¯å¹«åŠ©å¢žå¼·æŠµæŠ—åŠ›ï¼Œæ¸›å°‘ç—…èŒå…¥ä¾µçš„æ©Ÿæœƒã€‚&lt;/p&gt;\r\n&lt;figure class=&quot;canvas-image Mx(a) canvas-atom My(24px) My(20px)--sm&quot; style=&quot;text-align: center;&quot; data-type=&quot;image&quot;&gt;\r\n&lt;div class=&quot;Maw(100%) Pos(r) H(0)&quot;&gt;&lt;img class=&quot;Trsdu(.42s) StretchedBox W(100%) H(100%) ie-7_H(a)&quot; style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;https://s.yimg.com/ny/api/res/1.2/Vlx3FNhuV_WqyitK8iBQOA--/YXBwaWQ9aGlnaGxhbmRlcjtzbT0xO3c9NjAwO2g9NDAwO2lsPXBsYW5l/https://68.media.tumblr.com/7f20a6fdbe0717263e3a077d47ee0637/tumblr_inline_oigu6zUqjv1u41zut_1280.jpg&quot; alt=&quot;&quot; /&gt;&lt;/div&gt;\r\n&lt;/figure&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;&lt;br /&gt;é©æ™‚å–ä¸€é»žèœ‚èœœæª¸æª¬æ°´ï¼Œæœ‰åŠ©æ–¼èˆ’ç·©å–‰åš¨ä¸é©ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;ä¸éŽï¼Œå¾žä¸­é†«è§’åº¦ä¾†èªªï¼Œç”œçš„èœ‚èœœå®¹æ˜“ç”Ÿç—°ï¼Œå› æ­¤ï¼Œä¸­é†«å¸«å‘¨å®—ç¿°æé†’ï¼Œèœ‚èœœæª¸æª¬æ°´åªé©ç”¨æ–¼ã€Œå–‰åš¨æ²’æœ‰ç—°ã€çš„æ™‚å€™ï¼Œæ¯”å¦‚æ„Ÿå†’å¾ŒæœŸåªå‰©ä¸‹ã€Œç‡¥å’³ã€ï¼Œå–‰åš¨ä¹¾ä¹¾ç™¢ç™¢ä½†æ˜¯ç„¡ç—°ï¼Œå°±å¯ä»¥å–ä¸€é»žèœ‚èœœæª¸æª¬æ°´èˆ’ç·©ã€‚å¦‚æžœå–‰åš¨å·²ç¶“æœ‰ç—°ï¼Œåˆå–èœ‚èœœæª¸æª¬æ°´ï¼Œç•¶å¿ƒç—‡ç‹€æ›´åš´é‡ã€‚&lt;/p&gt;\r\n&lt;figure class=&quot;canvas-image Mx(a) canvas-atom My(24px) My(20px)--sm&quot; style=&quot;text-align: center;&quot; data-type=&quot;image&quot;&gt;\r\n&lt;div class=&quot;Maw(100%) Pos(r) H(0)&quot;&gt;&lt;img class=&quot;Trsdu(.42s) StretchedBox W(100%) H(100%) ie-7_H(a)&quot; src=&quot;https://s.yimg.com/ny/api/res/1.2/iiGww3AceXdh45Z7xi8aUg--/YXBwaWQ9aGlnaGxhbmRlcjtzbT0xO3c9NjAwO2g9NDAwO2lsPXBsYW5l/https://68.media.tumblr.com/49d4669ff0797793f57df03c2245e8f2/tumblr_inline_oigu70zjsC1u41zut_1280.jpg&quot; alt=&quot;&quot; /&gt;&lt;/div&gt;\r\n&lt;/figure&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;&lt;br /&gt;åœ¨é©ç•¶çš„æ™‚æ©Ÿé£²ç”¨è–„è·èŒ¶ï¼Œæœ‰åŠ©æ–¼é é˜²æ„Ÿå†’ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;&lt;strong&gt;2.è–„è·ï¼šè–„è·èŒ¶&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;è–„è·æ˜¯åŠé–“æ½¤å–‰ç”¢å“çš„å¸¸è¦‹æˆåˆ†ï¼Œä¸€èˆ¬äººåªçŸ¥é“è–„è·åšèµ·ä¾†æ¶¼æ¶¼çš„ï¼Œå»ä¸æ¸…æ¥šè–„è·æœ¬èº«å…·æœ‰å¾ˆå¥½çš„ç™‚æ•ˆã€‚äº‹å¯¦ä¸Šï¼Œè–„è·ç•¶ä¸­çš„æˆåˆ†ã€Œè–„è·é†‡ã€å°±æœ‰æ®ºèŒã€æŠ—ç—…æ¯’çš„åŠŸç”¨ï¼Œé‚„å¯ä»¥å¹«åŠ©ç¥›ç—°ï¼Œèˆ’ç·©å–‰åš¨ä¸é©ã€‚æƒ³è¦ç²å¾—è–„è·çš„å¥½è™•ï¼Œåªè¦åœ¨æº«é–‹æ°´ä¸­åŠ å…¥é©é‡çš„è–„è·è‘‰ï¼Œå°±èƒ½è‡ªè£½ä¸€æ¯è–„è·èŒ¶ï¼Œå¯èªªæ˜¯å¤©ç„¶çš„é˜²æ„Ÿå†’é£²å“ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;å‘¨å®—ç¿°ä¸­é†«å¸«è£œå……ï¼Œè–„è·èŒ¶ä¸€èˆ¬åªé©ç”¨æ–¼é¢¨ç†±åž‹çš„æ„Ÿå†’ï¼Œä¸é©ç”¨æ–¼é¢¨å¯’åž‹çš„æ„Ÿå†’ï¼ŒåŸºæœ¬çš„åˆ¤æ–·æ¨™æº–æ˜¯ã€Œå–‰åš¨æœ‰ç„¡ç™¼ç‚Žã€ã€‚å¦‚æžœå–‰åš¨å·²ç¶“ç™¼ç‚Žï¼Œå¤§å¤šå±¬æ–¼é¢¨ç†±åž‹æ„Ÿå†’ï¼Œå–ä¸€é»žè–„è·èŒ¶æ˜¯å¯ä»¥çš„ã€‚å¦‚æžœæ˜¯é¢¨å¯’åž‹æ„Ÿå†’ï¼Œå–è–„è·èŒ¶ææ€•æ²’æœ‰å¹«åŠ©ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;figure class=&quot;canvas-image Mx(a) canvas-atom My(24px) My(20px)--sm&quot; style=&quot;text-align: center;&quot; data-type=&quot;image&quot;&gt;\r\n&lt;div class=&quot;Maw(100%) Pos(r) H(0)&quot;&gt;&lt;img class=&quot;Trsdu(.42s) StretchedBox W(100%) H(100%) ie-7_H(a)&quot; src=&quot;https://s.yimg.com/ny/api/res/1.2/fpWeRBAcXFTCDwH9Lwk6kg--/YXBwaWQ9aGlnaGxhbmRlcjtzbT0xO3c9NjAwO2g9NDMzO2lsPXBsYW5l/https://68.media.tumblr.com/a32c2b611f1e7eb0e8acf830784921e0/tumblr_inline_oigu72ez911u41zut_1280.jpg&quot; alt=&quot;&quot; /&gt;&lt;/div&gt;\r\n&lt;/figure&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;&lt;br /&gt;é¹½æ°´æ¼±å£å¯ä»¥æ¶ˆç‚Žï¼Œå¹«åŠ©ç·©è§£å–‰åš¨ç—›ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;&lt;strong&gt;3.é¹½å·´ï¼šé¹½æ°´æ¼±å£&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;é¹½æ˜¯å®¶å®¶æˆ¶æˆ¶éƒ½æœ‰çš„èª¿å‘³æ–™ï¼Œæ²’æƒ³åˆ°é‚„å¯ä»¥ç”¨ä¾†å°æŠ—æ„Ÿå†’ï¼ŒçœŸæ˜¯å¤ªæ–¹ä¾¿äº†ï¼å»ºè­°åœ¨æº«é–‹æ°´ä¸­åŠ å…¥å°‘è¨±é¹½å·´ï¼Œå……åˆ†æ”ªæ‹Œæˆé¹½æ°´ä¹‹å¾Œæ‹¿ä¾†æ¼±å£ï¼Œå¯ä»¥å¹«åŠ©æ¶ˆç‚Žã€ç·©è§£å–‰åš¨ç—›ï¼Œå¹«åŠ©é é˜²æ„Ÿå†’æƒ¡åŒ–ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;å‘¨å®—ç¿°ä¸­é†«å¸«å»ºè­°ï¼Œé¹½æ°´çš„æ¿ƒåº¦å¯ä»¥ç¨é«˜ï¼Œæ¶ˆç‚Žæ•ˆæžœæ›´å¥½ï¼Œä½†åƒ…ä¾›æ¼±å£ï¼Œä¸å¯é£²ç”¨ï¼é¹½æ°´æ¼±å£ä¹‹å¾Œï¼Œè¨˜å¾—å†ç”¨æ¸…æ°´æ¼±å£ä¸€æ¬¡ï¼Œä»¥å…é¹½åˆ†ç•™åœ¨å£è…”ä¸­é€ æˆä¹¾æ¾€ã€‚&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;&lt;br /&gt;å¥åº·è³‡è¨Šç”±ç†±æ–°èžæä¾›&lt;br /&gt;åŽŸæ–‡é€£çµ:&amp;nbsp;&lt;a href=&quot;http://yes-news.com/62148/%E5%BF%85%E5%AD%B8%E9%9D%9E%E5%B8%B8%E7%B0%A1%E5%96%AE%E4%B8%80%E6%9D%AF%E6%B0%B4%E8%88%92%E7%B7%A9%E5%92%B3%E5%97%BD%E5%92%8C%E6%84%9F%E5%86%92&quot; target=&quot;_blank&quot; rel=&quot;nofollow noopener&quot;&gt;é¹½æ°´ã€èœ‚èœœæª¸æª¬æ°´éƒ½OKï¼ä¸€æ¯æ°´èˆ’ç·©å’³å—½å’Œæ„Ÿå†’&lt;/a&gt;&lt;br /&gt;&lt;br /&gt;æ›´å¤šç›¸é—œå…§å®¹&lt;/p&gt;\r\n&lt;figure class=&quot;canvas-image Mx(a) canvas-atom My(24px) My(20px)--sm Op(.9):h Trsdu(.2s)&quot; style=&quot;text-align: center;&quot; data-type=&quot;image&quot;&gt;\r\n&lt;div class=&quot;Maw(100%) Pos(r) H(0)&quot;&gt;&lt;img class=&quot;Trsdu(.42s) StretchedBox W(100%) H(100%) ie-7_H(a)&quot; src=&quot;https://s.yimg.com/ny/api/res/1.2/oXZoJEAmv6EmEnxpljDGEg--/YXBwaWQ9aGlnaGxhbmRlcjtzbT0xO3c9NjkwO2g9NDc3O2lsPXBsYW5l/https://68.media.tumblr.com/6dc309f1a5e47362bf51d07a7ef20193/tumblr_inline_oigu73vwCR1u41zut_1280.jpg&quot; alt=&quot;&quot; /&gt;&lt;/div&gt;\r\n&lt;/figure&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;&lt;a href=&quot;http://yes-news.com/62072/%E6%B8%9B%E9%87%8D%E6%B6%88%E6%B0%B4%E8%85%AB%E9%82%84%E5%8F%AF%E7%BE%8E%E7%99%BD%E9%80%99%E9%A3%B2%E6%96%99%E4%BD%A0%E5%96%9D%E9%81%8E%E4%BA%86%E6%B2%92&quot; target=&quot;_blank&quot; rel=&quot;nofollow noopener&quot;&gt;æ¸›é‡ã€æ¶ˆæ°´è…«ï¼Œé‚„å¯ç¾Žç™½ï¼é€™é£²æ–™ä½ å–éŽäº†æ²’ï¼Ÿ&lt;/a&gt;&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;&lt;br /&gt;&lt;br /&gt;&lt;/p&gt;\r\n&lt;figure class=&quot;canvas-image Mx(a) canvas-atom My(24px) My(20px)--sm&quot; style=&quot;text-align: center;&quot; data-type=&quot;image&quot;&gt;\r\n&lt;div class=&quot;Maw(100%) Pos(r) H(0)&quot;&gt;&lt;img class=&quot;Trsdu(.42s) StretchedBox W(100%) H(100%) ie-7_H(a)&quot; src=&quot;https://s.yimg.com/ny/api/res/1.2/31juEIbbWqIjy7J22MemTw--/YXBwaWQ9aGlnaGxhbmRlcjtzbT0xO3c9MTc1O2g9MTcyO2lsPXBsYW5l/https://68.media.tumblr.com/1f66e8820e17a392d09c45ec9d4f537a/tumblr_inline_oigu73K2yr1u41zut_540.png.cf.jpg&quot; alt=&quot;&quot; /&gt;&lt;/div&gt;\r\n&lt;/figure&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;&lt;a href=&quot;https://www.top1health.com/&quot; target=&quot;_blank&quot; rel=&quot;nofollow noopener&quot;&gt;è¯äººå¥åº·ç¶²&lt;br /&gt;é‡å°å¿™ç¢Œçš„ç¾ä»£äººï¼Œä¾ç…§ä¸åŒæ™‚ç¯€ï¼Œé€éŽé†«å¸«ä»¥åŠå„é ˜åŸŸå°ˆå®¶ï¼Œæä¾›é£²é£Ÿä¿å¥ã€ç–¾ç—…é é˜²ã€æ¸›é‡ã€é‹å‹•å¥èº«ã€ç¾Žå®¹ä¿é¤Šã€é¤Šç”Ÿä¿å¥åŠé£Ÿè­œç­‰é†«ç™‚ä¿å¥ç›¸é—œçŸ¥è­˜ï¼Œå¼•å°Žæ°‘çœ¾é¤Šæˆæ­£ç¢ºçš„å¥åº·ç”Ÿæ´»æ…‹åº¦åŠè§€å¿µã€‚&lt;/a&gt;&lt;/p&gt;\r\n&lt;p class=&quot;canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm canvas-atom&quot; style=&quot;text-align: center;&quot; data-type=&quot;text&quot;&gt;Source:&lt;a href=&quot;https://hk.style.yahoo.com/%E5%BF%85%E5%AD%B8-%E9%9D%9E%E5%B8%B8%E7%B0%A1%E5%96%AE-%E6%9D%AF%E6%B0%B4%E8%88%92%E7%B7%A9%E5%92%B3%E5%97%BD%E5%92%8C%E6%84%9F%E5%86%92-1584127968608310.html&quot;&gt;yahoo&lt;/a&gt;&lt;/p&gt;', 2, '2016-12-21', NULL, 'å’³å—½', 'ã€å¿…å­¸ã€‘éžå¸¸ç°¡å–®ï¼Œä¸€æ¯æ°´èˆ’ç·©å’³å—½å’Œæ„Ÿå†’ï¼', 5, ''),
(16, 0, 'The tech enabling a man with quadriplegia to drive', '&lt;p&gt;A specially modified car is allowing an ex-racing driver, who became quadriplegic after a car accident, to drive on public roads in the US.&lt;/p&gt;\r\n&lt;div class=&quot;hide-wrapper extra-content&quot;&gt;\r\n&lt;p&gt;The 2016 Corvette Z06 was adapted by Arrow Electronics using repurposed off-the-shelf technology to allow Sam Schmidt to control the car.&lt;/p&gt;\r\n&lt;p&gt;He is the first American to be given a special licence to drive a semi-autonomous car on public roads.&lt;/p&gt;\r\n&lt;p&gt;Mr Schmidt still requires a co-driver with him at all times, but the semi-autonomous vehicle allows him to take an active role in driving.&lt;/p&gt;\r\n&lt;p&gt;BBC Click&amp;rsquo;s Spencer Kelly reports.&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;You can see more on a special edition of BBC Click focusing on assistive tech to coincide with the International Day of Persons with Disabilities on Saturday 3 and Sunday 4 December 2016 on the BBC News Channel, BBC World News and BBC One.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;More at&amp;nbsp;&lt;/strong&gt;&lt;a class=&quot;story-body__link&quot; href=&quot;http://www.bbc.co.uk/programmes/n13xtmd5&quot;&gt;BBC.com/Click&amp;nbsp;&lt;/a&gt;&lt;strong&gt;and&amp;nbsp;&lt;/strong&gt;&lt;a class=&quot;story-body__link-external&quot; href=&quot;https://twitter.com/bbcclick&quot;&gt;@BBCClick&lt;/a&gt;&lt;strong&gt;.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;/div&gt;', 8, '2016-12-21', NULL, 'bbc', 'bbc', 13, ''),
(17, 0, 'Wiz Khalifa - See You Again ft. Charlie Puth [Official Video] Furious 7 Soundtrack', '&lt;p&gt;&lt;img src=&quot;https://i.ytimg.com/vi/RgKAFK5djSk/maxresdefault.jpg&quot; alt=&quot;&quot; width=&quot;1920&quot; height=&quot;1080&quot; /&gt;&lt;/p&gt;', 2, '2016-12-21', '2016-12-21', 'See You Again', 'Wiz Khalifa - See You Again ft. Charlie Puth [Official Video] Furious 7 Soundtrack', 18, '');
INSERT INTO `posts` (`post_id`, `user_id`, `title`, `body`, `category_id`, `posted`, `date_modified`, `keywords`, `description`, `views`, `coverImage`) VALUES
(18, 0, 'The serious artist behind the Moomins', '&lt;p&gt;&lt;strong&gt;Everyone knows the Moomins &amp;ndash; but how many know of the brave life and challenging paintings of their creator, Tove Jansson? Cath Pound finds out more.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;Tove Jansson is known and loved around the world as the creator of the rotund children&amp;rsquo;s characters, the Moomins. However she always considered herself first and foremost a painter and the fact that this side of her work was often ignored caused her great frustration and sadness.&amp;nbsp;&lt;a href=&quot;https://www.southbankcentre.co.uk/whats-on/119314-southbank-centres-adventures-moominland-explore-moomins-through-life-201617&quot;&gt;Adventures in Moominland&lt;/a&gt;&amp;nbsp;at the Southbank Centre in London and another exhibition of her art, currently in Stockholm and&amp;nbsp;&lt;a href=&quot;http://www.dulwichpicturegallery.org.uk/whats-on/exhibitions/2017/october/tove-jansson/&quot;&gt;arriving at the Dulwich Picture Gallery next year&lt;/a&gt;, allow us to see both sides of her extensive oeuvre. &amp;nbsp;Although vastly different in approach, both exhibitions emphasise the tolerance which imbues her work and which derives from the courageous way she chose to live her life, refusing to submit to the restrictive norms of contemporary Finnish society.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div class=&quot;inline-media inline-image&quot;&gt;\r\n&lt;div class=&quot;inline-image-wrapper&quot;&gt;&lt;a id=&quot;p04lcstq&quot; class=&quot;responsive-image-wrapper fullsizeable&quot; href=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/1280_720/images/live/p0/4l/cs/p04lcstq.jpg&quot; data-caption=&quot;Tove Jansson&amp;rsquo;s self-portrait from 1975 gives an unvarnished view of the artist at the end of her life (Credit: Finnish National Gallery / Yehia Eweis)&quot; data-caption-title=&quot;&quot; data-is-clickable=&quot;true&quot;&gt;&lt;img class=&quot;responsive landscape&quot; title=&quot;Tove Jansson, Self-portrait &quot; src=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/624_351/images/live/p0/4l/cs/p04lcstq.jpg&quot; alt=&quot;Tove Jansson, Self-portrait &quot; width=&quot;&quot; height=&quot;&quot; data-fixed-width-format=&quot;&quot; data-caption=&quot;Tove Jansson&amp;rsquo;s self-portrait from 1975 gives an unvarnished view of the artist at the end of her life (Credit: Finnish National Gallery / Yehia Eweis)&quot; data-caption-title=&quot;&quot; data-landscape=&quot;&quot; /&gt;&lt;/a&gt;&lt;/div&gt;\r\n&lt;div class=&quot;caption-wrapper&quot;&gt;\r\n&lt;div class=&quot;caption-lining&quot;&gt;\r\n&lt;p class=&quot;caption-text caption-body&quot;&gt;Tove Jansson&amp;rsquo;s self-portrait from 1975 gives an unvarnished view of the artist at the end of her life (Credit: Finnish National Gallery / Yehia Eweis)&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;The daughter of Finnish sculptor Viktor Jansson and his Swedish artist wife Signe Hammarsten-Jansson, known as Ham, Tove Jansson grew up in an environment where art, work and life were inseparable. By the age of 14 her work was already appearing in print and she soon followed her mother to the satirical magazine Garm. At art school, where her early work had a mystical, fairytale quality to it, she was considered a bright and promising student.&amp;nbsp; The self-portraits she painted in the 1930s and &amp;rsquo;40s reveal her development as an artist and, thinks art historian Tuula Karjalainen, are among her strongest works.&lt;/p&gt;\r\n&lt;blockquote&gt;\r\n&lt;p&gt;If World War Two had ended differently, the consequences for Jansson would have been fatal&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n&lt;p&gt;The war years were traumatic for Jansson but also provided a great stimulus to create. She had been mocking Hitler in the pages of Garm since as early 1935 but the war heightened her satirical bite. Her cartoons reveal a pathetic and ridiculous clown behind the monster who threatened Europe. As Finland had entered into an alliance with Germany in 1940, her work caused consternation among the authorities and the magazine came perilously close to being charged with insulting the head of a friendly state. Her courage in challenging public opinion cannot be underestimated.&amp;nbsp; If the war had ended differently the consequences for her would have been fatal.&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Finnish lines&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;It was the horrors of that time that also served as inspiration for the first Moomin books. &amp;ldquo;She had to create alternatives to the world she was living in,&amp;rdquo; says Jansson biographer Boel Westin. Not that this alternative was any less bleak. The Moomins and The Great Flood contains images of refugees searching for their relatives while Comet in Moominland, completed just after the bombings of Hiroshima and Nagasaki, sees the residents of Moominvalley facing possible annihilation from a comet hurtling towards earth. Her characters are granted happy endings but all the same, &amp;ldquo;they&amp;rsquo;re quite exceptional for children&amp;rsquo;s books at that time,&amp;rdquo; says Westin.&lt;/p&gt;\r\n&lt;blockquote&gt;\r\n&lt;p&gt;At last I feel that in love I can experience myself as a woman &amp;ndash; Tove Jansson&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n&lt;p&gt;The end of war brought joy in many forms, not least that of the theatre director Vivica Bandler, with whom Jansson fell madly in love. To discover that she was attracted to women was something of a surprise to Jansson but she confided to friends that, &amp;ldquo;at last I feel that in love I can experience myself as a woman.&amp;rdquo; Unable to be as open as she would have liked about the affair &amp;ndash; homosexuality was illegal in Finland at the time and not decriminalised until 1971 &amp;ndash; Joansson instead included herself and her lover in the third of the Moomin books, Finn Family Moomintroll, as Thingumy and Bob.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div class=&quot;inline-media inline-image&quot;&gt;\r\n&lt;div class=&quot;inline-image-wrapper&quot;&gt;&lt;a id=&quot;p04lcsyl&quot; class=&quot;responsive-image-wrapper fullsizeable&quot; href=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/1280_720/images/live/p0/4l/cs/p04lcsyl.jpg&quot; data-caption=&quot;The characters Snorkmaiden, Sniff and Snufkin are all close friends of the Moomin family and appear in several of Jansson&amp;rsquo;s books (Credit: Moomin Characters&amp;trade;)&quot; data-caption-title=&quot;&quot; data-is-clickable=&quot;true&quot;&gt;&lt;img class=&quot;responsive landscape&quot; title=&quot;Moomins &quot; src=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/624_351/images/live/p0/4l/cs/p04lcsyl.jpg&quot; alt=&quot;Moomins &quot; width=&quot;&quot; height=&quot;&quot; data-fixed-width-format=&quot;&quot; data-caption=&quot;The characters Snorkmaiden, Sniff and Snufkin are all close friends of the Moomin family and appear in several of Jansson&amp;rsquo;s books (Credit: Moomin Characters&amp;trade;)&quot; data-caption-title=&quot;&quot; data-landscape=&quot;&quot; /&gt;&lt;/a&gt;&lt;/div&gt;\r\n&lt;div class=&quot;caption-wrapper&quot;&gt;\r\n&lt;div class=&quot;caption-lining&quot;&gt;\r\n&lt;p class=&quot;caption-text caption-body&quot;&gt;The characters Snorkmaiden, Sniff and Snufkin are all close friends of the Moomin family and appear in several of Jansson&amp;rsquo;s books (Credit: Moomin Characters&amp;trade;)&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;These two characters arrive in Moominvalley speaking a strange language that no one else can understand and carrying a suitcase containing a magnificent ruby which they have stolen from the evil Groke. Westin sees the ruby as a metaphor for their love: the most important thing is for them to open their suitcase and reveal its contents to Moominvalley.&lt;/p&gt;\r\n&lt;p&gt;Jansson went on to depict her lover in one of the monumental murals she painted for Helsinki Town Hall.&amp;nbsp; Vivica, easily recognisable to their immediate circle, stands resplendent in its centre, dressed in a stunning evening gown. Jansson herself sits in the foreground, a Moomin at her elbow, staring defiantly out at the viewer. Like Thingumy and Bob she is displaying their love for all the world to see.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div class=&quot;inline-media inline-image&quot;&gt;\r\n&lt;div class=&quot;inline-image-wrapper&quot;&gt;&lt;a id=&quot;p04lctd4&quot; class=&quot;responsive-image-wrapper fullsizeable&quot; href=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/1280_720/images/live/p0/4l/ct/p04lctd4.jpg&quot; data-caption=&quot;A series of monumental murals by Jansson decorated the dining hall of Helsinki&amp;rsquo;s Town Hall (Credit: Tove Jansson''s estate / HAM / Hanna Kukorelli)&quot; data-caption-title=&quot;&quot; data-is-clickable=&quot;true&quot;&gt;&lt;img class=&quot;responsive landscape&quot; title=&quot;Mural in Helsinki Town Hall &quot; src=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/624_351/images/live/p0/4l/ct/p04lctd4.jpg&quot; alt=&quot;Mural in Helsinki Town Hall &quot; width=&quot;&quot; height=&quot;&quot; data-fixed-width-format=&quot;&quot; data-caption=&quot;A series of monumental murals by Jansson decorated the dining hall of Helsinki&amp;rsquo;s Town Hall (Credit: Tove Jansson''s estate / HAM / Hanna Kukorelli)&quot; data-caption-title=&quot;&quot; data-landscape=&quot;&quot; /&gt;&lt;/a&gt;&lt;/div&gt;\r\n&lt;div class=&quot;caption-wrapper&quot;&gt;\r\n&lt;div class=&quot;caption-lining&quot;&gt;\r\n&lt;p class=&quot;caption-text caption-body&quot;&gt;A series of monumental murals by Jansson decorated the dining hall of Helsinki&amp;rsquo;s Town Hall (Credit: Tove Jansson''s estate / HAM / Hanna Kukorelli)&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Ultimately the affair was to prove short lived but the couple remained lifelong friends.&lt;/p&gt;\r\n&lt;p&gt;Joy is further evident in The Book About Moomin, Mymble and Little My. A riot of colour, shape and form, it is heavily influenced by Matisse and a work of art in its own right. Both Mymble and Little My are the offspring of the older Mymble, a gloriously polyamorous character who lives for pleasure and to procreate. Her name derives from the Swedish slang&amp;nbsp;&lt;em&gt;mymla&lt;/em&gt;, meaning to make love, and Jansson&amp;rsquo;s circle delightfully used &amp;lsquo;mymble&amp;rsquo; to refer to a lover of either sex.&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;&amp;lsquo;Personal story&amp;rsquo;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;Moominmania really began to take off in the 1950s, thanks in large part to the comic strips produced for London&amp;rsquo;s Evening News, which were distributed worldwide. Their popularity was to prove a double-edged sword, however. They provided a much needed regular income, but the demands of producing a weekly strip meant that Jansson&amp;rsquo;s time for painting was severely restricted.&lt;/p&gt;\r\n&lt;p&gt;It was a situation that could not continue and at the end of the 1950s Jansson said goodbye to the comic strips. The strength to make such a life-changing decision came from her new partner Tuulikki Pietil&amp;auml;, known as Tuuti, immortalised as Too-Ticky in Moominland Midwinter, a book which Paul Denton, a producer at the London&amp;rsquo;s Southbank Centre where Jansson&amp;rsquo;s works are currently on show, sees as their personal love story. Moomin wakes up in winter while the rest of the family are hibernating. Initially afraid, he meets Too-ticky who teaches him how to live in this new environment &amp;ldquo;and it&amp;rsquo;s much the same as Tuuti did with Jansson, teaching her a new way to live and love,&amp;rdquo; he says.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div class=&quot;inline-media inline-image&quot;&gt;\r\n&lt;div class=&quot;inline-image-wrapper&quot;&gt;&lt;a id=&quot;p04lcthp&quot; class=&quot;responsive-image-wrapper fullsizeable&quot; href=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/1280_720/images/live/p0/4l/ct/p04lcthp.jpg&quot; data-caption=&quot;In Jansson&amp;rsquo;s Abstract Sea from1963, the choppy waters of the Baltic and the sky above dissolve into a swirling form (Credit: Finnish National Gallery / Hannu Aaltonen)&quot; data-caption-title=&quot;&quot; data-is-clickable=&quot;true&quot;&gt;&lt;img class=&quot;responsive landscape&quot; title=&quot;Abstract Sea, Tove Jansson, 1963 &quot; src=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/624_351/images/live/p0/4l/ct/p04lcthp.jpg&quot; alt=&quot;Abstract Sea, Tove Jansson, 1963 &quot; width=&quot;&quot; height=&quot;&quot; data-fixed-width-format=&quot;&quot; data-caption=&quot;In Jansson&amp;rsquo;s Abstract Sea from1963, the choppy waters of the Baltic and the sky above dissolve into a swirling form (Credit: Finnish National Gallery / Hannu Aaltonen)&quot; data-caption-title=&quot;&quot; data-landscape=&quot;&quot; /&gt;&lt;/a&gt;&lt;/div&gt;\r\n&lt;div class=&quot;caption-wrapper&quot;&gt;\r\n&lt;div class=&quot;caption-lining&quot;&gt;\r\n&lt;p class=&quot;caption-text caption-body&quot;&gt;In Jansson&amp;rsquo;s Abstract Sea from1963, the choppy waters of the Baltic and the sky above dissolve into a swirling form (Credit: Finnish National Gallery / Hannu Aaltonen)&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;In 1959 Jansson, painted another self-portrait. She called it Beginner. Her expression is calm and determined, her gaze directed at the easel.&amp;nbsp; It is signed Jansson in a bid to separate her from the Tove of Moomin fame. Belatedly she tried her hand with abstraction but, &amp;ldquo;as a storyteller she had difficulties as an abstract artist,&amp;rdquo; says Tuula Karjalainen.&amp;nbsp; &amp;ldquo;She paints landscapes that are quite abstract anyway &amp;ndash; the sea, waves or storms &amp;ndash; &amp;nbsp;and if the painting is abstract from the start she adds more figurative elements.&amp;rdquo;&lt;/p&gt;\r\n&lt;blockquote&gt;\r\n&lt;p&gt;If there was one thing that made her truly sad later on in life it was that people only saw the Moomins in her &amp;ndash; Sophia Jansson&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n&lt;p&gt;Jansson returned to the Moomins in 1965 with Moominpappa at Sea, which deals with her troubled relationship with her father. &amp;nbsp;Feeling as if he is not needed, Moominpappa behaves with uncharacteristic chauvinism in whisking his family off to an uninhabited island to prove his worth. Moominmamma, who Jansson had always said was based on Ham, is so homesick that she paints countless pictures of Moominvalley, which miraculously come to life.&lt;/p&gt;\r\n&lt;p&gt;Throughout the 1970s Jansson largely devoted herself to writing for adults but on a trip to Paris in 1975 she picked up her brushes again and painted what Karjalainen thinks are two of her finest paintings. An unflattering self portrait showing herself with sagging skin and red rimmed eyes and a portrait of Tuuti, seated at her easel surrounded by colour and light.&lt;/p&gt;\r\n&lt;p&gt;Jansson&amp;rsquo;s niece Sophia says that, &amp;ldquo;if there was one thing that made her truly sad later on in life it was&amp;nbsp; that people only saw the Moomins in her,&amp;rdquo; but Karjalainen finds it equally sad that, &amp;ldquo;she did not fully understand what remarkable art her illustrations and cartoons were.&amp;rdquo; Fortunately, we now have the ideal opportunity to appreciate both sides of this multi-talented and truly remarkable woman.&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;If you would like to comment on this story or anything else you have seen on BBC Culture, head over to our&amp;nbsp;&lt;/em&gt;&lt;a href=&quot;https://www.facebook.com/pages/BBC-Culture/237388053065908&quot;&gt;&lt;em&gt;&lt;strong&gt;Facebook&lt;/strong&gt;&lt;/em&gt;&lt;/a&gt;&lt;em&gt;&amp;nbsp;page or message us on&lt;/em&gt;&amp;nbsp;&lt;a href=&quot;https://twitter.com/bbc_culture&quot;&gt;&lt;em&gt;&lt;strong&gt;Twitter&lt;/strong&gt;&lt;/em&gt;&lt;/a&gt;&lt;em&gt;.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;And if you liked this story,&amp;nbsp;&lt;/em&gt;&lt;a href=&quot;http://pages.emails.bbc.com/subscribe/&quot;&gt;&lt;strong&gt;&lt;em&gt;sign up for the weekly bbc.com features newsletter&lt;/em&gt;&lt;/strong&gt;&lt;/a&gt;&lt;em&gt;, called &amp;ldquo;If You Only Read 6 Things This Week&amp;rdquo;. A handpicked selection of stories from BBC Future, Earth, Culture, Capital, Travel and Autos, delivered to your inbox every Friday.&lt;/em&gt;&lt;/p&gt;', 6, '2017-01-12', NULL, 'Moomins', 'The serious artist behind the Moomins', 54, ''),
(19, 0, 'The art of anxious times', '&lt;p&gt;When we think about art at the end of the 19th Century, who and what comes to mind? Monet and Impressionism, certainly. Toulouse-Lautrec at the Moulin Rouge, perhaps. Post-Impressionism, of course: C&amp;eacute;zanne and his heavy-set cardplayers or Mont Sainte-Victoire shimmering on the horizon, magnificent and majestic; Gauguin in his Tahitian paradise; or the last ravishing landscapes of Van Gogh, who died just as the last decade of the century &amp;shy;was getting into its stride.&lt;/p&gt;\r\n&lt;blockquote&gt;\r\n&lt;p&gt;Art at the end of the 19th Century is as far removed from Monet&amp;rsquo;s sun-dappled garden as you can get&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n&lt;p&gt;But when we think of the art that&amp;rsquo;s actually characterised as the art of the&amp;nbsp;&lt;em&gt;fin de si&amp;egrave;cle&lt;/em&gt;, particularly the last decade of that century, the mood changes, and it darkens. We think of the art of anxiety and angst, of drama and febrile tension, of an acute sense of alienation. And it&amp;rsquo;s all as far removed from Monet&amp;rsquo;s sun-dappled garden at Giverny as you can get.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div class=&quot;inline-media inline-image&quot;&gt;\r\n&lt;div class=&quot;inline-image-wrapper&quot;&gt;&lt;a id=&quot;p04kkjp1&quot; class=&quot;responsive-image-wrapper fullsizeable&quot; href=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/1280_720/images/live/p0/4k/kj/p04kkjp1.jpg&quot; data-caption=&quot;James Ensor, seen here in his studio in 1937, made his body of work an index of the unsettling (Credit: www.lukasweb.be - Art in Flanders vzw/DACS 2016)&quot; data-caption-title=&quot;&quot; data-is-clickable=&quot;true&quot;&gt;&lt;img class=&quot;responsive landscape&quot; title=&quot;(Credit: www.lukasweb.be - Art in Flanders vzw/DACS 2016)&quot; src=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/624_351/images/live/p0/4k/kj/p04kkjp1.jpg&quot; alt=&quot;(Credit: www.lukasweb.be - Art in Flanders vzw/DACS 2016)&quot; width=&quot;&quot; height=&quot;&quot; data-fixed-width-format=&quot;&quot; data-caption=&quot;James Ensor, seen here in his studio in 1937, made his body of work an index of the unsettling (Credit: www.lukasweb.be - Art in Flanders vzw/DACS 2016)&quot; data-caption-title=&quot;&quot; data-landscape=&quot;&quot; /&gt;&lt;/a&gt;&lt;/div&gt;\r\n&lt;div class=&quot;caption-wrapper&quot;&gt;\r\n&lt;div class=&quot;caption-lining&quot;&gt;\r\n&lt;p class=&quot;caption-text caption-body&quot;&gt;James Ensor, seen here in his studio in 1937, made his body of work an index of the unsettling (Credit: www.lukasweb.be - Art in Flanders vzw/DACS 2016)&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;We might, for instance, think, most famously, of Munch&amp;rsquo;s Scream, the first version of which the troubled Norwegian artist painted in 1893, or his various depictions of women as vampires, slaking their sexual thirst on unsuspecting men. Or perhaps our thoughts turn to the young and eccentric English illustrator and printmaker Aubrey Beardsley and his darkly erotic, sinuous vixens &amp;ndash; exotic femme fatales who could captivate and destroy any man. And as the embodiment of lust and evil, naturally the&amp;nbsp;&lt;em&gt;femme fatale&lt;/em&gt;&amp;nbsp;becomes a mascot of the&amp;nbsp;&lt;em&gt;fin de si&amp;egrave;cle&lt;/em&gt;, just as much as the dandy, that ultra-refined aesthete who rises above ordinary moral concerns, becomes its icon.&lt;/p&gt;\r\n&lt;p&gt;Or we might even think of an artist who is currently being shown at the&amp;nbsp;&lt;a href=&quot;https://www.royalacademy.org.uk/exhibition/james-ensor-luc-tuymans&quot;&gt;Royal Academy in London&lt;/a&gt;: the brilliant Belgian painter James Ensor, whose rich palette glows with Rubenesque colours but whose subject matter is dark and satirical: skulls and skeletons and eerie masks, all representing the corruption at the heart of bourgeois society.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div class=&quot;inline-media inline-image&quot;&gt;\r\n&lt;div class=&quot;inline-image-wrapper&quot;&gt;&lt;a id=&quot;p04kkjnw&quot; class=&quot;responsive-image-wrapper fullsizeable&quot; href=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/1280_720/images/live/p0/4k/kj/p04kkjnw.jpg&quot; data-caption=&quot;Munch&amp;rsquo;s The Scream is the best known example of Expressionism, a movement that represented external reality as indicative of emotional states (Credit: Edvard Munch/Wikipedia)&quot; data-caption-title=&quot;&quot; data-is-clickable=&quot;true&quot;&gt;&lt;img class=&quot;responsive landscape&quot; title=&quot;(Credit: Edvard Munch/Wikipedia)&quot; src=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/624_351/images/live/p0/4k/kj/p04kkjnw.jpg&quot; alt=&quot;(Credit: Edvard Munch/Wikipedia)&quot; width=&quot;&quot; height=&quot;&quot; data-fixed-width-format=&quot;&quot; data-caption=&quot;Munch&amp;rsquo;s The Scream is the best known example of Expressionism, a movement that represented external reality as indicative of emotional states (Credit: Edvard Munch/Wikipedia)&quot; data-caption-title=&quot;&quot; data-landscape=&quot;&quot; /&gt;&lt;/a&gt;&lt;/div&gt;\r\n&lt;div class=&quot;caption-wrapper&quot;&gt;\r\n&lt;div class=&quot;caption-lining&quot;&gt;\r\n&lt;p class=&quot;caption-text caption-body&quot;&gt;Munch&amp;rsquo;s The Scream is the best known example of Expressionism, a movement that represented external reality as indicative of emotional states (Credit: Edvard Munch/Wikipedia)&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Or his fellow Belgian, the lesser known but equally brilliant L&amp;eacute;on Spilliaert, whose thin and haunted features stare out forlornly in his self-portraits, presenting himself as a strange, cadaverous figure trapped in gloomy and oppressive interiors &amp;ndash; for Spilliaert, too, is at the Royal Academy, where he complements the work of Ensor, his older contemporary who also lived at Ostend. &amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Or, in fact, we might even return to Gauguin, who in some ways became a figurehead for these disquieting forces at the end of the century. Gauguin&amp;rsquo;s fascination with religious and mystical subject matter, and for the purely imaginary and fantastical, were synthesised in his paintings with the ordinary, everyday world that surrounded him - just as James Ensor&amp;rsquo;s work also provided a synthesis of the real and imagined.&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;What lies beneath&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;Ensor grew up above a curio shop in the cold, coastal town of Ostend, where his mother sold trinkets, costumes and grotesque carnival masks to tourists. At first Ensor painted in a loosely Impressionist style, but he retained his childhood fascination with these masks and was soon incorporating them into his work. His favourite motif became that of the surging crowd, where ossified faces are leering, threatening masks that overwhelm the whole picture. For Ensor these props seemed to provide the perfect metaphor for the hypocrisies of polite society.&lt;/p&gt;\r\n&lt;blockquote&gt;\r\n&lt;p&gt;Ensor&amp;rsquo;s faces are leering, threatening masks that overwhelm the whole picture&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n&lt;p&gt;In one painting, The Intrigue, 1890, which forms the centrepiece of the Royal Academy exhibition, a group of grotesques with barely human faces congregate in a bizarre wedding group, the aged bride and her ghoulish top-hatted groom grotesquely inverting family and Christian values to be found in the embodiment of the marriage ritual. &amp;nbsp;in one self-portrait, painted a year earlier, we find the young Ensor in an elaborate, plumed hat, making him appear slightly ridiculous. Surrounded by a swarm of terrifying masks, he stares out at us with a stern and frank gaze. Is he accusing us of some unspecified crime against him, or simply imploring us to bear witness to his suffering?&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div class=&quot;inline-media inline-image&quot;&gt;\r\n&lt;div class=&quot;inline-image-wrapper&quot;&gt;&lt;a id=&quot;p04kkjl7&quot; class=&quot;responsive-image-wrapper fullsizeable&quot; href=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/1280_720/images/live/p0/4k/kj/p04kkjl7.jpg&quot; data-caption=&quot;Aubrey Beardsley helped establish the idea of the femme fatale in his ominous black and white lithographs like The Stomach Dance from 1893 (Credit: Aubrey Beardsley/Wikipedia)&quot; data-caption-title=&quot;&quot; data-is-clickable=&quot;true&quot;&gt;&lt;img class=&quot;responsive landscape&quot; title=&quot;(Credit: Aubrey Beardsley/Wikipedia)&quot; src=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/624_351/images/live/p0/4k/kj/p04kkjl7.jpg&quot; alt=&quot;(Credit: Aubrey Beardsley/Wikipedia)&quot; width=&quot;&quot; height=&quot;&quot; data-fixed-width-format=&quot;&quot; data-caption=&quot;Aubrey Beardsley helped establish the idea of the femme fatale in his ominous black and white lithographs like The Stomach Dance from 1893 (Credit: Aubrey Beardsley/Wikipedia)&quot; data-caption-title=&quot;&quot; data-landscape=&quot;&quot; /&gt;&lt;/a&gt;&lt;/div&gt;\r\n&lt;div class=&quot;caption-wrapper&quot;&gt;\r\n&lt;div class=&quot;caption-lining&quot;&gt;\r\n&lt;p class=&quot;caption-text caption-body&quot;&gt;Aubrey Beardsley helped establish the idea of the femme fatale in his ominous black and white lithographs like The Stomach Dance from 1893 (Credit: Aubrey Beardsley/Wikipedia)&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;In other canvases, Ensor &amp;nbsp;paints himself as either a skeleton or as a tormented Christ-like figure. In his monumental Christ&amp;rsquo;s Entry into Brussels in 1889 (actually painted in 1888), Christ himself is seen entering the city on a donkey, but is barely discernable amid the crushing crowd &amp;ndash; the implication being that these self-obsessed and conservative scions of the city would barely notice the messiah arriving amongst them. And it may be a sidelong reference to Ensor&amp;rsquo;s own overlooked genius. Like Munch, one gets a sense that Ensor suffered from an acute persecution complex, though unlike Munch, Ensor&amp;rsquo;s work has a darkly comic edge to it. His fraught paintings bristle with humour and are all the more vivid for that.&lt;/p&gt;\r\n&lt;p&gt;So why did artists revel in such outward expressions of unease and dislocation? In an era of relative peace and stability and, for the few, economic prosperity (an era named, after the destruction of the Great War, as the&amp;nbsp;&lt;em&gt;Belle &amp;Eacute;poque&lt;/em&gt;&amp;nbsp;or Golden Age and which stretched from the 1870s to the war&amp;rsquo;s outbreak) the art of&amp;nbsp;&lt;em&gt;fin-de-si&amp;egrave;cle&lt;/em&gt;&amp;nbsp;Europe expressed something contrary to those outward signs of confidence. These were anxieties connected with a sense of society&amp;rsquo;s spiritual emptiness and its growing materialism. This was a rejection of the idea that progress and reason, ideas which intellectuals had embraced and promoted since the 18th Century as Enlightenment ideals, could sustain the spirit.&lt;/p&gt;\r\n&lt;blockquote&gt;\r\n&lt;p&gt;It signalled a deeper anxiety: our inability to control our own destinies.&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n&lt;p&gt;But perhaps, in a way, these were also anxieties exacerbated by the end of any century. It might sound a trivial connection, but in our own age we might think back to the alarm over the Millennium Bug, where people actually imagined planes falling out of the sky due to programs having accommodated only two digits instead of four (computers would think, when the hour struck, they were back in 1900).&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div class=&quot;inline-media inline-image&quot;&gt;\r\n&lt;div class=&quot;inline-image-wrapper&quot;&gt;&lt;a id=&quot;p04kkjjt&quot; class=&quot;responsive-image-wrapper fullsizeable&quot; href=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/1280_720/images/live/p0/4k/kj/p04kkjjt.jpg&quot; data-caption=&quot;Gauguin&amp;rsquo;s Where Do We Come From? What Are We? Where Are We Going? is no tropical idyll &amp;ndash; it can be read as a panorama of existential ennui (Credit: Paul Gauguin/Wikipedia)&quot; data-caption-title=&quot;&quot; data-is-clickable=&quot;true&quot;&gt;&lt;img class=&quot;responsive landscape&quot; title=&quot;(Credit: Paul Gauguin/Wikipedia)&quot; src=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/624_351/images/live/p0/4k/kj/p04kkjjt.jpg&quot; alt=&quot;(Credit: Paul Gauguin/Wikipedia)&quot; width=&quot;&quot; height=&quot;&quot; data-fixed-width-format=&quot;&quot; data-caption=&quot;Gauguin&amp;rsquo;s Where Do We Come From? What Are We? Where Are We Going? is no tropical idyll &amp;ndash; it can be read as a panorama of existential ennui (Credit: Paul Gauguin/Wikipedia)&quot; data-caption-title=&quot;&quot; data-landscape=&quot;&quot; /&gt;&lt;/a&gt;&lt;/div&gt;\r\n&lt;div class=&quot;caption-wrapper&quot;&gt;\r\n&lt;div class=&quot;caption-lining&quot;&gt;\r\n&lt;p class=&quot;caption-text caption-body&quot;&gt;Gauguin&amp;rsquo;s Where Do We Come From? What Are We? Where Are We Going? is no tropical idyll &amp;ndash; it can be read as a panorama of existential ennui (Credit: Paul Gauguin/Wikipedia)&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;It signalled a deeper anxiety that is perennial: our inability to know and control our own destinies. Where Do We Come From? What Are We? Where Are We Going?,the title from an 1897 painting by Gauguin, seemed to capture this quest for that deeper knowledge &amp;ndash; and he and many other artists of the time looked for answers not in science but in esoteric spirituality, in mysticism and often the occult. &amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Darkness and despair&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;The&amp;nbsp;&lt;em&gt;fin de si&amp;egrave;cle&lt;/em&gt;&amp;nbsp;encompassed the Symbolist and Decadent movements, which were primarily literary movements flourishing first in France but then all over Europe, and which provided a wellspring of ideas for visual artists. As well as Ensor and Spilliaert, one of the most notable artists in Belgium was Fernand Khnopff, who, like Ensor, was a member of the Belgian avant-group group Les XX and whose most striking painting, L&amp;rsquo;Art (or The Caresses), 1896, depicted a sphinx with a &amp;lsquo;real&amp;rsquo; woman&amp;rsquo;s head and the body of a leopard, her face the picture of ecstasy as she is shown caressing a male figure (Oedipus).&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div class=&quot;inline-media inline-image&quot;&gt;\r\n&lt;div class=&quot;inline-image-wrapper&quot;&gt;&lt;a id=&quot;p04kkjhz&quot; class=&quot;responsive-image-wrapper fullsizeable&quot; href=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/1280_720/images/live/p0/4k/kj/p04kkjhz.jpg&quot; data-caption=&quot;Fernand Khnopff&amp;rsquo;s L&amp;rsquo;Art makes explicit the idea that sexual expressiveness is a form of animal impulse (Credit: Fernand Khnopff/Wikipedia)&quot; data-caption-title=&quot;&quot; data-is-clickable=&quot;true&quot;&gt;&lt;img class=&quot;responsive landscape&quot; title=&quot;(Credit: Fernand Khnopff/Wikipedia)&quot; src=&quot;http://ichef.bbci.co.uk/wwfeatures/wm/live/624_351/images/live/p0/4k/kj/p04kkjhz.jpg&quot; alt=&quot;(Credit: Fernand Khnopff/Wikipedia)&quot; width=&quot;&quot; height=&quot;&quot; data-fixed-width-format=&quot;&quot; data-caption=&quot;Fernand Khnopff&amp;rsquo;s L&amp;rsquo;Art makes explicit the idea that sexual expressiveness is a form of animal impulse (Credit: Fernand Khnopff/Wikipedia)&quot; data-caption-title=&quot;&quot; data-landscape=&quot;&quot; /&gt;&lt;/a&gt;&lt;/div&gt;\r\n&lt;div class=&quot;caption-wrapper&quot;&gt;\r\n&lt;div class=&quot;caption-lining&quot;&gt;\r\n&lt;p class=&quot;caption-text caption-body&quot;&gt;Fernand Khnopff&amp;rsquo;s L&amp;rsquo;Art makes explicit the idea that sexual expressiveness is a form of animal impulse (Credit: Fernand Khnopff/Wikipedia)&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;It&amp;rsquo;s a compelling and unsettling image, made stranger for the meticulous realism of its technique with the enigmatic fantasy of its subject. Elsewhere were the weird Goya-esque fantasies of Austrian Alfred Kubin, and, in Germany, the beguiling and erotic paintings of Franz Stuck, who co-founded the avant-garde Munich Secession group in 1892. A generation older, we might also think of the sweeter though no less haunting dream-visions of French artist Odilon Redon.&lt;/p&gt;\r\n&lt;p&gt;In literature, one of the most influential works of the Symbolist and Decadent movements was Joris-Karl Huysmans&amp;rsquo;&amp;nbsp;&lt;em&gt;&amp;Agrave; Rebours&lt;/em&gt;&amp;nbsp;(Against Nature). Published in 1884, its young anti-hero is an eccentric, reclusive aesthete called Jean des Esseintes who loathes bourgeois society and so roundly rejects it. Instead he surrounds himself with nascent Symbolist poetry and art, and lives a life of excessive sensual indulgence.&lt;/p&gt;\r\n&lt;p&gt;Huysmans&amp;rsquo; themes certainly found an echo among many artists of the period. The French writer Barbey d&amp;rsquo;Aurvilly&amp;rsquo;s reponse to his seminal novel of Decadent literature was revealing in its insight: &amp;ldquo;For a decadent of this calibre to emerge and for a book like Monsieur Huysmans&amp;rsquo; to germinate within a human head, we must have become what in fact we are &amp;ndash; a race in its last hour.&amp;rdquo;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;If you would like to comment on this story or anything else you have seen on BBC Culture, head over to our&amp;nbsp;&lt;/em&gt;&lt;a href=&quot;https://www.facebook.com/pages/BBC-Culture/237388053065908&quot;&gt;&lt;em&gt;&lt;strong&gt;Facebook&lt;/strong&gt;&lt;/em&gt;&lt;/a&gt;&lt;em&gt;&amp;nbsp;page or message us on&lt;/em&gt;&amp;nbsp;&lt;a href=&quot;https://twitter.com/bbc_culture&quot;&gt;&lt;em&gt;&lt;strong&gt;Twitter&lt;/strong&gt;&lt;/em&gt;&lt;/a&gt;&lt;em&gt;.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;And if you liked this story,&amp;nbsp;&lt;/em&gt;&lt;a href=&quot;http://pages.emails.bbc.com/subscribe/&quot;&gt;&lt;strong&gt;&lt;em&gt;sign up for the weekly bbc.com features newsletter&lt;/em&gt;&lt;/strong&gt;&lt;/a&gt;&lt;em&gt;, called &amp;ldquo;If You Only Read 6 Things This Week&amp;rdquo;. A handpicked selection of stories from BBC Future, Earth, Culture, Capital, Travel and Autos, delivered to your inbox every Friday.&lt;/em&gt;&lt;/p&gt;', 6, '2017-01-13', NULL, 'art, anxious', 'Art at the turn of the last century was not all sun-kissed Monet gardens. It was a time of angst and decadence, expressed through some truly disturbing paintings, writes Fisun GÃ¼ner.', 150, 'images/blog/23-760x290.jpg'),
(42, 0, 'iPhone 8 will have game-changing wireless charging feature, claims Apple analyst', '&lt;div class=&quot;story-intro&quot;&gt;\r\n&lt;p&gt;&lt;strong&gt;APPLE&amp;rsquo;S iPhone 8 is definitely set to feature wireless charging, a top analyst has claimed.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Ming-Chi Kuo has said the upcoming iPhone will come in three different forms, but every one of them will let users charge their phone without having to plug it in.&lt;/p&gt;\r\n&lt;p&gt;In a briefing note obtained by&amp;nbsp;&lt;a href=&quot;https://www.macrumors.com/2017/02/09/2017-iphones-wireless-charging/&quot;&gt;Mac Rumours&lt;/a&gt;, he said the phones would use a sheet of graphite to stop them overheating while charging wirelessly.&lt;/p&gt;\r\n&lt;p&gt;He wrote: &amp;ldquo;While we don&amp;rsquo;t expect general users to notice any difference, lamination of an additional graphite sheet is needed for better thermal control and, thus, steady operation.&amp;rdquo;&lt;/p&gt;\r\n&lt;p&gt;It has also been rumoured that the smartphone will feature an edge to edge display in the top of the range model alongside two standard versions.&lt;/p&gt;\r\n&lt;p&gt;Foxconn Technology in Taiwan is making wireless modules to go with their next model according to&amp;nbsp;&lt;a href=&quot;http://asia.nikkei.com/Business/Companies/Foxconn-tests-wireless-charging-for-iPhone-8-source?page=1&quot;&gt;Nikkei.com&lt;/a&gt;.&lt;/p&gt;\r\n&lt;p&gt;An industry source told the Asian publication: &amp;ldquo;Whether the feature can eventually make it into Apple&amp;rsquo;s updated devices will depend on whether Foxconn can boost the yield rate to a satisfactory level later on.&amp;rdquo;&lt;/p&gt;\r\n&lt;p&gt;It is currently not obvious whether the California firm would offer a wireless charging plate, similar to Samsung&amp;rsquo;s offering or something different.&lt;/p&gt;\r\n&lt;p&gt;But one of the patents filed by Apple in the US shows images of a charger similar to that used by the Apple Watch.&lt;/p&gt;\r\n&lt;p&gt;The patent itself is mainly focused on a metal brushing technique but also refers to and &amp;ldquo;inductive charging station&amp;rdquo;.&lt;/p&gt;\r\n&lt;div class=&quot;module image-module module-image-650w488h&quot;&gt;\r\n&lt;div class=&quot;module-content&quot;&gt;\r\n&lt;div class=&quot;image-block image-650w488h&quot;&gt;\r\n&lt;div class=&quot;image-frame&quot;&gt;&lt;img src=&quot;http://cdn.newsapi.com.au/image/v1/f5eba934c6f52ecbbfffa5f046dcf4e4&quot; alt=&quot;This patent appears to show a wireless charging plate, which will charge the phone up when it&amp;rsquo;s placed on top.&quot; width=&quot;650&quot; height=&quot;488&quot; /&gt;&lt;/div&gt;\r\n&lt;p class=&quot;caption&quot;&gt;&lt;span class=&quot;caption-text&quot;&gt;This patent appears to show a wireless charging plate, which will charge the phone up when it&amp;rsquo;s placed on top.&lt;/span&gt;&lt;span class=&quot;image-source&quot;&gt;&lt;em&gt;Source:&lt;/em&gt;Supplied&lt;/span&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;According to Mac Rumours: &amp;ldquo;In describing how the tools would work, the application includes multiple illustrations of a charging station used to provide electrical current to another device via inductive power transmission.&lt;/p&gt;\r\n&lt;p&gt;&amp;ldquo;An inductive transmitter coil wraps around a metal core and is designed to pair with a receiver coil and charge the battery in the electronic device.&amp;rdquo;&lt;/p&gt;\r\n&lt;p&gt;It was also revealed last year that Apple had a patent for a foldable version of the iconic handset.&lt;/p&gt;\r\n&lt;p&gt;Sketches in the patent application show a iPhone with a fold down the middle of the screen, with carbon nanotubes giving strength to the structure.&lt;/p&gt;\r\n&lt;p&gt;In the patent application, Apple says the housing for the phone could be aluminium, glass, ceramic or even plastic for the bendable screen.&lt;/p&gt;\r\n&lt;p&gt;Apple is granted about 2000 patents a year, and just because it patents something it does not mean that it will result in a product.&lt;/p&gt;\r\n&lt;p&gt;But chief design officer Jony Ive gave an insight into the time involved in going from an idea to implementation last week in an interview about the new MacBook Pro Touch Bar, saying the design of the Touch Bar came after two years of trying a range of designs.&lt;/p&gt;\r\n&lt;p&gt;Apple is expected to majorly revamp the iPhone design next year although if it does develop a fordable iPhone that is likely to be something several years down the track.&lt;/p&gt;', 2, '2017-02-13', '2017-02-14', 'iPhone 8, APPLE', 'APPLEâ€™S iPhone 8 is definitely set to feature wireless charging, a top analyst has claimed.', 183, '../uploads/article/iphoneconceptimage.jpg');

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
  `userID` varchar(100) NOT NULL,
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
  `userID` varchar(100) NOT NULL,
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
-- 資料表結構 `slide_img`
--

CREATE TABLE `slide_img` (
  `id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `slogan_title` varchar(30) NOT NULL,
  `slogan_content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `slide_img`
--

INSERT INTO `slide_img` (`id`, `path`, `slogan_title`, `slogan_content`) VALUES
(1, '../uploads/cover/environmental.jpg', 'slogan 1', 'slogan 1 content'),
(2, '../uploads/cover/nature_grass_green_grass-27447.jpg', 'slogan 2 ', 'slogan 2  content'),
(3, '../uploads/cover/nature_green_dew_macro_water_drops-30364.jpg', 'slider 3', 'slide 3 content'),
(4, '../uploads/cover/green_forest_tree_nature_forest-28872.jpg', 'slide 4', 'slide 4 content'),
(5, '../uploads/cover/sky_nature_green_field_grass_summer_field-30432.jpg', 'slider 5', 'slider 5 content');

-- --------------------------------------------------------

--
-- 資料表結構 `title`
--

CREATE TABLE `title` (
  `title_id` int(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `phone` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `title`
--

INSERT INTO `title` (`title_id`, `title`, `phone`) VALUES
(1, 'Natural Direct Co. Ltd', 81068068);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userID` varchar(10) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
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
('U00000', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'M', 'admin', 0, 'admin@admin', 0, '2016-12-31', '15/12/2016'),
('U10', '', 'him', 'b14a7b8059d9c055954c', 'Him', 'M', 'hongkong', 21800000, 'him@yahoo.com', 0, '', '12/12/2016'),
('U11', '', 'admin2', 'b14a7b8059d9c055954c', 'admin', 'M', 'admin@admin', 12345678, 'admin@admin', 0, '', '12/12/2016'),
('U12', '', 'aaa', 'b14a7b8059d9c055954c', 'aaa', 'M', 'aaa', 21421, 'aaa@a', 0, '', '12/12/2016'),
('U13', '', 'admin087', '21232f297a57a5a74389', 'admin', 'M', 'admin', 2147483647, 'admin@admin', 0, '', '12/12/2016'),
('U14', '', 'aaasa', 'b64d2f09aa4c5db0b2a8', 'aaasa', 'M', 'sdfisa', 123657421, 'dsfa@afa', 0, '', '12/12/2016'),
('U15', '', 'admin887', '21232f297a57a5a74389', 'admin887', 'M', 'admin', 123872, 'admin@aaa', 0, '2013-12-31', '12/12/2016'),
('U16', '', 'h', '2510c39011c5be704182', 'h', 'M', 'h', 11212, 'h@h', 0, '2011-11-28', '12/12/2016'),
('U17', '', 'hh', '5e36941b3d856737e815', 'h', 'M', 'h', 7890, 'h@h', 0, '2016-12-31', '12/12/2016'),
('U19', '', 'uiduid', '9636c639f64688e0569245a5f772d210', 'uid', 'M', 'uid', 0, 'dui@uid.com', 0, '2016-12-31', '28/12/2016'),
('U21', '', 'opopop', '421f39a8ff4dd996a3e57877c3d98146', 'opop', 'M', 'op', 2147483647, 'op@op', 0, '2016-01-01', '28/12/2016'),
('U23', '', 'oool', 'abeac07d3c28c1bef9e730002c753ed4', 'ooool', 'M', 'oool', 111111111, 'oool@ooo', 0, '2016-01-01', '28/12/2016'),
('U25', '', 'ol', 'a46857f0ecc21f0a06ea434b94d9cf1d', 'ol', 'M', 'ol', 2147483647, 'ol@ol', 0, '2016-01-01', '28/12/2016'),
('U27', 'https://static1.squarespace.com/static/5150a2c7e4b0bcab2e23dff2/554e2a95e4b089d79afc33f2/554e2b07e4b0d78e1a287a4e/1431186183539/apple.jpg', 'apple', '1f3870be274f6c49b3e31a0c6728957f', 'apple', 'M', 'Tsing YIi', 21800000, 'apple@apple.com', 0, '1975-11-30', '13/01/2017'),
('U29', '', 'aaaaa', '594f803b380a41396ed63dca39503542', 'aas', 'M', 'sad@qwe', 214219081, 'sasd@sadsa', 0, '2017-12-31', '24/01/2017'),
('U31', '', '214155', '36c8c1bb5c4b3603d81d228fe1b23306', 'aaaaa', 'M', 'asdasd', 12412531, 'asdsad@wqrwqe', 0, '2017-12-01', '24/01/2017'),
('U33', '', 'adddd', '68a9401955b8efecfacb57086c03ffa7', 'sadsdd', 'M', 'sadsad@yhdsad', 215643436, '2321421r@dsad', 0, '2017-01-01', '24/01/2017'),
('U35', '', '12321321', '4da33a5a3ca0da483acc71fa609fe89a', '123213', 'M', '123213', 2132132132, '2132132@123213', 0, '2017-01-01', '25/01/2017'),
('U37', 'https://www.apple.com/ac/structured-data/images/knowledge_graph_logo.png?201701171411', '123123', '63ee451939ed580ef3c4b6f0109d1fd0', '123123', 'M', '123123', 12313213, '123123@123', 0, '2017-01-01', '25/01/2017'),
('U39', '', '12345', 'd9b1d7db4cd6e70935368a1efb10e377', '12345', 'M', '12345', 12314214, '124@123', 0, '2017-01-01', '25/01/2017'),
('U41', '', '123456', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'M', '123456', 123213213, '123@123213', 0, '2017-01-01', '26/01/2017'),
('U43', 'http://www.digitaltrends.com/wp-content/uploads/2012/02/jim-gaffigan.png', 'people', '12a032ce9179c32a6c7ab397b9d871fa', 'people', 'M', 'peo@peo.com', 95000401, 'peo@hotmail.com', 0, '2017-12-31', '14/02/2017');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(2, 'facebook', '10210700444580974', 'TW', 'HO', 'play11.pp@gmail.com', 'male', 'zh_HK', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/15338764_10210192902892749_3813545024624952211_n.jpg?oh=243077e4852f88adc612626d2327963a&oe=591174C5', 'https://www.facebook.com/app_scoped_user_id/10210700444580974/', '2017-01-26 04:57:49', '2017-01-26 04:58:09'),
(3, 'facebook', '10154227606311592', 'Tsz Him', 'Ho', 'hothvictor@hotmail.com', 'male', 'en_US', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/13932839_10153795530561592_7187379361134157656_n.jpg?oh=1aed42bd0e121f62e695513e08fa5d5d&oe=593DB4A9', 'https://www.facebook.com/app_scoped_user_id/10154227606311592/', '2017-02-07 14:49:51', '2017-02-22 15:48:44'),
(4, 'facebook', '1611240618905250', 'Lung', 'Ying', 'ampkb01676@yahoo.com.hk', 'male', 'zh_HK', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/10941825_1005561986139786_9167789716420764795_n.jpg?oh=f1d406cb7569ab2d636aa3e622510fad&oe=592B5917', 'https://www.facebook.com/app_scoped_user_id/1611240618905250/', '2017-03-07 13:36:40', '2017-03-07 13:36:40');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`link`);

--
-- 資料表索引 `article_img`
--
ALTER TABLE `article_img`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `autism`
--
ALTER TABLE `autism`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bg_color`
--
ALTER TABLE `bg_color`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

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
-- 資料表索引 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- 資料表索引 `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`emailID`);

--
-- 資料表索引 `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`fileNo`);

--
-- 資料表索引 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`infoID`);

--
-- 資料表索引 `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

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
-- 資料表索引 `slide_img`
--
ALTER TABLE `slide_img`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`title_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `article_img`
--
ALTER TABLE `article_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- 使用資料表 AUTO_INCREMENT `bg_color`
--
ALTER TABLE `bg_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用資料表 AUTO_INCREMENT `chattb`
--
ALTER TABLE `chattb`
  MODIFY `chatid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- 使用資料表 AUTO_INCREMENT `colortb`
--
ALTER TABLE `colortb`
  MODIFY `colorid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- 使用資料表 AUTO_INCREMENT `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `email`
--
ALTER TABLE `email`
  MODIFY `emailID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用資料表 AUTO_INCREMENT `file`
--
ALTER TABLE `file`
  MODIFY `fileNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;
--
-- 使用資料表 AUTO_INCREMENT `login_info`
--
ALTER TABLE `login_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- 使用資料表 AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
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
--
-- 使用資料表 AUTO_INCREMENT `slide_img`
--
ALTER TABLE `slide_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
