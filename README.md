<h3>Bài tập xây dựng web an toàn

 1. Tạo mới file **.env**, copy nội dung **.env.example** sang và thay đổi giá trị ``DB_DATABASE`` thành database của mình
 2. Chạy ``composer install`` để cài đặt các package **composer**
 3. Chạy ``php artisan key:generate`` để sinh key cho ứng dụng
 4. Chạy ``php artisan migrate`` để tạo các bảng trong database
 5. Chạy ``php artisan db:seed`` để sinh dữ liệu cho database
 6. Chạy ``php artisan passport:install --force`` để tạo key cho **passport**
