-- Chèn danh mục cha vào bảng categories
INSERT INTO categories (name, description) VALUES
('Văn Học', 'Sách văn học bao gồm các thể loại như tiểu thuyết, truyện ngắn, thơ, và các tác phẩm văn học cổ điển.'),
('Khoa Học và Kỹ Thuật', 'Sách về các lĩnh vực khoa học tự nhiên, kỹ thuật, công nghệ và y học.'),
('Lịch Sử', 'Sách về lịch sử thế giới, lịch sử Việt Nam và các nghiên cứu lịch sử khác.'),
('Thiếu Nhi', 'Sách dành cho trẻ em, bao gồm truyện thiếu nhi và sách giáo khoa.'),
('Kinh Tế', 'Sách về quản trị kinh doanh, tài chính, marketing và khởi nghiệp.'),
('Tâm Lý và Triết Học', 'Sách về tâm lý học, triết học và phát triển bản thân.'),
('Sức Khỏe và Làm Đẹp', 'Sách về sức khỏe, dinh dưỡng, làm đẹp và chăm sóc cơ thể.'),
('Tôn Giáo và Tâm Linh', 'Sách về tôn giáo, tâm linh và các nghiên cứu về niềm tin.'),
('Kỹ Năng Sống', 'Sách về kỹ năng sống, giao tiếp, lãnh đạo và phát triển cá nhân.'),
('Văn Hóa và Nghệ Thuật', 'Sách về văn hóa, nghệ thuật, âm nhạc, điện ảnh và các hình thức nghệ thuật khác.'),
('Truyện Tranh', 'Sách truyện tranh bao gồm manga, comic, manhua, manhwa và truyện tranh Việt Nam.'),
('Ẩm Thực', 'Sách về ẩm thực, nấu ăn, đồ uống, làm bánh và dinh dưỡng.'),
('Thể Thao', 'Sách về các môn thể thao như bóng đá, bóng rổ, cầu lông, bơi lội và các hoạt động thể dục thể thao khác.');

-- Thiết lập các biến ID cho danh mục cha
SET @van_hoc_id = (SELECT id FROM categories WHERE name = 'Văn Học');
SET @khoa_hoc_ky_thuat_id = (SELECT id FROM categories WHERE name = 'Khoa Học và Kỹ Thuật');
SET @lich_su_id = (SELECT id FROM categories WHERE name = 'Lịch Sử');
SET @thieu_nhi_id = (SELECT id FROM categories WHERE name = 'Thiếu Nhi');
SET @kinh_te_id = (SELECT id FROM categories WHERE name = 'Kinh Tế');
SET @tam_ly_triet_hoc_id = (SELECT id FROM categories WHERE name = 'Tâm Lý và Triết Học');
SET @suc_khoe_lam_dep_id = (SELECT id FROM categories WHERE name = 'Sức Khỏe và Làm Đẹp');
SET @ton_giao_tam_linh_id = (SELECT id FROM categories WHERE name = 'Tôn Giáo và Tâm Linh');
SET @ky_nang_song_id = (SELECT id FROM categories WHERE name = 'Kỹ Năng Sống');
SET @van_hoa_nghe_thuat_id = (SELECT id FROM categories WHERE name = 'Văn Hóa và Nghệ Thuật');
SET @truyen_tranh_id = (SELECT id FROM categories WHERE name = 'Truyện Tranh');
SET @am_thuc_id = (SELECT id FROM categories WHERE name = 'Ẩm Thực');
SET @the_thao_id = (SELECT id FROM categories WHERE name = 'Thể Thao');

-- Chèn danh mục con vào bảng categories

-- Truyện Tranh
INSERT INTO categories (name, description, parent_id) VALUES
('Manga', 'Sách manga, một loại truyện tranh có nguồn gốc từ Nhật Bản.', @truyen_tranh_id),
('Comic', 'Sách comic, truyện tranh phương Tây thường có ảnh hưởng từ văn hóa Mỹ.', @truyen_tranh_id),
('Truyện Tranh Việt Nam', 'Sách truyện tranh sản xuất tại Việt Nam.', @truyen_tranh_id),
('Truyện Tranh Nước Ngoài', 'Sách truyện tranh từ các quốc gia khác ngoài Việt Nam.', @truyen_tranh_id),
('Manhua', 'Sách manhua, truyện tranh có nguồn gốc từ Trung Quốc.', @truyen_tranh_id),
('Manhwa', 'Sách manhwa, truyện tranh có nguồn gốc từ Hàn Quốc.', @truyen_tranh_id),

