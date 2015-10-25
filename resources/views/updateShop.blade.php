@extends('master')
    @section('form')
        			<form class="form-horizontal" action = "updatePrintShop" method = "post">
        			
         			    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
         			          			     
        			    <div class="control-group">
        					<label class="control-label" for="id">ID</label>
        					<div class="controls">
        						<input name="id" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="shopname">店名</label>
        					<div class="controls">
        						<input name="shopname" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="bossname">老板</label>
        					<div class="controls">
        						<input name="bossname" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="telenum">电话</label>
        					<div class="controls">
        						<input name="telenum" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="adnum">广告牌数量</label>
        					<div class="controls">
        						<input name="adnum" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="money">一年金额</label>
        					<div class="controls">
        						<input name="money" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="schoolname">学校</label>
        					<div class="controls">
        						<input name="schoolname" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="shopaddress">地址</label>
        					<div class="controls">
        						<input name="shopaddress" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="deadline">结算时间</label>
        					<div class="controls">
        						<input name="paydeadline" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="city">城市</label>
        					<div class="controls">
        						<input name="cityname" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="key_lat">经度</label>
        					<div class="controls">
        						<input name="key_lat" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="key_longti">纬度</label>
        					<div class="controls">
        						<input name="key_longti" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<div class="controls">
        						<label class="checkbox"><input type="checkbox" /> Remember me</label>
        					    <button class="btn" type="submit">更新</button>
        					</div>
        				</div>
        			</form>
    @stop
