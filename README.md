# Cấu trúc thư mục theo mô hình MVC dự kiến 
/app
│
├── /common               # Các thư viện, biến môi trường global, helper - functions dùng chung, config database...
│   ├── connect-db.php      # Config, connect db
│   ├── env.php             # Tệp cấu hình môi trường
│   ├── helpers.php         # functions dùng chung
│   └── libraries.php       # Các thư viện
│
├── /controllers          # Các lớp điều khiển (controllers)
│   ├── LoginController.php
│   ├── SignupController.php
│   ├── ProfileController.php
│   ├── RequestController.php
│   ├── CampaignController.php
│   ├── ....
│
├── /models               # Các lớp mô hình (models)
│   ├── Employee.php
│   └── Manager.php
│   └── Requests.php
│   ...
|
├── /views                # Các tệp giao diện (views)
│   ├── /profile
│   │  ...(.html, .php files)
│   ├── /requests
│   │   
│   ├── /activities
│
├── /public               # Thư mục công khai cho các tài nguyên tĩnh
│   ├── /css
│   │   └── style.css
│   ├── /fonts
│   │   └── any font source
│   ├── /images
│   │   └── logo.png
│   └── /js
│       └── main.js
│
├── /uploads              # Thư mục chứa các tệp upload từ người dùng
│   ├── /documents
│   └── /images
│
├── /routes               # Các tệp định tuyến cho web
│   └── web.php
│
├── index.php             # Tệp tin chính, điểm vào của ứng dụng
└── README.md             # README File