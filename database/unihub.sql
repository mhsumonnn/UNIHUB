SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `unihub`
--




CREATE TABLE `answer` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `qus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ans_detail` text NOT NULL,
  `ans_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`ans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;


INSERT INTO answer VALUES
("84","28","8","<p><span style=\"color: #993300;\"><strong>Smoothing</strong></span> helps in reducing noise by forcing pixels to be more like their neighbours</p>","2018-07-19 22:44:38","himelkhan.jpg","0"),
("85","29","1","<p>The answer will be <span style=\"background-color: #ffff00;\">8x100x100</span> because 8 bits will be required to represent a number from 0-256</p>","2018-07-19 22:46:00","sumon.jpg","0"),
("86","32","1","<p>plot(time, acceleration)</p>","2018-07-19 22:52:41","sumon.jpg","0"),
("87","34","1","<p>Operating system is a required component of the computer system.</p>\n<p>Without an operating system computer hardware is only an inactive electronic machine, which is inconvenient to user for execution of programs.</p>\n<p>As the computer hardware or machine understands only the machine language. It is difficult to develop each and every program in machine language in order to execute it.</p>\n<p>Thus without operating system execution of user program or to solve user problems is extremely difficult.</p>","2018-07-19 22:58:38","sumon.jpg","0"),
("88","35","1","<p>The various kind of interactions catered by DBMS are:</p>\n<ul>\n<li>Data definition</li>\n<li>Update</li>\n<li>Retrieval</li>\n<li>Administration</li>\n</ul>","2018-07-19 23:00:28","sumon.jpg","0"),
("89","36","1","<p>2 Mbps</p>","2018-07-19 23:02:01","sumon.jpg","0"),
("90","37","1","<pre class=\"language-c\"><code>#include &lt;stdio.h&gt;  \n int main()  \n {  \n     int ara[] = {1, 4, 6, 8, 9, 11, 14, 15, 20, 25, 33 83, 87, 97, 99, 100};  \n     int low_indx = 0;  \n     int high_indx = 15;  \n     int mid_indx;  \n     int num = 97;  \n     while (low_indx &lt;= high_indx) {  \n         mid_indx = (low_indx + high_indx) / 2;  \n         if (num == ara[mid_indx]) {  \n             break;  \n         }  \n         if (num &lt; ara[mid_indx]) {  \n             high_indx = mid_indx &ndash; 1;  \n         }  \n         else {  \n             low_indx = mid_indx + 1;  \n         }  \n     }  \n     if (low_indx &gt; high_indx) {  \n         printf(\"%d is not in the array\n\", num);  \n     }  \n     else {  \n         printf(\"%d is found in the array. It is the %d th element of the array.\n\", ara[mid_indx], mid_indx);  \n     }  \n     return 0;  \n }  </code></pre>","2018-07-19 23:06:39","sumon.jpg","0"),
("91","37","1","<p>à¦¬à¦¾à¦‚à¦²à¦¾à§Ÿ à¦°à¦¿à¦ªà§à¦²à¦¾à¦‡ à¦¦à§‡à§Ÿà¦¾ à¦¯à¦¾à¦¬à§‡</p>","2018-07-19 23:08:51","sumon.jpg","0");




CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;


INSERT INTO category VALUES
("1","Programming"),
("2","Networking"),
("3","Discrete Mathematics"),
("4","Database"),
("5","Operating System"),
("6","Matlab"),
("7","Computer Graphics"),
("8","Image Processing");




CREATE TABLE `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `message` longtext NOT NULL,
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recipient` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;


