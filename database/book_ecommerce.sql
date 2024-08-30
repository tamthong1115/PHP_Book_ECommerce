-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Aug 26, 2024 at 03:23 PM
-- Server version: 10.4.32-MariaDB-1:10.4.32+maria~ubu2004
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_line_1` varchar(255) DEFAULT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `ward` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `guest_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address_line_1`, `address_line_2`, `ward`, `province`, `district`, `created_at`, `deleted_at`, `guest_order_id`) VALUES
(2, 2, 'test1', 'test2', 'Xã Đà Vị', 'Tỉnh Tuyên Quang', 'Huyện Na Hang', '2024-08-25 18:21:02', NULL, NULL),
(3, NULL, 'QWASEQW', 'QWEQWE', 'Xã Quang Trung', 'Tỉnh Hải Dương', 'Huyện Tứ Kỳ', '2024-08-25 21:14:26', NULL, 1),
(4, NULL, 'qsdqwdqw', 'qweqwe', 'Xã Đại Tự', 'Tỉnh Vĩnh Phúc', 'Huyện Yên Lạc', '2024-08-25 21:16:27', NULL, 2),
(5, NULL, 'qsdqwdqw', 'qweqwe', 'Xã Đại Tự', 'Tỉnh Vĩnh Phúc', 'Huyện Yên Lạc', '2024-08-25 21:17:22', NULL, 3),
(6, NULL, 'qwedqwd', 'dqwdqw', 'Xã Tân Lập', 'Tỉnh Phú Thọ', 'Huyện Thanh Sơn', '2024-08-25 21:18:52', NULL, 4),
(7, NULL, '', '', '', '', '', '2024-08-26 09:27:06', NULL, 5),
(8, NULL, 'test', '', 'Xã Thài Phìn Tủng', 'Tỉnh Hà Giang', 'Huyện Đồng Văn', '2024-08-26 15:11:20', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `language` varchar(50) NOT NULL,
  `publication_year` int(11) NOT NULL,
  `format` varchar(50) NOT NULL,
  `pages` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `description`, `summary`, `price`, `stock`, `author`, `publisher`, `supplier`, `weight`, `language`, `publication_year`, `format`, `pages`, `created_at`, `deleted_at`) VALUES
(4, 'Minh Ám', 'Minh Ám là tác phẩm cuối cùng của Natsume Soseki, và vẫn còn dang dở khi nhà văn này đã qua đời sau vì bệnh dạ dày. Cái kết của Minh Ám đến nay vẫn là một bí ẩn, là một tác phẩm đã khiến không ít nhà văn, nhà nghiên cứu tốn biết bao giấy mực. Nhưng kể cả khi vẫn còn dang dở, thì Minh Ám vẫn là một kiệt tác vô cùng xuất sắc, một khám phá sâu sắc về tâm hồn con người, về tình yêu, về hôn nhân, và về những xung đột xã hội.', 'Minh Ám là tác phẩm cuối cùng của Natsume Soseki', 290000, 1000, 'Natsume Soseki', 'Hội Nhà Văn', 'Nhã Nam', 800.00, 'Việt Nam', 2024, 'Bìa cứng', 658, '2024-08-17 10:20:53', '0000-00-00 00:00:00'),
(6, 'Kafka Bên Bờ Biển', 'Kafka Tamura luôn có một bản ngã là Quạ theo bên cạnh. Cậu bé mười lăm tuổi này sống với cha sau khi mẹ và chị gái bỏ đi. Cậu luôn bị một lời nguyền của cha ám ảnh: mày sẽ ngủ với mẹ và chị gái mày sau khi giết cha. Kinh sợ, Kafka bỏ nhà ra đi. Cậu chìm đắm trong một thư viện sách khổng lồ ở Takamatsu. Rồi những chuyện bí ẩn xảy ra, cậu gặp cô gái Sakura và bà Miss Saeki, những người mà cậu luôn băn khoăn không biết có phải là chị và mẹ mình. Bố Kafka bị giết, và cậu nghĩ, không biết có phải lời nguyền đã ứng?\r\n\r\nTrong khi đó, ở bên kia bờ biển, ông già Nakata cũng có một cuộc hành trình đến Takamatsu. Bị một tai nạn từ nhỏ, Nakata mất trí nhớ và khả năng đọc, viết; tuy nhiên bù lại ông có thể giao tiếp với loài mèo. Vì thế ông nhận sứ mệnh đi tìm con quỷ giết mèo hàng loạt, tìm một phiến đá bí ẩn…\r\n\r\n Kỳ lạ, bí ẩn, pha trộn với hiện đại, Kafka bên bờ biển khiến cho mọi con đường văn học, mọi cách tiếp cận văn học đều bàng hoàng, choáng ngợp.\r\n\r\nNhận định\r\n\r\n“Tác giả Nhật được yêu thích nhất tại Mỹ này có thể xuất bản ẩn danh tác phẩm này mà những fan của ông vẫn sẽ nhận ra tức khắc. Còn với những người đọc lần đầu, Kafka bên bờ biển sẽ là lời giải thích xuất sắc cho tiếng tăm xứng đáng của ông cả ở phương Tây lẫn ở quê nhà. Ông viết ra loại văn hậu hiện đại, triết lý, hoang đường mà đọc thì thật lý thú; ông trầm trọng hơn Tom Robbins, nhẹ nhõm hơn Thomas Pynchon.” - Steven Moore, The Washington Post\r\n\r\n“Văn Murakami chẳng mấy khi ở dưới mức mê đắm cả, và tôi đã ngấu nghiến Kafka bên bờ biển một lèo không nghỉ… Với những ai yêu một tự sự lớn, cuốn tiểu thuyết này thực sự huy hoàng.” - David Mitchell, tác giả Cloud Atlas\r\n\r\n“Cuốn sách là một hỗn hợp chừng mực giữa giật gân, kỳ ảo và văn chương, và nó thuyết phục một cách đặc biệt. Lại một lần nữa ông đã tạo ra một câu chuyện khiến bạn lật qua nhanh chóng đến lạ, để rồi ghi nhớ và băn khoăn về nó lâu dài.” - Hugo Barnacle, Sunday Times\r\n\r\n“Kafka bên bờ biển lạ lùng đến nỗi ngay cả những thứ cũ rích trong đó cũng khoác một vẻ huyền bí. Tựa như một băng nhạc anh nghe rõ cả tiếng cọt kẹt ghế của nhạc công: nếu nhạc đã hay thì cả tiếng ghế cũng là một phần của nó.” - Paul Lafarge, The Village Voice\r\n\r\n“Chưa bao giờ tôi gặp một cuốn sách thuyết phục được mình đến thế bởi sự sáng tạo trong trần thuật và sự yêu thích kể chuyện… hấp dẫn vô cùng.” - Stuart Jeffries, Guardian\r\n\r\n“thực sự choáng ngợp.”   - The Book Magazine\r\n\r\n“Cuốn tiểu thuyết khác thường và mê hoặc nhất cho tới nay của thần tượng văn chương Nhật Haruki Murakami.” - Vintage\r\n\r\n“Kafka bên bờ biển là một cuốn sách hay khỏi phải bàn cãi. [...] Murakami đã gây hồi hộp một cách tài tình để cuốn người đọc không cưỡng được vào mạch truyện kỳ ảo và quấn quýt.” Ludovic Hunter-Tilney, Financial Times\r\n\r\n“Kafka bên bờ biển có thừa huyền bí để làm những người hâm mộ sung sướng, và sẽ chiêu mộ thêm cả những người mới.” - Matt Thorne, The Independent.\r\n\r\n“Cấu tứ xuất sắc, bối cảnh siêu thực táo bạo, sexy, và cuốn đi trong một cốt truyện nhanh mạnh và luôn ngộ nghĩnh, tác phẩm mới của Murakami đào xới tầng tầng lớp lớp những cơ chế bên trong của bản thể chúng ta với tính sôi nổi đặc trưng của ông.” - James Urquhart, Independent on Sunday\r\n\r\n“Trí tưởng tượng mãnh liệt của tác giả cũng như xác tín về sức mạnh cổ xưa của câu chuyện ông đang kể lớn lao đến nỗi đã biến cả cái mớ lộn xộn này thành chân thực.” - Laura Miller, The New York Times Book Review\r\n\r\n“Một cuốn sách để-ngấu-nghiến thật sự, cũng thật là một ám ảnh siêu hình dai dẳng [...] Đằng sau những cuộc phiêu lưu điên rồ và bất ổn một cách biểu tượng của nhân vật chính, còn có một lực đẩy trong tiềm thức gần ngang bằng với lực đẩy của sex và tuổi trưởng thành: lực đẩy về phía hư vô, về khoảng trống, về sự rỗng không đầy hoan lạc. Murakami là họa sĩ nhẹ nhàng của những khoảng-chân-không.” - John Updike, The New Yorker\r\n\r\n“Kafka bên bờ biển cũng bõ công chịu đựng: nó có thể là tiểu thuyết kỳ quái nhất của tác giả Nhật này cho đến nay, nhưng cũng là một trong những cuốn hay nhất của ông. Murakami đã nhặt từ mỗi nơi một chút: cả Sophocles, phim kinh dị, truyện tranh Nhật Bản lẫn những mảnh phim-hay-trong-tuần ủy mị.” - Malcolm Jones, Newsweek\r\n\r\n“Ám chỉ về tác giả Hóa thân có làm tăng thêm tính hoang đường của thế giới Murakami, nhưng với tất cả những kết cấu luân chuyển, mèo nói chuyện và bản thảo bốc cháy, và thế giới kỳ ảo mê hoặc đó, cuốn sách gần với Nghệ nhân và Margarita của Mikhail Bulgakov hơn bất kỳ tác phẩm nào của Kafka.” - Steven G. Kellman, Review of Contemporary Fiction\r\n\r\n“Nói chung tôi không thuộc đội ngũ hâm mộ những cuốn sách có mèo nói chuyện và xuất hồn trong mơ, nhưng sự nghiêm cẩn thấy rõ của Murakami, cũng như Lewis Carroll, đã tạo ra một thứ không những nghiêm túc mà còn luôn luôn thú vị; những sự kiện quái đản trong cuốn sách được dựa vững chắc trên một kỹ thuật viết rất cổ điển, rất Dicken.” - Philip Hensher, The Spectator\r\n\r\n“Những biến hóa của Murakami quanh chủ đề [hai nửa linh hồn] cùng huyền thoại về Oedipus độc đáo một cách táo bạo và hay một cách thuyết phục. Xin nồng nhiệt giới thiệu Kafka bên bờ biển; nhớ đọc cho con mèo nhà bạn nghe.” - Steven Moore, The Washington Post', 'Kafka bên bờ biển có hai câu chuyện song song. Một kể về cậu bé Kafka Tamura, một kể về lão già Nakata.\r\n\r\n', 158000, 2000, 'Haruki Murakami', 'NXB Văn Học', 'Nhã Nam', 550.00, 'Việt Nam', 2020, 'Bìa mềm', 539, '2024-08-19 08:47:37', '0000-00-00 00:00:00'),
(7, 'Những Đêm Không Ngủ Những Ngày Chậm Trôi', 'Cuốn sách là tập hợp những câu chuyện có thật của những số phận khác nhau đang gặp phải các vấn đề về tâm lý: trầm cảm, rối loạn lo âu, rối loạn lưỡng cực… và những người đang học tập và làm việc trong ngành tâm lý học. \r\n\r\n“Nếu thế giới này còn thứ gì giữ bạn lại, là tình yêu thương hay sự quan tâm trong phút giây nào đó, mong bạn đừng gạt nó đi, bạn đừng bỏ qua sự cố gắng của bản thân dù nhỏ bé nhất!”- Khải Trạch. Hóa ra tận cùng nỗi đau và tận cùng sự chống chọi là một lòng tha thiết sống, lòng tha thiết bám rễ ở cuộc đời này như thế.\r\n\r\n“Những đêm không ngủ, những ngày chậm trôi”  là một khoảng lặng giữa những nốt nhạc vội vã chạy nhảy giữa cuộc sống hiện đại, để những con người dù mang trong mình những tổn thương tâm lý hay không đều cùng ngồi lại bên nhau, soi tỏ tâm hồn nhau bằng ánh sáng của sự thấu cảm, trao gửi cho nhau thương yêu và kết nối để chữa lành.\r\n\r\nThông qua cuốn sách, A Crazy Mind mong muốn đưa một góc nhìn mới đến độc giả về thế giới của những con người đang phải đấu tranh với những nỗi đau tinh thần cũng như những câu chuyện thực tế ít được đề cập của những người đang học tập và làm việc trong ngành tâm lý học.\r\n\r\nĐây không phải cuốn sách đọc để giải trí, mà là một bức tranh “cảm xúc” được ghép từ những câu chuyện đủ đầy các mảng sáng tối lẩn khuất thẳm sâu trong tâm hồn. Hy vọng đây là một món ăn tinh thần làm đầy thêm sự phong phú trong tâm hồn bạn.', '“Những đêm không ngủ, những ngày chậm trôi” đại diện cho một hành tinh mới - nơi nỗi đau tinh thần được đưa ra ánh sáng và chữa lành.', 86000, 400, 'A Crazy Mind', 'NXB Văn Học', 'AZ Việt Nam', 200.00, 'Việt Nam', 2021, 'Bìa mềm', 192, '2024-08-19 08:51:34', '0000-00-00 00:00:00'),
(8, 'Sưởi Ấm Mặt Trời', 'Sưởi Ấm Mặt Trời\r\n\r\nZezé, cậu bé tinh nghịch siêu hạng đồng thời cũng đáng yêu bậc nhất ngày ngào giờ đã thoát khỏi cuộc sống nghèo khó, cũng không còn phải chịu cảnh bị đánh đập thường xuyên như trong quá khứ. Cậu đã chuyển đến Natal sống cùng gia đình cha đỡ đầu, được học ở một ngôi trường tốt, dần dần tiến bộ cả về mặt trí tuệ lẫn thể chất. Nhưng nỗi đau mất mát vẫn đè nặng lên trái tim cậu và Zezé vẫn là một cậu nhóc “ hầu như lúc nào cũng buồn”, thậm chí “có lẽ là một trong những cậu nhóc buồn nhất quả đất”.\r\n\r\nNhưng, may thay, Zezé đã tìm được những người bạn mới – cả ở đời thực lẫn trong tưởng tượng – luôn thấu hiểu và sát cánh bên cậu, cùng cậu đi qua hết thày những niềm vui cùng nỗi buồn, những khổ sở, thất vọng, những phiêu lưu mạo hiểm, giúp cậu đối thoại với cuộc sống muôn màu muôn vẻ, với nội tâm đầy mâu thuẫn và đồng thời với cả nỗi buồn thương sâu thẳm trong tâm hồn.\r\n\r\nSâu lắng, day dứt và có những khi buồn đến thắt lòng, nhưng đồng thời, Sưởi ấm mặt trời cũng tràn ngập hơi thở trẻ trung, trong sáng, tràn đầy sức sống và tình yêu thương.', 'Zezé, cậu bé tinh nghịch siêu hạng đồng thời cũng đáng yêu bậc nhất ngày ngào giờ đã thoát khỏi cuộc sống nghèo khó, cũng không còn phải chịu cảnh bị đánh đập thường xuyên như trong quá khứ.', 160000, 5000, 'Joses Mauro De Vasconcelos', 'Hội Nhà Văn', 'Nhã Nam', 400.00, 'Việt Nam', 2024, 'Bìa mềm', 376, '2024-08-19 08:53:37', '0000-00-00 00:00:00'),
(9, 'Nhà giả kim', 'Tiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n\r\n“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”\r\n\r\n- Trích Nhà giả kim\r\n\r\nNhận định\r\n\r\n“Sau Garcia Márquez, đây là nhà văn Mỹ Latinh được đọc nhiều nhất thế giới.” - The Economist, London, Anh\r\n\r\n \r\n\r\n“Santiago có khả năng cảm nhận bằng trái tim như Hoàng tử bé của Saint-Exupéry.” - Frankfurter Allgemeine Zeitung, Đức', 'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người. ', 79000, 227, 'Paulo Coelho', 'NXB Hội Nhà Văn', 'Nhã Nam', 220.00, 'Việt Nam', 2020, 'Bìa mềm', 227, '2024-08-19 08:56:10', '0000-00-00 00:00:00'),
(10, 'Đất Rừng Phương Nam', 'Cuộc đời lưu lạc của chú bé An qua những miền đất rừng phương Nam thời kì đầu cuộc kháng chiến chống Pháp. Một vùng đất trù phú, đa dạng, kì vĩ với những kênh rạch, tôm cá, chim chóc, muông thú, lúa gạo... và cây cối, rừng già. Trong thế giới đó có những con người vô cùng nhân hậu như cha mẹ nuôi của bé An, như cậu bé Cò, chú Võ Tòng... cùng những người anh em giàu lòng yêu quê hương, đất nước. Cuộc sống tự do và cuộc đời phóng khoáng cởi mở đã để lại ấn tượng sâu sắc trong tâm khảm người đọc nhiều thế hệ suốt những năm tháng qua', 'Cuộc đời lưu lạc của chú bé An qua những miền đất rừng phương Nam thời kì đầu cuộc kháng chiến chống Pháp.', 81000, 10000, 'Đoàn Giỏi', 'NXB Kim Đồng', 'NXB Kim Đồng', 320.00, 'Việt Nam', 2020, 'Bìa mềm', 304, '2024-08-19 08:57:42', '0000-00-00 00:00:00'),
(11, 'Nghèo Là Vốn Liếng', 'Nghèo Là Vốn Liếng là cuốn sách dành cho tất cả những ai đang trên hành trình theo đuổi ước mơ. Và tìm kiếm ý nghĩa cuộc sống. Điều này, sẽ mang đến cho bạn nguồn động lực to lớn để vượt qua mọi rào cản và biến nghịch cảnh thành cơ hội.\r\n\r\nNhững ai đang hoài nghi về bản thân cuốn sách sẽ giúp bạn tin tưởng vào khả năng của bản thân và khơi dậy niềm tin. Mang đến cho bạn những giá trị nhân văn sâu sắc. Giúp bạn định hướng tương lai và sống một cuộc đời ý nghĩa. Hành trình của Bác sĩ Tú Dung sẽ là nguồn cảm hứng cho bạn trên con đường chinh phục ước mơ.\r\n\r\nĐây cũng là cuốn sách phù hợp với các học sinh, sinh viên. Giúp các bạn trẻ rèn luyện ý chí, nghị lực, nuôi dưỡng và định hướng đúng ước mơ cho tương lai. Ngoài ra, cuốn sách này cũng sẽ giúp các bậc phụ huynh giáo dục con cái về giá trị của cuộc sống. Và tầm quan trọng của sự nỗ lực. Và nghèo không phải là rào cản, mà là động lực. Hãy đam mê, kiên trì và tử tế.\r\n\r\nHành trình chạm tay vào ước mơ từ nghèo khó đến thành đạt\r\n\r\nTừ những trải nghiệm của bản thân, tác giả chia sẻ những bài học quý giá về cuộc sống. Về ý chí nghị lực, về lòng nhân ái và về tầm quan trọng của sự nỗ lực không ngừng nghỉ thông qua cuốn sách “Nghèo là vốn liếng”. Cuốn sách gồm 7 chương, mỗi chương là hành trình vượt khó đầy ngoạn mục của tác giả. “Nghèo là vốn liếng” là một cuốn sách truyền cảm hứng mạnh mẽ. Hãy biến những khó khăn thành cơ hội để học hỏi và trưởng thành.\r\n\r\nChương 1: Học trò nghèo Xứ Quảng và giấc mơ bác sĩ\r\n\r\nThành công không chỉ đến từ may mắn mà còn là kết quả của sự nỗ lực không ngừng nghỉ. Bất chấp những khó khăn, Bác sĩ Tú Dung từ nhỏ đã nung nấu ước mơ trở thành bác sĩ. Tác giả đã luôn nỗ lực học tập và rèn luyện để biến ước mơ thành hiện thực.\r\n\r\nĐây là lời mở đầu cho hành trình vượt khó đầy cảm hứng của tác giả. Từ xuất thân nghèo khó, Bác sĩ Tú Dung đã nỗ lực không ngừng để đạt được thành công trong cuộc sống. Và trở thành một bác sĩ phẫu thuật thẩm mỹ được nhiều người ngưỡng mộ. \r\n\r\nChương 2: Từ bác sĩ thực tập không lương đến bác sĩ phẫu thuật\r\n\r\nTiếp nối hành trình của bác sĩ Tú Dung sau khi tốt nghiệp đại học y khoa. Tuy nhiên, do khó khăn về tài chính, Bác sĩ Tú Dung không thể xin được việc làm tại bất kỳ bệnh viện nào. Cuối cùng, tác giả được nhận vào một bệnh viện với mức lương cực kỳ thấp. Chỉ đủ để trang trải chi phí sinh hoạt cơ bản. Và phải trải qua nhiều thử thách trong quá trình làm việc.\r\n\r\nTại chương này cho thấy những khó khăn mà bác sĩ Tú Dung phải trải qua trong giai đoạn đầu của sự nghiệp. Tuy nhiên, với ý chí và nghị lực, tác giả đã vượt qua những thử thách và khẳng định được bản thân.\r\n\r\nChương 3: Phẫu thuật tạo hình thẩm mỹ – Ngã rẽ định mệnh\r\n\r\nHành trình đầy thử thách nhưng cũng đầy ý chí của bác sĩ Tú Dung trong việc theo đuổi đam mê. Bắt đầu với vị trí là một bác sĩ ngoại tổng quát nhưng lại quyết định chuyển hướng sang lĩnh vực phẫu thuật tạo hình thẩm mỹ. Điều này đã mở ra một chương mới trong cuộc đời của tác giả. Giấc mơ của Bác sĩ Tú Dung chính là tìm lại nụ cười trên những gương mặt khiếm khuyết ngoại hình.\r\n\r\nChương 4: Số phận & vận mệnh\r\n\r\nCon người không hoàn toàn bị số phận chi phối mà có thể thay đổi nó bằng sự quyết tâm, nỗ lực và kiên trì. Tại chương này, tác giả đã suy nghĩ sự kiên định về con đường mình đã vạch ra. Cho dù con đường đó rất mênh mông.\r\n\r\nMỗi ngày Bác sĩ Tú Dung tiếp tục hành trình điều trị những ca khó hơn, những hoàn cảnh đặc biệt hơn. Mỗi hoàn cảnh, mỗi câu chuyện là một nguồn động lực cho tác giả. Dù vất vả, khó khăn và thách thức. Nhưng được giúp họ có cuộc sống tốt hơn và hạnh phúc hơn là điều mà tác giả luôn mong ước. Tác giả đã nhận ra rằng, định mệnh mà mình chọn nghề là đây. “Phải làm được những điều mà người khác chưa làm được”– Nghèo là vốn liếng\r\n\r\nChương 5: Mến – Sự thách thức của y học\r\n\r\nCâu chuyện về Anh Mến, người đàn ông mang gương mặt dài 26cm do mắc căn bệnh lạ – hội chứng MRS đầu tiên tại Việt Nam. Được bác sĩ Tú Dung và Bệnh viện JW giúp đỡ. Là một trong những minh chứng cho sự thành công trong y học. Tại chương này, tác giả đã gửi đến các độc giả về hành trình đầy khó khăn. Tìm lại một gương mặt mới, một cuộc sống mới cho anh Mến.\r\n\r\nChương 6: Sài Gòn trong Đại dịch Covid-19\r\n\r\nNăm 2021, đại dịch Covid-19 bùng phát dữ dội tại Sài Gòn. Biến thành phố sôi động một thời chìm vào im lặng. Những ngày tháng ấy, Sài Gòn trải qua những giai đoạn đầy thử thách. Khi số ca nhiễm tăng cao đột biến, hệ thống y tế quá tải. Và người dân phải đối mặt với nhiều khó khăn trong cuộc sống. \r\n\r\nTại chương này, bác sĩ Tú Dung ghi lại những trải nghiệm của tác giả trong cuộc chiến chống đại dịch Covid-19 tại Sài Gòn. Những câu chuyện trong chương này cho thấy sự hy sinh to lớn của đội ngũ y tế trong cuộc chiến chống Covid-19. \r\n\r\nChương 7: Vĩ thanh “Cuộc đời là biển lớn, ai không bơi sẽ chìm”\r\n\r\nĐây là một chương dài nhưng gồm những bài học ngắn để thấm sâu trong trái tim mỗi người. Những bài học cực kỳ quý giá để chạm đến “thành công” trong cuộc sống. Là lời chia sẻ của tác giả về những bài học quý giá rút ra từ cuộc đời mình. \r\n\r\nChương 7 là lời động viên cho những ai đang gặp khó khăn trong cuộc sống. Bác sĩ Tú Dung mong muốn mọi người hãy tin tưởng vào bản thân, không ngừng nỗ lực. Và theo đuổi ước mơ để đạt được thành công.\r\n\r\nKết luận\r\n\r\nBất kể bạn là ai, ở độ tuổi nào, “Nghèo là vốn liếng” đều có thể mang đến cho bạn những bài học giá trị. Và nguồn động lực to lớn để theo đuổi ước mơ và sống một cuộc đời ý nghĩa. Hãy dành thời gian đọc “Nghèo là vốn liếng” để khám phá những giá trị tuyệt vời mà nó mang lại. \r\n\r\nSinh ra trong nghèo khó bạn không có lỗi, nhưng chết vì nghèo là lỗi của bạn. Hành trình trải nghiệm của Bác sĩ Tú Dung sẽ là nguồn cảm hứng cho bạn trên con đường chinh phục ước mơ.\r\n\r\nToàn bộ 100% lợi nhuận của cuốn sách “Nghèo là vốn liếng” sẽ dành cho “Quỹ Nuôi Em Đến Trường”.', 'Nghèo Là Vốn Liếng là cuốn sách dành cho tất cả những ai đang trên hành trình theo đuổi ước mơ. Và tìm kiếm ý nghĩa cuộc sống', 168000, 400, 'Nguyễn Phan Tú Dung', 'Hồng Đức', 'Hồng Đức', 300.00, 'Việt Nam', 2024, 'Bìa mềm', 270, '2024-08-19 08:59:54', '0000-00-00 00:00:00'),
(12, 'Ám Ảnh Từ Kiếp Trước', 'Cuốn sách hay và khiêu khích suy nghĩ này đã phá vở những rào cản trong trị liệu tâm lý truyền thống và trình bày một biện pháp trị liệu cách tân và hiệu quả cao. Những ai làm việc chuyên về sức khỏe tâm thần cần phải xem xét nó nghiêm túc.” – Edith Fiore, TS., bác sỹ tâm lý học lâm sàng và là tác giả cuốn sách Bạn từng ở đây trước kia (You Have Been Here Before)\r\n\r\nVốn là nhà tâm lý trị liệu truyền thống, TS. Brian Weiss đã kinh ngạc và bi quan khi một trong những bệnh nhân của mình bắt đầu nhớ lại những chấn thương trong kiếp trước mà chúng dường như là chìa khóa để giải quyết những cơn ác mộng và lo lắng lặp đi lặp lại. Tuy nhiên, chủ nghĩa bi quan của ông bị xói mòn khi cô ấy bắt đầu phát những thông điệp từ “những sinh thể ở giữa không gian,” chứa đựng những tiết lộ quan trọng về gia đình của TS. Weiss và cái chết của con trai ông. Bằng biện pháp kiếp trước, ông có khả năng chữa lành cho bệnh nhân và mở ra một giai đoạn mới đầy ý nghĩa trong nghề nghiệp của chính mình.\r\n\r\n“Tường thuật xúc động sâu xa về sự tĩnh thức tâm linh ngoài dự liệu của một ngừoi đàn ông. Cuốn sách rất can đảm này đã mở cánh cửa cho một cuộc hôn phối giữa khoa học và siêu hình học. Cuốn sách phải đọc vì một thế giới khát khao, tìm kiếm linh hồn.” – Jeanne Avery, tác giả của Chiêm tinh học và tiền kiếp (Astrology and Your Past Lives)\r\n\r\n“Một trường hợp xuất thần lịch sử chứng minh tính hiệu quả của liệu pháp kiếp trước. Cuốn sách này sẽ mở ra những cánh cửa cho nhiều người chưa bao giờ nghĩ đến tính hợp lý của việc đầu thai trở lại.” – Richard Sutphen, tác giả của Tiền kiếp, tình yêu tương lai và bạn được sinh trở lại để được bên nhau (Past Lives, Future Loves and You Were Born Again to Be Together)\r\n\r\nTS. Brian L. Weiss, bác sỹ tâm thần học, sống và làm việc ở Miami, Florida. Ông tốt nghiệp trường đại học Columbia và trường y khoa của đại học Yale và là Chủ tịch Danh dự Tâm thần học của Trung tâm Y khoa Núi Sinai ở Miami. TS. Weiss vẫn có phòng trị liệu riêng ở Miami và tổ chức những hội nghị quốc tế, hội thảo trải nghiệm cũng như những chương trình huấn luyện cho những người hành nghề chuyên nghiệp. Ông cũng là tác giả của Đi qua thời gian để chữa lành (Through Time Into Healing) và Linh hồn cũ xác thân mới.\r\n\r\nThông tin về tác giả:\r\n\r\nBrian L. Weiss, M.D\r\n\r\nSau khi tốt nghiệp hạng ưu, trường đại học Columbia và nhận văn bằng y khoa tại trường y khoa của đại học Yale, Brian L. Weiss, TS. Y khoa (MD) tham dự chương trình nội trú tại Trung tâm Y khoa Bellevue, đại học New York, và thăng bậc thành bác sỹ nội trú trưởng, Khoa tâm thần, trường y khoa của đại học Yale. Hiện TS. Weiss là chủ tịch khoa tâm thần tại Trung tâm Y khoa Núi Sinai, vùng duyên hải Miami bang Florida và là trợ lý giáo sư lâm sàng khoa tâm thần, trường y của đại học Miami. Ông chuyên nghiên cứu và trị liệu tình trạng lo lắng và trầm cảm, rối loạn giấc ngủ, rối loạn lạm dụng chất gây nghiện, bệnh Alzheimer và hóa học não.', 'Cuốn sách hay và khiêu khích suy nghĩ này đã phá vở những rào cản trong trị liệu tâm lý truyền thống và trình bày một biện pháp trị liệu cách tân và hiệu quả cao. ', 89000, 200, 'Brian L Weiss', 'NXB Lao Động', 'Thái Hà', 280.00, 'Việt Nam', 2020, 'Bìa mềm', 317, '2024-08-19 09:02:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`id`, `book_id`, `category_id`, `created_at`) VALUES
(7, 4, 1, '2024-08-17 10:20:57'),
(8, 4, 33, '2024-08-17 10:20:57'),
(10, 6, 33, '2024-08-19 08:47:37'),
(11, 7, 1, '2024-08-19 08:51:34'),
(12, 7, 34, '2024-08-19 08:51:34'),
(13, 8, 1, '2024-08-19 08:53:37'),
(14, 8, 33, '2024-08-19 08:53:37'),
(15, 9, 1, '2024-08-19 08:56:10'),
(16, 9, 33, '2024-08-19 08:56:10'),
(17, 10, 1, '2024-08-19 08:57:42'),
(18, 10, 4, '2024-08-19 08:57:42'),
(19, 10, 50, '2024-08-19 08:57:42'),
(20, 11, 1, '2024-08-19 08:59:54'),
(21, 12, 8, '2024-08-19 09:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `book_images`
--

CREATE TABLE `book_images` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_images`
--

