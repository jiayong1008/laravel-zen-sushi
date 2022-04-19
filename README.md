# Zen Sushi Restaurant Management System
A restaurant management system designed for customers, kitchen staffs, and restaurant admins. Logged in customers shall be able to browse through the menu, add dish to cart, place orders, and settle payments via PayPal. On the other hand, kitchen staffs and admins utilize this system to carry out day-to-day tasks which includes managing the restaurant’s menu, discount codes, orders, and viewing the restaurants’ overall performance.

## Project Specifications
This project is fully mobile-responsive and is implemented using PHP's Laravel, JavaScript, HTML, CSS, Bootstrap, and ApexCharts.js. Listed below are the list of specifications in this project:

1. **Registration, Login, Logout, Change Password**
    - Unregistered user may register as a customer.
    - Registered customers, kitchen staffs, and admins may log in with their credentials.
    - Admins may create new customer, kitchen staff, or admin account.
    - Users are allowed to change their password.
    - All users may log out.
2. **Menu**
    - Unregistered user, logged in customer, and restaurant admins may view the restaurant's menu.
    - Restaurant admin may add, update, or delete a menu item.
3. **Cart** (Only for logged in customers)
    - View cart.
    - Add dish to cart.
    - Update dish quantity.
    - Remove cart item.
4. **Payment** (Only for logged in customers)
    - Apply discount code during checkout.
    - Insert PayPal credentials and proceed with payment.
5. **Order**
    - Customers:
        - View active order (only their order, not someone else's).
        - View previous orders (only their order, not someone else's).
    - Kitchen Staff and Admins:
        - View all active orders.
        - View all previous orders.
        - Update order status.
6. **Discount**
    - Restaurant admins may view, create, update, and delete discount vouchers.
    - Customers can apply discount voucher during checkout (if their order meets the voucher's requirements).
7. **Dashboard** (Only for restaurant admins)
    - View latest 30 days dashboard (overview & snapshot of business' profitability)

## Installation:
1. Clone this project and install PHP (if haven't already).
2. Run `php artisan serve` to startup the server locally.


### To create dummy data:
This step is not needed unless you need extra fresh dummy data. Assuming all tables are empty except for user table:
1. `Menu::factory()->times(20)->create();`
2. Create some discount vouchers (Can program a DiscountFactory if necessary)
3. `Transaction::factory()->times(50)->create();` - This will create 50 order instances too
4. `CartItem::factory()->times(150)->create();` - Each cart will be assigned to 1 of the orders made above
5. Open up your *artisan tinker* and execute:
    ```php
    $transactions = Transaction::all();
    foreach ($transactions as $t) {
        $t->final_amount = $t->order->getTotalFromScratch();
        $t->save();
    }