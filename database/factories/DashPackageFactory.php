<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DashPackage>
 */
class DashPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1 , 6),
            'title' => Str::title($this->faker->unique()->sentence(4)),
            'img' => $this->faker->imageUrl(1600, 900, 'animals', true, 'dogs', true, 'jpg'),
            'slug' => $this->faker->slug(3),
            'rate_from' => $this->faker->randomFloat(2, 50, 500),
            'duration' => $this->faker->numberBetween(2 , 12),
            'overview' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia aut beatae et? Facilis veniam saepe doloremque recusandae. Repellendus dignissimos iusto porro. Ut molestias enim corporis sapiente? Modi inventore iure obcaecati!</p>",
            'table_price' => "<table border=\"1\" align=\"left\" cellspacing=\"1\" cellpadding=\"1\" style=\"width:100%;\"><thead><tr><th scope=\"col\" style=\"text-align: left;\">Pack</th><th scope=\"col\" style=\"text-align: left;\">Cost Per Pack</th></tr></thead><tbody><tr><td>1-3</td><td>$&nbsp;450</td></tr><tr><td>4-10</td><td>$ 425</td></tr><tr><td>11-20</td><td>$ 400</td></tr></tbody></table>",
            'include' => "<ul><li>Hotel pickup and drop off in Ubud, Canggu, Denpasar, Kerobokan, Seminyak, Legian, Kuta, Tuban, Jimbaran, Denpasar,&nbsp; Sanur, Tanjung Benoa, and Nusa Dua</li><li>Private tour in air-conditioned vehicle</li><li>English speaking driver</li><li>Admission fees</li><li>Local tax</li></ul>",
            'exclude' => "<ul><li>Meals fee and any other personal (optional) expenses</li></ul>",
            'important' => "<ul><li>Pickup time at 8:00am</li><li>A minimum of 02 people per booking/tour is required</li></ul>",
        ];
    }
}
