<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $address = $this->faker->address();
        $postcode_temp = substr($address, 0, 7);
        $postcode = substr_replace($postcode_temp, '-', 3, 0);
        $address_temp = substr($address, 9);
        $pos = mb_strpos($address_temp, ' ');
        $primaryAddress = ($pos > 0) ? mb_substr($address_temp, 0, $pos) : $address_temp;
        $secondaryAddress = ($pos > 0) ? mb_substr($address_temp, $pos+1) : '';
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1, 2),
            'email' => $this->faker->unique()->safeEmail(),
            'postcode' => $postcode,
            'address' => $primaryAddress,
            'building_name' => $secondaryAddress,
            'opinion' =>  $this->faker->realText(),
        ];
    }
}
