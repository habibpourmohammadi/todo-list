## Laravel Livewire Todo List

این پروژه یک Todo List ساده است که با استفاده از Laravel و Livewire ساخته شده است. در این Todo List می‌توانید تسک‌های خود را ایجاد، ویرایش، حذف و تغییر وضعیت دهید. همچنین امکان فیلتر کردن لیست تسک‌ها بر اساس وضعیت آن‌ها و صفحه‌بندی با استفاده از pagination نیز وجود دارد. تمامی عملیات در این پروژه به صورت real-time و بدون نیاز به ریلود صفحه انجام می‌شوند.


![todo list](https://i.ibb.co/1vYD0dS/scrnli-4-18-2024-3-23-34-PM.png)


### Installation and Setup
- **Clone the repository:**
    ```bash
    git clone https://github.com/habibpourmohammadi/todo-list.git
    ```

- **Navigate to the project directory:**
    ```bash
    cd todo-list
    ```

- **Install dependencies:**
    ```bash
    composer install
    ```

- **Create the environment file:**
    ```bash
    cp .env.example .env
    ```

- **Configure the database settings:**
    Edit the `.env` file and enter your database information.

- **Generate a new encryption key:**
    ```bash
    php artisan key:generate
    ```

- **Run migrations:**
    ```bash
    php artisan migrate
    ```

- **Install npm dependencies:**
    ```bash
    npm install
    ```

- **Compile assets (including Tailwind CSS):**
    ```bash
    npm run dev
    ```

- **Run the server:**
    ```bash
    php artisan serve
    ```

- **Get real-time updates:**
    You can now visit http://localhost:8000 and enjoy your Todo List!

### نحوه استفاده

1- **ایجاد تسک:**
    با کلیک بر روی دکمه "Add Task" می‌توانید یک تسک جدید ایجاد کنید.

2- **ویرایش تسک:**
    با کلیک بر روی دکمه "🖊️" در کنار هر تسک، می‌توانید آن را ویرایش کنید.

3- **حذف تسک:**
    با کلیک بر روی دکمه "🗑️" در کنار هر تسک، می‌توانید آن را حذف کنید.

4- **تغییر وضعیت تسک:**
    با کلیک بر روی دکمه "☐" در کنار هر تسک، می‌توانید وضعیت آن را تغییر دهید.

5- **فیلتر کردن تسک‌ها:**
    با استفاده از فیلترهای موجود بالای لیست تسک‌ها، می‌توانید تسک‌ها را بر اساس وضعیت آن‌ها فیلتر کنید.

6- **صفحه‌بندی:**
    تسک‌ها با استفاده از pagination به صورت صفحه‌بندی شده نمایش داده می‌شوند.

### توسعه دهنده

- ایمیل: habibpourmohammady@gmail.com
- لینکدین: https://www.linkedin.com/in/habibpourmohammadi/

### مشکلات یا پیشنهادات

برای گزارش هرگونه مشکل یا ارائه پیشنهاد، لطفاً یک issue در صفحه ریپوزیتوری ایجاد کنید.
