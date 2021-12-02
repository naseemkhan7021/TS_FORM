<?php

namespace Database\Seeders;

use App\Models\crmsales\ConversationMode;
use Illuminate\Database\Seeder;

class ConverationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConversationMode::create(
            ['conversation_description' => 'Initial Conversation', 'conversation_abbr' => 'IC']
        );
        ConversationMode::create(
            ['conversation_description' => 'Personal Meeting', 'conversation_abbr' => 'PM']
        );
        ConversationMode::create(
            ['conversation_description' => 'Telephone Conversation', 'conversation_abbr' => 'TC']
        );
        ConversationMode::create(
            ['conversation_description' => 'WhatsApp Video Call', 'conversation_abbr' => 'WVC']
        );
        ConversationMode::create(
            ['conversation_description' => 'WhatsApp Message', 'conversation_abbr' => 'WM']
        );
        ConversationMode::create(
            ['conversation_description' => 'WhatsApp Call', 'conversation_abbr' => 'WC']
        );
        ConversationMode::create(
            ['conversation_description' => 'Telegram Message', 'conversation_abbr' => 'TM']
        );
        ConversationMode::create(
            ['conversation_description' => 'Telegram Call', 'conversation_abbr' => 'TC']
        );
        ConversationMode::create(
            ['conversation_description' => 'Telegram Video Call', 'conversation_abbr' => 'TVC']
        );

    }
}
