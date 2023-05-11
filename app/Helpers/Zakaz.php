<?php

namespace app\Helpers;

use Illuminate\Support\Facades\DB;


class Zakaz
{
    public function addZakaz()
    {
        DB::table('zakazunity')->orderBy('id')->chunk(100,function( $creat) {
            foreach ($creat as $item){
                if (DB::table('status_history')->doesntExist()) {
                    $msg = 'Новый заказ';
                    $indicator = 'success';
                    DB::table('status_history')->insert([
                        'id' => null,
                        'zakaz_id' => $item->num,
                        'date_changed' => now(),
                        'before' => null,
                        'current' => $item->status
                    ]);

                    DB::table('zakaz')->insert([
                        'id' => null,
                        'id_zakaz' => $item->num,
                        'created_at' => $item->created_at,
                        'status' => $item->status,
                        'comment' => $indicator.','.$msg
                    ]);

                } elseif (DB::table('status_history')->where('zakaz_id', $item->num)->exists()) {
                    $status = DB::table('status_history')->where('zakaz_id', $item->num)->first();

                    if ($status->current !== $item->status) {

                        if ($status->current === 'Новый' || $status->current === null) {
                            $indicator = 'info';
                            $msg = 'Статус заказа успешно обновлен';
                            DB::table('status_history')
                                ->where('zakaz_id', $item->num)
                                ->update(['before' => 'current',
                                    'current' => $item->status]);

                            DB::table('zakaz')
                                ->where('id_zakaz', $item->num)
                                ->update(['status' => $item->status,
                                    'comment' => $indicator.','.$msg]);
                        }
                        if ($status->current === 'Отклонен' || $status->current === 'Доставлен') {
                            $indicator = 'danger';
                            $msg = 'Попытка сменить статус заказа с ' . $status->current . 'на' . $item->status;
                            DB::table('zakaz')
                                ->where('id_zakaz', $item->num)
                                ->update(['comment' => $indicator.','.$msg]);
                        }
                    }
                    $indicator = 'secondary';
                    $msg = 'Статус заказа не изменился';
                    DB::table('zakaz')
                        ->where('id_zakaz', $item->num)
                        ->update(['comment' => $indicator.','.$msg]);
//                    throw new UserException($msg);
                }
        }
        });
    }
}
