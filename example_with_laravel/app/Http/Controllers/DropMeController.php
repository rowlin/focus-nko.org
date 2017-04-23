<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Parse\ParseClient;
use Parse\ParseUser;
use Parse\ParseQuery;

class DropMeController extends Controller
{


     function compare_arrays($value, $my_array){
         foreach ($my_array as $arr){
                if(isset($arr['name']))
                   if($arr['name'] == $value)
                       return false;
            }
            return true;
    }




    public function test(){

        ParseClient::initialize( '6560c5dc08c1183df489d6832fe1fb3a', null, '');
        ParseClient::setServerURL('http://focus-nko.org/', 'api/parse');

        $user = ParseUser::become('r:5c6fc15ac6fbc572b421efa18305affe');


       $i =0 ; //count
        foreach ($result as $res){
                $query = new ParseQuery("Report");
                $query->equalTo('ogrn', $res);
                $objects = $query->find();
                if(!empty($objects)){
                    echo $objects[0]->get('name') . "<br>". $i++ ;

             }
        }

		 /*
		       $regions =  DB::table('kozak')->distinct('region')->get();

			$regions_count =  DB::table('kozak')->distinct('region')->count('region');
			$i = 0;
			$my_array = [];
		
			 foreach ($regions as $reg){

			     if($this->compare_arrays($reg->region , $my_array) != false){
				 $my_array[$i]['name'] = $reg->region;
				 $col_regions = DB::table('kozak')->where('region','like',$reg->region)->count();
				 $my_array[$i++]['kol'] = $col_regions;

			     }
			 }

		*/

		//select('select * from kozak where kozak.ogrn2 == 1055405222806 ')->get();
		/*
			    $fp = fopen('file.csv', 'w');

			    foreach ($result as $fields) {
				fputs($fp, $fields .' ,');
			    }

			    fclose($fp);
			    dd($result);
			    //echo "that ok";
		*/

        return view('welcome', compact('regions_count', 'my_array'));
     
       

    }
}