-- Ẩm Thực
('Nấu Ăn', 'Sách hướng dẫn nấu ăn với các công thức món ăn đa dạng.', @am_thuc_id),
('Đồ Uống', 'Sách về các loại đồ uống, bao gồm cocktail, trà, cà phê, và nước ép.', @am_thuc_id),
('Làm Bánh', 'Sách hướng dẫn làm bánh, từ các loại bánh ngọt đến bánh mặn.', @am_thuc_id),
('Thực Đơn', 'Sách về thiết kế thực đơn cho các bữa ăn và sự kiện.', @am_thuc_id),
('Dinh Dưỡng', 'Sách về dinh dưỡng, chế độ ăn uống lành mạnh và quản lý cân nặng.', @am_thuc_id),

-- Thể Thao
('Bóng Đá', 'Sách về bóng đá, bao gồm kỹ thuật, chiến thuật và lịch sử.', @the_thao_id),
('Bóng Rổ', 'Sách về bóng rổ, từ các kỹ năng cơ bản đến chiến thuật chuyên sâu.', @the_thao_id),
('Cầu Lông', 'Sách về cầu lông, kỹ thuật chơi và chiến thuật.', @the_thao_id),
('Bơi Lội', 'Sách về bơi lội, kỹ thuật bơi và các bài tập luyện tập.', @the_thao_id),
('Thể Hình', 'Sách về tập luyện thể hình, bodybuilding và sức mạnh.', @the_thao_id),
('Yoga', 'Sách về yoga, các tư thế yoga và phương pháp thư giãn.', @the_thao_id),
('Du Lịch', 'Sách về du lịch kết hợp với thể thao và hoạt động ngoài trời.', @the_thao_id),
('Thể Thao Khác', 'Sách về các môn thể thao khác không được liệt kê ở trên.', @the_thao_id),

-- Văn Học
('Tiểu Thuyết', 'Sách tiểu thuyết với các thể loại như hiện thực, lịch sử, và giả tưởng.', @van_hoc_id),
('Truyện Ngắn', 'Sách truyện ngắn, bao gồm các tác phẩm ngắn gọn và sâu lắng.', @van_hoc_id),
('Thơ', 'Sách thơ với các thể loại như thơ tự do, thơ lục bát, và thơ tứ tuyệt.', @van_hoc_id),
('Văn Học Kinh Điển', 'Sách văn học kinh điển từ các tác giả nổi tiếng của nhiều quốc gia.', @van_hoc_id),
('Kinh Dị', 'Sách kinh dị, bao gồm các tác phẩm gây sợ hãi và hồi hộp.', @van_hoc_id),
('Ngôn Tình', 'Sách ngôn tình, truyện tình yêu lãng mạn và cảm động.', @van_hoc_id),
('Lãng Mạn', 'Sách lãng mạn, không chỉ về tình yêu mà còn về các mối quan hệ nhân văn khác.', @van_hoc_id),
('Huyền Bí', 'Sách huyền bí với các yếu tố siêu nhiên và bí ẩn.', @van_hoc_id),
('Hài Hước', 'Sách hài hước, gồm các tác phẩm mang tính giải trí và vui nhộn.', @van_hoc_id),
('Phiêu Lưu', 'Sách phiêu lưu, các cuộc hành trình và mạo hiểm hấp dẫn.', @van_hoc_id),
('Tâm Lý', 'Sách tâm lý, nghiên cứu về các khía cạnh tâm lý và cảm xúc của con người.', @van_hoc_id),

