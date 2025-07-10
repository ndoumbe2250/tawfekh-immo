<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Contact;
use App\Models\Propertie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         {
        $types = ['vente', 'achat', 'location', 'estimation', 'autre'];
        $statuses = ['en_attente', 'traitee', 'cloturee'];

        // Assure-toi d'avoir des propriétés et utilisateurs en base
        $properties = Propertie::pluck('id')->all();
        $users = User::pluck('id')->all();

        for ($i = 0; $i < 20; $i++) {
            Contact::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'type_demande' => fake()->randomElement($types),
                'message' => fake()->paragraph(),
                'properties_id' => fake()->randomElement($properties),
                'status' => fake()->randomElement($statuses),
                'traitee_le' => fake()->optional()->dateTimeThisMonth(),
                'assigned_to' => fake()->optional()->randomElement($users),
            ]);
        }
    }
}
    }

