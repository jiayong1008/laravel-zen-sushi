## Progress
1. Completed first chart and mixed chart
2. Configured couple of factories to populate dummy data
3. Made customized 403 and 404 page

## Note on factories:
Assuming all tables are empty except for user table:
1. `Menu::factory()->times(20)->create();`
2. Create some discounts (Can code a DiscountFactory if necessary)
3. `Transaction::factory()->times(50)->create();` - This creates 50 order instances too
4. `CartItem::factory()->times(150)->create();` - Each cart will be assigned to 1 of the orders made above
5. Go to your artisan tinker and execute:
    ```php
    $transactions = Transaction::all();
    foreach ($transactions as $t) {
        $t->final_amount = $t->order->getTotalFromScratch();
        $t->save();
    }
Feel free to change anything in factory