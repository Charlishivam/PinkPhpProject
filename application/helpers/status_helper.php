<?php 

function booking_status($status_selected = null){
    $status = [
            ['status'=>'booking_accepted','display_status'=>'Order Accepted','remark'=>'Order accepted by driver !'],
            ['status'=>'booking_arrived','display_status'=>'Driver Arrived','remark'=>'The driver reached on pickup point !'],
            ['status'=>'booking_pickup','display_status'=>'Order Pickup','remark'=>'Order picked by driver !'],
            ['status'=>'booking_started','display_status'=>'Order on The Way','remark'=>'Order on the way !'],
            ['status'=>'booking_reached','display_status'=>'Order Reached','remark'=>'The driver has reached at your location with the order'],
            ['status'=>'booking_cancel_by_customer','display_status'=>'Order Cancel','remark'=>'Order has been cancel by Customer !'],
            ['status'=>'booking_cancel_by_driver','display_status'=>'Order Cancel','remark'=>'Order has been cancel by Driver !'],
            ['status'=>'booking_completed','display_status'=>'Order Completed','remark'=>'Order Completed !']
        ];
        /*onl selected data get any where */
        foreach($status as $key => $data){
            if($status_selected == $data['status']){
               $status = $data;
               break;
            }
        }
        
    return $status;
}

function payment_status($status_selected = null){
    $status = [
            ['status'=>'payment_pending','display_status'=>'Pending payment','remark'=>'Pending payment !'],
            ['status'=>'payment_failed','display_status'=>'Payment failure','remark'=>'Payment failure !'],
            ['status'=>'payment_complete','display_status'=>'Payment complete','remark'=>'Payment complete !'],
            ['status'=>'payment_refund','display_status'=>'Payment Refund !','remark'=>'Payment Refund !'],
        ];
        /*onl selected data get any where */
        foreach($status as $key => $data){
            if($status_selected == $data['status']){
               $status = $data;
               break;
            }
        }
        
    return $status;
}