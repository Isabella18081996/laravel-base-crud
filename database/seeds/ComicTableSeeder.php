<?php

use App\Comic;
use Illuminate\Database\Seeder;
use Illuminate\Support;
class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_comic = config('comic');
        //dump($array_comic);
        foreach($array_comic as $comic_item){
            $new_comic = new Comic();
            $new_comic->title = $comic_item['titolo'];
            $new_comic->slug= Str::slug($new_comic->title, '-');
            $new_comic->description=$comic_item['description'];
            $new_comic->image=$comic_item['thumb'];  
            $new_comic->series=$comic_item['series'];
            $new_comic->type=$comic_item['type'];
            $new_comic->price=$comic_item['price'];
            $new_comic->date=$comic_item['sale_date'];
            $new_comic->save();
        }
        
    }
}
