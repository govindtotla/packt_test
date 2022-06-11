<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;

use App\WordPHP\WordPHP;
use App\DocxReader\DocxReader;

class CarsController extends Controller
{
    //
    
	public function storeCar(Request $request) {
        $car = new Cars();
        $car->make = $request->make;
        $car->model = $request->model;
        $car->save();

        return $car;
    }
    
	public function getCars(Request $request) {
        $cars = Cars::all();

        return $cars;
    }
    
	public  function editCar(Request $request, $id){
        $car = Cars::where('id',$id)->first();

        $car->make = $request->get('val_1');
        $car->model = $request->get('val_2');
        $car->save();

        return $car;
    }
       
	
	public function deleteCar(Request $request){
        $car = Cars::find($request->id)->delete();
    }
    
    
    
     public function word()
    {
		//phpinfo();
		$fil = public_path() . '/uploads/Govind_totla.docx';
		
		/*$doc = new DocxReader();
		$doc->setFile($fil);

		if(!$doc->get_errors()) {
			$html = $doc->to_html();
			$plain_text = $doc->to_plain_text();

			echo $html;
		} else {
			echo implode(', ',$doc->get_errors());
		}
		echo "\n";
		die;
		*/
		
		$rt = new WordPHP(false);
		$text = $rt->readDocument($fil);
		echo $text;
		die;
		
        return view('post.index');
    }
    
    
}
