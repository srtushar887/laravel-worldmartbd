<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});



//$factory->define(\App\top_category::class, function (Faker $faker) {
//    return [
//        'top_cat_name' => $faker->name,
//        'top_cat_image' => "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARAAAAC6CAMAAABRJOIbAAAAMFBMVEXm6Of////4+fnw8fHo6unt7u38/Pzk5uXz9PPw8vHx8/L3+Pfn6Oj7+vvt7+39/v2JQ8GPAAACH0lEQVR4nO3a0VLDIBCFYaALJKW27/+2AkkaQtR6VRz3/+6Io4NnFggQYwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAN5CfNa3KxnWp6Emm92fTe/sJswDuzXOtf7zl7XlbWsa2rNBxDWJ3MIhEOtf/PK/dPvYE5mPeVg3unNDSFrGh4h0BVJKRBajO/lWayIuuT4PG9Jq0hOJ+C2RH4X76z/1P7g8ffwmEaukRspCO5dYXlKyCJeFJcj6grYNj+wciJIlZ14qZE8kTD6vKn4+1YySQC7LYHjWSHj+xAe1gdjp4qYtkSQ1HmP6qVZTIDWUuCbirim4+t5xc5oDsaltLJVy2NuoC6QkMnUB9G0F2qLwx2ZefOShOpAybzQb3vJ64lQHUh9c90ByxSTNgYRoJK8u+6mZb+PRGEg5P3PNI3+YVfUFUuaQZJ2Y++M5h6geMqUi8ngpiWxzSHuGpjCQ/CJSSsKZeFlLpD2FVxhIPWVPJYi47uyc8kBc2djljX+ePfzDdjQGUjcwRqRcY/a7f52BWLffTfWXEjoDsWGSmB9HMbEbNUoDKZm4lIJ9+HisESWB+HMgWy5yTCSN7up7nK8v90SOL2Zabr5Pq0mbSFMjSq5lMv/9td1eI0FLfby2fkCi83OiLx0+qYGhRr5QEwlxdDf+juVbzdG9AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIb6BG0BCzA/r/PHAAAAAElFTkSuQmCC",
//    ];
//});


//$factory->define(\App\middle_category::class, function (Faker $faker) {
//    return [
//        'top_cat_id' => rand(2,11),
//        'mid_cat_name' => $faker->name,
//    ];
//});



//$factory->define(\App\end_category::class, function (Faker $faker) {
//    return [
//        'top_cat_id' => rand(2,11),
//        'mid_cat_id' => rand(2,11),
//        'end_cat_name' => $faker->name,
//    ];
//});



$factory->define(\App\product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'top_cat_id' => rand(2,11),
        'mid_cat_id' => rand(2,11),
        'end_cat_id' => rand(2,11),
        'brand_id' => rand(2,13),
        'hot_deal' => rand(1,2),
        'old_price' => rand(000,999),
        'new_price' => rand(000,999),
        'main_image' => "https://images-na.ssl-images-amazon.com/images/I/41xCWDx-OyL.jpg",
        'image_one' => "https://rukminim1.flixcart.com/image/714/857/shirt/s/h/y/46-bfrybluesht02-being-fab-original-imaekjr8ymhnxznp.jpeg?q=50",
        'image_two' => "https://priyoshop.com/content/images/thumbs/0097916_casual-full-sleeve-black-shirt-d1-uw.jpeg",
        'image_three' => "https://images-na.ssl-images-amazon.com/images/I/41TxNIo3cQL.jpg",
        'image_four' => "https://5.imimg.com/data5/YJ/BO/MY-10973479/mens-designer-casual-shirt-500x500.jpg",
        'image_five' => "https://images-na.ssl-images-amazon.com/images/I/61-TuCrKZ7L._UY550_.jpg",
        'description' => $faker->paragraph,
        'is_admin' => 0,
        'status' => 1,
    ];
});


//$factory->define(\App\brand::class, function (Faker $faker) {
//    return [
//        'brand_name' => $faker->name,
//    ];
//});
//
//$factory->define(\App\size::class, function (Faker $faker) {
//    return [
//        'size_name' => rand(000,999),
//    ];
//});
//
//$factory->define(\App\color::class, function (Faker $faker) {
//    return [
//        'color_name' => $faker->colorName,
//    ];
//});