INSERT INTO chat VALUES
("1","11","Hello","2018-07-18 19:17:01","0"),
("2","11","hi","2018-07-18 19:17:01","0"),
("3","11","hmm","2018-07-18 19:17:01","0"),
("4","11","Okay, I think this is working perfectly. Yay!","2018-07-18 19:17:01","0"),
("5","12","Hey dude!","2018-07-18 19:17:01","0"),
("6","12","Whassup?","2018-07-18 19:17:01","0"),
("7","1","hi\n","2018-07-18 19:17:01","0"),
("8","1","how are you","2018-07-18 19:17:01","0"),
("9","1","hello\n","2018-07-18 19:17:01","0"),
("10","2","some message","2018-07-18 19:17:01","0"),
("21","13","Some text goes here","2018-07-25 19:01:36","0"),
("22","13","some text ","2018-07-25 19:02:00","8"),
("23","13","Hello there","2018-07-25 19:03:28","8"),
("24","8","teststst s st","2018-07-25 19:04:07","13"),
("25","13","Hello there","2018-07-25 19:04:25","8"),
("26","13","how are you","2018-07-25 19:12:22","8"),
("27","13","how are you","2018-07-25 19:18:06","8"),
("28","13","hello","2018-07-26 01:04:18","8"),
("29","13","Hello","2018-07-26 01:04:36","9");