-- Khoa Học và Kỹ Thuật
('Khoa Học Tự Nhiên', 'Sách về khoa học tự nhiên bao gồm vật lý, hóa học, sinh học và thiên văn học.', @khoa_hoc_ky_thuat_id),
('Kỹ Thuật', 'Sách về các lĩnh vực kỹ thuật như cơ khí, điện tử và kỹ thuật xây dựng.', @khoa_hoc_ky_thuat_id),
('Công Nghệ Thông Tin', 'Sách về công nghệ thông tin, lập trình, và các hệ thống máy tính.', @khoa_hoc_ky_thuat_id),
('Y Học', 'Sách về y học, bao gồm y học cơ bản, lâm sàng và các nghiên cứu y khoa.', @khoa_hoc_ky_thuat_id),

-- Lịch Sử
('Lịch Sử Thế Giới', 'Sách về lịch sử toàn cầu, các sự kiện và giai đoạn quan trọng.', @lich_su_id),
('Lịch Sử Việt Nam', 'Sách về lịch sử Việt Nam, các triều đại, sự kiện và nhân vật lịch sử.', @lich_su_id),

-- Thiếu Nhi
('Truyện Thiếu Nhi', 'Sách truyện dành cho trẻ em, bao gồm các câu chuyện giáo dục và giải trí.', @thieu_nhi_id),
('Sách Giáo Khoa', 'Sách giáo khoa cho các cấp học, từ tiểu học đến trung học.', @thieu_nhi_id),

-- Kinh Tế
('Quản Trị Kinh Doanh', 'Sách về quản trị kinh doanh, lãnh đạo và chiến lược doanh nghiệp.', @kinh_te_id),
('Tài Chính', 'Sách về tài chính, đầu tư, và quản lý tài sản.', @kinh_te_id),
('Marketing', 'Sách về marketing, quảng cáo và truyền thông tiếp thị.', @kinh_te_id),
('Khởi Nghiệp', 'Sách về khởi nghiệp, từ ý tưởng đến thực hiện và phát triển doanh nghiệp.', @kinh_te_id),

-- Tâm Lý và Triết Học
('Tâm Lý Học', 'Sách về tâm lý học, nghiên cứu hành vi và cảm xúc của con người.', @tam_ly_triet_hoc_id),
('Triết Học', 'Sách về triết học, lý thuyết và các trường phái triết học khác nhau.', @tam_ly_triet_hoc_id),

-- Sức Khỏe và Làm Đẹp
('Sức Khỏe', 'Sách về sức khỏe, bệnh tật và các phương pháp phòng ngừa và điều trị.', @suc_khoe_lam_dep_id),
('Làm Đẹp', 'Sách về làm đẹp, chăm sóc da, tóc và các phương pháp làm đẹp khác.', @suc_khoe_lam_dep_id),

-- Tôn Giáo và Tâm Linh
('Tôn Giáo', 'Sách về các tôn giáo, giáo lý và thực hành tôn giáo.', @ton_giao_tam_linh_id),
('Tâm Linh', 'Sách về tâm linh, thiền định, và các phương pháp tìm hiểu về tinh thần.', @ton_giao_tam_linh_id),

-- Kỹ Năng Sống
('Phát Triển Bản Thân', 'Sách về phát triển bản thân, tự cải thiện và thành công cá nhân.', @ky_nang_song_id),
('Kỹ Năng Giao Tiếp', 'Sách về kỹ năng giao tiếp hiệu quả trong công việc và cuộc sống.', @ky_nang_song_id),
('Kỹ Năng Lãnh Đạo', 'Sách về lãnh đạo, quản lý đội nhóm và kỹ năng lãnh đạo.', @ky_nang_song_id),

-- Văn Hóa và Nghệ Thuật
('Nghệ Thuật', 'Sách về nghệ thuật, từ hội họa đến điêu khắc và các hình thức nghệ thuật khác.', @van_hoa_nghe_thuat_id),
('Văn Hóa', 'Sách về văn hóa, các phong tục tập quán và di sản văn hóa của các dân tộc.', @van_hoa_nghe_thuat_id),
('Âm Nhạc', 'Sách về âm nhạc, lý thuyết âm nhạc và các thể loại âm nhạc khác nhau.', @van_hoa_nghe_thuat_id),
('Phim Ảnh', 'Sách về phim ảnh, lịch sử điện ảnh, và phân tích phim.', @van_hoa_nghe_thuat_id);