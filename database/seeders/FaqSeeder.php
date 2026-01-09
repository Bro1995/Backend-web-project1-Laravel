<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\FaqItem;

class FaqSeeder extends Seeder
{
    // Adds a few FAQ categories and items for testing
    public function run(): void
    {
        $shipping = FaqCategory::create(['name' => 'Shipping']);
        $orders   = FaqCategory::create(['name' => 'Orders']);
        $account  = FaqCategory::create(['name' => 'Account']);

        FaqItem::create([
            'faq_category_id' => $shipping->id,
            'question' => 'How long does shipping take?',
            'answer'   => 'Shipping usually takes 2 to 5 business days.',
        ]);

        FaqItem::create([
            'faq_category_id' => $orders->id,
            'question' => 'Can I cancel my order?',
            'answer'   => 'Yes, you can cancel before the order is shipped.',
        ]);

        FaqItem::create([
            'faq_category_id' => $account->id,
            'question' => 'How do I change my password?',
            'answer'   => 'Go to your profile page and update your password.',
        ]);
    }
}