INSERT INTO `book_images` (`id`, `book_id`, `image_url`, `created_at`, `deleted_at`) VALUES
(3, 4, '1.png', '2024-08-17 10:21:04', '0000-00-00 00:00:00'),
(4, 4, '2.jpg', '2024-08-17 10:21:04', '0000-00-00 00:00:00'),
(6, 6, '1.jpg', '2024-08-19 08:47:37', '0000-00-00 00:00:00'),
(7, 6, '2.jpg', '2024-08-19 08:47:37', '0000-00-00 00:00:00'),
(8, 7, '1.jpg', '2024-08-19 08:51:34', '0000-00-00 00:00:00'),
(9, 8, '1.jpg', '2024-08-19 08:53:37', '0000-00-00 00:00:00'),
(10, 8, '2.jpg', '2024-08-19 08:53:37', '0000-00-00 00:00:00'),
(11, 9, '1.jpg', '2024-08-19 08:56:10', '0000-00-00 00:00:00'),
(12, 9, '2.jpg', '2024-08-19 08:56:10', '0000-00-00 00:00:00'),
(13, 9, '3.jpg', '2024-08-19 08:56:10', '0000-00-00 00:00:00'),
(14, 10, '1.jpg', '2024-08-19 08:57:42', '0000-00-00 00:00:00'),
(15, 10, '2.jpg', '2024-08-19 08:57:42', '0000-00-00 00:00:00'),
(16, 10, '3.jpg', '2024-08-19 08:57:42', '0000-00-00 00:00:00'),
(17, 11, '1.jpg', '2024-08-19 08:59:54', '0000-00-00 00:00:00'),
(18, 11, '2.jpg', '2024-08-19 08:59:54', '0000-00-00 00:00:00'),
(19, 11, '3.jpg', '2024-08-19 08:59:54', '0000-00-00 00:00:00'),
(20, 11, '3.webp', '2024-08-19 08:59:54', '0000-00-00 00:00:00'),
(21, 11, '4.jpg', '2024-08-19 08:59:54', '0000-00-00 00:00:00'),
(22, 11, '5.jpg', '2024-08-19 08:59:54', '0000-00-00 00:00:00'),
(23, 11, '6.jpg', '2024-08-19 08:59:54', '0000-00-00 00:00:00'),
(24, 12, '1.jpg', '2024-08-19 09:02:31', '0000-00-00 00:00:00'),
(25, 12, '2.jpg', '2024-08-19 09:02:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2024-08-16 20:23:22', '0000-00-00 00:00:00'),
(2, 2, NULL, '2024-08-23 18:59:54', '0000-00-00 00:00:00'),
(3, 3, NULL, '2024-08-25 16:37:19', '0000-00-00 00:00:00'),
(4, 4, NULL, '2024-08-25 17:14:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`id`, `cart_id`, `book_id`, `quantity`, `created_at`, `updated_at`) VALUES
(15, 1, 11, 2, '2024-08-21 17:18:49', '0000-00-00 00:00:00'),
(16, 1, 10, 1, '2024-08-22 13:02:53', '0000-00-00 00:00:00'),
(17, 1, 9, 2, '2024-08-22 13:03:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `created_at`, `deleted_at`) VALUES
(1, 'Văn Học', 'Sách văn học bao gồm các thể loại như tiểu thuyết, truyện ngắn, thơ, và các tác phẩm văn học cổ điển.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(2, 'Khoa Học và Kỹ Thuật', 'Sách về các lĩnh vực khoa học tự nhiên, kỹ thuật, công nghệ và y học.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(3, 'Lịch Sử', 'Sách về lịch sử thế giới, lịch sử Việt Nam và các nghiên cứu lịch sử khác.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(4, 'Thiếu Nhi', 'Sách dành cho trẻ em, bao gồm truyện thiếu nhi và sách giáo khoa.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(5, 'Kinh Tế', 'Sách về quản trị kinh doanh, tài chính, marketing và khởi nghiệp.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(6, 'Tâm Lý và Triết Học', 'Sách về tâm lý học, triết học và phát triển bản thân.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(7, 'Sức Khỏe và Làm Đẹp', 'Sách về sức khỏe, dinh dưỡng, làm đẹp và chăm sóc cơ thể.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(8, 'Tôn Giáo và Tâm Linh', 'Sách về tôn giáo, tâm linh và các nghiên cứu về niềm tin.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(9, 'Kỹ Năng Sống', 'Sách về kỹ năng sống, giao tiếp, lãnh đạo và phát triển cá nhân.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(10, 'Văn Hóa và Nghệ Thuật', 'Sách về văn hóa, nghệ thuật, âm nhạc, điện ảnh và các hình thức nghệ thuật khác.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(11, 'Truyện Tranh', 'Sách truyện tranh bao gồm manga, comic, manhua, manhwa và truyện tranh Việt Nam.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(12, 'Ẩm Thực', 'Sách về ẩm thực, nấu ăn, đồ uống, làm bánh và dinh dưỡng.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(13, 'Thể Thao', 'Sách về các môn thể thao như bóng đá, bóng rổ, cầu lông, bơi lội và các hoạt động thể dục thể thao khác.', NULL, '2024-08-14 17:07:57', '0000-00-00 00:00:00'),
(14, 'Manga', 'Sách manga, một loại truyện tranh có nguồn gốc từ Nhật Bản.', NULL, '2024-08-14 17:18:47', '0000-00-00 00:00:00'),
(15, 'Comic', 'Sách comic, truyện tranh phương Tây thường có ảnh hưởng từ văn hóa Mỹ.', NULL, '2024-08-14 17:18:47', '0000-00-00 00:00:00'),
(16, 'Truyện Tranh Việt Nam', 'Sách truyện tranh sản xuất tại Việt Nam.', NULL, '2024-08-14 17:18:47', '0000-00-00 00:00:00'),
(17, 'Truyện Tranh Nước Ngoài', 'Sách truyện tranh từ các quốc gia khác ngoài Việt Nam.', NULL, '2024-08-14 17:18:47', '0000-00-00 00:00:00'),
(18, 'Manhua', 'Sách manhua, truyện tranh có nguồn gốc từ Trung Quốc.', NULL, '2024-08-14 17:18:47', '0000-00-00 00:00:00'),
(19, 'Manhwa', 'Sách manhwa, truyện tranh có nguồn gốc từ Hàn Quốc.', NULL, '2024-08-14 17:18:47', '0000-00-00 00:00:00'),
(20, 'Nấu Ăn', 'Sách hướng dẫn nấu ăn với các công thức món ăn đa dạng.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(21, 'Đồ Uống', 'Sách về các loại đồ uống, bao gồm cocktail, trà, cà phê, và nước ép.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(22, 'Làm Bánh', 'Sách hướng dẫn làm bánh, từ các loại bánh ngọt đến bánh mặn.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(23, 'Thực Đơn', 'Sách về thiết kế thực đơn cho các bữa ăn và sự kiện.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(24, 'Dinh Dưỡng', 'Sách về dinh dưỡng, chế độ ăn uống lành mạnh và quản lý cân nặng.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(25, 'Bóng Đá', 'Sách về bóng đá, bao gồm kỹ thuật, chiến thuật và lịch sử.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(26, 'Bóng Rổ', 'Sách về bóng rổ, từ các kỹ năng cơ bản đến chiến thuật chuyên sâu.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(27, 'Cầu Lông', 'Sách về cầu lông, kỹ thuật chơi và chiến thuật.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(28, 'Bơi Lội', 'Sách về bơi lội, kỹ thuật bơi và các bài tập luyện tập.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(29, 'Thể Hình', 'Sách về tập luyện thể hình, bodybuilding và sức mạnh.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(30, 'Yoga', 'Sách về yoga, các tư thế yoga và phương pháp thư giãn.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(31, 'Du Lịch', 'Sách về du lịch kết hợp với thể thao và hoạt động ngoài trời.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(32, 'Thể Thao Khác', 'Sách về các môn thể thao khác không được liệt kê ở trên.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(33, 'Tiểu Thuyết', 'Sách tiểu thuyết với các thể loại như hiện thực, lịch sử, và giả tưởng.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(34, 'Truyện Ngắn', 'Sách truyện ngắn, bao gồm các tác phẩm ngắn gọn và sâu lắng.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(35, 'Thơ', 'Sách thơ với các thể loại như thơ tự do, thơ lục bát, và thơ tứ tuyệt.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(36, 'Văn Học Kinh Điển', 'Sách văn học kinh điển từ các tác giả nổi tiếng của nhiều quốc gia.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(37, 'Kinh Dị', 'Sách kinh dị, bao gồm các tác phẩm gây sợ hãi và hồi hộp.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(38, 'Ngôn Tình', 'Sách ngôn tình, truyện tình yêu lãng mạn và cảm động.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(39, 'Lãng Mạn', 'Sách lãng mạn, không chỉ về tình yêu mà còn về các mối quan hệ nhân văn khác.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(40, 'Huyền Bí', 'Sách huyền bí với các yếu tố siêu nhiên và bí ẩn.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(41, 'Hài Hước', 'Sách hài hước, gồm các tác phẩm mang tính giải trí và vui nhộn.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(42, 'Phiêu Lưu', 'Sách phiêu lưu, các cuộc hành trình và mạo hiểm hấp dẫn.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(43, 'Tâm Lý', 'Sách tâm lý, nghiên cứu về các khía cạnh tâm lý và cảm xúc của con người.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(44, 'Khoa Học Tự Nhiên', 'Sách về khoa học tự nhiên bao gồm vật lý, hóa học, sinh học và thiên văn học.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(45, 'Kỹ Thuật', 'Sách về các lĩnh vực kỹ thuật như cơ khí, điện tử và kỹ thuật xây dựng.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(46, 'Công Nghệ Thông Tin', 'Sách về công nghệ thông tin, lập trình, và các hệ thống máy tính.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(47, 'Y Học', 'Sách về y học, bao gồm y học cơ bản, lâm sàng và các nghiên cứu y khoa.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(48, 'Lịch Sử Thế Giới', 'Sách về lịch sử toàn cầu, các sự kiện và giai đoạn quan trọng.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(49, 'Lịch Sử Việt Nam', 'Sách về lịch sử Việt Nam, các triều đại, sự kiện và nhân vật lịch sử.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(50, 'Truyện Thiếu Nhi', 'Sách truyện dành cho trẻ em, bao gồm các câu chuyện giáo dục và giải trí.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(51, 'Sách Giáo Khoa', 'Sách giáo khoa cho các cấp học, từ tiểu học đến trung học.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(52, 'Quản Trị Kinh Doanh', 'Sách về quản trị kinh doanh, lãnh đạo và chiến lược doanh nghiệp.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(53, 'Tài Chính', 'Sách về tài chính, đầu tư, và quản lý tài sản.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(54, 'Marketing', 'Sách về marketing, quảng cáo và truyền thông tiếp thị.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(55, 'Khởi Nghiệp', 'Sách về khởi nghiệp, từ ý tưởng đến thực hiện và phát triển doanh nghiệp.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(56, 'Tâm Lý Học', 'Sách về tâm lý học, nghiên cứu hành vi và cảm xúc của con người.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(57, 'Triết Học', 'Sách về triết học, lý thuyết và các trường phái triết học khác nhau.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(58, 'Sức Khỏe', 'Sách về sức khỏe, bệnh tật và các phương pháp phòng ngừa và điều trị.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(59, 'Làm Đẹp', 'Sách về làm đẹp, chăm sóc da, tóc và các phương pháp làm đẹp khác.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(60, 'Tôn Giáo', 'Sách về các tôn giáo, giáo lý và thực hành tôn giáo.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(61, 'Tâm Linh', 'Sách về tâm linh, thiền định, và các phương pháp tìm hiểu về tinh thần.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(62, 'Phát Triển Bản Thân', 'Sách về phát triển bản thân, tự cải thiện và thành công cá nhân.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(63, 'Kỹ Năng Giao Tiếp', 'Sách về kỹ năng giao tiếp hiệu quả trong công việc và cuộc sống.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(64, 'Kỹ Năng Lãnh Đạo', 'Sách về lãnh đạo, quản lý đội nhóm và kỹ năng lãnh đạo.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(65, 'Nghệ Thuật', 'Sách về nghệ thuật, từ hội họa đến điêu khắc và các hình thức nghệ thuật khác.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(66, 'Văn Hóa', 'Sách về văn hóa, các phong tục tập quán và di sản văn hóa của các dân tộc.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(67, 'Âm Nhạc', 'Sách về âm nhạc, lý thuyết âm nhạc và các thể loại âm nhạc khác nhau.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00'),
(68, 'Phim Ảnh', 'Sách về phim ảnh, lịch sử điện ảnh, và phân tích phim.', NULL, '2024-08-14 17:19:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `order_id` char(36) DEFAULT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount_books`
--

CREATE TABLE `discount_books` (
  `id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `global_discounts`
--

CREATE TABLE `global_discounts` (
  `id` int(11) NOT NULL,
  `discount_code` varchar(50) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `condition_type` int(11) DEFAULT NULL,
  `condition_value` decimal(10,2) DEFAULT NULL,
  `max_discount_amount` decimal(10,2) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `global_discounts`
--

INSERT INTO `global_discounts` (`id`, `discount_code`, `discount_amount`, `description`, `expires_at`, `created_at`, `deleted_at`, `condition_type`, `condition_value`, `max_discount_amount`, `name`) VALUES
(11, 'G15K200K', 15.00, 'Giảm 15,000 VND cho đơn hàng từ 200,000 VND trở lên', '2024-10-30 23:59:59', '2024-08-23 11:29:50', '0000-00-00 00:00:00', 1, 200000.00, 15.00, 'Giảm 15K cho đơn hàng từ 200K'),
(12, 'G20K3SP', 20.00, 'Giảm 20,000 VND cho đơn hàng từ 3 sản phẩm trở lên', '2024-11-30 23:59:59', '2024-08-23 11:29:58', '0000-00-00 00:00:00', 2, 3.00, 20.00, 'Giảm 20K cho đơn hàng từ 3 sản phẩm'),
(13, 'G50K300KTT', 50.00, 'Giảm 50,000 VND cho đơn hàng từ 300,000 VND trở lên khi mua sản phẩm thuộc danh mục Thời trang', '2024-10-30 23:59:59', '2024-08-23 11:35:06', '0000-00-00 00:00:00', 1, 300000.00, 50.00, 'Giảm 50K cho đơn hàng thời trang từ 300K'),
(14, 'G40KXYZ', 40.00, 'Giảm 40,000 VND cho sách Văn Học', '2024-08-23 11:36:14', '2024-08-23 11:35:06', '0000-00-00 00:00:00', 3, NULL, 40.00, 'Giảm 40K cho sách Văn Học'),
(15, 'G35KDIENTU', 35.00, 'Giảm 35,000 VND cho sản phẩm thuộc danh mục Điện tử', '2024-11-10 23:59:59', '2024-08-23 11:35:06', '0000-00-00 00:00:00', 3, NULL, 35.00, 'Giảm 35K cho sản phẩm điện tử'),
(16, 'G15K2SP', 15.00, 'Giảm 15,000 VND cho đơn hàng từ 2 sản phẩm trở lên', '2024-09-25 23:59:59', '2024-08-23 11:35:06', '0000-00-00 00:00:00', 2, 2.00, 15.00, 'Giảm 15K cho đơn hàng từ 2 sản phẩm'),
(17, 'G30K5SP', 30.00, 'Giảm 30,000 VND cho đơn hàng từ 5 sản phẩm trở lên', '2024-12-01 23:59:59', '2024-08-23 11:35:06', '0000-00-00 00:00:00', 2, 5.00, 30.00, 'Giảm 30K cho đơn hàng từ 5 sản phẩm'),
(18, 'G100K1M', 100.00, 'Giảm 100,000 VND cho đơn hàng từ 1,000,000 VND trở lên', '2024-11-15 23:59:59', '2024-08-23 11:35:06', '0000-00-00 00:00:00', 1, 1000000.00, 100.00, 'Giảm 100K cho đơn hàng từ 1M');

-- --------------------------------------------------------

--
-- Table structure for table `guest_orders`
--

CREATE TABLE `guest_orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `order_id` varchar(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest_orders`
--

INSERT INTO `guest_orders` (`id`, `name`, `phone_number`, `email`, `order_id`, `created_at`, `note`) VALUES
(1, 'tsadfasd', '12314123412', 'tasfsd@gmail.com', 'cabc15e5-47ca-4e27-ba7c-d470b4c951e9', '2024-08-25 21:14:26', ''),
(2, 'dsfasdfds', '1231231231', 'fasdfsa@gmail.com', '21d4123f-73d9-4e53-9805-40f7205384fe', '2024-08-25 21:16:27', ''),
(3, 'dsfasdfds', '1231231231', 'fasdfsa@gmail.com', 'ae41712f-f719-4a1b-8582-dd83a38c4c3c', '2024-08-25 21:17:22', ''),
(4, 'dsfasdf', '1231241241234', 'test@gmail.com', '558b03ee-499e-442d-b0c3-b80737e8dd05', '2024-08-25 21:18:52', ''),
(5, 'Tam Thong', '', '', '41194a8b-fdcc-4fa2-90ed-732eeb3de35c', '2024-08-26 09:27:06', ''),
(6, 'Tam', '1231231232', 'test@gmail.com', '0abee2f8-d775-479f-b214-e08533b3ad66', '2024-08-26 15:11:20', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `user_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `order_subtotal` decimal(10,2) NOT NULL,
  `discounts_total` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `global_discount_id` int(11) DEFAULT NULL,
  `payment_intent_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `total`, `status`, `order_subtotal`, `discounts_total`, `created_at`, `updated_at`, `deleted_at`, `global_discount_id`, `payment_intent_id`) VALUES
('06b5a196-4c48-4748-ac00-ca8ae9078eef', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:46:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('0abee2f8-d775-479f-b214-e08533b3ad66', NULL, 257000.00, 'success', 257000.00, 0.00, '2024-08-26 15:11:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('0b71be3f-c1dd-44cb-9923-62827a2ec2d3', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 09:43:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('0c6ff4da-a043-47c6-96b1-0bc1258d3cec', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:20:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('119c5f2d-526d-4901-9511-e14d9bd2f7aa', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:30:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('1a3f3002-3c82-47da-b145-98bec23a877a', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:33:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('21d4123f-73d9-4e53-9805-40f7205384fe', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 21:16:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('24eabc02-8d55-4374-94d1-6935d84bc30c', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 18:41:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('267d2d3b-7941-40f0-b952-8d2533662d5e', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:42:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('2d92cdf5-9d22-4b9b-b06f-ce7ed9562487', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:20:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('2e5e1b21-d823-45f9-a5e4-3add9967914d', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:44:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('2f6da2be-2a49-40c5-a73e-c4c8022f4ad0', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:56:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('2fa8ac79-a441-454f-9f92-33dcc9806486', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 18:42:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('32aa028f-3d25-44bd-987a-4e26f18f57f5', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 21:11:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('39fef2ea-e639-424e-a13b-3c2b8d73d917', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 09:42:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('3b00a560-9340-4f2c-a371-ae6373cb38ba', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:22:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('3e8c566b-4072-4f6a-b656-d84df2a133c2', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 20:20:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('41194a8b-fdcc-4fa2-90ed-732eeb3de35c', NULL, 81000.00, 'pending', 81000.00, 0.00, '2024-08-26 09:27:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('4ad48c68-285c-4b0e-827b-42ee1fa4d2e1', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:33:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('4c7fdce3-9cd5-4a54-a58d-2e419628b7a2', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:23:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('50bdd1d2-1449-49cb-a156-75f098e96db0', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 20:00:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('549c3bfe-d93e-4c98-b003-c67626663b65', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:58:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('558b03ee-499e-442d-b0c3-b80737e8dd05', NULL, 170000.00, 'pending', 170000.00, 0.00, '2024-08-25 21:18:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('56793b59-5416-41e5-afd9-949d769aac4c', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 09:42:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('57298911-e8c4-43f0-a40f-7105eed5aa7d', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 20:24:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('58969d83-fb74-405f-a1f0-c224589f009b', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:28:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('5d2cf664-43aa-4628-a8a2-49d06d5e3fd5', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 20:43:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('60b3762a-c71e-4225-93d0-ea7c05babcad', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:41:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('613e51e6-f9d1-4c8d-8847-cdf15346ccaa', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:47:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('615d7022-ced4-410f-b99e-2bfc8d188d54', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:40:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('688cd367-7b2e-439a-b4f9-76e1625c73d4', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 09:36:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('6b10dae3-2b28-44a3-a639-0a29989baaec', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:43:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('726be337-be5e-46ed-9942-f727053ee7d6', 2, 89000.00, 'success', 89000.00, 0.00, '2024-08-26 15:08:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('750e7fd3-8e52-40ff-a7b0-63aefbf8981e', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:30:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('7751ca26-326b-44b1-82cc-925dc191c99c', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:42:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('7d5b2dd8-95f0-41d9-8e7d-f5bc34ce1e4b', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 09:33:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('866ad19c-619b-4271-82eb-edc141214e54', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:36:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('8aa4a76d-ab45-4d55-a64d-833f0d28327e', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 20:57:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('8c73e4fd-4779-4f64-a5bc-b3ac9caf5144', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:48:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('9a6f12a8-6cd9-49f5-9557-61f41a86545b', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 20:59:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('9f9b2771-566b-4e4e-a1d6-472fba1c78dc', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:37:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('a080d4a6-9627-4230-b56f-4f67d1d8a91c', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 18:42:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('a1c0476c-893c-4e18-bf46-3064ef13139c', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:48:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('a53605a6-c596-4c4a-9084-2b1c1c7f7fb2', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:34:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('a8add291-8c9d-41c6-8b42-e02b75c2733f', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:17:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('aac8d70b-40e2-4db1-b55e-d2cf2fd5c09d', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:22:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('ae41712f-f719-4a1b-8582-dd83a38c4c3c', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 21:17:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('b0c7fd4c-e78d-4d6d-b016-177b802b9e27', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:19:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('bf7890ba-1747-417d-be62-423d75da0c33', 2, 89000.00, 'success', 89000.00, 0.00, '2024-08-26 14:25:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('c3203462-687f-462b-969a-2529f02921d9', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 21:10:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('c4ce28a3-d75e-44df-b96d-01b8e3bbe5cd', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:27:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('cabc15e5-47ca-4e27-ba7c-d470b4c951e9', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 21:14:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('cf567a96-c4fd-4d24-9984-280a150d9954', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 20:23:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('d6f2694b-240b-4d50-b6bc-b5c0b4b7ed45', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 09:32:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('d7484420-9799-4bc5-b1a2-242d8b78ee86', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 09:42:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('dbe66eab-b179-42d5-adc8-e40c2d98bcf1', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 09:31:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('dd7d1b90-0684-4d0a-a999-896393028e66', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:18:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('dfd0f333-247f-489a-b626-2af139c256d9', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 19:34:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('e57a94ae-80a1-4246-a99f-8c2e8bbeb99d', NULL, 257000.00, 'pending', 257000.00, 0.00, '2024-08-25 09:28:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('ed7ad3bb-344a-4d7a-b5be-04089ff9745f', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-26 10:55:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('f8f17374-200d-4259-a897-5ab99f0d3106', NULL, 168000.00, 'pending', 168000.00, 0.00, '2024-08-25 09:33:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
('fa2b61a7-3f4c-4a40-9b8a-b8eb0fc5d5a8', 2, 89000.00, 'pending', 89000.00, 0.00, '2024-08-25 18:41:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` char(36) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `book_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(4, 'a8add291-8c9d-41c6-8b42-e02b75c2733f', NULL, 1, 168000.00, '2024-08-25 09:17:36', '0000-00-00 00:00:00'),
(5, 'a8add291-8c9d-41c6-8b42-e02b75c2733f', NULL, 1, 89000.00, '2024-08-25 09:17:36', '0000-00-00 00:00:00'),
(6, 'dd7d1b90-0684-4d0a-a999-896393028e66', NULL, 1, 168000.00, '2024-08-25 09:18:13', '0000-00-00 00:00:00'),
(7, 'dd7d1b90-0684-4d0a-a999-896393028e66', NULL, 1, 89000.00, '2024-08-25 09:18:14', '0000-00-00 00:00:00'),
(8, 'b0c7fd4c-e78d-4d6d-b016-177b802b9e27', NULL, 1, 168000.00, '2024-08-25 09:20:00', '0000-00-00 00:00:00'),
(9, 'b0c7fd4c-e78d-4d6d-b016-177b802b9e27', NULL, 1, 89000.00, '2024-08-25 09:20:00', '0000-00-00 00:00:00'),
(10, '2d92cdf5-9d22-4b9b-b06f-ce7ed9562487', NULL, 1, 168000.00, '2024-08-25 09:20:10', '0000-00-00 00:00:00'),
(11, '2d92cdf5-9d22-4b9b-b06f-ce7ed9562487', NULL, 1, 89000.00, '2024-08-25 09:20:10', '0000-00-00 00:00:00'),
(12, '0c6ff4da-a043-47c6-96b1-0bc1258d3cec', NULL, 1, 168000.00, '2024-08-25 09:20:38', '0000-00-00 00:00:00'),
(13, '0c6ff4da-a043-47c6-96b1-0bc1258d3cec', NULL, 1, 89000.00, '2024-08-25 09:20:39', '0000-00-00 00:00:00'),
(14, 'aac8d70b-40e2-4db1-b55e-d2cf2fd5c09d', NULL, 1, 168000.00, '2024-08-25 09:22:11', '0000-00-00 00:00:00'),
(15, 'aac8d70b-40e2-4db1-b55e-d2cf2fd5c09d', NULL, 1, 89000.00, '2024-08-25 09:22:11', '0000-00-00 00:00:00'),
(16, '3b00a560-9340-4f2c-a371-ae6373cb38ba', NULL, 1, 168000.00, '2024-08-25 09:22:32', '0000-00-00 00:00:00'),
(17, '3b00a560-9340-4f2c-a371-ae6373cb38ba', NULL, 1, 89000.00, '2024-08-25 09:22:32', '0000-00-00 00:00:00'),
(18, '4c7fdce3-9cd5-4a54-a58d-2e419628b7a2', NULL, 1, 168000.00, '2024-08-25 09:23:02', '0000-00-00 00:00:00'),
(19, '4c7fdce3-9cd5-4a54-a58d-2e419628b7a2', NULL, 1, 89000.00, '2024-08-25 09:23:02', '0000-00-00 00:00:00'),
(20, 'c4ce28a3-d75e-44df-b96d-01b8e3bbe5cd', NULL, 1, 168000.00, '2024-08-25 09:27:21', '0000-00-00 00:00:00'),
(21, 'c4ce28a3-d75e-44df-b96d-01b8e3bbe5cd', NULL, 1, 89000.00, '2024-08-25 09:27:21', '0000-00-00 00:00:00'),
(22, 'e57a94ae-80a1-4246-a99f-8c2e8bbeb99d', NULL, 1, 168000.00, '2024-08-25 09:28:09', '0000-00-00 00:00:00'),
(23, 'e57a94ae-80a1-4246-a99f-8c2e8bbeb99d', NULL, 1, 89000.00, '2024-08-25 09:28:10', '0000-00-00 00:00:00'),
(24, '58969d83-fb74-405f-a1f0-c224589f009b', NULL, 1, 168000.00, '2024-08-25 09:28:39', '0000-00-00 00:00:00'),
(25, '58969d83-fb74-405f-a1f0-c224589f009b', NULL, 1, 89000.00, '2024-08-25 09:28:39', '0000-00-00 00:00:00'),
(26, '750e7fd3-8e52-40ff-a7b0-63aefbf8981e', NULL, 1, 168000.00, '2024-08-25 09:30:25', '0000-00-00 00:00:00'),
(27, '750e7fd3-8e52-40ff-a7b0-63aefbf8981e', NULL, 1, 89000.00, '2024-08-25 09:30:25', '0000-00-00 00:00:00'),
(28, '119c5f2d-526d-4901-9511-e14d9bd2f7aa', NULL, 1, 168000.00, '2024-08-25 09:30:41', '0000-00-00 00:00:00'),
(29, '119c5f2d-526d-4901-9511-e14d9bd2f7aa', NULL, 1, 89000.00, '2024-08-25 09:30:41', '0000-00-00 00:00:00'),
(30, 'dbe66eab-b179-42d5-adc8-e40c2d98bcf1', NULL, 1, 168000.00, '2024-08-25 09:31:06', '0000-00-00 00:00:00'),
(31, 'd6f2694b-240b-4d50-b6bc-b5c0b4b7ed45', NULL, 1, 168000.00, '2024-08-25 09:32:48', '0000-00-00 00:00:00'),
(32, '7d5b2dd8-95f0-41d9-8e7d-f5bc34ce1e4b', NULL, 1, 168000.00, '2024-08-25 09:33:12', '0000-00-00 00:00:00'),
(33, 'f8f17374-200d-4259-a897-5ab99f0d3106', NULL, 1, 168000.00, '2024-08-25 09:33:14', '0000-00-00 00:00:00'),
(34, '1a3f3002-3c82-47da-b145-98bec23a877a', NULL, 1, 168000.00, '2024-08-25 09:33:23', '0000-00-00 00:00:00'),
(35, '1a3f3002-3c82-47da-b145-98bec23a877a', NULL, 1, 89000.00, '2024-08-25 09:33:23', '0000-00-00 00:00:00'),
(36, '4ad48c68-285c-4b0e-827b-42ee1fa4d2e1', NULL, 1, 168000.00, '2024-08-25 09:33:29', '0000-00-00 00:00:00'),
(37, '4ad48c68-285c-4b0e-827b-42ee1fa4d2e1', NULL, 1, 89000.00, '2024-08-25 09:33:29', '0000-00-00 00:00:00'),
(38, '688cd367-7b2e-439a-b4f9-76e1625c73d4', NULL, 1, 168000.00, '2024-08-25 09:36:33', '0000-00-00 00:00:00'),
(39, '56793b59-5416-41e5-afd9-949d769aac4c', NULL, 1, 168000.00, '2024-08-25 09:42:06', '0000-00-00 00:00:00'),
(40, '39fef2ea-e639-424e-a13b-3c2b8d73d917', NULL, 1, 168000.00, '2024-08-25 09:42:20', '0000-00-00 00:00:00'),
(41, 'd7484420-9799-4bc5-b1a2-242d8b78ee86', NULL, 1, 168000.00, '2024-08-25 09:42:48', '0000-00-00 00:00:00'),
(42, '0b71be3f-c1dd-44cb-9923-62827a2ec2d3', NULL, 1, 168000.00, '2024-08-25 09:43:06', '0000-00-00 00:00:00'),
(43, '24eabc02-8d55-4374-94d1-6935d84bc30c', NULL, 1, 89000.00, '2024-08-25 18:41:33', '0000-00-00 00:00:00'),
(44, 'fa2b61a7-3f4c-4a40-9b8a-b8eb0fc5d5a8', NULL, 1, 89000.00, '2024-08-25 18:41:53', '0000-00-00 00:00:00'),
(45, 'a080d4a6-9627-4230-b56f-4f67d1d8a91c', 12, 1, 89000.00, '2024-08-25 18:42:50', '0000-00-00 00:00:00'),
(46, 'dfd0f333-247f-489a-b626-2af139c256d9', 12, 1, 89000.00, '2024-08-25 19:34:04', '0000-00-00 00:00:00'),
(47, 'a53605a6-c596-4c4a-9084-2b1c1c7f7fb2', 12, 1, 89000.00, '2024-08-25 19:34:17', '0000-00-00 00:00:00'),
(48, '866ad19c-619b-4271-82eb-edc141214e54', 12, 1, 89000.00, '2024-08-25 19:36:53', '0000-00-00 00:00:00'),
(49, '9f9b2771-566b-4e4e-a1d6-472fba1c78dc', 12, 1, 89000.00, '2024-08-25 19:37:55', '0000-00-00 00:00:00'),
(50, '615d7022-ced4-410f-b99e-2bfc8d188d54', 12, 1, 89000.00, '2024-08-25 19:40:28', '0000-00-00 00:00:00'),
(51, '60b3762a-c71e-4225-93d0-ea7c05babcad', 12, 1, 89000.00, '2024-08-25 19:41:54', '0000-00-00 00:00:00'),
(52, '7751ca26-326b-44b1-82cc-925dc191c99c', 12, 1, 89000.00, '2024-08-25 19:42:24', '0000-00-00 00:00:00'),
(53, '267d2d3b-7941-40f0-b952-8d2533662d5e', 12, 1, 89000.00, '2024-08-25 19:42:36', '0000-00-00 00:00:00'),
(54, '6b10dae3-2b28-44a3-a639-0a29989baaec', 12, 1, 89000.00, '2024-08-25 19:43:15', '0000-00-00 00:00:00'),
(55, '2e5e1b21-d823-45f9-a5e4-3add9967914d', 12, 1, 89000.00, '2024-08-25 19:44:41', '0000-00-00 00:00:00'),
(56, '06b5a196-4c48-4748-ac00-ca8ae9078eef', 12, 1, 89000.00, '2024-08-25 19:46:20', '0000-00-00 00:00:00'),
(57, '613e51e6-f9d1-4c8d-8847-cdf15346ccaa', 12, 1, 89000.00, '2024-08-25 19:47:00', '0000-00-00 00:00:00'),
(58, '8c73e4fd-4779-4f64-a5bc-b3ac9caf5144', 12, 1, 89000.00, '2024-08-25 19:48:27', '0000-00-00 00:00:00'),
(59, 'a1c0476c-893c-4e18-bf46-3064ef13139c', 12, 1, 89000.00, '2024-08-25 19:48:52', '0000-00-00 00:00:00'),
(60, '2f6da2be-2a49-40c5-a73e-c4c8022f4ad0', 12, 1, 89000.00, '2024-08-25 19:56:17', '0000-00-00 00:00:00'),
(61, '549c3bfe-d93e-4c98-b003-c67626663b65', 12, 1, 89000.00, '2024-08-25 19:58:48', '0000-00-00 00:00:00'),
(62, '50bdd1d2-1449-49cb-a156-75f098e96db0', 12, 1, 89000.00, '2024-08-25 20:00:34', '0000-00-00 00:00:00'),
(63, '3e8c566b-4072-4f6a-b656-d84df2a133c2', 12, 1, 89000.00, '2024-08-25 20:20:35', '0000-00-00 00:00:00'),
(64, 'cf567a96-c4fd-4d24-9984-280a150d9954', 11, 1, 168000.00, '2024-08-25 20:23:53', '0000-00-00 00:00:00'),
(65, '57298911-e8c4-43f0-a40f-7105eed5aa7d', 11, 1, 168000.00, '2024-08-25 20:24:10', '0000-00-00 00:00:00'),
(66, '5d2cf664-43aa-4628-a8a2-49d06d5e3fd5', 11, 1, 168000.00, '2024-08-25 20:43:09', '0000-00-00 00:00:00'),
(67, '8aa4a76d-ab45-4d55-a64d-833f0d28327e', 11, 1, 168000.00, '2024-08-25 20:57:50', '0000-00-00 00:00:00'),
(68, '9a6f12a8-6cd9-49f5-9557-61f41a86545b', 11, 1, 168000.00, '2024-08-25 20:59:20', '0000-00-00 00:00:00'),
(69, 'c3203462-687f-462b-969a-2529f02921d9', 11, 1, 168000.00, '2024-08-25 21:10:08', '0000-00-00 00:00:00'),
(70, '32aa028f-3d25-44bd-987a-4e26f18f57f5', 11, 1, 168000.00, '2024-08-25 21:11:26', '0000-00-00 00:00:00'),
(71, 'cabc15e5-47ca-4e27-ba7c-d470b4c951e9', 11, 1, 168000.00, '2024-08-25 21:14:17', '0000-00-00 00:00:00'),
(72, '21d4123f-73d9-4e53-9805-40f7205384fe', 11, 1, 168000.00, '2024-08-25 21:16:18', '0000-00-00 00:00:00'),
(73, 'ae41712f-f719-4a1b-8582-dd83a38c4c3c', 11, 1, 168000.00, '2024-08-25 21:17:22', '0000-00-00 00:00:00'),
(74, '558b03ee-499e-442d-b0c3-b80737e8dd05', 10, 1, 81000.00, '2024-08-25 21:18:52', '0000-00-00 00:00:00'),
(75, '558b03ee-499e-442d-b0c3-b80737e8dd05', 12, 1, 89000.00, '2024-08-25 21:18:52', '0000-00-00 00:00:00'),
(76, '41194a8b-fdcc-4fa2-90ed-732eeb3de35c', 10, 1, 81000.00, '2024-08-26 09:27:05', '0000-00-00 00:00:00'),
(77, 'ed7ad3bb-344a-4d7a-b5be-04089ff9745f', 12, 1, 89000.00, '2024-08-26 10:55:30', '0000-00-00 00:00:00'),
(78, 'bf7890ba-1747-417d-be62-423d75da0c33', 12, 1, 89000.00, '2024-08-26 14:25:35', '0000-00-00 00:00:00'),
(79, '726be337-be5e-46ed-9942-f727053ee7d6', 12, 1, 89000.00, '2024-08-26 15:08:20', '0000-00-00 00:00:00'),
(80, '0abee2f8-d775-479f-b214-e08533b3ad66', 11, 1, 168000.00, '2024-08-26 15:11:20', '0000-00-00 00:00:00'),
(81, '0abee2f8-d775-479f-b214-e08533b3ad66', 12, 1, 89000.00, '2024-08-26 15:11:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `comment` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `birth_of_date` date DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `first_name`, `last_name`, `username`, `email`, `password`, `birth_of_date`, `phone_number`, `isAdmin`, `created_at`, `deleted_at`) VALUES
(1, NULL, NULL, NULL, 'admin', NULL, '$2y$10$BgXaxLuFBFjaYe1j9aIOZOcM1qhVdUdwgVUNGofzbNYciTC8tu0ee', NULL, NULL, 1, '2024-08-16 20:23:22', '0000-00-00 00:00:00'),
(2, NULL, 'Tam1', 'Thong', 'tamthong', 'asd@test.com', '$2y$10$j/IJdb0GPoaWePUWl3Hk6e1h7vOjAf2iNLntGH7uTUocCjAv1uIIq', '2024-08-08', '123', 0, '2024-08-23 18:59:54', '0000-00-00 00:00:00'),
(3, NULL, NULL, NULL, 'test1', NULL, '$2y$10$9wahfi3s8p.SkEdY2Kw.5uWOmqwQJzMA5VTk0GnOrfnbKeV1l2mai', NULL, NULL, 0, '2024-08-25 16:37:19', '0000-00-00 00:00:00'),
(4, NULL, NULL, NULL, 'test2', NULL, '$2y$10$oKXVYH676nlMRkmwcW8K5e2HItIqBlxHX3QDsNjL6PDkk2sTl1Fdm', NULL, NULL, 0, '2024-08-25 17:14:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `guest_orders_id` (`guest_order_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `book_images`
--
ALTER TABLE `book_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_cart_book` (`cart_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `discount_books`
--
ALTER TABLE `discount_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_id` (`discount_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `global_discounts`
--
ALTER TABLE `global_discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discount_code` (`discount_code`);

--
-- Indexes for table `guest_orders`
--
ALTER TABLE `guest_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `global_discount_id` (`global_discount_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `book_images`
--
ALTER TABLE `book_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount_books`
--
ALTER TABLE `discount_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_discounts`
--
ALTER TABLE `global_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `guest_orders`
--
ALTER TABLE `guest_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_ibfk_2` FOREIGN KEY (`guest_order_id`) REFERENCES `guest_orders` (`id`);

--
-- Constraints for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD CONSTRAINT `book_categories_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `book_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `book_images`
--
ALTER TABLE `book_images`
  ADD CONSTRAINT `book_images_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`);

--
-- Constraints for table `discount_books`
--
ALTER TABLE `discount_books`
  ADD CONSTRAINT `discount_books_ibfk_1` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`),
  ADD CONSTRAINT `discount_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `guest_orders`
--
ALTER TABLE `guest_orders`
  ADD CONSTRAINT `guest_orders_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`global_discount_id`) REFERENCES `global_discounts` (`id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
