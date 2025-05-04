-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 03:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarawak_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_my` varchar(255) DEFAULT NULL,
  `title_zh` varchar(255) DEFAULT NULL,
  `content_en` text DEFAULT NULL,
  `content_my` text DEFAULT NULL,
  `content_zh` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `image`, `tag`, `title_en`, `title_my`, `title_zh`, `content_en`, `content_my`, `content_zh`) VALUES
(1, 'ethnic.jpg', 'culture', 'Sarawak Ethnic Groups', 'Kumpulan Etnik Sarawak', '砂拉越的族群', 'Sarawak, located on the island of Borneo, is Malaysia\\\'s largest state and one of the most culturally diverse regions in Southeast Asia. Home to more than 40 sub-ethnic groups, the people of Sarawak live in harmony while preserving unique customs, languages, and lifestyles. The most well-known ethnic groups include the Iban, Bidayuh, Melanau, Orang Ulu, Malay, and Chinese communities, each contributing to the state\\\'s vibrant cultural mosaic.\r\n\r\n### The Iban People\r\nThe Iban are the largest indigenous group in Sarawak, making up nearly 30% of the population. Traditionally known as Sea Dayaks, they were once feared for headhunting practices, a ritual associated with bravery and spiritual beliefs. Today, the Iban are celebrated for their hospitality, colorful traditional costumes, and longhouse lifestyle.\r\n\r\nLonghouses are communal wooden structures that can stretch hundreds of meters, housing multiple families under one roof. Each unit within the longhouse is called a \"bilik\" and includes its own kitchen and sleeping area. The \"ruai,\" or shared corridor, serves as the main venue for social gatherings, celebrations, and community meetings.\r\n\r\nThe Iban language is part of the Malayic language family and is passed down orally. Cultural identity is preserved through intricate beadwork, weaving (especially \"pua kumbu\" cloth), and traditional dances like the \"ngajat,\" performed during the Gawai Dayak festival.\r\n\r\n### The Bidayuh People\r\nThe Bidayuh, or Land Dayaks, are known for their strong communal traditions and agricultural skills. They reside mainly in the hilly areas of Kuching and Serian divisions. Bidayuh communities historically built fortified villages on hilltops for protection against invaders. Their houses were made from bamboo and wood, and many communities practiced terraced farming.\r\n\r\nBidayuh culture is rich in oral tradition, music, and architecture. The \"baruk\" is a distinctive roundhouse with a tall thatched roof used for ceremonies and council meetings. Traditional instruments such as bamboo flutes and drums accompany rituals and festive dances.\r\n\r\nThe Bidayuh language consists of multiple dialects that differ between villages. Despite this, community efforts have been made to document and teach the language in schools to preserve it for future generations.\r\n\r\n### The Melanau People\r\nThe Melanau people, who live primarily along the coastal areas of Mukah, Bintulu, and Matu, have a culture influenced by both indigenous beliefs and Islam. Historically, they were animists who believed in spirits of the sea and forest, and their traditional religion involved rituals to appease these forces.\r\n\r\nOne of the most important cultural events is the Kaul Festival, a spiritual cleansing ceremony held near the river mouth to honor sea spirits. People construct tall ceremonial towers called \"seraheng,\" and offer food and gifts while participating in games and performances.\r\n\r\nMelanau cuisine includes sago-based dishes, fish delicacies, and \"umai,\" a raw fish salad. Their language, part of the Austronesian family, has several dialects and remains actively used in rural areas.\r\n\r\n### The Orang Ulu\r\nOrang Ulu, or \"upriver people,\" is a collective term for smaller ethnic groups like the Kenyah, Kayan, Kelabit, and Lun Bawang. These communities inhabit the interior regions near the Baram, Belaga, and Limbang rivers. They are known for their elaborate tattoos, intricate beadwork, and towering longhouses.\r\n\r\nMusic plays an important role in Orang Ulu culture, especially the \"sape,\" a traditional lute carved from a single piece of wood. It produces haunting melodies used during storytelling and dancing.\r\n\r\nOrang Ulu women traditionally wear heavy silver jewelry, ornate headpieces, and ceremonial dresses. The culture emphasizes respect for nature, ancestors, and communal harmony.\r\n\r\n### Malay and Chinese Communities\r\nThough indigenous groups form the majority in rural Sarawak, Malay and Chinese communities are integral to the state’s urban and economic development. Sarawak Malays are mainly concentrated along the coast and rivers, and they practice Islam. They are well known for their hospitality, Islamic traditions, and contribution to the arts, particularly silat (martial arts) and traditional Malay attire.\r\n\r\nThe Chinese community, made up of Hokkien, Hakka, Teochew, and Foochow dialect groups, is deeply involved in trade, business, and education. Their cultural legacy is visible in Sarawak’s many Chinese temples, clan associations, and festivals such as Chinese New Year and the Hungry Ghost Festival.\r\n\r\n### Cultural Harmony\r\nSarawak’s greatest strength lies in its ability to maintain harmony among diverse groups. Inter-ethnic marriages are common, and multi-racial families are a norm. Schoolchildren grow up learning multiple languages, including Bahasa Malaysia, English, Mandarin, and local dialects. State holidays like Gawai Dayak, Hari Raya, and Chinese New Year are celebrated by all communities, not just those to whom the traditions belong.\r\n\r\nIn a time where identity politics challenge unity elsewhere, Sarawak serves as a model for multicultural coexistence. From the vibrant costumes of the Iban to the sape melodies of the Kenyah, Sarawak’s ethnic groups ensure that tradition and diversity thrive together.\r\n\r\nBy learning about these groups, we not only understand Sarawak better but also appreciate the incredible human tapestry that makes this Malaysian state truly unique.\r\n', 'Sarawak, negeri terbesar di Malaysia yang terletak di pulau Borneo, terkenal dengan kepelbagaian budaya dan etniknya. Terdapat lebih daripada 40 kumpulan sub-etnik yang mendiami negeri ini, termasuk Iban, Bidayuh, Melanau, Orang Ulu, Melayu, dan Cina. Setiap kumpulan mempunyai bahasa, tradisi, dan cara hidup tersendiri yang menyumbang kepada mozek budaya yang kaya di Sarawak.\r\n\r\n### Kaum Iban\r\nKaum Iban merupakan kumpulan etnik terbesar di Sarawak, merangkumi hampir 30% daripada populasi. Mereka dahulunya dikenali sebagai Dayak Laut dan terkenal dengan amalan memburu kepala, yang dilihat sebagai lambang keberanian. Hari ini, masyarakat Iban dikenali dengan keramahan, pakaian tradisional berwarna-warni, dan kehidupan di rumah panjang.\r\n\r\nRumah panjang Iban adalah struktur kayu yang menempatkan beberapa keluarga dalam satu bangunan. Setiap unit dikenali sebagai \"bilik\" dan mempunyai dapur dan ruang tidur sendiri, manakala \"ruai\" merupakan ruang bersama untuk acara sosial dan majlis keramaian. Budaya Iban turut terkenal dengan kain tenunan pua kumbu, tarian ngajat, dan alat muzik tradisional.\r\n\r\n### Kaum Bidayuh\r\nBidayuh atau Dayak Darat tinggal di kawasan perbukitan Kuching dan Serian. Dahulu mereka membina kampung di puncak bukit sebagai perlindungan. Seni bina tradisional mereka melibatkan penggunaan buluh dan kayu. Rumah bulat atau \"baruk\" digunakan sebagai dewan majlis dan tempat simpanan senjata.\r\n\r\nMereka terkenal dengan pertanian bukit, muzik buluh dan gendang, serta tarian tradisional. Bahasa Bidayuh mempunyai pelbagai dialek yang berbeza mengikut kampung, tetapi usaha pemeliharaan telah dijalankan melalui pengajaran di sekolah-sekolah.\r\n\r\n### Kaum Melanau\r\nKaum Melanau mendiami kawasan pesisir seperti Mukah dan Bintulu. Pada asalnya mereka beragama animisme, mempercayai semangat laut dan sungai. Kini, kebanyakan mereka beragama Islam tetapi masih mengekalkan adat tradisional.\r\n\r\nPerayaan utama mereka ialah Pesta Kaul, yang diadakan untuk membersihkan kampung daripada unsur jahat. Perarakan bot, menara seraheng, dan persembahan budaya menjadi tumpuan. Makanan tradisional Melanau termasuk sagu, umai (salad ikan mentah), dan hidangan laut.\r\n\r\n### Orang Ulu\r\nOrang Ulu ialah istilah kolektif untuk kumpulan seperti Kenyah, Kayan, Kelabit dan Lun Bawang. Mereka tinggal di kawasan pedalaman seperti Baram dan Belaga. Budaya mereka menekankan seni ukiran, tatu, muzik sape, dan rumah panjang.\r\n\r\nSape ialah alat muzik bertali yang diukir daripada sebatang kayu. Ia digunakan dalam tarian, cerita rakyat dan ritual. Wanita Orang Ulu memakai perhiasan perak berat dan pakaian yang rumit dalam upacara adat.\r\n\r\n### Masyarakat Melayu dan Cina\r\nKaum Melayu tinggal di kawasan pesisir dan terlibat dalam pentadbiran, pendidikan dan seni. Mereka dikenali dengan seni silat, seni tenunan, dan adat Melayu seperti kenduri dan perkahwinan tradisional.\r\n\r\nMasyarakat Cina pula terdiri daripada kumpulan Hokkien, Hakka, dan Foochow yang menyumbang kepada perniagaan dan pembangunan bandar. Mereka merayakan Tahun Baru Cina, Chap Goh Mei, dan mengekalkan warisan mereka melalui kuil, sekolah dan makanan tradisional.\r\n\r\n### Perpaduan Budaya\r\nKeistimewaan Sarawak ialah kemampuan rakyatnya untuk hidup harmoni walaupun berlainan bangsa dan agama. Perkahwinan campur adalah perkara biasa dan kebanyakan rakyat Sarawak fasih dalam lebih dari satu bahasa. Perayaan seperti Gawai, Raya dan Tahun Baru Cina disambut bersama tanpa mengira kaum.\r\n\r\nSarawak merupakan contoh cemerlang perpaduan budaya. Dengan memahami kumpulan etnik ini, kita dapat menghargai warisan yang kaya dan keunikan negeri ini.\r\n', '砂拉越位于婆罗洲岛，是马来西亚最大的州属，也是东南亚文化最多元的地区之一。这里居住着超过40个族群，人民和谐共处，同时保留着各自独特的习俗、语言和生活方式。最著名的族群包括伊班族、比达友族、马兰诺族、乌鲁族、马来族和华人社区，他们共同构成了砂拉越丰富多彩的文化拼图。\r\n\r\n### 伊班族\r\n伊班人是砂拉越最大的土著群体，占当地人口近30%。他们传统上被称为“海达雅族”（Sea Dayaks），过去因猎头习俗而令人畏惧，这是一种与勇敢和精神信仰相关的仪式。如今，伊班人以热情好客、色彩鲜艳的传统服饰以及长屋生活方式而闻名。\r\n\r\n长屋是一种木制的集体住宅建筑，长度可达数百米，多个家庭生活在同一个屋檐下。长屋内的每个单位称为“bilik”，配有独立的厨房和睡眠区域。“ruai”是指共用的走廊，用作社交聚会、庆典和社区会议的主要场所。\r\n\r\n伊班语属于马来语族，通过口头方式代代相传。伊班人的文化身份通过精美的串珠工艺、织布（尤其是“pua kumbu”布料）以及传统舞蹈如“ngajat”得以保留，这些舞蹈通常在达雅丰收节（Gawai Dayak）期间表演。\r\n\r\n### 比达友族\r\n比达友人，也被称为“陆地达雅族”（Land Dayaks），以强烈的社区传统和出色的农业技能而闻名。他们主要居住在古晋和西连地区的丘陵地带。比达友族社区在历史上常在山顶建造设有防御设施的村庄，以抵御外来入侵者。他们的房屋多以竹子和木材建造，许多社区还实行梯田耕作。\r\n\r\n比达友族的文化在口头传统、音乐和建筑方面非常丰富。“Baruk”是一种独特的圆形房屋，屋顶高高覆盖茅草，用于举行仪式和召开村民会议。传统乐器如竹笛和鼓常用于配合仪式和节庆舞蹈的演出。\r\n\r\n比达友语包含多个方言，各村之间有所不同。尽管如此，社区已积极推动记录和在学校教授这门语言，以便为后代保留下来。\r\n\r\n### 马兰诺族\r\n马兰诺人主要居住在沐胶、民都鲁和马都的沿海地区，他们的文化受本土信仰和伊斯兰教的双重影响。历史上，他们是万物有灵论者，信仰海洋与森林之灵，其传统宗教包含安抚这些自然力量的各种仪式。\r\n\r\n其中最重要的文化活动之一是“卡乌节”（Kaul festival），这是一种在河口举行的净化仪式，用以祭拜海灵。人们会建造高高的仪式塔，称为“赛朗”（seraheng），并献上食物与礼品，同时参与游戏和表演。\r\n\r\n马兰诺料理以西米为主，包括各种鱼类美食和“乌麦”（umai），一种生鱼片沙拉。他们的语言属于南岛语系，拥有多个方言，并在乡村地区仍被广泛使用。\r\n\r\n### 鄂朗乌鲁族\r\n鄂朗乌鲁族，或称“上游人”（Upriver people），是一个集合术语，指的是像肯雅族（Kenyah）、卡扬族（Kayan）、凯拉比族（Kelabit）和伦巴旺族（Lun Bawang）等较小的族群。这些社区居住在巴南、贝拉加和林梦河流域附近的内陆地区。他们以精美的纹身、复杂的串珠工艺和高耸的长屋而闻名。\r\n\r\n音乐在鄂朗乌鲁族文化中扮演着重要角色，尤其是“萨佩”（sape），一种传统的鲁特琴，由一整块木头雕刻而成。它演奏出悠扬的旋律，常用于讲故事和舞蹈时伴奏。\r\n\r\n鄂朗乌鲁族女性传统上佩戴沉重的银饰、华丽的头饰和仪式服装。该文化强调尊重自然、祖先以及社区和谐。\r\n\r\n### 马来族和华人社区\r\n虽然土著群体在砂拉越的农村地区占多数，但马来族和华人社区在该州的城市和经济发展中起着至关重要的作用。砂拉越的马来人主要集中在沿海和河流地区，他们信奉伊斯兰教。马来人以热情好客、伊斯兰传统以及对艺术的贡献而闻名，特别是在武术（如“silat”）和传统马来服饰方面。\r\n\r\n华人社区由福建话、客家话、潮州话和福州话方言群体组成，深度参与贸易、商业和教育。其文化遗产在砂拉越的众多华人寺庙、宗亲会和节庆活动中得以体现，如春节和中元节（饿鬼节）。\r\n\r\n### 文化和谐\r\n砂拉越的最大优势在于其能够保持不同族群之间的和谐。族际婚姻很常见，多种族家庭已成为常态。学校的孩子们从小就学习多种语言，包括马来语、英语、普通话和本地方言。像达雅丰收节、哈芝节和春节这样的州假日，所有社区都会庆祝，而不仅仅是与这些传统相关的族群。\r\n\r\n在其他地方身份政治挑战着团结的时代，砂拉越成为了多元文化共存的典范。从伊班族的鲜艳服饰到肯雅族的萨佩旋律，砂拉越的各族群确保了传统和多样性共同繁荣。\r\n\r\n通过了解这些族群，我们不仅能更好地理解砂拉越，还能欣赏到构成这个马来西亚州独特性的令人惊叹的人类文化织锦。'),
(2, 'food.jpg', 'food', 'Traditional Food of Sarawak', 'Makanan Tradisional Sarawak', '砂拉越传统美食', 'Sarawak, the largest state in Malaysia located on the island of Borneo, is not only culturally diverse but also rich in culinary heritage. Traditional Sarawakian cuisine reflects a fusion of indigenous and external influences, resulting in a tapestry of flavors and textures unique to the region. From spicy noodle soups to exotic salads and traditional bamboo-cooked dishes, Sarawak’s food is deeply connected to its ethnic traditions and natural environment.\r\n\r\n### Laksa Sarawak\r\nPerhaps the most iconic dish from Sarawak, Laksa Sarawak is a spicy noodle soup with a fragrant coconut milk-based broth. It’s made with a paste of spices like galangal, lemongrass, dried chilies, and shrimp paste, giving it a deep and complex flavor. The dish is typically served with rice vermicelli noodles, shredded chicken, boiled prawns, omelette strips, bean sprouts, and topped with fresh coriander and lime.\r\n\r\nLaksa Sarawak is usually enjoyed for breakfast and is often found at hawker stalls and traditional markets. The flavor profile is a mix of tangy, spicy, and creamy — a combination that locals and tourists alike adore.\r\n\r\n### Kolo Mee\r\nKolo Mee is a dry noodle dish that originated from the Chinese communities in Sarawak but has become beloved by all ethnic groups. The noodles are springy and tossed in a light sauce made of shallot oil, vinegar, and soy sauce. It is served with minced pork, slices of barbecued meat (char siu), and garnished with spring onions.\r\n\r\nWhat makes Kolo Mee special is its simplicity and the balance of savory flavors. It’s eaten at all times of the day and is a must-try for visitors exploring Sarawakian cuisine.\r\n\r\n### Umai\r\nUmai is a raw fish salad that is a specialty of the Melanau people. Traditionally prepared by fishermen, the dish consists of thinly sliced fresh fish, usually mackerel or tenggiri, marinated in calamansi lime juice, chili, onion, and salt. The acidity from the lime \"cooks\" the fish slightly, creating a fresh and tangy flavor.\r\n\r\nOften served during the Kaul Festival, umai represents the Melanau’s deep connection to the sea and their reliance on fresh marine produce. It is commonly eaten as an appetizer or a light meal.\r\n\r\n### Manok Pansoh\r\nManok Pansoh, or bamboo chicken, is a traditional dish of the Iban and Bidayuh communities. Chicken is marinated with ginger, lemongrass, and tapioca leaves, then sealed inside a bamboo stalk and slow-cooked over an open fire. This method infuses the meat with the aroma of bamboo and keeps it tender and juicy.\r\n\r\nThis dish is often prepared during Gawai Dayak or other traditional ceremonies, as it requires time and effort to cook properly. It’s not just a meal, but a cultural experience that connects the cook to the land and its resources.\r\n\r\n### Kek Lapis Sarawak\r\nSarawak Layer Cake, or Kek Lapis Sarawak, is a colorful and intricate cake made with layers of flavored batter. Each layer is baked one at a time, resulting in a rich and dense cake with geometric or patterned designs. It’s made with butter, condensed milk, eggs, and food coloring.\r\n\r\nThis cake is popular during festivals like Hari Raya and Chinese New Year, often served to guests as a symbol of hospitality. The preparation requires precision, patience, and creativity, and many families take pride in making their own unique designs.\r\n\r\n### Daily Staples and Indigenous Ingredients\r\nBeyond iconic dishes, daily Sarawakian meals are often based on ingredients like tapioca, rice, wild ferns, and river fish. Indigenous communities such as the Orang Ulu use local jungle produce like bamboo shoots, paku (wild ferns), and tempoyak (fermented durian) in their cooking.\r\n\r\nSago, derived from the sago palm, is a staple among the Melanau people. It’s used to make linut, a gooey starch eaten with spicy sambal. Sago pearls are also used in desserts like bubur sagu, a sweet coconut milk porridge.\r\n\r\n### Cultural Importance of Food\r\nIn Sarawak, food plays a central role in cultural identity, social gatherings, and religious festivals. Food is not just sustenance, but a medium of expression and community bonding. Major life events such as weddings, harvest festivals, and funerals involve elaborate food preparation shared among families and neighbors.\r\n\r\nThe tradition of hosting open houses during festivals — where families welcome guests from all backgrounds — is a reflection of Sarawak’s multicultural hospitality. Each dish served during these occasions tells a story of heritage, survival, and celebration.\r\n\r\n### Modern Evolution and Global Influence\r\nToday, Sarawakian food is gaining global attention. Dishes like Laksa Sarawak and Kek Lapis are being exported and adapted in countries with Malaysian communities. Instant laksa pastes and packaged Kek Lapis are sold online, allowing people abroad to experience Sarawakian flavors.\r\n\r\nAt the same time, local chefs are modernizing traditional dishes, creating fusion menus that blend old and new. Restaurants in Kuching and Miri now offer elevated versions of Kolo Mee with duck, vegan Manok Pansoh, and even umai-inspired sushi.\r\n\r\n### Conclusion\r\nTraditional food in Sarawak is more than just nourishment. It is an expression of the land, the people, and their stories. From the communal spirit of cooking in bamboo to the colorful pride of layer cakes, every bite is a reminder of the harmony that defines Sarawak. Exploring its food is like traveling through its history, and for many, it becomes a memory worth sharing long after the meal ends.\r\n', 'Sarawak bukan sahaja kaya dengan budaya dan sejarah, tetapi juga terkenal dengan kepelbagaian makanan tradisionalnya. Makanan di Sarawak mencerminkan pelbagai pengaruh daripada kumpulan etnik seperti Iban, Bidayuh, Melanau, serta komuniti Melayu dan Cina. Setiap hidangan mempunyai kisah tersendiri dan diwarisi turun-temurun sebagai lambang identiti dan tradisi masyarakat.\r\n\r\n### Laksa Sarawak\r\nLaksa Sarawak merupakan antara makanan paling ikonik. Ia adalah sup mi yang berasaskan santan dan rempah khas, dihidangkan bersama telur dadar yang dihiris, ayam yang disiat halus, taugeh, daun ketumbar dan udang segar. Rasa kuahnya yang pekat dan pedas menjadikannya kegemaran ramai. Laksa ini bukan sahaja dijual di restoran tetapi juga di gerai-gerai kecil dan sering menjadi hidangan istimewa semasa majlis atau hari perayaan.\r\n\r\n### Kolo Mee\r\nKolo Mee ialah mi kering yang digaul dengan minyak bawang, daging cincang, hirisan char siu dan daun bawang. Hidangan ini berasal dari komuniti Cina di Sarawak tetapi telah menjadi kegemaran semua kaum. Kolo Mee dimakan sebagai sarapan atau makan tengah hari, dan keunikannya ialah ia tidak menggunakan sup seperti mee biasa, menjadikannya lebih ringan dan sesuai dimakan pada bila-bila masa.\r\n\r\n### Umai\r\nUmai merupakan hidangan tradisional masyarakat Melanau yang diperbuat daripada ikan mentah yang dihiris nipis, dicampur dengan jus limau, cili, bawang dan garam. Rasanya segar dan pedas, seakan-akan ceviche dari Amerika Latin. Umai biasanya dihidangkan semasa majlis tradisional seperti Pesta Kaul. Ia menggambarkan kepakaran masyarakat pesisir dalam menyediakan makanan laut yang segar dan lazat.\r\n\r\n### Manok Pansoh\r\nManok Pansoh ialah hidangan ayam yang dimasak di dalam buluh, berasal dari masyarakat Iban dan Bidayuh. Ayam yang diperap bersama halia, serai, daun ubi dan garam akan dimasukkan ke dalam buluh dan dibakar di atas bara api. Proses ini memberikan aroma semula jadi buluh yang menyerap ke dalam isi ayam, menjadikannya lembut dan beraroma. Hidangan ini biasanya disediakan semasa majlis keramaian atau perayaan.\r\n\r\n### Kek Lapis Sarawak\r\nKek Lapis Sarawak adalah kek berlapis yang terkenal dengan reka bentuk yang berwarna-warni dan rumit. Ia menjadi simbol kreativiti dan ketelitian. Kek ini diperbuat daripada campuran mentega, telur, susu pekat, dan perisa tambahan. Setiap lapisan dibakar satu per satu, menjadikannya proses yang mengambil masa dan memerlukan ketelitian. Kek lapis disajikan semasa musim perayaan seperti Hari Raya dan Tahun Baru Cina.\r\n\r\n### Makanan Harian dan Tradisi\r\nSelain hidangan utama, Sarawak juga mempunyai pelbagai makanan ringan seperti cucur, kuih-muih tradisional dan minuman herba. Ubi kayu, jagung, dan sagu merupakan bahan asas dalam banyak masakan. Masyarakat Bidayuh dan Orang Ulu turut menyediakan makanan tradisional menggunakan bahan liar seperti sayur paku dan ulam-ulaman hutan.\r\n\r\n### Pengaruh dan Kepelbagaian\r\nKeunikan makanan Sarawak terletak pada gabungan rasa, teknik memasak, dan bahan tempatan. Setiap etnik menyumbang kepada keunikan ini, dan walaupun ada perbezaan, hidangan tersebut dinikmati oleh semua kaum. Malah, makanan seperti Laksa Sarawak dan Kolo Mee telah menembusi pasaran antarabangsa dan dijual dalam bentuk segera atau sejuk beku.\r\n\r\n### Peranan Makanan dalam Budaya\r\nMakanan memainkan peranan penting dalam kehidupan sosial masyarakat Sarawak. Ia bukan sahaja menjadi santapan, tetapi juga sebagai simbol kasih sayang, persaudaraan dan kerjasama. Majlis keramaian seperti perkahwinan, perayaan dan kenduri arwah disatukan dengan hidangan yang disediakan bersama. Perkongsian makanan mencerminkan nilai kebersamaan dan saling menghormati antara kaum.\r\n\r\nSarawak, dengan keunikan rasa dan teknik masakan pelbagai kaum, menjadi lambang kepada kepelbagaian makanan Malaysia yang sebenar. Sama ada di gerai jalanan atau restoran mewah, makanan tradisional Sarawak sentiasa menggamit selera dan menggambarkan kekayaan budaya negeri ini.\r\n', '砂拉越是马来西亚面积最大的州属，位于婆罗洲岛，不仅文化多元，也拥有丰富的美食传统。砂拉越的传统料理融合了本地土著与外来文化的影响，造就出独具地方特色的风味与口感。从辛香浓郁的汤面到独特的沙拉和竹筒烹饪的传统菜肴，砂拉越的美食与其族群文化和自然环境紧密相连。\r\n\r\n### 砂拉越叻沙\r\n砂拉越叻沙可说是砂拉越最具代表性的美食。这道香辣汤面以椰奶为汤底，搭配多种香料如南姜、香茅、干辣椒和虾酱制成的调味酱，带有浓郁而复杂的风味。通常搭配米粉、鸡丝、煮虾、蛋丝、豆芽，并撒上香菜与青柠作为点缀。\r\n\r\n砂拉越叻沙通常作为早餐享用，常见于小贩摊位和传统市集。其风味融合了酸、辣与浓郁的奶香，深受本地人和游客的喜爱。\r\n\r\n### 哥罗面\r\n哥罗面是一道源自砂拉越华人社区的干捞面，但如今已广受各族群的喜爱。面条口感爽弹，拌上由葱油、醋和酱油调制的清淡酱汁，配上碎猪肉、叉烧片，并撒上葱花作为点缀。\r\n\r\n哥罗面的特别之处在于它的简约和咸香味道的平衡。无论早午晚，人们都喜欢品尝这道面食，对探索砂拉越美食的游客来说更是必试之选。\r\n\r\n### 乌麦\r\n乌麦是马兰诺族的特色生鱼沙拉，传统上由渔民制作。这道菜以新鲜的鱼肉（通常是鲭鱼或马鲛鱼）切成薄片，再用酸柑汁、辣椒、洋葱和盐腌制。柑橘的酸性会轻微“熟化”鱼肉，带来清新酸爽的风味。\r\n\r\n乌麦常在卡乌节期间供应，象征着马兰诺族与大海之间深厚的联系，以及他们对海产资源的依赖。这道料理通常作为开胃菜或清淡主食享用。\r\n\r\n### 竹筒鸡\r\n竹筒鸡是伊班族和比达友族的传统美食。鸡肉以姜、香茅和木薯叶腌制后，封入竹筒中，再以明火慢慢烹煮。这种烹调方式让鸡肉吸收竹子的清香，同时保持鲜嫩多汁的口感。\r\n\r\n这道菜常在达雅节（Gawai Dayak）或其他传统仪式上烹制，因为它需要时间与心力才能煮得恰到好处。它不仅是一道美食，更是一种文化体验，展现了人与土地及其资源之间的深厚连结。\r\n\r\n### 砂拉越千层蛋糕\r\n砂拉越千层蛋糕是一种色彩缤纷、制作精致的蛋糕，由多层不同口味的面糊逐层烘焙而成。这种蛋糕质地浓郁紧实，通常呈现几何图案或花纹设计。其主要材料包括牛油、炼乳、鸡蛋和食用色素。\r\n\r\n这款蛋糕在节庆期间非常受欢迎，如开斋节和农历新年，常作为招待客人的象征，传递着热情好客的精神。制作这款蛋糕需要精确、耐心和创造力，许多家庭以制作自己独特的设计为荣。\r\n\r\n### 日常主食与本土食材\r\n除了标志性菜肴，砂拉越的日常餐点通常以木薯、米饭、野生蕨菜和河鱼为主食材。像是Orang Ulu（上游人）等本土社区，常用当地的丛林食材如竹笋、paku（野生蕨菜）和tempoyak（发酵榴莲）进行烹饪。\r\n\r\n木薯（Sago），来源于木薯棕，是梅兰诺族的主食之一。它常被用来制作linut，一种带有粘性的淀粉，与辛辣的 sambal一起食用。木薯珍珠也常用于甜点，如bubur sagu（一种甜椰奶粥）。\r\n\r\n### 食物的文化重要性\r\n在砂拉越，食物在文化认同、社交聚会和宗教节庆中扮演着核心角色。食物不仅是生存的基础，更是表达情感和促进社区团结的媒介。婚礼、丰收节和葬礼等重大生活事件中，通常需要精心准备食物，供家庭和邻里共享。\r\n\r\n在节庆期间举办“开门宴”的传统——家庭欢迎来自不同背景的宾客——反映了砂拉越的多元文化待客之道。每一道在这些场合上供应的菜肴，都讲述着遗产、求生与庆祝的故事。\r\n\r\n### 现代演变与全球影响\r\n如今，砂拉越美食正逐渐获得全球的关注。像是砂拉越叻沙和千层蛋糕等菜肴，已被出口并在有马来西亚社区的国家中进行本地化改造。即食叻沙酱料和包装好的千层蛋糕也在线上销售，让海外人士也能体验砂拉越的风味。\r\n\r\n与此同时，当地厨师正在将传统菜肴进行现代化改造，创作出融合传统与创新的菜单。如今，古晋和美里的一些餐厅提供了改良版的哥罗面，加入了鸭肉、素食竹筒鸡，甚至还有受乌麦启发的寿司。\r\n\r\n### 结论\r\n砂拉越的传统美食不仅仅是滋养身体的食物，更是土地、人们及其故事的体现。从竹筒烹饪的共融精神到千层蛋糕的色彩自豪，每一口都提醒着我们砂拉越所定义的和谐。探索这里的美食就像是在穿越历史，对许多人来说，它成为了一段值得在餐后长久回味并分享的记忆。'),
(3, 'festival.jpeg', 'festival', 'Sarawak Cultural Festivals', 'Perayaan Budaya Sarawak', '砂拉越文化节日', 'Sarawak, Malaysia’s largest state, is known for its cultural diversity, and this is vividly expressed through the numerous festivals celebrated throughout the year. These festivals represent the spiritual, agricultural, and communal lives of Sarawak’s many ethnic groups, including the Iban, Bidayuh, Melanau, Malay, and Chinese communities. Cultural festivals in Sarawak go beyond ethnicity — they are shared, enjoyed, and respected across all races, showcasing true Malaysian unity.\r\n\r\n### Gawai Dayak\r\nGawai Dayak is the most significant festival among the Iban and Bidayuh people. Celebrated on June 1st, it marks the end of the harvest season and the beginning of a new farming cycle. The celebration begins on the evening of May 31st with the miring ceremony, where offerings are made to ancestral spirits to thank them for the harvest.\r\n\r\nTraditional costumes, dance performances (notably the Ngajat), and music using gongs and drums are essential to the celebration. Families prepare traditional dishes like Manok Pansoh and tuak (rice wine), and the longhouse becomes the center of activity, where guests are welcomed with open arms. Gawai is not only a cultural celebration but also a time for homecoming and community bonding.\r\n\r\n### Hari Raya Aidilfitri\r\nFor the Malay community, Hari Raya Aidilfitri is a time of spiritual renewal and forgiveness. After a month of fasting during Ramadan, Muslims celebrate with special prayers and family gatherings. Sarawak’s version of Hari Raya is notable for its inter-ethnic participation — it’s common to see people from all races visiting Malay friends during open houses.\r\n\r\nHomes are decorated, traditional outfits are worn, and food such as rendang, lemang, satay, and Kek Lapis Sarawak is served. It’s a festival that brings together neighbors, friends, and strangers alike under the banner of goodwill.\r\n\r\n### Chinese New Year\r\nCelebrated by the Chinese community, Chinese New Year in Sarawak is marked by lion dances, fireworks, and family reunion dinners. Preparations begin weeks in advance, with homes cleaned, decorated with red lanterns, and stocked with special food items.\r\n\r\nChildren receive angpau (red envelopes with money), and mandarin oranges are exchanged as symbols of prosperity. During the festival, temples are visited, prayers are offered, and homes are open to friends of all backgrounds. It is not unusual for Iban, Malay, or Melanau neighbors to attend and enjoy the festivities.\r\n\r\n### Kaul Festival\r\nThe Kaul Festival is a traditional Melanau event held to appease the spirits of the sea and forest. It usually takes place in April at the mouth of the Mukah River. Traditionally, the festival was a form of spiritual cleansing, involving the construction of tall wooden structures known as \"seraheng,\" offerings to spirits, and blessings for health and safety.\r\n\r\nToday, Kaul has evolved into a cultural festival featuring boat races, traditional games, music performances, and food stalls. It remains a vital part of Melanau identity and draws visitors from around the country.\r\n\r\n### Rainforest World Music Festival\r\nThough not traditional, the Rainforest World Music Festival has become one of Sarawak’s most recognized international cultural events. Held annually in Kuching, it brings together musicians from around the world, along with indigenous performers from Sarawak, to celebrate music and cultural exchange in a lush rainforest setting.\r\n\r\nWorkshops, jam sessions, and night concerts promote appreciation for traditional instruments like the sape and gendang. It is an example of how modern celebrations can coexist with traditional values.\r\n\r\n### Unity Through Celebration\r\nWhat makes Sarawak’s festivals truly special is the spirit of unity. Every celebration — regardless of religion or ethnicity — is shared and embraced by the broader community. Schools, offices, and public spaces reflect this multiculturalism by organizing events and encouraging participation from all.\r\n\r\nFestivals are not just about food and performances; they are about stories, ancestors, blessings, and belonging. In Sarawak, these moments foster mutual respect and harmony, making the state a model of peaceful diversity.\r\n\r\nAs visitors walk through the streets of Kuching during Gawai, or share Kek Lapis during Hari Raya, or watch lion dancers during Chinese New Year, they are not just witnesses — they become part of a living culture that continues to evolve with joy, music, and unity.\r\n', 'Sarawak terkenal sebagai negeri yang penuh dengan kepelbagaian budaya, dan ini diraikan melalui pelbagai perayaan yang unik sepanjang tahun. Setiap kaum mempunyai sambutan tradisi tersendiri yang mencerminkan warisan, kepercayaan dan gaya hidup mereka. Daripada Gawai Dayak kepada Tahun Baru Cina, perayaan di Sarawak bukan sahaja diraikan oleh kaum yang terlibat tetapi turut disambut bersama oleh semua masyarakat.\r\n\r\n### Gawai Dayak\r\nGawai Dayak disambut oleh masyarakat Iban dan Bidayuh pada 1 Jun setiap tahun sebagai tanda kesyukuran atas hasil tuaian. Sambutan ini bermula sejak tahun 1965 dan menjadi hari kebesaran yang disambut secara besar-besaran. Majlis dimulakan dengan upacara miring untuk memohon keberkatan. Pakaian tradisional seperti \'ngajat\', tarian perang, dan persembahan muzik menjadi tumpuan. Makanan seperti manok pansoh dan tuak (arak beras) turut disediakan.\r\n\r\nRumah panjang menjadi pusat sambutan di mana keluarga dan tetamu berkumpul untuk makan, menari dan bergembira bersama. Gawai turut menjadi peluang untuk anak muda memahami adat resam nenek moyang mereka.\r\n\r\n### Hari Raya Aidilfitri\r\nHari Raya Aidilfitri diraikan oleh masyarakat Melayu selepas sebulan berpuasa di bulan Ramadan. Sambutan dimulakan dengan solat sunat Aidilfitri, diikuti dengan ziarah ke rumah saudara dan jiran. Rumah terbuka menjadi tradisi penting di mana pelbagai kaum dijemput untuk menjamu makanan seperti ketupat, rendang, dan kek lapis Sarawak.\r\n\r\nDi Sarawak, semangat perpaduan sangat ketara kerana rakan-rakan dari pelbagai latar belakang turut sama-sama meraikan Aidilfitri, menjadikannya simbol keharmonian antara kaum.\r\n\r\n### Tahun Baru Cina\r\nTahun Baru Cina disambut oleh masyarakat Cina sebagai tanda permulaan tahun baharu mengikut kalendar lunar. Sambutan dimulakan dengan membersihkan rumah, menghias dengan tanglung merah dan menyediakan makanan istimewa. Majlis makan malam keluarga besar diadakan pada malam sebelum tahun baru.\r\n\r\nDi Sarawak, perayaan ini dimeriahkan dengan tarian singa dan naga, pertunjukan mercun dan pemberian angpau. Kaum lain turut diundang ke rumah terbuka, menjadikannya satu lagi contoh perpaduan masyarakat Sarawak.\r\n\r\n### Pesta Kaul\r\nPesta Kaul merupakan perayaan masyarakat Melanau di kawasan pesisir seperti Mukah. Ia diadakan bagi memohon kesejahteraan dan perlindungan daripada semangat laut. Perayaan ini melibatkan upacara tradisional, permainan pantai, dan perarakan bot berhias. Simbol utama ialah menara seraheng yang dihiasi dengan pelbagai persembahan.\r\n\r\nPesta Kaul merupakan kombinasi elemen keagamaan, sosial dan budaya yang unik. Ia bukan sahaja menarik pelancong tetapi juga menjadi kebanggaan masyarakat Melanau.\r\n\r\n### Festival Antarabangsa Rainforest World Music\r\nFestival ini diadakan setiap tahun di Kuching dan menghimpunkan pemuzik dari seluruh dunia termasuk kumpulan tempatan dari etnik Sarawak. Ia bertujuan memelihara dan memperkenalkan muzik tradisional kepada generasi muda dan pelawat antarabangsa.\r\n\r\n### Perpaduan Melalui Perayaan\r\nApa yang membezakan Sarawak daripada negeri lain ialah bagaimana masyarakatnya menyambut perayaan tanpa mengira agama atau kaum. Setiap sambutan menjadi peluang untuk saling mengenali, merapatkan hubungan dan mengukuhkan semangat kekitaan.\r\n\r\nMelalui perayaan budaya ini, Sarawak bukan sahaja meraikan warisan unik setiap kaum, tetapi juga menunjukkan kepada dunia bahawa kepelbagaian adalah satu kekuatan.\r\n', '砂拉越是马来西亚最大的州属，以其文化多样性而闻名，这种多样性通过一年四季庆祝的众多节日得到了生动的表达。这些节日代表了砂拉越众多族群的精神、农业和社区生活，包括伊班族、比达友族、马兰诺族、马来族和华人社区。砂拉越的文化节庆超越了族群界限——它们被所有种族共同庆祝、享受并尊重，展现了真正的马来西亚团结。\r\n\r\n### 达雅丰收节\r\n达雅丰收节是伊班族和比达友族最重要的节日。每年6月1日庆祝，标志着丰收季节的结束和新一轮农耕周期的开始。庆祝活动从5月31日晚上开始，举行“miring”仪式，向祖先的灵魂献上供品，感谢他们的庇佑与丰收。\r\n\r\n传统服饰、舞蹈表演（特别是Ngajat舞蹈）以及使用锣鼓的音乐是庆祝活动的重要组成部分。家庭准备传统菜肴，如Manok Pansoh（竹筒鸡）和tuak（米酒），长屋成为活动的中心，客人们受到热情的欢迎。达雅丰收节不仅是一个文化庆典，也是一个归乡团聚、加深社区联系的时刻。\r\n\r\n### 开斋节\r\n对于马来族群来说，开斋节是一个精神更新和宽恕的时刻。在经历了一个月的斋月禁食后，穆斯林通过特别的祷告和家庭聚会来庆祝这一节日。砂拉越的开斋节特别之处在于它的跨族群参与——人们通常会看到来自各个种族的人在开放的家宴中拜访马来朋友。\r\n\r\n家家户户装饰一新，大家穿上传统服饰，餐桌上摆满了如仁当（rendang）、棕叶饭（lemang）、沙爹（satay）和砂拉越千层蛋糕（Kek Lapis Sarawak）等美食。这是一个将邻里、朋友和陌生人聚集在一起，传递善意的节日。\r\n\r\n### 农历新年\r\n农历新年是华人社区庆祝的重要节日，砂拉越的春节以舞狮、烟花和家庭团圆饭为特色。庆祝活动通常提前几周开始准备，家中会进行大扫除，装饰上红色灯笼，并储备各种特殊的食物。\r\n\r\n孩子们会收到红包（angpau），亲友之间则互赠柑橘，象征吉祥与繁荣。节日期间，人们会前往庙宇参拜祈福，家门也向各族朋友敞开。伊班、马来或马兰诺族邻居前来拜年、共庆佳节的场景在砂拉越早已司空见惯。\r\n\r\n### 卡乌节\r\n卡乌节是马兰诺族传统的节日，旨在安抚海洋与森林的灵魂。节日通常在四月，于沐胶河口举行。传统上，卡乌节是一种精神净化仪式，包括建造高大的木制结构“seraheng”、向灵体献上供品，以及祈求健康与平安的祝福仪式。\r\n\r\n如今，卡乌节已发展成为一个文化节庆，包含赛船、传统游戏、音乐表演和美食摊位。它依然是马兰诺族身份的重要象征，并吸引来自全国各地的游客前来参与。\r\n\r\n### 雨林世界音乐节\r\n虽然并非传统节日，雨林世界音乐节却已成为砂拉越最具国际知名度的文化活动之一。该节庆每年在古晋举办，汇聚来自世界各地的音乐人以及砂拉越的本土表演者，在郁郁葱葱的雨林环境中共同庆祝音乐与文化交流。\r\n\r\n工作坊、即兴演奏会和夜间音乐会让人们更加欣赏传统乐器，如sape和gendang。这展现了现代庆典如何与传统价值观和谐共存的典范。\r\n\r\n### 通过庆典实现团结\r\n砂拉越节日真正特别之处在于其团结精神。每一个庆典——无论宗教或族群——都被整个社区共同庆祝与接纳。学校、办公室和公共场所通过举办各种活动并鼓励所有人参与，展现出这种多元文化的精神。\r\n\r\n节日不仅仅是关于美食和表演，更关乎故事、祖先、祝福与归属感。在砂拉越，这些时刻促进了彼此间的尊重与和谐，使这个州成为多元和平共处的典范。\r\n\r\n当游客在达雅节期间漫步古晋街头，或在开斋节期间分享砂拉越千层蛋糕，又或在农历新年欣赏舞狮表演时，他们不仅是见证者——而是成为了一个充满欢乐、音乐与团结的活文化的一部分，这种文化正不断发展、延续。');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_history`
--

