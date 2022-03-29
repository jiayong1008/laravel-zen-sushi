<?php
// Programmer Name: Ms. Lim Jia Yong, Project Manager
// Description: Creates dummy cart item data, read README.md for more info
// Edited on: 19 March 2022

namespace Database\Factories;

use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'user_id' => $this->getUser(),
            'menu_id' => $this->faker->numberBetween(1, Menu::count()),
            'order_id' => $this->faker->numberBetween(1, Order::count()),
            'quantity' => random_int(1, 3),
            'fulfilled' => true, // can change to false
        ];
    }

    // Return random customer
    private function getUser() {
        $users = User::all();
        $customers = array();
        foreach ($users as $user) {
            if ($user->role == 'customer')
                array_push($customers, $user->id);
        }
        if (count($customers) == 0) return;

        $rand = array_rand($customers);
        return $customers[$rand];
    }
}
