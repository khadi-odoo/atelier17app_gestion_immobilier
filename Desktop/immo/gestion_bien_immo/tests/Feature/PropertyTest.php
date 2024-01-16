<?php

namespace Tests\Feature;

use App\Models\Option;
use App\Models\OptionProperty;
use App\Models\Property;
use App\Models\Role;
use App\Models\User;
use Database\Factories\option_propertyFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;

class PropertyTest extends TestCase
{

    use WithFaker;


   
    /**
     * A basic feature test example.
     */
    public function test_admin_can_create_property(): void
    {
        Role::factory(4)->create();

        $user = User::where('email', 'admin@admin.com')->first();
        if (!$user) {
            User::factory()->admin()->create();
        }
        $user = User::where('email', 'admin@admin.com')->first();


        $option = ['piscine', 'jackousie', 'salle de bain', 'salle de travail'];
        $response =  $this->actingAs($user)
            ->post('admin/property', [
                // '_token' => csrf_token(),
                'title' => $this->faker->name,
                'description' => $this->faker->text,
                'surface' =>  $this->faker->numberBetween(9, 10458),
                'floor' => $this->faker->numberBetween(0, 5),
                'price' => $this->faker->numberBetween(567, 679775),
                'city' => $this->faker->name,
                'address' => $this->faker->name,
                'postal_code' => $this->faker->name,
                'sold' => $this->faker->boolean,
                'options' => ['piscine', 'jackousie', 'salle de bain',],
                'image' => $this->faker->imageUrl,
                'green_area' => $this->faker->boolean,
            ]);

        $response->assertStatus(302);
        // $this->refreshApplication();

    }

    public function test_admin_can_show_all_properties()
    {
        $this->get('/')
            ->assertStatus(200);
    }

    public function test_admin_can_delete_property()
    {

        Role::factory(4)->create();

        $user = User::where('email', 'admin@admin.com')->first();
        if (!$user) {
            User::factory()->admin()->create();
        }
        // je me connecte
        $user = User::where("email", "admin@admin.com")->first();
      
        //vu que j'utilise une base de donnée test et que les données seront persité
        // je met en place un singleton pour eviter la création a chaque test 
        $property = Property::latest()->first();
        $option = Option::latest()->first();
    

        if ($property === null) {
            Property::factory(20)->create();
        }

        // // Si l'option n'existe pas, créez-la
        if ($option === null) {
            Option::factory(20)->create();
        }

        // je modifier les informations de l'utilisateur
        $this->actingAs($user)
            ->delete("admin/property/{$property->id}")
            ->assertStatus(302);
            // ->assertRedirect(route('admin.property.index'))
            // ->assertSessionHas('success', 'Le bien a bien été supprimé');

        // $property->options()->sync($option->id);
        // if ($option) {
        //     $property->options()->sync([$option->id]);
        // }
    }
}