CREATE TABLE `quiz_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `taken_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) DEFAULT NULL,
  `option_b` varchar(255) DEFAULT NULL,
  `option_c` varchar(255) DEFAULT NULL,
  `option_d` varchar(255) DEFAULT NULL,
  `correct_option` char(1) DEFAULT NULL,
  `question_my` text DEFAULT NULL,
  `option_a_my` varchar(255) DEFAULT NULL,
  `option_b_my` varchar(255) DEFAULT NULL,
  `option_c_my` varchar(255) DEFAULT NULL,
  `option_d_my` varchar(255) DEFAULT NULL,
  `question_zh` text DEFAULT NULL,
  `option_a_zh` varchar(255) DEFAULT NULL,
  `option_b_zh` varchar(255) DEFAULT NULL,
  `option_c_zh` varchar(255) DEFAULT NULL,
  `option_d_zh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `article_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `question_my`, `option_a_my`, `option_b_my`, `option_c_my`, `option_d_my`, `question_zh`, `option_a_zh`, `option_b_zh`, `option_c_zh`, `option_d_zh`) VALUES
(31, 1, 'Which is the largest indigenous ethnic group in Sarawak?', 'Melanau', 'Iban', 'Kayan', 'Malay', 'B', 'Apakah kumpulan etnik pribumi terbesar di Sarawak?', 'Melanau', 'Iban', 'Kayan', 'Melayu', NULL, NULL, NULL, NULL, NULL),
(32, 1, 'What is a longhouse commonly used for?', 'Animal farming', 'Fishing', 'Communal living', 'Religious ceremonies', 'C', 'Apakah kegunaan utama rumah panjang?', 'Penternakan haiwan', 'Menangkap ikan', 'Kehidupan komuniti', 'Upacara keagamaan', NULL, NULL, NULL, NULL, NULL),
(33, 1, 'What musical instrument is iconic to the Orang Ulu?', 'Gamelan', 'Sape', 'Rebana', 'Violin', 'B', 'Apakah alat muzik ikonik bagi Orang Ulu?', 'Gamelan', 'Sape', 'Rebana', 'Biola', NULL, NULL, NULL, NULL, NULL),
(34, 1, 'Which ethnic group celebrates the Kaul Festival?', 'Bidayuh', 'Iban', 'Melanau', 'Orang Ulu', 'C', 'Kaum manakah yang menyambut Pesta Kaul?', 'Bidayuh', 'Iban', 'Melanau', 'Orang Ulu', NULL, NULL, NULL, NULL, NULL),
(35, 1, 'Which term refers to “upriver people”?', 'Orang Laut', 'Orang Hulu', 'Orang Ulu', 'Orang Kota', 'C', 'Istilah manakah yang merujuk kepada “orang hulu”?', 'Orang Laut', 'Orang Hulu', 'Orang Ulu', 'Orang Bandar', NULL, NULL, NULL, NULL, NULL),
(36, 2, 'What is the main ingredient in Laksa Sarawak\'s broth?', 'Clear soy broth', 'Tomato sauce', 'Coconut milk and spices', 'Fish sauce', 'C', 'Apakah bahan utama dalam kuah Laksa Sarawak?', 'Kuah kicap jernih', 'Sos tomato', 'Santan dan rempah', 'Sos ikan', NULL, NULL, NULL, NULL, NULL),
(37, 2, 'Which ethnic group is known for Umai?', 'Melanau', 'Bidayuh', 'Iban', 'Malay', 'A', 'Kaum manakah yang terkenal dengan Umai?', 'Melanau', 'Bidayuh', 'Iban', 'Melayu', NULL, NULL, NULL, NULL, NULL),
(38, 2, 'How is Manok Pansoh traditionally cooked?', 'Fried in oil', 'Boiled in soup', 'Roasted in oven', 'Cooked in bamboo', 'D', 'Bagaimanakah Manok Pansoh dimasak secara tradisional?', 'Goreng dengan minyak', 'Direbus dalam sup', 'Dibakar dalam ketuhar', 'Dimasak dalam buluh', NULL, NULL, NULL, NULL, NULL),
(39, 2, 'What makes Kolo Mee unique?', 'It is served with soup', 'It is sweet', 'It is dry and tossed in shallot oil', 'It is spicy', 'C', 'Apa yang membuatkan Kolo Mee istimewa?', 'Ia dihidangkan dengan sup', 'Ia manis', 'Ia kering dan digaul dengan minyak bawang', 'Ia pedas', NULL, NULL, NULL, NULL, NULL),
(40, 2, 'What dessert is Sarawak famous for during festivals?', 'Kuih Lapis', 'Kek Lapis Sarawak', 'Lempeng', 'Dodol', 'B', 'Apakah pencuci mulut Sarawak yang terkenal ketika perayaan?', 'Kuih Lapis', 'Kek Lapis Sarawak', 'Lempeng', 'Dodol', NULL, NULL, NULL, NULL, NULL),
(41, 3, 'When is Gawai Dayak celebrated?', '1 July', '1 May', '1 June', '31 August', 'C', 'Bilakah Gawai Dayak disambut?', '1 Julai', '1 Mei', '1 Jun', '31 Ogos', NULL, NULL, NULL, NULL, NULL),
(42, 3, 'Which ethnic group primarily celebrates Kaul Festival?', 'Iban', 'Melanau', 'Malay', 'Chinese', 'B', 'Kaum manakah yang meraikan Pesta Kaul?', 'Iban', 'Melanau', 'Melayu', 'Cina', NULL, NULL, NULL, NULL, NULL),
(43, 3, 'Which musical instrument is commonly played during Gawai?', 'Angklung', 'Sape', 'Gong', 'Flute', 'C', 'Apakah alat muzik yang sering dimainkan semasa Gawai?', 'Angklung', 'Sape', 'Gong', 'Seruling', NULL, NULL, NULL, NULL, NULL),
(44, 3, 'What is a common practice during Chinese New Year in Sarawak?', 'Fasting', 'Lion Dance', 'Breaking fast', 'Miring ritual', 'B', 'Apakah amalan biasa semasa Tahun Baru Cina di Sarawak?', 'Berpuasa', 'Tarian Singa', 'Berbuka puasa', 'Upacara miring', NULL, NULL, NULL, NULL, NULL),
(45, 3, 'What makes Sarawak’s cultural festivals unique?', 'They are celebrated by one ethnic group only', 'They are not religious', 'They are shared across communities', 'They are mandatory by law', 'C', 'Apa yang menjadikan perayaan budaya Sarawak unik?', 'Hanya disambut satu kaum', 'Tidak bersifat keagamaan', 'Disambut bersama semua kaum', 'Diwajibkan oleh undang-undang', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reading_history`
--

CREATE TABLE `reading_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `viewed_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(5, 'admin', 'admin@example.com', '$2y$10$PQeRvS3MtOJ3A5YDpcYPIuVn26U.a/6Ca3piYXzC.7A8SMdEALIwe'),
(7, 'Nurul', 'd4d4k27@gmail.com', '$2y$10$LQD3RWnFyQ0rhWJbLpAjfONv5gTxn5q19yV1n9rPnDuQbcCbadhpu'),
(8, 'imuimu', 'imut00@gmail.com', '$2y$10$wkuL7tWyLKZL1anBriLEOOSleO3OVvpfE0fomTtNbYNrxtTKKKErS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_history`
--
ALTER TABLE `quiz_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `reading_history`
--
ALTER TABLE `reading_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quiz_history`
--
ALTER TABLE `quiz_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `reading_history`
--
ALTER TABLE `reading_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz_history`
--
ALTER TABLE `quiz_history`
  ADD CONSTRAINT `quiz_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `quiz_history_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Constraints for table `reading_history`
--
ALTER TABLE `reading_history`
  ADD CONSTRAINT `reading_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reading_history_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
