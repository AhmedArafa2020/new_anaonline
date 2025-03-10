<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ChatbotController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        // Greeting
        $botman->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello! How can I assist you today?');
        });

        // List products
        $botman->hears('products', function (BotMan $bot) {
            $products = Product::all();
            if ($products->isEmpty()) {
                $bot->reply('No products available at the moment.');
            } else {
                $message = "Here are our products:\n";
                foreach ($products as $product) {
                    $message .= "- {$product->name} (Price: {$product->price})\n";
                }
                $bot->reply($message);
            }
        });

        // Add to cart
        $botman->hears('add to cart {productId}', function (BotMan $bot, $productId) {
            $product = Product::find($productId);
            if ($product) {
                // Add product to session cart
                $cart = session()->get('cart', []);
                $cart[] = $product;
                session()->put('cart', $cart);

                $bot->reply("Added {$product->name} to your cart.");
            } else {
                $bot->reply("Product #{$productId} not found.");
            }
        });

        // View cart
        $botman->hears('view cart', function (BotMan $bot) {
            $cart = session()->get('cart', []);
            if (empty($cart)) {
                $bot->reply("Your cart is empty.");
            } else {
                $message = "Your cart contains:\n";
                foreach ($cart as $product) {
                    $message .= "- {$product->name} (Price: {$product->price})\n";
                }
                $bot->reply($message);
            }
        });

        // Checkout
        $botman->hears('checkout', function (BotMan $bot) {
            $cart = session()->get('cart', []);
            if (empty($cart)) {
                $bot->reply("Your cart is empty.");
            } else {
                // Create an order
                $order = Order::create(['status' => 'pending']);
                foreach ($cart as $product) {
                    // Add products to order (assuming an order_product pivot table exists)
                    $order->products()->attach($product->id);
                }

                // Clear the cart
                session()->forget('cart');

                $bot->reply("Order #{$order->id} created successfully. Status: {$order->status}");
            }
        });

        // Check order status
        $botman->hears('order status {id}', function (BotMan $bot, $orderId) {
            $order = Order::find($orderId);
            if ($order) {
                $bot->reply("Order #{$order->id} is {$order->status}.");
            } else {
                $bot->reply("Order #{$orderId} not found.");
            }
        });

        // Fallback for unknown commands
        $botman->fallback(function (BotMan $bot) {
            $bot->reply("Sorry, I don't understand that command. Try 'hello', 'products', 'add to cart 1', 'view cart', 'checkout', or 'order status 1'.");
        });

        $botman->listen();
    }
}
