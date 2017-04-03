<?php

      require  ('api.class.php');
   
     /**
      *   演示数据
     */

     $data  =array(
 
                   'id' => 1,

                   'name'  => 'koala',   

                   'type'  =>  array(4,5,6),
                                                           
     	);


     Response ::json(200,'请求成功',$data);  //json  数据


    Response :: XmlEncode(200,'请求成功',$data);    //xml  数据