-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 08:02 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unihub`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ans_id` int(11) NOT NULL,
  `qus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ans_detail` text NOT NULL,
  `ans_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ans_id`, `qus_id`, `user_id`, `ans_detail`, `ans_time`, `image`, `likes`) VALUES
(45, 17, 1, '<pre class=\"language-c\"><code>#include&lt;stdio.h&gt;\r\n#include&lt;conio.h&gt;\r\nint a[20][20],q[20],visited[20],n,i,j,f=0,r=-1;\r\nvoid bfs(int v) {\r\n	for (i=1;i&lt;=n;i++)\r\n	  if(a[v][i] &amp;&amp; !visited[i])\r\n	   q[++r]=i;\r\n	if(f&lt;=r) {\r\n		visited[q[f]]=1;\r\n		bfs(q[f++]);\r\n	}\r\n}\r\nvoid main() {\r\n	int v;\r\n	clrscr();\r\n	printf(\"\n Enter the number of vertices:\");\r\n	scanf(\"%d\",&amp;n);\r\n	for (i=1;i&lt;=n;i++) {\r\n		q[i]=0;\r\n		visited[i]=0;\r\n	}\r\n	printf(\"\n Enter graph data in matrix form:\n\");\r\n	for (i=1;i&lt;=n;i++)\r\n	  for (j=1;j&lt;=n;j++)\r\n	   scanf(\"%d\",&amp;a[i][j]);\r\n	printf(\"\n Enter the starting vertex:\");\r\n	scanf(\"%d\",&amp;v);\r\n	bfs(v);\r\n	printf(\"\n The node which are reachable are:\n\");\r\n	for (i=1;i&lt;=n;i++)\r\n	  if(visited[i])\r\n	   printf(\"%d	\",i); else\r\n	   printf(\"\n Bfs is not possible\");\r\n	getch();\r\n}</code></pre>', '2018-07-06 12:51:04', 'sumon.jpg', 0),
(46, 18, 5, '<pre class=\"language-c\"><code>#include&lt;stdio.h&gt;\r\n#include&lt;conio.h&gt;\r\nint a[20][20],q[20],visited[20],n,i,j,f=0,r=-1;\r\nvoid bfs(int v) {\r\n	for (i=1;i&lt;=n;i++)\r\n	  if(a[v][i] &amp;&amp; !visited[i])\r\n	   q[++r]=i;\r\n	if(f&lt;=r) {\r\n		visited[q[f]]=1;\r\n		bfs(q[f++]);\r\n	}\r\n}\r\nvoid main() {\r\n	int v;\r\n	clrscr();\r\n	printf(\"\n Enter the number of vertices:\");\r\n	scanf(\"%d\",&amp;n);\r\n	for (i=1;i&lt;=n;i++) {\r\n		q[i]=0;\r\n		visited[i]=0;\r\n	}\r\n	printf(\"\n Enter graph data in matrix form:\n\");\r\n	for (i=1;i&lt;=n;i++)\r\n	  for (j=1;j&lt;=n;j++)\r\n	   scanf(\"%d\",&amp;a[i][j]);\r\n	printf(\"\n Enter the starting vertex:\");\r\n	scanf(\"%d\",&amp;v);\r\n	bfs(v);\r\n	printf(\"\n The node which are reachable are:\n\");\r\n	for (i=1;i&lt;=n;i++)\r\n	  if(visited[i])\r\n	   printf(\"%d	\",i); else\r\n	   printf(\"\n Bfs is not possible\");\r\n	getch();\r\n}</code></pre>', '2018-07-06 13:03:44', 'nam.jpg', 0),
(47, 18, 5, '<p><strong>Text format<img src=\"assets/plugins/tinymce/plugins/emoticons/img/smiley-money-mouth.gif\" alt=\"money-mouth\" /></strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><span style=\"background-color: #ff6600;\">Lorem ipsum</span></li>\r\n<li><span style=\"background-color: #ff6600;\">Image processing</span></li>\r\n</ul>', '2018-07-06 13:05:39', 'nam.jpg', 0),
(48, 19, 1, '<pre class=\"language-c\"><code>#include&lt;stdio.h&gt;\r\n#include&lt;conio.h&gt;\r\nint a[20][20],q[20],visited[20],n,i,j,f=0,r=-1;\r\nvoid bfs(int v) {\r\n	for (i=1;i&lt;=n;i++)\r\n	  if(a[v][i] &amp;&amp; !visited[i])\r\n	   q[++r]=i;\r\n	if(f&lt;=r) {\r\n		visited[q[f]]=1;\r\n		bfs(q[f++]);\r\n	}\r\n}\r\nvoid main() {\r\n	int v;\r\n	clrscr();\r\n	printf(\"\n Enter the number of vertices:\");\r\n	scanf(\"%d\",&amp;n);\r\n	for (i=1;i&lt;=n;i++) {\r\n		q[i]=0;\r\n		visited[i]=0;\r\n	}\r\n	printf(\"\n Enter graph data in matrix form:\n\");\r\n	for (i=1;i&lt;=n;i++)\r\n	  for (j=1;j&lt;=n;j++)\r\n	   scanf(\"%d\",&amp;a[i][j]);\r\n	printf(\"\n Enter the starting vertex:\");\r\n	scanf(\"%d\",&amp;v);\r\n	bfs(v);\r\n	printf(\"\n The node which are reachable are:\n\");\r\n	for (i=1;i&lt;=n;i++)\r\n	  if(visited[i])\r\n	   printf(\"%d	\",i); else\r\n	   printf(\"\n Bfs is not possible\");\r\n	getch();\r\n}</code></pre>', '2018-07-06 13:20:47', 'sumon.jpg', 0),
(49, 19, 1, '<pre class=\"language-c\"><code>#include&lt;stdio.h&gt;\r\n#include&lt;conio.h&gt;\r\nint a[20][20],q[20],visited[20],n,i,j,f=0,r=-1;\r\nvoid bfs(int v) {\r\n	for (i=1;i&lt;=n;i++)\r\n	  if(a[v][i] &amp;&amp; !visited[i])\r\n	   q[++r]=i;\r\n	if(f&lt;=r) {\r\n		visited[q[f]]=1;\r\n		bfs(q[f++]);\r\n	}\r\n}\r\nvoid main() {\r\n	int v;\r\n	clrscr();\r\n	printf(\"\n Enter the number of vertices:\");\r\n	scanf(\"%d\",&amp;n);\r\n	for (i=1;i&lt;=n;i++) {\r\n		q[i]=0;\r\n		visited[i]=0;\r\n	}\r\n	printf(\"\n Enter graph data in matrix form:\n\");\r\n	for (i=1;i&lt;=n;i++)\r\n	  for (j=1;j&lt;=n;j++)\r\n	   scanf(\"%d\",&amp;a[i][j]);\r\n	printf(\"\n Enter the starting vertex:\");\r\n	scanf(\"%d\",&amp;v);\r\n	bfs(v);\r\n	printf(\"\n The node which are reachable are:\n\");\r\n	for (i=1;i&lt;=n;i++)\r\n	  if(visited[i])\r\n	   printf(\"%d	\",i); else\r\n	   printf(\"\n Bfs is not possible\");\r\n	getch();\r\n}</code></pre>', '2018-07-06 13:21:02', 'sumon.jpg', 0),
(50, 21, 1, '<p><span style=\"color: #ff6600;\"><strong>à¦¬à§à¦¯à¦¾à¦–à§à¦¯à¦¾ -&nbsp;</strong></span></p>\r\n<p>à¦›à§Ÿà¦Ÿà¦¾ à¦†à¦²à¦¾à¦¦à¦¾ à¦­à¦¾à¦¬à§‡ eat you rice à¦•à§‡ à¦¸à¦¾à¦œà¦¾à¦¨à§‹ à¦¯à¦¾à§Ÿ</p>\r\n<ol>\r\n<li>eat you rice</li>\r\n<li>eat rice you</li>\r\n<li>you eat rice</li>\r\n<li>you rice eat</li>\r\n<li>rice you eat</li>\r\n<li>rice eat you</li>\r\n</ol>\r\n<p>à¦à¦° à¦®à¦§à§à¦¯à§‡ à¦®à¦¾à¦¤à§à¦° à¦à¦•à¦Ÿà¦¾ à¦ à¦¿à¦• - you eat rice&nbsp;</p>', '2018-07-07 05:13:22', 'sumon.jpg', 0),
(74, 21, 1, '<p>à¦Ÿà¦®à¦¿ à¦®à¦¿à§Ÿà¦¾ à¦ªà§à¦°à§‹à¦¬à¦¾à¦¬à¦¿à¦²à¦¿à¦Ÿà¦¿à¦¤à§‡ (à¦¸à¦®à§à¦­à¦¾à¦¬à§à¦¯à¦¤à¦¾) à¦¬à¦¿à¦¶à§à¦¬à¦¾à¦¸ à¦•à¦°à§‡à¥¤ à¦¤à§‹ à¦•à§‡à¦‰à¦‡ à¦–à§à¦¬ à¦…à¦¬à¦¾à¦• à¦¹à¦²à§‹ à¦¨à¦¾ à¦¯à¦–à¦¨ à¦Ÿà¦®à¦¿ à¦®à¦¿à§Ÿà¦¾ à¦¤à¦¾à¦° à¦¬à§œ à¦›à§‡à¦²à§‡à¦•à§‡ à¦‡à¦‚à¦²à¦¿à¦¶ à¦®à¦¿à¦¡à¦¿à§Ÿà¦¾à¦® à¦¸à§à¦•à§à¦²à§‡ à¦­à¦°à§à¦¤à¦¿ à¦•à¦°à¦¾à¦¨à§‹à¦° à¦œà¦¨à§à¦¯ à¦ªà§à¦°à¦¿à¦ªà¦¾à¦°à§‡à¦¶à¦¨ à¦¨à§‡à§Ÿà¦¾ à¦¶à§à¦°à§ à¦•à¦°à¦²à§‹à¥¤ à¦à¦–à¦¨ à¦¸à¦®à¦¸à§à¦¯à¦¾ à¦¹à¦šà§à¦›à§‡, à¦­à¦°à§à¦¤à¦¿ à¦ªà¦°à§€à¦•à§à¦·à¦¾à§Ÿ à¦‡à¦‚à¦°à§‡à¦œà¦¿ à¦…à¦¨à§à¦¬à¦¾à¦¦ à¦•à¦°à¦¤à§‡ à¦¹à¦¬à§‡à¥¤ à¦Ÿà¦®à¦¿ à¦®à¦¿à§Ÿà¦¾à¦° à¦›à§‡à¦²à§‡ à¦¶à¦¬à§à¦¦à¦—à§à¦²à§‹à¦° à¦‡à¦‚à¦°à§‡à¦œà¦¿ à¦…à¦¨à§à¦¬à¦¾à¦¦ à¦œà¦¾à¦¨à§‡, à¦•à¦¿à¦¨à§à¦¤à§ à¦¸à§‡ à¦¬à§à¦¯à¦¾à¦•à¦°à¦£ à¦œà¦¾à¦¨à§‡ à¦¨à¦¾à¥¤ à¦à¦–à¦¨ à¦¸à¦®à¦¸à§à¦¯à¦¾ à¦¹à¦šà§à¦›à§‡ à¦¬à§à¦¯à¦¾à¦•à¦°à¦£ à¦¨à¦¾ à¦®à¦¾à¦¨à¦²à§‡ à¦ à¦¿à¦• à¦¬à¦¾à¦•à§à¦¯ à¦—à¦ à¦¨ à¦¹à§Ÿ à¦¨à¦¾à¥¤</p>', '2018-07-07 07:03:59', 'sumon.jpg', 0),
(75, 22, 7, '<p>&nbsp;</p>\r\n<pre class=\"language-c\"><code>#include &lt;stdio.h&gt;\r\n#include &lt;stdlib.h&gt;\r\n#define SIZE 40\r\n\r\nstruct queue {\r\n    int items[SIZE];\r\n    int front;\r\n    int rear;\r\n};\r\n\r\nstruct queue* createQueue();\r\nvoid enqueue(struct queue* q, int);\r\nint dequeue(struct queue* q);\r\nvoid display(struct queue* q);\r\nint isEmpty(struct queue* q);\r\nvoid printQueue(struct queue* q);\r\n\r\nstruct node\r\n{\r\n    int vertex;\r\n    struct node* next;\r\n};\r\n\r\nstruct node* createNode(int);\r\n\r\nstruct Graph\r\n{\r\n    int numVertices;\r\n    struct node** adjLists;\r\n    int* visited;\r\n};\r\n\r\nstruct Graph* createGraph(int vertices);\r\nvoid addEdge(struct Graph* graph, int src, int dest);\r\nvoid printGraph(struct Graph* graph);\r\nvoid bfs(struct Graph* graph, int startVertex);\r\n\r\nint main()\r\n{\r\n    struct Graph* graph = createGraph(6);\r\n    addEdge(graph, 0, 1);\r\n    addEdge(graph, 0, 2);\r\n    addEdge(graph, 1, 2);\r\n    addEdge(graph, 1, 4);\r\n    addEdge(graph, 1, 3);\r\n    addEdge(graph, 2, 4);\r\n    addEdge(graph, 3, 4);\r\n \r\n    bfs(graph, 0);\r\n \r\n    return 0;\r\n}\r\n\r\nvoid bfs(struct Graph* graph, int startVertex) {\r\n\r\n    struct queue* q = createQueue();\r\n    \r\n    graph-&gt;visited[startVertex] = 1;\r\n    enqueue(q, startVertex);\r\n    \r\n    while(!isEmpty(q)){\r\n        printQueue(q);\r\n        int currentVertex = dequeue(q);\r\n        printf(\"Visited %d\n\", currentVertex);\r\n    \r\n       struct node* temp = graph-&gt;adjLists[currentVertex];\r\n    \r\n       while(temp) {\r\n            int adjVertex = temp-&gt;vertex;\r\n\r\n            if(graph-&gt;visited[adjVertex] == 0){\r\n                graph-&gt;visited[adjVertex] = 1;\r\n                enqueue(q, adjVertex);\r\n            }\r\n            temp = temp-&gt;next;\r\n       }\r\n    }\r\n}\r\n\r\n \r\nstruct node* createNode(int v)\r\n{\r\n    struct node* newNode = malloc(sizeof(struct node));\r\n    newNode-&gt;vertex = v;\r\n    newNode-&gt;next = NULL;\r\n    return newNode;\r\n}\r\n \r\n\r\nstruct Graph* createGraph(int vertices)\r\n{\r\n    struct Graph* graph = malloc(sizeof(struct Graph));\r\n    graph-&gt;numVertices = vertices;\r\n \r\n    graph-&gt;adjLists = malloc(vertices * sizeof(struct node*));\r\n    graph-&gt;visited = malloc(vertices * sizeof(int));\r\n    \r\n \r\n    int i;\r\n    for (i = 0; i &lt; vertices; i++) {\r\n        graph-&gt;adjLists[i] = NULL;\r\n        graph-&gt;visited[i] = 0;\r\n    }\r\n \r\n    return graph;\r\n}\r\n \r\nvoid addEdge(struct Graph* graph, int src, int dest)\r\n{\r\n    // Add edge from src to dest\r\n    struct node* newNode = createNode(dest);\r\n    newNode-&gt;next = graph-&gt;adjLists[src];\r\n    graph-&gt;adjLists[src] = newNode;\r\n \r\n    // Add edge from dest to src\r\n    newNode = createNode(src);\r\n    newNode-&gt;next = graph-&gt;adjLists[dest];\r\n    graph-&gt;adjLists[dest] = newNode;\r\n}\r\n\r\nstruct queue* createQueue() {\r\n    struct queue* q = malloc(sizeof(struct queue));\r\n    q-&gt;front = -1;\r\n    q-&gt;rear = -1;\r\n    return q;\r\n}\r\n\r\n\r\nint isEmpty(struct queue* q) {\r\n    if(q-&gt;rear == -1) \r\n        return 1;\r\n    else \r\n        return 0;\r\n}\r\n\r\nvoid enqueue(struct queue* q, int value){\r\n    if(q-&gt;rear == SIZE-1)\r\n        printf(\"\nQueue is Full!!\");\r\n    else {\r\n        if(q-&gt;front == -1)\r\n            q-&gt;front = 0;\r\n        q-&gt;rear++;\r\n        q-&gt;items[q-&gt;rear] = value;\r\n    }\r\n}\r\n\r\nint dequeue(struct queue* q){\r\n    int item;\r\n    if(isEmpty(q)){\r\n        printf(\"Queue is empty\");\r\n        item = -1;\r\n    }\r\n    else{\r\n        item = q-&gt;items[q-&gt;front];\r\n        q-&gt;front++;\r\n        if(q-&gt;front &gt; q-&gt;rear){\r\n            printf(\"Resetting queue\");\r\n            q-&gt;front = q-&gt;rear = -1;\r\n        }\r\n    }\r\n    return item;\r\n}\r\n\r\nvoid printQueue(struct queue *q) {\r\n    int i = q-&gt;front;\r\n\r\n    if(isEmpty(q)) {\r\n        printf(\"Queue is empty\");\r\n    } else {\r\n        printf(\"\nQueue contains \n\");\r\n        for(i = q-&gt;front; i &lt; q-&gt;rear + 1; i++) {\r\n                printf(\"%d \", q-&gt;items[i]);\r\n        }\r\n    }    \r\n}</code></pre>', '2018-07-07 16:31:01', 'torunkumar.jpg', 0),
(76, 22, 7, '<p>&nbsp;<strong>Networking, also known as computer networking</strong>,</p>\r\n<p><span style=\"color: #ff6600;\">is the practice of transporting and exchanging data between nodes over a shared medium</span> <span style=\"background-color: #339966;\">in an information system. Networking comprises not only the design, construction and use of a network, but also the management, maintenance and operation of the network infrastructure, software and policies</span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><span style=\"background-color: #ffffff;\">List list&nbsp;</span></li>\r\n<li><span style=\"background-color: #ffffff;\">list</span></li>\r\n</ol>', '2018-07-07 16:32:24', 'torunkumar.jpg', 0),
(77, 22, 1, '<p>Reply</p>', '2018-07-08 12:22:33', 'sumon.jpg', 0),
(78, 18, 1, '<p>reply</p>', '2018-07-08 12:23:00', 'sumon.jpg', 0),
(79, 23, 8, '<p><strong>Heading 2</strong></p>\r\n<ul>\r\n<li><strong>List</strong></li>\r\n<li><strong>list</strong></li>\r\n</ul>\r\n<pre class=\"language-c\"><code>#include&lt;stdio.h&gt;\r\n\r\nint main(){\r\n\r\nreturn 0\r\n}</code></pre>', '2018-07-09 06:21:01', 'himelkhan.jpg', 0),
(80, 24, 1, '<p><img src=\"assets/plugins/tinymce/plugins/emoticons/img/smiley-cool.gif\" alt=\"cool\" /></p>', '2018-07-11 16:26:44', 'sumon.jpg', 0),
(81, 19, 1, '<p>Some text goes here</p>', '2018-07-12 07:07:30', 'sumon.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Programming'),
(2, 'Networking'),
(3, 'Discrete Mathematics'),
(4, 'Database'),
(5, 'Operating System'),
(6, 'Matlab'),
(7, 'Computer Graphics'),
(8, 'Image Processing');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qus_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answered` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qus_id`, `cat_id`, `user_id`, `question`, `post_time`, `answered`, `view`, `vote`) VALUES
(1, 2, 1, 'Creating question here', '2018-07-05 08:07:16', 0, 5, 0),
(2, 6, 3, 'Some question goes here..', '2018-07-05 08:11:29', 0, 1, 0),
(3, 3, 1, 'Creating a question', '2018-07-05 08:20:47', 0, 0, 0),
(4, 6, 2, 'Creating a question ,,,,,,,,,,,,,,,,,,,,,,', '2018-07-05 08:21:10', 0, 0, 0),
(5, 4, 1, 'Some database question ', '2018-07-05 08:22:02', 0, 0, 0),
(6, 5, 1, 'Creating a question. Some ', '2018-07-05 09:23:38', 0, 0, 0),
(7, 3, 4, 'Some question description\r\n', '2018-07-05 15:43:31', 0, 0, 0),
(8, 4, 4, 'Creating a question in database', '2018-07-05 16:12:10', 0, 0, 0),
(9, 4, 2, 'Creating a question here', '2018-07-05 16:39:41', 0, 0, 0),
(10, 8, 2, 'Some image processing question', '2018-07-05 16:45:18', 0, 0, 0),
(11, 5, 2, 'Creating a question here .....', '2018-07-05 17:48:37', 0, 0, 0),
(12, 5, 1, 'I am creating a question', '2018-07-05 18:18:04', 0, 0, 0),
(13, 1, 2, 'Creating a question......................', '2018-07-05 19:20:01', 0, 0, 0),
(14, 2, 2, 'à¦¬à¦¾à¦‚à¦²à¦¾à§Ÿ à¦ªà§à¦°à¦¶à§à¦¨ à¦•à¦°à¦¾ à¦¯à¦¾à¦¬à§‡', '2018-07-05 19:20:57', 0, 1, 0),
(15, 7, 1, 'Some question from computer graphics\r\n\r\n\r\n\r\nWhat are the', '2018-07-06 05:48:06', 0, 0, 0),
(16, 4, 1, 'Lets create a question', '2018-07-06 10:04:14', 0, 1, 0),
(17, 1, 1, 'Creating a awesome question here', '2018-07-06 12:17:24', 0, 0, 0),
(18, 4, 5, 'Himel creating a quesion', '2018-07-06 13:03:19', 3, 3, 0),
(19, 2, 1, 'question qusetion question qusetion question qusetion question qusetion question qusetion question qusetion question qusetion ', '2018-07-06 13:17:08', 3, 3, 0),
(20, 1, 6, 'à¦Ÿà¦®à¦¿ à¦®à¦¿à§Ÿà¦¾ à¦ªà§à¦°à§‹à¦¬à¦¾à¦¬à¦¿à¦²à¦¿à¦Ÿà¦¿à¦¤à§‡ (à¦¸à¦®à§à¦­à¦¾à¦¬à§à¦¯à¦¤à¦¾) à¦¬à¦¿à¦¶à§à¦¬à¦¾à¦¸ à¦•à¦°à§‡à¥¤ \r\n\r\nà¦¤à§‹ à¦•à§‡à¦‰à¦‡ à¦–à§à¦¬ à¦…à¦¬à¦¾à¦• à¦¹à¦²à§‹ à¦¨à¦¾ à¦¯à¦–à¦¨ à¦Ÿà¦®à¦¿ à¦®à¦¿à§Ÿà¦¾ à¦¤à¦¾à¦° à¦¬à§œ à¦›à§‡à', '2018-07-07 05:04:37', 0, 3, 0),
(21, 1, 6, 'à¦Ÿà¦®à¦¿ à¦®à¦¿à§Ÿà¦¾ à¦ªà§à¦°à§‹à¦¬à¦¾à¦¬à¦¿à¦²à¦¿à¦Ÿà¦¿à¦¤à§‡ (à¦¸à¦®à§à¦­à¦¾à¦¬à§à¦¯à¦¤à¦¾) à¦¬à¦¿à¦¶à§à¦¬à¦¾à¦¸ à¦•à¦°à§‡à¥¤ \r\n\r\nà¦¤à§‹ à¦•à§‡à¦‰à¦‡ à¦–à§à¦¬ à¦…à¦¬à¦¾à¦• à¦¹à¦²à§‹ à¦¨à¦¾ à¦¯à¦–à¦¨ à¦Ÿà¦®à¦¿ à¦®à¦¿à§Ÿà¦¾ à¦¤à¦¾à¦° à¦¬à§œ à¦›à§‡à¦²à§‡à¦•à§‡ à¦‡à¦‚à¦²à¦¿à¦¶ à¦®à¦¿à¦¡à¦¿à§Ÿà¦¾à¦® à¦¸à§à¦•à§à¦²à§‡ à¦­à¦°à§à¦¤à¦¿ à¦•à¦°à¦¾à¦¨à§‹à¦° à¦œà¦¨à§à¦¯ à¦ªà§à¦°à¦¿à¦ªà¦¾à¦°à§‡à¦¶à¦¨ à¦¨à§‡à§Ÿà¦¾ à¦¶à§à¦°à§ à¦•à¦°à¦²à§‹à¥¤ à¦à¦–à¦¨ à¦¸à¦®à¦¸à§à¦¯à¦¾ à¦¹à¦šà§à¦›à§‡, à¦­à¦°à§à¦¤à¦¿ à¦ªà¦°à§€à¦•à§à¦·à¦¾à§Ÿ à¦‡à¦‚à¦°à§‡à¦œà¦¿ à¦…à¦¨à§à¦¬à¦¾à¦¦ à¦•à¦°à¦¤à§‡ à¦¹à¦¬à§‡à¥¤ à¦Ÿà¦®à¦¿ à¦®à¦¿à§Ÿà¦¾à¦° à¦›à§‡à¦²à§‡ à¦¶à¦¬à§à¦¦à¦—à§à¦²à§‹à¦° à¦‡à¦‚à¦°à§‡à¦œà¦¿ à¦…à¦¨à§à¦¬à¦¾à¦¦ à¦œà¦¾à¦¨à§‡, à¦•à¦¿à¦¨à§à¦¤à§ à¦¸à§‡ à¦¬à§à¦¯à¦¾à¦•à¦°à¦£ à¦œà¦¾à¦¨à§‡ à¦¨à¦¾à¥¤ à¦à¦–à¦¨ à¦¸à¦®à¦¸à§à¦¯à¦¾ à¦¹à¦šà§à¦›à§‡ à¦¬à§à¦¯à¦¾à¦•à¦°à¦£ à¦¨à¦¾ à¦®à¦¾à¦¨à¦²à§‡ à¦ à¦¿à¦• à¦¬à¦¾à¦•à§à¦¯ à¦—à¦ à¦¨ à¦¹à§Ÿ à¦¨à¦¾à¥¤ à¦¯à§‡à¦®à¦¨ à¦§à¦°à§‹, \'à¦¤à§à¦®à¦¿ à¦­à¦¾à¦¤ à¦–à¦¾à¦“\' à¦à¦Ÿà¦¾ à¦¤à§à¦®à¦¿ à¦¯à¦¦à¦¿ à¦‡à¦‚à¦°à§‡à¦œà¦¿à¦¤à§‡ à¦…à¦¨à§à¦¬à¦¾à¦¦ à¦•à¦°à§‡ à¦²à¦¿à¦–à§‹, \'rice eat you\' à¦¤à¦¾à¦¹à¦²à§‡ à¦•à§‡à¦‰ à¦­à¦¾à¦¬à¦¬à§‡ à¦¨à¦¾ à¦¤à§à¦®à¦¿ à¦•à¦¬à¦¿à¥¤ à¦¸à¦¬à¦¾à¦‡ à¦­à¦¾à¦¬à¦¬à§‡ à¦¤à§à¦®à¦¿ à¦¬à§à¦¯à¦¾à¦•à¦°à¦£ à¦œà¦¾à¦¨à§‹ à¦¨à¦¾, à¦•à¦¿à¦‚à¦¬à¦¾ à¦­à¦¾à¦¬à¦¬à§‡ à¦¤à§à¦®à¦¿ à¦šà¦¾à¦šà§à¦›à§‹ à¦­à¦¾à¦¤ à¦¤à§‹à¦®à¦¾à¦•à§‡ à¦–à§‡à§Ÿà§‡ à¦«à§‡à¦²à§à¦•! \r\n\r\nà¦Ÿà¦®à¦¿ à¦®à¦¿à§Ÿà¦¾ à¦ªà§à¦°à§‹à¦¬à¦¾à¦¬à¦¿à¦²à¦¿à¦Ÿà¦¿à¦¤à§‡ à¦¬à¦¿à¦¶à§à¦¬à¦¾à¦¸ à¦•à¦°à§‡à¥¤ à¦¤à§‹ à¦ªà§à¦°à¦¤à¦¿à¦Ÿà¦¾ à¦¬à¦¾à¦•à§à¦¯à§‡à¦° à¦œà¦¨à§à¦¯ à¦Ÿà¦®à¦¿ à¦®à¦¿à§Ÿà¦¾ à¦œà¦¾à¦¨à¦¤à§‡ à¦šà¦¾à§Ÿ à¦¤à¦¾à¦° à¦¬à§œ à¦›à§‡à¦²à§‡à¦° à¦¸à¦ à¦¿à¦• à¦¹à¦¬à¦¾à¦° à¦ªà§à¦°à§‹à¦¬à¦¾à¦¬à¦¿à¦²à¦¿à¦Ÿà¦¿ à¦•à¦¤à§‹à¥¤ ', '2018-07-07 05:06:37', 3, 19, 0),
(22, 2, 7, 'Networking, also known as computer networking, is the practice of transporting and exchanging data between nodes over a shared medium in an information system. Networking comprises not only the design, construction and use of a network, but also the management, maintenance and operation of the network infrastructure, software and policies.', '2018-07-07 16:28:41', 3, 19, 0),
(23, 3, 8, 'What is the difference between ac motor and dc motor?', '2018-07-09 06:19:59', 1, 14, 0),
(24, 3, 1, 'create question', '2018-07-10 18:41:56', 1, 6, 0),
(25, 4, 1, 'Afsana Islam Dina creating a question to know how does the create question works.', '2018-07-12 07:42:27', 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(255) NOT NULL,
  `user_last` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_active` int(2) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_name`, `user_email`, `user_pwd`, `user_active`, `user_created`, `image`) VALUES
