-- Chèn danh mục cha
INSERT INTO categories (name, description) VALUES
('Văn Học', 'Sách văn học'),
('Khoa Học & Kỹ Thuật', 'Sách khoa học và kỹ thuật'),
('Lịch Sử', 'Sách lịch sử'),
('Thiếu Nhi', 'Sách thiếu nhi'),
('Kinh Tế', 'Sách kinh tế'),
('Tâm Lý & Triết Học', 'Sách tâm lý và triết học'),
('Sức Khỏe & Làm Đẹp', 'Sách sức khỏe và làm đẹp'),
('Tôn Giáo & Tâm Linh', 'Sách tôn giáo và tâm linh'),
('Kỹ Năng Sống', 'Sách kỹ năng sống'),
('Văn Hóa & Nghệ Thuật', 'Sách văn hóa và nghệ thuật');

-- Lấy ID của các danh mục cha và chèn danh mục con như hướng dẫn trên


-- Lấy ID của các danh mục cha
SET @van_hoc_id = (SELECT id FROM categories WHERE name = 'Văn Học');
SET @khoa_hoc_ky_thuat_id = (SELECT id FROM categories WHERE name = 'Khoa Học & Kỹ Thuật');
SET @lich_su_id = (SELECT id FROM categories WHERE name = 'Lịch Sử');
SET @thieu_nhi_id = (SELECT id FROM categories WHERE name = 'Thiếu Nhi');
SET @kinh_te_id = (SELECT id FROM categories WHERE name = 'Kinh Tế');
SET @tam_ly_triet_hoc_id = (SELECT id FROM categories WHERE name = 'Tâm Lý & Triết Học');
SET @suc_khoe_lam_dep_id = (SELECT id FROM categories WHERE name = 'Sức Khỏe & Làm Đẹp');
SET @ton_giao_tam_linh_id = (SELECT id FROM categories WHERE name = 'Tôn Giáo & Tâm Linh');
SET @ky_nang_song_id = (SELECT id FROM categories WHERE name = 'Kỹ Năng Sống');
SET @van_hoa_nghe_thuat_id = (SELECT id FROM categories WHERE name = 'Văn Hóa & Nghệ Thuật');

-- Chèn danh mục con
INSERT INTO categories (name, description, parent_id) VALUES
-- Văn Học
('Tiểu Thuyết', 'Sách tiểu thuyết', @van_hoc_id),
('Truyện Ngắn', 'Sách truyện ngắn', @van_hoc_id),
('Thơ', 'Sách thơ', @van_hoc_id),
('Văn Học Kinh Điển', 'Sách văn học kinh điển', @van_hoc_id),

-- Khoa Học & Kỹ Thuật
('Khoa Học Tự Nhiên', 'Sách về khoa học tự nhiên', @khoa_hoc_ky_thuat_id),
('Kỹ Thuật', 'Sách về kỹ thuật', @khoa_hoc_ky_thuat_id),
('Công Nghệ Thông Tin', 'Sách về công nghệ thông tin', @khoa_hoc_ky_thuat_id),
('Y Học', 'Sách về y học', @khoa_hoc_ky_thuat_id),

-- Lịch Sử
('Lịch Sử Thế Giới', 'Sách về lịch sử thế giới', @lich_su_id),
('Lịch Sử Việt Nam', 'Sách về lịch sử Việt Nam', @lich_su_id),

-- Thiếu Nhi
('Truyện Thiếu Nhi', 'Sách truyện thiếu nhi', @thieu_nhi_id),
('Sách Giáo Khoa', 'Sách giáo khoa', @thieu_nhi_id),

-- Kinh Tế
('Quản Trị Kinh Doanh', 'Sách quản trị kinh doanh', @kinh_te_id),
('Tài Chính', 'Sách về tài chính', @kinh_te_id),
('Marketing', 'Sách về marketing', @kinh_te_id),
('Khởi Nghiệp', 'Sách về khởi nghiệp', @kinh_te_id),

-- Tâm Lý & Triết Học
('Tâm Lý Học', 'Sách về tâm lý học', @tam_ly_triet_hoc_id),
('Triết Học', 'Sách về triết học', @tam_ly_triet_hoc_id),

-- Sức Khỏe & Làm Đẹp
('Sức Khỏe', 'Sách về sức khỏe', @suc_khoe_lam_dep_id),
('Làm Đẹp', 'Sách về làm đẹp', @suc_khoe_lam_dep_id),

-- Tôn Giáo & Tâm Linh
('Tôn Giáo', 'Sách về tôn giáo', @ton_giao_tam_linh_id),
('Tâm Linh', 'Sách về tâm linh', @ton_giao_tam_linh_id),

-- Kỹ Năng Sống
('Phát Triển Bản Thân', 'Sách về phát triển bản thân', @ky_nang_song_id),
('Kỹ Năng Giao Tiếp', 'Sách về kỹ năng giao tiếp', @ky_nang_song_id),

-- Văn Hóa & Nghệ Thuật
('Nghệ Thuật', 'Sách về nghệ thuật', @van_hoa_nghe_thuat_id),
('Văn Hóa', 'Sách về văn hóa', @van_hoa_nghe_thuat_id);
