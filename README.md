### 1.How To Run :astonished:
```
Step 1: Move this folder under apache root directory
Step 2: Insert Databases (database imported Files will be placed in resources folder of each servive)
Step 3: Run all services (further extensions installation may required, eg. using Spring Suit or If VSCode -> require extension Java Development Kit (JDK), Extension Pack for Java, Spring Boot Extension Pack)
```
> Open your browser -> type: ***http://localhost/Project_QLNS_UDPT/app/client/index.php***

> Enter and enjoy your journey :smiling_face_with_three_hearts:

### 2.Folder Structure(Still Updating) :file_folder:
```
/app
/CLIENT
    │
    ├── /common               # Các thư viện, biến môi trường global, helper - functions dùng chung
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
/SERVER
    ├── /services folder

```