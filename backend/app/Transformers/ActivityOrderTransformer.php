<?php

namespace App\Transformers;

use App\ActivityOrder;
use League\Fractal\TransformerAbstract;
use Carbon\Carbon;

class ActivityOrderTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'activity', 'user', 'bank'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ActivityOrder $order)
    {
        $order_status =  'ยังไม่แจ้งชำระเงิน';
        if ($order->order_status == 'new') {
            $order_status =  'ยังไม่แจ้งชำระเงิน';
        }
        if ($order->order_status == 'playment') {
            $order_status =  'แจ้งชำระเงินแล้ว';
        }
        if ($order->order_status == 'confirm') {
            $order_status =  'ยันยันการชำระเงินแล้ว';
        }
        if ($order->order_status == 'not_confirm') {
            $order_status =  'ข้อมูลการแจ้งชำระเงินไม่ถูกต้อง';
        }
        if ($order->payment_image != '') {
            $payment_image = url('images/activity-payment' , $order->payment_image);
        } else {
            $payment_image = url('images/default/no-image-payment.png');
        }
        return [
            'id' => (int)$order->id,
            'user_id' => $order->user,
            'amount' => number_format($order->amount , 2),
            'act_detail' => (string)$order->act_detail,
            'start_date' => (string)$order->start_date,
            'start_date_thai' => createDateThai($order->start_date),
            'end_date' => (string)$order->end_date,
            'end_date_thai' => createDateThai($order->end_date),
            'order_status' => (string)$order_status,
            'message' => (string)$order->message,
            'payment_date' => (string)$order->payment_date,
            'payment_date_thai' => createDateThai($order->payment_date),
            'payment_time' => (string)$order->payment_time,
            'payment_amount' => number_format($order->payment_amount , 2),
            'payment_image' => $payment_image,
            'created_at' => (string)$order->created_at,
            'updated_at' => (string)$order->updated_at,
        ];
    }

    public function includeActivity(ActivityOrder $order)
    {
        $activity = $order->activity;
        return $this->item($activity, new ActivityTransformer());
    }

    public function includeUser(ActivityOrder $order)
    {
        if ($order->user) {
            return $this->item($order->user, new UserTransformer());
        } else {
            return null;
        }
    }

    public function includeBank(ActivityOrder $order)
    {
        if ($order->bank) {
            return $this->item($order->bank, new BankTransformer());
        } else {
            return null;
        }
    }
}
