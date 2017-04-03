<?php    
    
      
           class Response {

    
                /**
                 *  按json 方式输出数据
                 *  @param   integer   $code  状态码
                 *  @param   string      $message  提示信息
                 *  @param    array       $data   数据
                 *   return     string
                 */
          
                public   static  function  json($code,$message,$data=array()){

                         if(!is_numeric($code)){

                                return  '';
                         }

                        $result  = array(
                                      
                                      'code ' => $code,

                                      'message' =>$message,

                                      'data'   => $data
                     
                          );

                      echo  json_encode($result);

                      exit();

                }


                   
                /**
                 *  按xml 方式输出数据
                 *  @param   integer   $code  状态码
                 *  @param   string      $message  提示信息
                 *  @param    array       $data   数据
                 *   return     string
                 */
              
                  public   static  function    XmlEncode ($code,$message,$data =array()){

                               if(!is_numeric($code)){

                               	return  "";
                               }   
                  
                              $result  = array(
                                           
                                            'code'  => $code,

                                            'message'  =>$message,

                                             'data'  =>  $data
                                              
                              	);
                            
                        header("Content-type: text/xml");

                        $xml ="<?xml version='1.0' encoding='utf-8' ?>\n";
                       
                        $xml .="<root>\n";
   
                        $xml .= self ::XmlTooEncode($result);

                        $xml .="</root>\n";

                        echo  $xml;

                  }

             /**
              *   对数据进行 xml 转换
              *   @param  array    $data   数据
              *    return     string
             */
     
             public  static   function  XmlTooEncode($data){
  
                   $xml = $attr ="";

                   foreach ($data as  $key => $value) {

                        if(is_numeric($key)){              //判断 key 值 如果是数字的   给节点增加属性
                                 
                                 $attr  = "id = '{$key}'";
                                  
                                  $key = "item";

                        }
                   	 
                          $xml .="<{$key}  {$attr}>";                      
                          $xml  .= is_array($value) ? self::XmlTooEncode($value) : $value;  
                          $xml .="</{$key}>\n";

                   }
   
                    return   $xml;

             }


         }



