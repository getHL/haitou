<?php

namespace App;

class MainService
{
    //增加打印店实例
    function addShop($printShopMesg){
        
        $printShop = new PrintShopModel();
        
        $printShop ->id = md5(uniqid()); //生成唯一id
        $printShop ->shopname = $printShopMesg['shopname'];
        $printShop ->bossname = $printShopMesg['bossname'];
        $printShop ->telenum = $printShopMesg['telenum'];
        $printShop ->adnum = $printShopMesg['adnum'];
        $printShop ->money = $printShopMesg['money'];
        $printShop ->schoolname = $printShopMesg['schoolname'];
        $printShop ->shopaddress = $printShopMesg['shopaddress'];
        $printShop ->paydeadline = $printShopMesg['paydeadline'];
        $printShop ->cityname = $printShopMesg['cityname'];
        $printShop ->shoplatlong = json_encode(['lat' => $printShopMesg['key_lat'],'key_longti' => $printShopMesg['key_longti']]);
                
        $printShop ->save();
        
        
        //注意还要将对应学校的打印店数增加1
        
        $school = SchoolModel::find($printShopMesg['schoolname']);
        
        if(!empty($school)){
            $school -> num = $school -> num + 1;
            $school -> save();
        }
        
        //添加成功
        return true;
    }
    
    //更新指定打印店信息
    function updateShop($printShopId, $newPrintShop){
        
         
        //取出指定项
        $oldPrintShop = PrintShopModel::find($printShopId);
        
        //更新各个字段
        $oldPrintShop ->shopname = $newPrintShop['shopname'];
        $oldPrintShop ->bossname = $newPrintShop['bossname'];
        $oldPrintShop ->telenum = $newPrintShop['telenum'];
        $oldPrintShop ->adnum = $newPrintShop['adnum'];
        $oldPrintShop ->money = $newPrintShop['money'];
        $oldPrintShop ->schoolname = $newPrintShop['schoolname'];
        $oldPrintShop ->shopaddress = $newPrintShop['shopaddress'];
        $oldPrintShop->paydeadline = $newPrintShop['paydeadline'];
        $oldPrintShop ->cityname = $newPrintShop['cityname'];
        $oldPrintShop ->shoplatlong = json_encode(['lat' => $newPrintShop['key_lat'],'key_longti' => $newPrintShop['key_longti']]);
        
        $oldPrintShop -> save();
        
        return true;
    }
    
    //删除指定打印店
    function deleteShop($id){
        
        
        //删除指定项      
        $printShop = PrintShopModel::find($id);
        
        //注意先判断对象是否为空,否则将对应学校的打印店数减去1,并删除
        if (!empty($printShop)){

            $schoolName = $printShop -> schoolname;
            $school = SchoolModel::find($schoolName);
            
            //不为null的话
            if(!empty($school)){
                $school -> num = $school -> num - 1;
                $school -> save();
            }
           
            $printShop ->delete();            
        }
                
        return true;
    }
    
    //获取指定城市中学校列表
    function getSchoolInCity($cityName){
        
        $schools = SchoolModel::where('cityname', '=', $cityName)
                 ->select('schoolname', 'num')
                 ->get()
                 ->toArray();
        
        return $schools;
    }
    
    //获取指定校区内的打印店列表,查询每页返回count家店信息
    function getPrintShopInSchool($schoolName, $page, $perPage){
        
        $printShops = PrintShopModel::where('schoolname', '=', $schoolName)
                    -> forPage($page, $perPage)
                    -> get()
                    -> toArray();
        
        return $printShops;
    }

    //查看指定打印店付款记录
    function getPayHistory($printShopId){
        
        $payHistoryItem = PayHistoryModel::find($printShopId);
        
        return $payHistoryItem;
    }
    
    //付款登记
    function payRecord($printShopId){
        
        //付款金额是一年money的1/4
        $printShop = PrintShopModel::find($printShopId);
        $costPerYear = $printShop -> money;
        
        
        //添加付款记录
        $payHistory = new PayHistoryModel();
        
        $payHistory ->id =$printShopId;
        $payHistory -> pay_money = $costPerYear / 4;
        $payHistory -> save();
        
        return true; 
    }
}