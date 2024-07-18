<?php

namespace App\Http\Controllers\statics\financial\Transactions;

use App\Http\Controllers\Types\RoyalApiController;
use App\Models\RoyalBoardModel\RoyalBoardModel;
use App\Models\System\Transaction\TransactionsModel;
use Exception;
use Illuminate\Database\QueryException;

class StaticTransactionsController extends RoyalApiController
{



    static public function makeTransactionTransaction(
    $type,$amount,RoyalBoardModel $model,
    $fromModel = null,
    $reason = "transaction",
    $description = "description",
    $amountCurrency = "IQ" ,
    ) : TransactionsModel | string {
       try {


        /// initialize constants
        $transaction = new TransactionsModel();
        $transaction->type = $type;
        $transaction->amount_currency = $amountCurrency;
        $transaction->amount = $amount;
        $transaction->reason = $reason;
        $transaction->description = $description;


        if($type == 0){
            if($model->wallet < $amount)return 'لا توجد الاموال الكافية';
            $model->wallet -= $amount;
            $transaction->to_model_type = $model->getTable();
            $transaction->to_model_id = $model->id;
            if($fromModel != null ){
                $fromModel->wallet += $amount;
                $transaction->model_type = $fromModel->getTable();
                $transaction->model_id = $fromModel->id;
                $fromModel->save();
            }}
        else {
            if($fromModel != null){
                if($fromModel->wallet < $amount) return 'لا توجد الاموال الكافية';
                $fromModel->wallet -= $amount;
                $transaction->model_type = $fromModel->getTable();
                $transaction->model_id = $fromModel->id;
                $fromModel->save();
            }
            $model->wallet += $amount;
            $transaction->to_model_type = $model->getTable();
            $transaction->to_model_id = $model->id; }



        
        
        /// save constants models
        $model->save();
        $transaction->save();
        return $transaction;
       }

       /// catch errors and rollback
       catch(QueryException $e){
        return $e->getMessage();
       }
       catch (Exception $e){
       }      

       return "حصل خطأ في نقل الاموال";
    }
}