(1, 'Mahmudul Hasan', 'Sumon', 'sumon', 'asas@gmail.com', '$2y$10$bHP7DZ7t8uBEXLOZhkLkyOBmc1hToF7hDAvKb5u9CZqJCR01ktwN2', 0, '2018-07-10 16:26:12', 'sumon.jpg'),
(2, 'First', 'Last', 'firstlast', 'firstlast@email.com', '$2y$10$yYmukCHC1mDIhdJrcuZ.yeUKu0Wl23PkD1/WeBe7520Yv024Qu17a', 0, '2018-07-10 16:26:12', 'firstlast.jpg'),
(3, 'Some', 'Name', 'somename', 'somename@gmail.com', '$2y$10$6fmTBX/LgVrhGXG7KmeLwOiP11nMxjIqZTFlBwPyWzx3YRhihEcxW', 0, '2018-07-10 16:26:12', 'somename.jpg'),
(4, 'Md', 'Rezuan', 'rezuan', 'rezuan@email.com', '$2y$10$chIbDvjzCVlsGnLDh4JkMO8Yo7OXzSaoid2FEJzZZe07V1m2dIvwq', 0, '2018-07-10 16:26:12', 'rezuan.jpg'),
(5, 'md', 'nam', 'nam', 'nam@email.com', '$2y$10$fEBFnDxJzoZ4IMZQR81CL.oSAmopxaZ0zz5LI.LRDW5PYS.WgVu26', 0, '2018-07-10 16:26:12', 'nam.jpg'),
(6, 'Kuddos', 'Bayati', 'kuddosbayati', 'kuddus@email.com', '$2y$10$RIG4HGfzPv6Xo4pZkk6Jb.voID4HlIGepGhf3YVgyd3VF4jTL83Ua', 0, '2018-07-10 16:26:12', 'kuddosbayati.jpg'),
(7, 'Torun', 'Kumar', 'torunkumar', 'torunkumar@email.com', '$2y$10$vh1LYzEUAcmgiIa0Q8M4AeQih.utdVVXYYX3jvNxKVfbgb2bRMV52', 0, '2018-07-10 16:26:12', 'torunkumar.jpg'),
(8, 'Himel', 'Khan', 'himelkhan', 'himel@email.com', '$2y$10$WTLC8i31N/hmtzPsNn61geSl4VRlSUxlUVgxsS1aOKkzgGrCyWkMW', 0, '2018-07-10 16:26:12', 'himelkhan.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qus_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
