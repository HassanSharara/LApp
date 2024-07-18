<?
namespace App\Http\Request;

use Illuminate\Http\Request;

class RoyalBoardRequest extends Request {

    public $postedDecryptedData = null;

    public function getPostedData(){
        if($this->postedDecryptedData!=null)return $this->postedDecryptedData;
    }
    
    public function get($input,$default=null){
        return parent::get($input,$default);
    }

    public function get_encrypted($input){

    }
}