CREATE TABLE `question` (
  `qus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answered` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  PRIMARY KEY (`qus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;


INSERT INTO question VALUES
("28","8","1","Finite difference filters in image processing are very susceptible to noise. To cope up with this, which methods can you use so that there would be minimal distortions by noise?","2018-07-19 22:42:46","1","4","0"),
("29","8","8","Consider and image with width and height as 100Ã—100. Each pixel in the image can have a color from Grayscale, i.e. values. How much space would this image require for storing?","2018-07-19 22:45:17","1","4","0"),
("30","7","7","Describe the Z-buffer algorithm and the painter\'s algorithm. For what type of scenes Z-buffer does not perform well? What effects are difficult to implement with Z-buffer? Explain why large difference between the far and near distances in the projection transformation will have a negative effect on Z-buffer performance.","2018-07-19 22:50:34","0","4","0"),
("31","7","8","Explain what a cubic B-spline curve is, and what are the cubic spline basis functions (you do not have to write the explicit formulas, just state the important properties and sketch a plot). Explain how to compute piecewise-linear approximation to the spline curve using subdivision. How the endpoints can be handled?","2018-07-19 22:51:11","0","2","0"),
("32","6","7","Which command will create a plot of acceleration vs. time (i.e., a vector time on the x-axis and a vector acceleration on the y-axis)?","2018-07-19 22:52:07","1","4","0"),
("33","5","1","What are the primary differences between Network Operating System and Distributed Operating System?","2018-07-19 22:53:35","0","4","0"),
("34","5","1","What inconveniences that a user can face while interacting with a computer system, which is without an operating system?","2018-07-19 22:58:16","1","3","0"),
("35","4","1","What are the various kinds of interactions catered by DBMS?","2018-07-19 23:00:06","1","4","0"),
("36","2","1","You have 10 users plugged into a hub running 10Mbps half-duplex. There is a server connected to the switch running 10Mbps half-duplex as well. How much bandwidth does each host have to the server?","2018-07-19 23:01:36","1","12","0"),
("37","1","8","à¦¬à¦¾à¦‡à¦¨à¦¾à¦°à¦¿ à¦¸à¦¾à¦°à§à¦š à¦•à¦¿à¦­à¦¾à¦¬à§‡ à¦•à¦¾à¦œ à¦•à¦°à§‡ à¦¸à§‡ à¦¬à¦¿à¦·à§Ÿà§‡ à¦¬à¦¿à¦¸à§à¦¤à¦¾à¦°à¦¿à¦¤ à¦œà¦¾à¦¨à¦¤à§‡ à¦†à¦—à§à¦°à¦¹à§€à¥¤ ","2018-07-19 23:04:49","2","21","0");




CREATE TABLE `review` (
  `rev_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `post` mediumtext NOT NULL,
  `posttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answered` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  PRIMARY KEY (`rev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO review VALUES
("3","13","I have Thesis paper to check my spelling and grammerticals","<p>Hello,&nbsp;</p>\n<p>I am working on a image processing thesis. I have prepared my paper but i have to recheck my grammertical and wording. Is there any one who has this skills:</p>\n<ul>\n<li>Image processing</li>\n<li>Image processing algorithm</li>\n<li>Fluent in english</li>\n<li>Good knowledge of english&nbsp;</li>\n</ul>","2018-07-20 01:40:29","0","5");




CREATE TABLE `reviewreply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_detail` text NOT NULL,
  `reply_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_first` varchar(255) NOT NULL,
  `user_last` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_active` int(2) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;


INSERT INTO users VALUES
("1","Mahmudul Hasan","Sumon","sumon","sumon@gmail.com","$2y$10$GBeXWj0iUYarLzXz36vjRenmILlG/YZXao1m6QETVbcRBbCIv.CiS","1","2018-07-10 22:26:12","sumon.jpg"),
("2","First","Last","firstlast","firstlast@email.com","$2y$10$yYmukCHC1mDIhdJrcuZ.yeUKu0Wl23PkD1/WeBe7520Yv024Qu17a","0","2018-07-10 22:26:12","firstlast.jpg"),
("3","Some","Name","somename","somename@gmail.com","$2y$10$6fmTBX/LgVrhGXG7KmeLwOiP11nMxjIqZTFlBwPyWzx3YRhihEcxW","0","2018-07-10 22:26:12","somename.jpg"),
("4","Md","Rezuan","rezuan","rezuan@email.com","$2y$10$chIbDvjzCVlsGnLDh4JkMO8Yo7OXzSaoid2FEJzZZe07V1m2dIvwq","0","2018-07-10 22:26:12","rezuan.jpg"),
("5","md","nam","nam","nam@email.com","$2y$10$fEBFnDxJzoZ4IMZQR81CL.oSAmopxaZ0zz5LI.LRDW5PYS.WgVu26","0","2018-07-10 22:26:12","nam.jpg"),
("6","Kuddos","Bayati","kuddosbayati","kuddus@email.com","$2y$10$RIG4HGfzPv6Xo4pZkk6Jb.voID4HlIGepGhf3YVgyd3VF4jTL83Ua","0","2018-07-10 22:26:12","kuddosbayati.jpg"),
("7","Torun","Kumar","torunkumar","torunkumar@email.com","$2y$10$vh1LYzEUAcmgiIa0Q8M4AeQih.utdVVXYYX3jvNxKVfbgb2bRMV52","0","2018-07-10 22:26:12","torunkumar.jpg"),
("8","Himel","Khan","himelkhan","himel@email.com","$2y$10$WTLC8i31N/hmtzPsNn61geSl4VRlSUxlUVgxsS1aOKkzgGrCyWkMW","1","2018-07-10 22:26:12","himelkhan.jpg"),
("9","Md","Ashik","ashik","ashik@email.com","$2y$10$wXBirF8IvSse0H97miH1J..rtNfU2Llly731UF0aChH05m6H0HcTK","0","2018-07-14 20:48:23","ashik.jpg"),
("10","Mario","Mandzukic","mario17","mario@juventus.com","$2y$10$7.LGSAhzrM3oVyBnakrK4uHyzzI7xN7V/8CLA8yiEiS.P4vV8i1t2","0","2018-07-15 11:26:48","mario17.jpg"),
("11","Rufty","Handanovic","rufty","rufty@rufty.com","$2y$10$7.LGSAhzrM3oVyBnakrK4uHyzzI7xN7V/8CLA8yiEiS.P4vV8i1t2","0","2018-07-18 01:10:11","rufty.gif"),
("12","Juan","Handanovic","handanovic","handanovic@mail.com","$2y$10$Xn/Xz5RBST22s4wfAEtTyOyeqiSsUimRYyzUAA4SBklOyML9NZnzm","0","2018-07-18 10:37:40","handanovic.jpg"),
("13","Mahmudul Hasan","Sumon","admin","admin@gmail.com","$2y$10$HNDGdTxuztE2gSWvEHTe7eokQMisPcaYixodO/J22vHSCd3a4kDlm","0","2018-07-19 01:19:52","admin.jpg");




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;